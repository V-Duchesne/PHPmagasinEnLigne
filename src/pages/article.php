<?php
require "../../src/fonctions/dbCategorieFonctions.php";
require "../../src/fonctions/dbProduitFonctions.php";
if (isset($_GET["id"]) && $_GET["id"] != null) {
    $result = getproductById($_GET["id"]);
} else {
    header("Location: ../../index.php");
    exit();
}
foreach ($result as $value) :
    $titre = $value->productName;
endforeach;
require "../../src/common/template.php";
require "../../src/common/listCategorie.php";
require "../../src/common/footer.php";
if (isset($_POST["basket"])) {
    addToBasket($_GET["id"], $_SESSION['userID']);
}

foreach ($result as $value) : ?>

    <section class="container mt-5">
        <?php echo "<h3>" . $value->productName . "</h3>" ?>
        <div class="row justify-content-start mb-5">
            <div class="col-3">
                <img src="<?php echo $value->imgUrl ?>" alt="photo du produit" class="w-100">
            </div>
            <div class="col-6">
                <table>
                    <?php if ($value->prix != null) { ?>
                        <tr>
                            <td>Prix :</td>
                            <td><?php echo $value->prix . " €" ?></td>
                        </tr>
                    <?php }
                    if ($value->tailleMemoire != null) { ?>
                        <tr>
                            <td>Taille Mémoire :</td>
                            <td><?php echo $value->tailleMemoire . " Go" ?></td>
                        </tr>
                    <?php }
                    if ($value->processeur != null) { ?>
                        <tr>
                            <td>Processeur :</td>
                            <td><?php echo $value->processeur ?></td>
                        </tr>
                    <?php }
                    if ($value->processeurFab != null) { ?>
                        <tr>
                            <td>Fabricant du processeur :</td>
                            <td><?php echo $value->processeurFab ?></td>
                        </tr>
                    <?php }
                    if ($value->resolutionEcran) { ?>
                        <tr>
                            <td>Résolution d'écran :</td>
                            <td><?php echo $value->resolutionEcran ?></td>
                        </tr>
                    <?php }
                    if ($value->tailleEcran) { ?>
                        <tr>
                            <td>Taille d'écran :</td>
                            <td><?php echo $value->tailleEcran ?></td>
                        </tr>
                    <?php }
                    if ($value->carteGraphique) { ?>
                        <tr>
                            <td>Carte Graphique :</td>
                            <td><?php echo $value->carteGraphique ?></td>
                        </tr>
                    <?php }
                    if ($value->typeHdd) { ?>
                        <tr>
                            <td>Type Disque Dur :</td>
                            <td><?php echo $value->typeHdd ?></td>
                        </tr>
                    <?php }
                    if ($value->tailleHdd) { ?>
                        <tr>
                            <td>Taille HDD :</td>
                            <td><?php echo $value->tailleHdd . " Go" ?></td>
                        </tr>
                    <?php }
                    if ($value->poids) { ?>
                        <tr>
                            <td>Poids :</td>
                            <td><?php echo $value->poids . " Kg" ?></td>
                        </tr>
                    <?php }
                    if ($value->OS) { ?>
                        <tr>
                            <td>OS :</td>
                            <td><?php echo $value->OS ?></td>
                        </tr>
                    <?php } ?>
                </table>
            </div>
            <div class="col-2">
                <form method="POST">
                    <input type="submit" value="Ajouter au panier" class="btn btn-primary btn-lg" name="basket" action="">
                </form>
            </div>
        </div>
        <div class="col-8">
            <?php echo $value->description ?>
        </div>
    </section>
<?php endforeach;?>