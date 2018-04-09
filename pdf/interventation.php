
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

   
   $pdf = new PDF($numIntervention,$client,$donnees['MatriculeT'],$donnees['Date_Visite'],$donnees['Heure_Visite'],$client['Adresse'],$bd);
    

}
?>