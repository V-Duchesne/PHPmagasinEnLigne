<?php 
$titre = "Liste catégorie";
require "../../fonctions/dbCategorieFonctions.php";
require "../../fonctions/dbProduitFonctions.php";
require "../../../src/common/template.php";
require "../../../src/common/footer.php";
$result = getCategory();
?>
<div class="w-50 mx-auto position-absolute top-50 start-50 translate-middle">
    <div class="w-50 mx-auto px-3 shadow p-3 mb-5 rounded">
    <a href="ajouterCategorie.php" class="btn btn-primary">new category</a>
        <table class="d-flex justify-content-around pb-3 table align-middle">
            <tr>
                    <th class="text-center col text-dark">id</th>
                    <th class="text-center col text-dark">category name</th>
            </tr>
            <?php foreach ($result as $value) : ?>
                <tr>
                    <td><?php echo $value->categoryId ?></td>
                    <td><?php echo $value->typeProduct ?></td>
                </tr>
            <?php endforeach ?>
        </table>
    </div>
</div>