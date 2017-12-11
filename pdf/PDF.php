<?php
// Cr�ation de la class PDF
require('FPDF.php');
class PDF extends FPDF {
    
    public function __construct($id,$nom,$code,$tec,$passage,$adresse) // Constructeur demandant 2 param�tres
    {
        parent::__construct('P','mm','A4');
        parent::AddPage();
        parent::SetFont('Helvetica','',11);
        parent::SetTextColor(0);
        
        parent::Text(8,38,'N� Intevention : '.$id);
        parent::Text(8,43,'Date : '.date("d/m/Y"));
        //parent::Text(8,48,'Agence : '.);
        parent::Text(120,38,utf8_decode($nom));
        parent::Text(120,43,utf8_decode($adresse));
        parent::Text(120,48,"codeApe : ".$code);
        /*
        parent::SetDrawColor(183); // Couleur du fond
        parent::SetFillColor(221); // Couleur des filets
        parent::SetTextColor(0); // Couleur du texte
        parent::SetY(66);
        parent::SetX(8);
        parent::Cell(50,8,'Date de passage ',1,0,'L',1);
        parent::SetX(58); // 8 + 96
        parent::Cell(50,8,'Technicien',1,0,'C',1);

        parent::Ln(); // Retour � la ligne
        
        parent::SetY(66);
        parent::SetX(8);
        parent::MultiCell(158,8,utf8_decode($passage),1,'L');
        parent::SetY(66);
        parent::SetX(166);
        parent::MultiCell(10,8,$tec,1,'C');

        
        */
        $position_entete = 58;
        parent::SetDrawColor(183); // Couleur du fond
        parent::SetFillColor(221); // Couleur des filets
        parent::SetTextColor(0); // Couleur du texte
        parent::SetY($position_entete);
        parent::SetX(8);
        parent::Cell(158,8,'D�signation',1,0,'L',1);
        parent::SetX(166); // 8 + 96
        parent::Cell(10,8,'Qt�',1,0,'C',1);
        parent::SetX(176); // 104 + 10
        parent::Cell(24,8,'Net HT',1,0,'C',1);
        parent::Ln(); // Retour � la ligne
        parent::Output();
    }

    // Position de l'ent�te � 10mm des infos (48 + 10)

    
    function entete_table($position_entete){
        global $pdf;

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
        // Positionnement � 1,5 cm du bas
        $this->SetY(-15);
        // Adresse
        $this->Cell(196,5,'Mes coordonn�es - Mon t�l�phone',0,0,'C');
    }
}?>