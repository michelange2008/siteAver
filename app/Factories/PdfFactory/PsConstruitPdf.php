<?php
namespace App\Factories\PdfFactory;

use App\Factories\PdfFactory\FPDI;

use App\Models\Ps;
use App\Models\User;

// require ('../pdf/tcpdf/tcpdf.php');
// require ('fpdi.php');


class PsConstruitPdf extends FPDI
{

	//Suppression de l'en-tête
	public function Header(){
		$this->setHeaderMargin = 0;
	}

	public function creePdf(Ps $ps, User $user, $date, $veto) {
		// Origine du modèle
//            dd("/pdf/ps/".$ps->fichier);
		$this->setSourceFile("pdf/ps/".$ps->fichier);
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
 		$this->Write(5, $user->name, '', 0, 'R', false, 0, false, false, 0);
 		$this->SetXY($x, 25);
 		$this->Write(5, $user->adresse, '', 0, 'R', false, 0, false, false, 0);
 		$this->SetXY($x, 30);
 		$cpCommune = $user->cp." ".$user->commune;
 		$this->Write(5, $cpCommune, '', 0, 'R', false, 0, false, false, 0);
 		$this->SetXY(20, 220);
 		$this->Write(5, "Date: ".$date);
 		$this->SetXY(20, 230);
 		$this->Write(5, "Signatures:  ");
// 		$this->Image($veto->signature,100, 222, 85);
 		$this->SetXY(40, 270);
 		$this->Write(5, "Eleveur(-euse)", '', 0, 'L', false, 0, false, false, 0);
 		$this->SetXY(100, 270);
 		$this->Write(5, "Vétérinaire", '', 0, 'C', false, 0, false, false, 0);
 		$this->Output("essai.pdf",'I', true);
	}
}
