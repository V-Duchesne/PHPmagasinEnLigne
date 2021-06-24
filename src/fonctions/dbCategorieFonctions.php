<?php
require "dbFonction.php";
function getCategory()
{
    $bdd = bdd();
    try {
        $sql = "SELECT categoryId, typeProduct FROM category";
        $stmt = $bdd->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_OBJ);
    } catch (PDOException $e) {
        echo $e->getMessage();
        echo $e->getLine();
        exit();
    }
    return $result;
};

function addCategory($string)
{
    $bdd = bdd();
    try {
        $sql = "INSERT INTO category(typeProduct) VALUES(?)";
        $stmt = $bdd->prepare($sql);
        $stmt->execute([$string]);
    } catch (PDOException $e) {
        echo $e->getMessage();
        echo $e->getLine();
        exit();
    }
    header("Location: ../../../src/pages/adminContent/categorieProduit.php");
    exit();
};

function getCategoryById($id)
{
    $bdd = bdd();
    try {
        $sql = "SELECT typeProduct FROM category WHERE categoryId = ?";
        $stmt = $bdd->prepare($sql);
        $stmt->execute([$id]);
        $result = $stmt->fetchAll(PDO::FETCH_OBJ);
    } catch (PDOException $e) {
        echo $e->getMessage();
        echo $e->getLine();
        exit();
    }
    return $result;
};
