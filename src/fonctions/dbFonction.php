<?php
require "dbaccess.php";
function createUser($login, $mail, $pass, $ban)
{
    $bdd = bdd();
    try {
        $check = $bdd->prepare('SELECT COUNT(*) AS x FROM users WHERE login = ? OR email = ?');
        $check->execute([$login, $mail]);

        while ($result = $check->fetch()) {
            if ($result['x'] != 0) {
                header("Location:  ../../src/pages/register.php?error=true&message=login ou email déjà utilisée");
                exit();
            }
        }
        $requete = $bdd->prepare('INSERT INTO users(login, email, password, ban) VALUES(?, ?, ?, ?)');
        $requete->execute([$login, $mail, $pass, $ban]);
    } catch (PDOException $e) {
        echo $e->getMessage();
        echo $e->getLine();
        exit();
    }
    header("Location:  ../../src/pages/register.php?error=false&message=Votre compte a été créée, veuillez vous connecter");
    exit();
};

function getUserByLogin($login, $pass)
{
    $bdd = bdd();
    try {
        $connect = $bdd->prepare('SELECT login, password, ban, roleId, userId FROM users WHERE login = ?');
        $connect->execute([$login]);
        while ($result = $connect->fetch()) {
            if ($result["login"] == $login) {
                $mdpCheck = crypt($pass, $result["ban"]);
                if ($mdpCheck == $result["password"]) {
                    $_SESSION["login"] = $result["login"];
                    $_SESSION["ID"] = $result["roleId"];
                    $_SESSION["connected"] = "true";
                    $_SESSION["userID"] = $result["userId"];
                    header("Location:  ../../index.php");
                    exit();
                } else {
                    header("Location:  ../../src/pages/login.php?error=true&message=Mot de passe incorrect");
                    exit();
                }
            }
        }
    } catch (PDOException $e) {
        echo $e->getMessage();
        echo $e->getLine();
        exit();
    }
    header("Location:  ../../src/pages/login.php?error=true&message=login incorrect");
    exit();
};
