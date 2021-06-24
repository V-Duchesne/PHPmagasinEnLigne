<?php
if (isset($_GET["id"])) {
    $id = $_GET["id"];
} else {
    $id = null;
}
require "../../src/fonctions/dbCategorieFonctions.php";
require "../../src/fonctions/dbProduitFonctions.php";
$title = getCategoryById($id);
foreach($title as $catTitle) :
    $titre = $catTitle->typeProduct;
endforeach;
require "../../src/common/template.php";
require "../../src/common/listCategorie.php";
require "../../src/common/footer.php";
$result = getProduct($id);
?>
<div class="d-inline-block mt-5 col-9">
    <?php foreach ($result as $value) : ?>
        <div class="d-inline-block mt-4 mx-5 container col-3">
            <div class="row">
                <a href=<?php echo "../../src/pages/article.php?id=" . $value->productId ?> class="text-decoration-none text-dark">
                    <div class="card">
                        <img src="<?php echo $value->imgUrl ?>" class="card-img-top" alt="articleImg">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $value->productName ?></h5>
                            <h6 class="card-subtitle mb-2 text-muted"><?php echo $value->typeProduct ?></h6>
                            <p class="card-text"><?php echo $value->description ?></p>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    <?php endforeach ?>
</div>
</section>