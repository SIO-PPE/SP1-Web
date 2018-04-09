<?php
// Cr�ation de la class PDF
require('FPDF.php');
class PDF extends FPDF {
    
    public function __construct($id,$client,$MatriculeT,$date,$heure,$adresse,$bd) // Constructeur du PDF
    {
        parent::__construct('P','mm','A4');
        parent::AddPage();
        parent::SetFont('Helvetica','',11);
        parent::SetTextColor(0);
        
        parent::Text(8,38,'N� Intervention : '.$id);
        parent::Text(8,43,'Date : '.date("d/m/Y"));
        //parent::Text(8,48,'Agence : '.);
        parent::Text(120,38,utf8_decode($client['Raison_Sociale']));
        parent::Text(120,48,"codeApe : ".$client['Code_Ape']);
        $position_entete = 58;
        parent::SetDrawColor(183); // Couleur du fond
        parent::SetFillColor(221); // Couleur des filets
        parent::SetTextColor(0); // Couleur du texte
        parent::SetY($position_entete);
        parent::SetX(8);
        parent::Cell(65,8,'Technicien',1,0,'C',1);
        parent::SetX(70); // 8 + 96
        parent::Cell(70,8,'Date',1,0,'C',1);
        parent::SetX(140); // 104 + 10
        parent::Cell(60,8,'Heure de Passage',1,0,'C',1);
        parent::Ln(); // Retour � la ligne
    
        
        $position_detail = $position_entete + 8;
        parent::SetY($position_detail);
        parent::SetX(8);
        parent::MultiCell(62,8,getNomPrenomTec($MatriculeT,$bd),1,'C');
        parent::SetY($position_detail);
        parent::SetX(70);
        parent::MultiCell(70,8,$date,1,'C');
        parent::SetY($position_detail);
        parent::SetX(140);
        parent::MultiCell(60,8,$heure,1,'C');
        $position_detail += 8;
        parent::Output();
    }

    // Position de l'ent�te � 10mm des infos (48 + 10)

    
    function entete_table($position_entete){
        global $pdf;

    }
 
    // Header
    function Header() {
        // Logo
        $this->Image('logoCash.png',8,2,80);
        // Saut de ligne
        $this->Ln(20);
    }
    // Footer
    function Footer() {
        // Positionnement � 1,5 cm du bas
        $this->SetY(-15);
        // Adresse
        $this->Cell(196,5,'CASH CASH - 0602030405',0,0,'C');
    }
}?>