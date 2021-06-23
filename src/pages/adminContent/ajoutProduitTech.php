<?php
require "../../fonctions/dbCategorieFonctions.php";
require "../../fonctions/dbProduitFonctions.php";
require "../../fonctions/mesFonctions.php";
require "../../../src/common/template.php";
require "../../../src/common/footer.php";
$productId = $_SESSION["lastId"];
if (isset($_POST["prix"])) {
    $options = array(
        'prix' => FILTER_SANITIZE_NUMBER_FLOAT,
        'tailleMemoire' => FILTER_SANITIZE_NUMBER_INT,
        'processeur' => FILTER_SANITIZE_STRING,
        'processeurFab' => FILTER_SANITIZE_STRING,
        'resolutionEcran' => FILTER_SANITIZE_STRING,
        'tailleEcran' => FILTER_SANITIZE_STRING,
        'carteGraphique' => FILTER_SANITIZE_STRING,
        'typeHdd' => FILTER_SANITIZE_STRING,
        'tailleHdd' => FILTER_SANITIZE_NUMBER_INT,
        'poids' => FILTER_SANITIZE_NUMBER_FLOAT,
        'OS' => FILTER_SANITIZE_STRING,
    );
    $result = filter_input_array(INPUT_POST, $options);
    $prix = $result["prix"];
    $tailleMemoire = $result["tailleMemoire"];
    $processeur = $result["processeur"];
    $processeurFab = $result["processeurFab"];
    $resolutionEcran = $result["resolutionEcran"];
    $tailleEcran = $result["tailleEcran"];
    $carteGraphique = $result["carteGraphique"];
    $typeHdd = $result["typeHdd"];
    $tailleHdd = $result["tailleHdd"];
    $poids = $result["poids"];
    $OS = $result["OS"];
    if($tailleMemoire == 0){
        $memory = null;
    }else{
        $memory = $tailleMemoire;
    }
}
if (isset($prix)) {
    addProductTech($productId , $prix, $memory, $processeur, $processeurFab, $resolutionEcran, $tailleEcran, $carteGraphique, $typeHdd, $tailleHdd, $poids, $OS);
};
if (isset($_POST["submit"])) {
    header("Location: ../../../src/pages/adminContent/ajouterProduit.php");
    exit();;
}
?>
<section class="w-25 mx-auto mt-5">
    <form method="POST" action="">
        <div class="mb-3">
            <label for="prix" class="form-label">Prix</label>
            <input type="text" class="form-control" id="prix" name="prix">
        </div>
        <div class="mb-3">
            <label for="tailleMemoire" class="form-label">Taille mémoire</label>
            <input class="form-control" type="text" id="tailleMemoire" name="tailleMemoire">
        </div>
        <div class="mb-3">
            <label for="processeur" class="form-label">processeur</label>
            <input type="text" class="form-control" id="processeur" name="processeur">
        </div>
        <div class="mb-3">
            <label for="processeurFab" class="form-label">Marque processeur</label>
            <input class="form-control" type="text" id="processeurFab" name="processeurFab">
        </div>
        <div class="mb-3">
            <label for="resolutionEcran" class="form-label">Résolution écran</label>
            <input type="text" class="form-control" id="resolutionEcran" name="resolutionEcran">
        </div>
        <div class="mb-3">
            <label for="tailleEcran" class="form-label">Taille écran</label>
            <input class="form-control" type="text" id="tailleEcran" name="tailleEcran">
        </div>
        <div class="mb-3">
            <label for="carteGraphique" class="form-label">Carte graphique</label>
            <input type="text" class="form-control" id="carteGraphique" name="carteGraphique">
        </div>
        <div class="mb-3">
            <label for="typeHdd" class="form-label">Stockage</label>
            <input class="form-control" type="text" id="typeHdd" name="typeHdd">
        </div>
        <div class="mb-3">
            <label for="tailleHdd" class="form-label">Taille du stockage</label>
            <input type="text" class="form-control" id="tailleHdd" name="tailleHdd">
        </div>
        <div class="mb-3">
            <label for="poids" class="form-label">Poids</label>
            <input class="form-control" type="text" id="poids" name="poids">
        </div>
        <div class="mb-3">
            <label for="OS" class="form-label">OS</label>
            <input class="form-control" type="text" id="OS" name="OS">
        </div>
        <button type="submit" name="submit" class="btn btn-primary mb-5">Submit</button>
    </form>
</section>