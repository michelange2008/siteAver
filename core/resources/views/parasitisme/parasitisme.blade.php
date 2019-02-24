@extends('layouts.app')

@section('content')
  <div class="para-container">
    <div class="para-fleche">
      <a href="{{route('accueil')}}">
        <div class="fleche fleche-gauche" title="Retour au menu principal"></div>
      </a>
    </div>
    <div class="para-container-titre">
      <h1>Strongles gastro-intestinaux des ruminants</h1>
    </div>
    <div class="para-container-texte ">
      <div class="para-container-soustitre">
        <h2>Pour une maîtrise raisonnée du parasitisme</h2>
      </div>
      <div class="para-container-texte1">
        <p>Pour les troupeaux au pâturage, le parasitisme est la première pathologie qui affecte les animaux, particulièrement les chèvres.</p>
        <p class="gras">Depuis les 50 dernières années, la maîtrise du parasitisme a reposé sur une tentative d'éradication par l'utilisation d'anthelminthiques puissants et à large spectre.</p>
        <p>Une telle pratique permettait de ne pas s'intéresser à la complexité du cycle parasitaire et de la relation entre le parasite et son hôte.</p>
      </div>
      <div class="para-container-texte2">
        <div class="para-container-texte2-image">
            <img src="{{URL::asset(config('fichiers.parasitisme'))}}/haemonchus.jpeg" alt="haemonchus" title="Haemonchus contortus">
            <p>Haemonchus contortus est le strongle  le plus redoutable car il se nourrit de sang</p>
        </div>
        <div class="para-container-texte2-texte">
            <p>Mais des éleveurs ont remis en cause ce mode d'action "tout chimique" et le développement des résistances des strongles aux anthelminthiques leur donne raison.</p>
            <p class="gras">L'objectif aujourd'hui est d'élever une petite quantité de parasites sensibles aux traitements et qui ne perturbent pas la vie et la production de leurs hôtes.</p>
            <p>Cela nécessite une connaissance fine de la biologie parasitaire, de sa survie dans le milieu extérieur et des mécanismes de défenses des ruminants hôtes.</p>
        </div>
      </div>
    </div>
    <div class="para-fleche">
        <div id="fleche-droite" class="fleche fleche-droite" title="Menu"></div>
    </div>
  </div>
  <div id="para-menu" class="para-menu">
    <div class="fermer" title="fermer la fenêtre de menu"></div>
    <div class="carre"></div>
    <div class="carre-titre">
      <h4>menu</h4>
      <div class="fleche-bas"></div>
    </div>
    <div class="carre-menu">
      <a href="{{route('parasitisme.fiches')}}" title="fiches techniques à télécharger"><h2>fiches</h2></a>
      <a href="{{route('parasitisme.formations')}}" title="formations destinées aux éleveurs"><h2>formations</h2></a>
      <a href="#" title="En cours de construction"><h2>game of strongles</h2></a>
      <a href="#" title="En cours de construction"><h2>autres</h2></a>
    </div>
  </div>
  <div class="texte-bouton-menu">
    <h5>menu</h5>
    <div class="fleche-bas-droite"></div>
  </div>
<link rel="stylesheet" href="{{ asset(config('stylesParasito.parasito'))}}">
@endsection
