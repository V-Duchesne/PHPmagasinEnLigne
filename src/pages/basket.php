<?php
$titre = "Panier";
require "../../src/fonctions/dbCategorieFonctions.php";
require "../../src/fonctions/dbProduitFonctions.php";
if (isset($_POST["basket"])) {
    removeFromBasket($_POST["product"], $_SESSION['userID'], $_POST["basketId"]);
};
require "../../src/common/template.php";
require "../../src/common/listCategorie.php";
require "../../src/common/footer.php";
if(isset($_SESSION["userID"])){
    $result = getBasketByUser($_SESSION['userID']);
    $price = getTotalBasketPrice($_SESSION['userID']);
}
?>
<section class="mt-5 d-flex">
    <?php if (isset($result) == null) { ?>
    <div class="position-absolute top-50 start-50 translate-middle">
                <h2>votre panier est vide</h2>
    </div>
    <?php } else { ?>
        <div class="column col-6 mx-auto">
            <?php foreach ($result as $value) : ?>

                <div class="d-flex border mt-2">
                    <div class="col-2">
                        <a href=<?php echo "../../src/pages/article.php?id=" . $value->productId ?> class="text-decoration-none text-dark">
                            <img src="<?php echo $value->imgUrl ?>" alt="image produit" class="w-100 ms-3">
                    </div>
                    <div class="col-6 mx-5 mt-5">
                        <div>
                            <?php echo $value->productName ?>
                        </div>
                        <div>
                            <?php echo $value->prix . " €" ?>
                        </div>
                        </a>
                    </div>
                    <div>
                        <form method="POST">
                        <input type="hidden" value=<?php echo $value->productId ?> name="product">
                        <input type="hidden" value=<?php echo $value->basketId ?> name="basketId">
                            <input type="submit" value="Retirer du panier" class="btn btn-primary mt-5" name="basket">
                        </form>
                    </div>
                </div>
            <?php
            endforeach;
            ?>
        </div>
        <div class="col-2">
            <?php foreach ($price as $amount) : ?>
                <p>Montant total : <?php echo $amount . " €" ?></p>
                <button class="btn btn-primary">Payer</button>
            <?php endforeach; ?>
        </div>
    <?php } ?>
</section>