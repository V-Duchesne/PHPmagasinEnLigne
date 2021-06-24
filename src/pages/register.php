<?php
$titre = "S'enregistrer";
require "../../src/common/template.php";
require "../../src/fonctions/dbFonction.php";

if (isset($_POST["login"])) {
    $options = array(
        'login' => FILTER_SANITIZE_STRING,
        'mail' => FILTER_VALIDATE_EMAIL,
        'password' => FILTER_SANITIZE_STRING,
        'passwordCheck' => FILTER_SANITIZE_STRING
    );
    $result = filter_input_array(INPUT_POST, $options);
    $login = $result["login"];
    $mail = $result["mail"];
    $pass = $result["password"];
    $passCheck = $result["passwordCheck"];
}
$key = rand();
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
        <p class="text-center">Enregistrez-vous</p>
        <form method="POST" action="">
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
                    <label for="email" class="col-form-label">Email</label>
                </div>
                <div class="col-8">
                    <input type="email" id="email" class="form-control" name="mail" placeholder="Entrez votre mail" required>
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
            <div class="row g-3 align-items-center mb-3">
                <div class="col-3">
                    <label for="passwordCheck" class="col-form-label">Password</label>
                </div>
                <div class="col-8">
                    <input type="password" id="passwordCheck" class="form-control" name="passwordCheck" placeholder="Répétez votre password" required>
                </div>
            </div>
            <?php
            if (isset($pass)) {
                if ($pass != $passCheck) {
                    echo "<p class='text-center text-danger'>Les mots de passe ne correspondent pas</p>";
                } else {
                    $mdpCrypt = crypt($pass, $key);
                }
            }
            if (isset($mdpCrypt)) {
                createUser($login, $mail, $mdpCrypt, $key);
            };
            ?>
            <button type="submit" class="btn btn-primary col-11">Submit</button>
        </form>
    </div>
</section>