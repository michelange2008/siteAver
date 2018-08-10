<?php

require ('../pdf/tcpdf/tcpdf.php');
require ('fpdi.php');


class PDF extends FPDI {
	
	//Suppression de l'en-tête
	function Header(){
		$this->setHeaderMargin = 0;
	}
	
	function creePdf($ps, $nom_eleveur, $adresse, $cp, $commune, $date, $signature) {
		// Origine du modèle
		$this->setSourceFile($ps);
		//AJout d'une page
		$this->AddPage(1);
		// Définition du modèle
		$this->_tplIdx = $this->importPage(1);
		// Ajout du modèle à la page
		$size = $this->useTemplate($this->_tplIdx, 0, 0, 210);
		//Définition des marges
		$this->SetMargins(20, 0, 20);
		$x = 0;
		$this->SetXY($x, 20);
		$this->Write(5, $nom_eleveur, '', 0, 'R', false, 0, false, false, 0);
		$this->SetXY($x, 25);
		$this->Write(5, $adresse, '', 0, 'R', false, 0, false, false, 0);
		$this->SetXY($x, 30);
		$cpCommune = $cp." ".$commune;
		$this->Write(5, $cpCommune, '', 0, R, false, 0, false, false, 0);
		$this->SetXY(20, 220);
		$this->Write(5, "Date: ".$date);
		$this->SetXY(20, 230);
		$this->Write(5, "Signatures:  ");
		$this->Image($signature,100, 222, 85);
		$this->SetXY(40, 270);
		$this->Write(5, "Eleveur(-euse)", '', 0, L, false, 0, false, false, 0);
		$this->SetXY(100, 270);
		$this->Write(5, "Vétérinaire", '', 0, C, false, 0, false, false, 0);
		$this->Output($ps,'I', true);
	}
}