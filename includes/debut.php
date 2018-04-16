<!DOCTYPE html>
<html lang="en">
<head>
<?php
//Si le titre est indiqué, on l'affiche entre les balises <title>
echo (!empty($titre))?'<title>'.$titre.'</title>':'<title> CASHCASH </title>';
?>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<div class="jumbotron text-center" onclick="location.href='/cashcash/';" style="cursor:pointer;"> 
  <h1>CashCash</h1>
</div>
<?php

//Attribution des variables de session
$role=(isset($_SESSION['role']))?$_SESSION['role']:'';
$matricule=(isset($_SESSION['matricule']))?(int) $_SESSION['matricule']:0;
$nom=(isset($_SESSION['nom']))?$_SESSION['nom']:'';

//On inclue les 2 pages restantes
include("./includes/functions.php");
include("./includes/constants.php");


?>

<div id ="cont" class="container">
