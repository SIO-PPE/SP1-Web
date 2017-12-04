<?php
// Création de la class PDF
require('FPDF.php');
class PDF extends FPDF {
    
    public function __construct($id, $date,$agence,$prenom,$nom,$code,$tec,$passage,$adresse) // Constructeur demandant 2 paramètres
    {
        parent::__construct('P','mm','A4');
        parent::AddPage();
        parent::SetFont('Helvetica','',11);
        parent::SetTextColor(0);
        
        parent::Text(8,38,'N° Intevention : '.$id);
        parent::Text(8,43,'Date : '.$date);
        parent::Text(8,48,'Agence : '.$agence);
        parent::Text(120,38,utf8_decode($prenom).' '.utf8_decode($nom));
        parent::Text(120,43,utf8_decode($adresse));
        parent::Text(120,48,"codeApe : ".$code);
        
        parent::SetDrawColor(183); // Couleur du fond
        parent::SetFillColor(221); // Couleur des filets
        parent::SetTextColor(0); // Couleur du texte
        parent::SetY(66);
        parent::SetX(8);
        parent::Cell(50,8,'Date de passage ',1,0,'L',1);
        parent::SetX(58); // 8 + 96
        parent::Cell(50,8,'Technicien',1,0,'C',1);

        parent::Ln(); // Retour à la ligne
        
        parent::SetY(66);
        parent::SetX(8);
        parent::MultiCell(158,8,utf8_decode($passage),1,'L');
        parent::SetY(66);
        parent::SetX(166);
        parent::MultiCell(10,8,$tec,1,'C');

        
        
        parent::Output();
    }

    
    // Header
    function Header() {
        // Logo
        //$this->Image('images/logo-infiniblog.jpg',8,2,80);
        // Saut de ligne
        $this->Ln(20);
    }
    // Footer
    function Footer() {
        // Positionnement à 1,5 cm du bas
        $this->SetY(-15);
        // Adresse
        $this->Cell(196,5,'Mes coordonnées - Mon téléphone',0,0,'C');
    }
}?>