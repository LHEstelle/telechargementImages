<?php
require "controller.php";
var_dump($_FILES);

$uploaddir = 'C:\wamp\www\phpVariables\13_upload\img/';
if(!empty($_POST)){
$uploadfile = $uploaddir . uniqid() . basename($_FILES['fileToUpload']['name']);
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="uploadPreview/uploadPreview.css" />
  <title>Upload</title>
</head>

<body>


  <!-- Le type d'encodage des données, enctype, DOIT être spécifié comme ce qui suit -->
  <form enctype="multipart/form-data" action="index.php" method="POST">

    <!-- Le nom de l'élément input détermine le nom dans le tableau $_FILES -->
    Envoyez ce fichier : <input id="fileToUpload" name="fileToUpload" type="file" />
    <input name="submitButton" type="submit" value="Envoyer le fichier" />
  </form>


  <?php
  if(!empty($_POST)){
  if ($_FILES['fileToUpload']['size']<= 1000000 && (mime_content_type($_FILES['fileToUpload']['tmp_name']) == 'image/jpeg' || mime_content_type($_FILES['fileToUpload']['tmp_name']) == 'image/jpg' || mime_content_type($_FILES['fileToUpload']['tmp_name']) == 'image/png') && ($_FILES['fileToUpload']['type'] == 'image/png' ||  $_FILES['fileToUpload']['type'] == 'image/jpg' || $_FILES['fileToUpload']['type'] == 'image/jpeg')){
  move_uploaded_file($_FILES['fileToUpload']['tmp_name'], $uploadfile) ?>
    <img src="" alt="" id="imgPreview">
    <div>le fichier <?= $_FILES['fileToUpload']['name'] ?> a bien été uploadé</div>
  <?php }} ?>

    <?= $arrayErrors["mime"] ?? "" ?>
    <?= $arrayErrors["size"] ?? "" ?>
    <?= $arrayErrors["extension"] ?? "" ?>

<script src="uploadPreview/uploadPreview.js"></script>
</body>

</html>