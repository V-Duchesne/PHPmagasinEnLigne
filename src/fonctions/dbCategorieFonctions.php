<?php
require "dbFonction.php";
function getCategory(){
    $bdd = bdd();
    $sql = "SELECT categoryId, typeProduct FROM category";
    $stmt = $bdd->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_OBJ);
    return $result;
};

function addCategory($string){
    $bdd = bdd();
    $sql = "INSERT INTO category(typeProduct) VALUES(?)";
    $stmt = $bdd->prepare($sql);
    $stmt->execute([$string]);
    header("Location: ../../../src/pages/adminContent/categorieProduit.php");
    exit();
};