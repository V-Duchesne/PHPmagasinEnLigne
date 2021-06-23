<?php
require "../../fonctions/dbCategorieFonctions.php";
require "../../fonctions/dbProduitFonctions.php";
require "../../fonctions/mesFonctions.php";
require "../../../src/common/template.php";
require "../../../src/common/footer.php";
if (isset($_POST["productName"])) {
    $options = array(
        'productName' => FILTER_SANITIZE_STRING
    );
    $result = filter_input_array(INPUT_POST, $options);
    $productName = $result["productName"];
    $description = $_POST["productDesc"];
    $productDesc = nl2br(htmlspecialchars($description));
    $produtCategory = $_POST["productCategory"];
    if(isset($_POST["productTop"])){
        $productTop = true;
    }else{
        $productTop = false;
    }
    $productImage = sendImg($_FILES["productImage"]);
}
if (isset($productName)) {
    addProduct($productName, $productImage, $productDesc, $produtCategory, $productTop);
};
if(isset($_POST["submit"])){
    header("Location: ../../../src/pages/adminContent/ajoutProduitTech.php");
    exit();
}
?>
<section class="w-25 mx-auto mt-5">
    <form method="POST" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="productName" class="form-label">Nom du produit</label>
            <input type="text" class="form-control" id="productName" name="productName">
        </div>
        <div class="mb-3">
            <label for="productImage" class="form-label">Image du produit</label>
            <input class="form-control" type="file" id="productImage" name="productImage">
        </div>
        <div class="form-floating mb-3">
            <textarea class="form-control" placeholder="Leave a comment here" id="productDesc" name="productDesc" style="height: 100px"></textarea>
            <label for="productDesc">Description</label>
        </div>
        <div class="select mb-3">
            <select name="productCategory">
                <?php foreach (getCategory() as $value) : ?>
                    <option value="<?php echo $value->categoryId ?>"><?php echo $value->typeProduct ?></option>
                <?php endforeach ?>
            </select>
        </div>
        <div class="mb-3 form-check">
            <input type="checkbox" class="form-check-input" id="productTop" name="productTop">
            <label class="form-check-label" for="productTop">On top</label>
        </div>
        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
    </form>
</section>