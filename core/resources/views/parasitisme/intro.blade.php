@extends('layouts.appGos')


@section('content')

  <div class="container-fluid bg-dark">

    <div class="row justify-content-center pt-3">

      <div class="col-lg-10">
        <div class="jumbotron">
          <img class="img-fluid" width="200px" src="{{ url('public/images/fibl-logo.svg') }}" alt="fibl">
          <h1 class="display-4">La gestion raisonnée du parasitisme</h1>
          <p class="lead">plaidoyer pour des éleveurs-experts</p>
          <hr class="my-4">
          <div class="row">

            <div class="col-md-4">
              <img class="img-fluid mb-1" src="{{url('public/images/troupeau2.jpg')}}" alt="troupeau">
              <img class="img-fluid mb-1" src="{{url('public/images/troupeau3.jpg')}}" alt="troupeau">
              <img class="img-fluid mb-1" src="{{url('public/images/troupeau.jpg')}}" alt="troupeau">
              <img class="img-fluid mb-1" src="{{url('public/images/outils.jpg')}}" alt="troupeau">
            </div>
            <div class="col-md-8">

              <h5>Depuis plus de 50 ans, la gestion du parasitisme n’est pas durable</h5>
              <p>Le parasitisme est un des principaux sujets de préoccupation pour les éleveurs de moutons et de chèvres quand ils conduisent leurs animaux au pâturage. Depuis les années 50, la lutte contre le parasitisme a reposé sur un usage systématique de vermifuges de synthèse.</p>
              <p>Pourtant, cette méthode de lutte apparaît aujourd’hui peu durable car de plus en plus de parasites deviennent résistants aux vermifuges et certaines molécules ont un impact néfaste sur l’environnement et la biodiversité.</p>
              <h5>Face à ce problème, des solutions existent...</h5>
              <p>La bonne nouvelle est qu’une maîtrise du parasitisme avec un recours limité, voire nul, aux vermifuges de synthèse est possible.</p>
              <p>Il s’agit d’associer une gestion du pâturage pertinente (rotation de parcelles, pâturage mixte, arbres fourragers, etc.) à des actions visant à renforcer l’immunité des brebis et des chèvres.</p>
              <p>Une telle démarche implique que les éleveurs aient une très bonne connaissance de la physiologie des parasites que leurs animaux rencontrent.</p>
              <h5>... qui demandent un diffusion du savoir scientifique,</h5>
              <p>Ces parasites ont coévolué depuis des milliers d’années avec les animaux hôtes ce qui aboutit à des cycles complexes comprenant des phases dans le milieu extérieur. La dynamique d’évolution de l’infestation des troupeaux est soumis à de très nombreux facteurs tels que le microclimat des parcelles, la hauteur d’herbe pâturée, la composition du troupeau, etc. Les éleveurs doivent intégrer toutes ces données pour en déduire les pratiques adaptés à une moindre infestation de leur troupeau.</p>
              <h5>et nécessitent l’élaboration d’outils pédagogiques innovants.</h5>
              <p>L’acquisition de ces connaissances n’a de sens que si ces dernières peuvent être mises en pratique par l’éleveur au quotidien. Il est donc nécessaire d’imaginer des outils permettant de bâtir un lien entre le savoir scientifique et l’action pratique.</p>
              <p>Avec la révolution numérique, il est possible de proposer des outils pédagogiques utilisables par les éleveurs, y compris quand ils accompagnent leur troupeaux dans les pâturages. Un outil comme « Game of Strongles » permettrait de modéliser l’évolution de l’infestation des troupeaux au fil de la saison de pâturage tout en tenant compte de particularités locales. Un éleveur pourrait y saisir les informations concernant son troupeau, ses pâturages et suivre au fil de l’été l’apparition d’un risque d’infestation trop élevé.</p>
              <br>
              <a class="btn btn-success btn-lg rounded-0" href="{{route('parasitisme.gos')}}" role="button">Voir Game of Strongles</a>
            </div>

          </div>

        </div>

      </div>

    </div>

  </div>

@endsection
