<?php 
function sendImg($file){
    if(isset($file) && $file["error"] == 0){
        if($file["size"] <= 100000000){
            $extensionArray = ["png", "gif", "jpg", "JPEG", "jfif", "jpeg"];
            $infoFichier = pathinfo($file["name"]);
            $extensionImage = $infoFichier["extension"];
            if(in_array($extensionImage, $extensionArray)){
                $destination = "../../../src/img/produit/" . time(). basename($file["name"]);
                move_uploaded_file($file["tmp_name"], $destination);
            }
        }
    }
    return $destination;
};