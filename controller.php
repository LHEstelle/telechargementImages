<?php 

$arrayErrors = [];



if (mime_content_type($_FILES['fileToUpload']['tmp_name']) != 'image/jpeg' && mime_content_type($_FILES['fileToUpload']['tmp_name']) != 'image/jpg' && mime_content_type($_FILES['fileToUpload']['tmp_name']) != 'image/png'){
    $arrayErrors["mime"] = "Votre téléchargement n'est pas une image";
   }else if($_FILES['fileToUpload']['size']> 1000000){ 
    $arrayErrors["size"] = "Désolé, votre fichier ne doit pas dépasser 1MO.Votre fichier n'a pas été uploadé";
    }else if($_FILES['fileToUpload']['type'] != 'image/png' &&  $_FILES['fileToUpload']['type'] != 'image/jpg' && $_FILES['fileToUpload']['type'] != 'image/jpeg'){ 
        $arrayErrors["extension"] = "L'extension n'est pas une image";
  }
  