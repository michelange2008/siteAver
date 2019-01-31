<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Outils\ArrangeCsv;
use App\Outils\LitCsv;


class MainController extends Controller
{
    //
    public function index()
    {
      $tableSommaire = ArrangeCsv::organise('sommaire');

      return view('accueil')->with('liste', $tableSommaire);
    }

    public function phytotherapie()
    {
      return 'coucou';

//      return view('phytotherapie');
    }

    public function plantes_libres()
    {
      return view('plantes_libres');
    }

    public function aver()
    {
      return 'aver';
    }
    public function antikor()
    {
      return 'antikor';
    }

    public function forum()
    {
      return 'ceci est un forum';
    }

    public function parasitisme()
    {
      return 'parasitisme';
    }
  }
