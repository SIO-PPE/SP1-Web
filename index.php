<?php 
session_start();
include("includes/debut.php");


if ($matricule == 0 ) {
    header('Location: connexion.php');
    exit();
}
?>
    <body>
    TU DOIS GERER LES INTERVENTIONS -> SUPRESSION -> EDIT FAIT
    <a href="rechercheClient.php">Modifier Client</a>
    <a href="/">Affecter les visites a un tec</a>
      
    </body>
</html>