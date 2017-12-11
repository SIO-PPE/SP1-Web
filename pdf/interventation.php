<?php
require('PDF.php');

require('../PDO/dbUtils.php');

//http://blog.infiniclick.fr/articles/tutoriel-creer-fichier-pdf-fpdf.html
if (isset($_GET['numC']) AND isset($_GET['numT'])){
    $numC = $_GET['numC'];
    $matriculeT = $_GET['numT'];
    
    $sql="SELECT Numero_Intervention,Date_Visite,Heure_Visite FROM intervention where Numero_Client=$numC";
    
    $rep=$bd->query($sql);
    
    $donnees=$rep->fetch();
    
    $client = getAllClient($matriculeT,$bd);
    $c = getC();
    echo $c;
    //var_dump($client);
    $horairePassage = $donnees['Date_Visite'];
    $horairePassage += ":";
    $horairePassage += $donnees['Heure_Visite'];
    $pdf = new PDF($donnees['Numero_Intervention'],$client['Raison_Sociale'],$client['Code_Ape'],$matriculeT,$horairePassage,$client['Adresse']);
    $req->closeCursor();
    
    
    $position_detail = 66; 
    

    $rep2 = mysqli_query($bdd, $sql);
    while ($row2 = mysqli_fetch_array($rep2)) {
        $pdf->SetY($position_detail);
        $pdf->SetX(8);
        $pdf->MultiCell(158,8,utf8_decode(""),1,'L');
        $pdf->SetY($position_detail);
        $pdf->SetX(166);
        $pdf->MultiCell(10,8,$row2['qte'],1,'C');
        $pdf->SetY($position_detail);
        $pdf->SetX(176);
        $pdf->MultiCell(24,8,$row2['prix_ht'],1,'R');
        $position_detail += 8;
    }
}
?>