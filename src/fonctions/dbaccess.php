<?php
function bdd()
{
    $bdd = new PDO("mysql:host=localhost;dbname=magasin;charset=utf8", "root", "");
    return $bdd;
};