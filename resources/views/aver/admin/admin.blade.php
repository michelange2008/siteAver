@extends('layouts.app')

@extends('aver.admin.menuAdmin')

@extends('aver.admin.dashboard', ['stats' => $stats])

@extends('aver.admin.listeEleveurs', [
	'listeEleveurs' => $listeEleveurs,
	'annee' => $annee,
	'boutons' => $boutons,
	]);
