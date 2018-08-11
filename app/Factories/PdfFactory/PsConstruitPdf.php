<?php
namespace App\Factories\PdfFactory;

use App\Factories\PdfFactory\FPDI;

use App\Models\Ps;
use App\Models\User;
use Carbon\Carbon;

// require ('../pdf/tcpdf/tcpdf.php');
// require ('fpdi.php');


class PsConstruitPdf extends FPDI
{

	//Suppression de l'en-tête
	public function Header(){
		$this->setHeaderMargin = 100;
	}

	public function creePdf(Ps $ps, User $user, $date, $veto) {
		// Origine du modèle
		$this->setSourceFile("pdf/ps/".$ps->fichier);
		//AJout d'une page
		$this->AddPage();
		// Définition du modèle
 		$this->_tplIdx = $this->importPage(1);
		// Ajout du modèle à la page
 		$size = $this->useTemplate($this->_tplIdx, 10, 20, 190);
 		//Définition des marges
                $this->SetMargins( 20, 10, 20);
                $this->setHeaderMargin(0);

//                dd($this->getHeaderMargin());
 		$x = 0;
 		$this->SetXY($x, 5);
 		$this->Write(0, $user->name, '', 0, 'R', false, 0, false, false, 0);
 		$this->SetXY($x, 10);
		$this->Write(5, $user->adresse, '', 0, 'R', false, 0, false, false, 0);
 		$this->SetXY($x, 15);
 		$cpCommune = $user->cp." ".$user->commune;
 		$this->Write(5, $cpCommune, '', 0, 'R', false, 0, false, false, 0);
 		$this->SetXY(20, 180);
 		$this->Write(5, "Date: ".$date->format(' j/m/Y'));
 		$this->SetXY(20, 185);
 		$this->Write(5, "Signatures:  ");

		$this->Image('medias/logos/signature_MB.jpg',100, 222, 85);
 		$this->SetXY(40, 192);
 		$this->Write(5, "Eleveur(-euse)", '', 0, 'L', false, 0, false, false, 0);
 		$this->SetXY(100, 192);
 		$this->Write(5, "Vétérinaire", '', 0, 'C', false, 0, false, false, 0);
 		$this->Output("essai.pdf",'I', true);
	}
}
