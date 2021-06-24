<?php
function addProduct($productName, $productImage, $productDesc, $produtCategory, $productTop)
{
    $bdd = bdd();
    try {
        $sql = "INSERT INTO product(productName, imgUrl, description, categoryID, onTop) VALUES(?, ?, ?, ?, ?)";
        $stmt = $bdd->prepare($sql);
        $stmt->execute([$productName, $productImage, $productDesc, $produtCategory, $productTop]);
        $_SESSION["lastId"] = $bdd->lastInsertId();
    } catch (PDOException $e) {
        echo $e->getMessage();
        echo $e->getLine();
        exit();
    }
};

function addProductTech($productId, $prix, $tailleMemoire, $processeur, $processeurFab, $resolutionEcran, $tailleEcran, $carteGraphique, $typeHdd, $tailleHdd, $poids, $OS)
{
    $bdd = bdd();
    try {
        $sql = "INSERT INTO fichetechnique(productId, prix, tailleMemoire, processeur, processeurFab, resolutionEcran, tailleEcran, carteGraphique, typeHdd, tailleHdd, poids, OS) 
            VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $bdd->prepare($sql);
        $stmt->execute([$productId, $prix, $tailleMemoire, $processeur, $processeurFab, $resolutionEcran, $tailleEcran, $carteGraphique, $typeHdd, $tailleHdd, $poids, $OS]);
    } catch (PDOException $e) {
        echo $e->getMessage();
        echo $e->getLine();
        exit();
    }
};

function getProduct($id)
{
    $bdd = bdd();
    try {
        if ($id != null) {
            $sql = "SELECT * FROM product INNER JOIN fichetechnique ON product.productId = fichetechnique.productId INNER JOIN category ON product.categoryID = category.categoryId WHERE product.categoryID = ? ORDER BY product.productId DESC LIMIT 12";
            $stmt = $bdd->prepare($sql);
            $stmt->execute([$id]);
        } else {

            $sql = "SELECT * FROM product INNER JOIN fichetechnique ON product.productId = fichetechnique.productId INNER JOIN category ON product.categoryID = category.categoryId ORDER BY product.productId DESC LIMIT 12";
            $stmt = $bdd->prepare($sql);
            $stmt->execute();
        }
        $result = $stmt->fetchAll(PDO::FETCH_OBJ);
    } catch (PDOException $e) {
        echo $e->getMessage();
        echo $e->getLine();
        exit();
    }
    return $result;
};

function getProductOnTop()
{
    $bdd = bdd();
    try {
        $sql = "SELECT * FROM product INNER JOIN fichetechnique ON product.productId = fichetechnique.productId INNER JOIN category ON product.categoryID = category.categoryId WHERE product.onTop = '1' ORDER BY product.productId DESC";
        $stmt = $bdd->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_OBJ);
    } catch (PDOException $e) {
        echo $e->getMessage();
        echo $e->getLine();
        exit();
    }
    return $result;
};

function getProductById($id)
{
    $bdd = bdd();
    try {
        $sql = "SELECT * FROM product INNER JOIN fichetechnique ON product.productId = fichetechnique.productId WHERE product.productId = ?";
        $stmt = $bdd->prepare($sql);
        $stmt->execute([$id]);
        $result = $stmt->fetchAll(PDO::FETCH_OBJ);
    } catch (PDOException $e) {
        echo $e->getMessage();
        echo $e->getLine();
        exit();
    }
    return $result;
};

function addToBasket($idProduct, $idUser)
{
    $bdd = bdd();
    try {
        $sqlbasket = $bdd->prepare("INSERT INTO basket(userId) VALUES(?)");
        $sqlbasket->execute([$idUser]);
        $basketId = $bdd->lastInsertId();
        $sqlbasket2 = $bdd->prepare("INSERT INTO productlist(productId, basketId) VALUES(?, ?)");
        $sqlbasket2->execute([$idProduct, $basketId]);
    } catch (PDOException $e) {
        echo $e->getMessage();
        echo $e->getLine();
        exit();
    }
    header("Location: ../../src/pages/article.php?id=". $idProduct);
    exit();
};

function getBasketByUser($id)
{
    $bdd = bdd();
    try {
        $basket = $bdd->prepare("SELECT * FROM basket 
                                INNER JOIN productlist ON basket.basketId = productlist.basketId 
                                INNER JOIN product ON productlist.productId = product.productId 
                                INNER JOIN fichetechnique ON product.productId = fichetechnique.productId
                                WHERE basket.userId = ?");
        $basket->execute([$id]);
        $result = $basket->fetchAll(PDO::FETCH_OBJ);
    } catch (PDOException $e) {
        echo $e->getMessage();
        echo $e->getLine();
        exit();
    }
    return $result;
};

function removeFromBasket($productId, $userId, $basketId)
{
    $bdd = bdd();
    try {
        $basket = $bdd->prepare("DELETE FROM basket WHERE basketId = ? AND userId = ?");
        $basket->execute([$basketId, $userId]);
        $basket2 = $bdd->prepare("DELETE FROM productlist WHERE basketId = ? AND productId = ?");
        $basket2->execute([$basketId, $productId]);
    } catch (PDOException $e) {
        echo $e->getMessage();
        echo $e->getLine();
        exit();
    }
    header("Location: ../../src/pages/basket.php");
    exit();
};

function getTotalBasketPrice($userId)
{
    $bdd = bdd();
    try {
        $basket = $bdd->prepare("SELECT SUM(prix) FROM fichetechnique 
                            INNER JOIN productlist ON fichetechnique.productId = productlist.productId
                            INNER JOIN basket ON productlist.basketId = basket.basketId
                            WHERE userId = ?");
        $basket->execute([$userId]);
        $result = $basket->fetch(PDO::FETCH_OBJ);
    } catch (PDOException $e) {
        echo $e->getMessage();
        echo $e->getLine();
        exit();
    }
    return $result;
};

function getTotalBasketAmount($userId)
{
    $bdd = bdd();
    try {
        $basket = $bdd->prepare("SELECT COUNT(prix) FROM fichetechnique 
                            INNER JOIN productlist ON fichetechnique.productId = productlist.productId
                            INNER JOIN basket ON productlist.basketId = basket.basketId
                            WHERE userId = ?");
        $basket->execute([$userId]);
        $result = $basket->fetch(PDO::FETCH_OBJ);
    } catch (PDOException $e) {
        echo $e->getMessage();
        echo $e->getLine();
        exit();
    }
    return $result;
};
