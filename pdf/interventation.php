<?php
require('PDF.php');

require_once('../PDO/connect_sql.php');
try
{
    $bdd = new PDO("mysql:host=".HOST.";dbname=".DBNAME.";charset=utf8",LOGIN,MDP);
}
catch(Exception $e)
{
    die('Erreur : '.$e->getMessage());
}
//http://blog.infiniclick.fr/articles/tutoriel-creer-fichier-pdf-fpdf.html
if (isset($_GET['numC']) AND isset($_GET['numT'])){
    $numC = $_GET['numC'];
    $matriculeT = $_GET['numT'];
    
    $sql="SELECT Numero_Intervention,Date_Visite,Heure_Visite FROM intervention where MatriculeT=$matriculeT and Numero_Client=$numC";
    
    $rep=$bdd->query($sql);
    
    $donnees=$rep->fetch();
    
    $pdf = new PDF($donnees['Numero_Intervention'], "cc","cc",$numC,"cc","cc",$matriculeT,"cc","cc");
}
?>