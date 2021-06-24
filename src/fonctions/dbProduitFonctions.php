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
}
