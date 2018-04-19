<!DOCTYPE html>
<html lang="en">
<head>
<?php
//Si le titre est indiqué, on l'affiche entre les balises <title>
echo (!empty($titre))?'<title>'.$titre.'</title>':'<title> CASHCASH </title>';
header("charset: utf8-8");

//Attribution des variables de session
$role=(isset($_SESSION['role']))?$_SESSION['role']:'';
$matricule=(isset($_SESSION['matricule']))?(int) $_SESSION['matricule']:0;
$nom=(isset($_SESSION['nom']))?$_SESSION['nom']:'';
?>
<meta>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="./includes/style.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  
  
</head>
<body>
      <nav class="navbar navbar-default navbar-fixed-top" >
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#"><?php echo $nom ?></a>
        </div>
      
        <div class="container">
            <ul class="nav navbar-nav">
           <?php
            if ($role == "ASSISTANT")
            echo '<li><a href="rechercheClient.php">Modifier Client</a></li>';     
            echo '<li><a href="tec.php">Technicien</a></li>';
            ?> 
              <li><a href="intervention.php">Intervention</a></li>
            </ul>
        </div>
      </nav>
<div class="jumbotron text-center" onclick="location.href='/cashcash/';" style="cursor:pointer;"> 
  <h1>CashCash</h1>
</div>
<?php
//https://getbootstrap.com/docs/3.3/examples/theme/#


//On inclue les 2 pages restantes
include("./includes/functions.php");
include("./includes/constants.php");


?>

<div id ="cont" class="container">
