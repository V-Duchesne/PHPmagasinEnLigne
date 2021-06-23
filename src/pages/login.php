<?php
$titre = "Se Connecter";
require "../../src/common/template.php";
require "../../src/fonctions/dbFonction.php";
?>
<section>
    <div class="w-50 mx-auto position-absolute top-50 start-50 translate-middle">
        <?php if(isset($_SESSION["connected"])){
            header("Location:  ../../index.php");
            exit();}
            ?>
        <?php
        if ((isset($_GET["error"]) && $_GET["error"] == true) || isset($_GET["error"]) && $_GET["error"] == false) {
            echo '<h2 class="text-center text-danger">' . $_GET["message"] . '</h2>';
        }
        ?>
        <p class="text-center">Connectez-vous</p>
        <form method="POST" action="../../src/pages/login.php">
            <div class="row g-3 align-items-center mb-3">
                <div class="col-3">
                    <label for="login" class="col-form-label">Login</label>
                </div>
                <div class="col-8">
                    <input type="text" id="login" class="form-control" name="login" placeholder="Entrez votre login" required>
                </div>
            </div>
            <div class="row g-3 align-items-center mb-3">
                <div class="col-3">
                    <label for="password" class="col-form-label">Password</label>
                </div>
                <div class="col-8">
                    <input type="password" id="password" class="form-control" name="password" placeholder="Entrez votre password" required>
                </div>
            </div>
            <button type="submit" class="btn btn-primary col-11">Submit</button>
        </form>
    </div>
</section>
<?php
if (isset($_POST["login"])) {
    getUserByLogin($_POST["login"], $_POST["password"]);
};
?>