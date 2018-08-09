<?php
namespace App\Factories\PdfFactory;

use App\Models\Ps;
use App\Models\User;
// use setasign\fpdi;
use PDF;

// require ('tcpdf/tcpdf.php');
// require ('FPDI.php');



class PsConstruitPdf
{

	//Suppression de l'en-tête
	public function Header(){
		$this->setHeaderMargin = 0;
	}

	public function creePdf(Ps $ps, User $user, $date, $veto) {

// 	    function creePdf($ps, $nom_eleveur, $adresse, $cp, $commune, $date, $signature) {
	        // Origine du modèle
// 		$this->setSourceFile("/medias/pdf/ps/".$ps->fichier);
// 	    PDF::setTitle($user->name);
	    PDF::AddPage();
// 	    PDF::Write(5, $user->name);
// 		//AJout d'une page
// 		$this->AddPage(1);
// 		// Définition du modèle
// 		$this->_tplIdx = $this->importPage(1);
		// PDF::importPage(1);
// 		// Ajout du modèle à la page
// 		$size = $this->useTemplate($this->_tplIdx, 0, 0, 210);
// 		//Définition des marges
		PDF::SetMargins(20, 0, 20);
		$x = 0;
		PDF::SetXY($x, 20);
		PDF::Write(5, $user->name, '', 0, 'R', false, 0, false, false, 0);
		PDF::SetXY($x, 25);
		PDF::Write(5, $user->adresse, '', 0, 'R', false, 0, false, false, 0);
		PDF::SetXY($x, 30);
		$cpCommune = $user->cp." ".$user->commune;
		PDF::Write(5, $cpCommune, '', 0, 'R', false, 0, false, false, 0);
		PDF::SetXY(20, 220);
		PDF::Write(5, "Date: ".$date);
		PDF::SetXY(20, 230);
		PDF::Write(5, "Signatures:  ");
// 		PDF::Image("medias/icones/delete.svg",100, 222, 85);
		$img = file_get_contents("medias/icones/delete.svg");
		PDF::Image('@', $img);
		PDF::SetXY(40, 270);
		PDF::Write(5, "Eleveur(-euse)", '', 0, 'L', false, 0, false, false, 0);
		PDF::SetXY(100, 270);
		PDF::Write(5, "Vétérinaire", '', 0, 'C', false, 0, false, false, 0);
// 	    PDF::Output('hello_world.pdf');
		PDF::Output($user->name."_".$date."_".$ps->fichier,'I', true);
	}
}
