<?php
require('PDF.php');

require('../PDO/dbUtils.php');

//http://blog.infiniclick.fr/articles/tutoriel-creer-fichier-pdf-fpdf.html
if (isset($_GET['numIntervention'])){
    //   $numC = $_GET['numC'];
   // $matriculeT = $_GET['numT'];
    
    $numIntervention = $_GET['numIntervention'];
    $sql="SELECT MatriculeT,Numero_Client,Date_Visite,Heure_Visite FROM intervention where Numero_Intervention=$numIntervention";
    
    $rep=$bd->query($sql);
    
    $donnees=$rep->fetch();
    
    $client = getAllClient($donnees['Numero_Client'],$bd);
    //$c = getC();
    //echo $c;
    //var_dump($client);
    $horairePassage = $donnees['Date_Visite'];
    $horairePassage += ":";
    $horairePassage += $donnees['Heure_Visite'];
    $pdf = new PDF($numIntervention,$client,$donnees['MatriculeT'],$horairePassage,$client['Adresse']);
    

}
?>