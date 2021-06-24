<?php
$titre = "Ajout catégorie";
require "../../fonctions/dbCategorieFonctions.php";
require "../../fonctions/dbProduitFonctions.php";
require "../../../src/common/template.php";
require "../../../src/common/footer.php";

if (isset($_POST["category"])) {
    $options = array(
        'category' => FILTER_SANITIZE_STRING,
    );
    $result = filter_input_array(INPUT_POST, $options);
    $category = $result["category"];
}
?>
<section class="w-25 mx-auto mt-5">
    <form method="POST" action="">
        <div class="mb-3">
            <label for="category" class="form-label">Nouvelle Categorie</label>
            <input type="text" class="form-control" id="category" name="category">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</section>
<?php
if (isset($category)) {
    addCategory($category);
};
?>