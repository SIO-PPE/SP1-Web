<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html  xml:lang="fr" >
<head>
<?php
//Si le titre est indiqué, on l'affiche entre les balises <title>
echo (!empty($titre))?'<title>'.$titre.'</title>':'<title> CASHCASH </title>';
?>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link rel="stylesheet" media="screen" type="text/css" title="Design" href="./css/design.css" />
</head>
<body>
<?php

//Attribution des variables de session
$role=(isset($_SESSION['role']))?$_SESSION['role']:'';
$matricule=(isset($_SESSION['matricule']))?(int) $_SESSION['matricule']:0;
$nom=(isset($_SESSION['nom']))?$_SESSION['nom']:'';

//On inclue les 2 pages restantes
include("./includes/functions.php");
include("./includes/constants.php");


?>
