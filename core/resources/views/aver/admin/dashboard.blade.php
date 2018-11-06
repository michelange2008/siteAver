@section('dashboard')
        @if($dernMaJ > 3)
              <h4 class="alert alert-warning">Attention dernière mise à jour il y a {{$dernMaJ}} mois</h4>
        @elseif($dernMaJ > 6)
             <h4 class="alert alert-danger">attention dernière mise à jour il y a {{$dernMaJ}} mois</h4>
        @endif()
        <div id="titre" class="alert alert-success curseur d-flex flex-row justify-content-between align-items-center">
          <h4>Tableau de bord
          	<span class="italique plus-petit"> (cliquer pour afficher les graphiques) </span>
          </h4>
          <img class="img-15" src="{{config('fichiers.icones')}}/fleche_bas.svg" alt="bas">
        </div>

        <div id="graph" class="container-fluid d-flex smartphone-vertical justify-content-between ailleurs">
            @foreach($stats as $key => $stat)
              @if($key = "graph")
                @foreach($stat as $stt)
                  {!! $stt->graph() !!}
                  <div class="card d-flex bg-light justify-content-between card-width-35">
                    <div class="card-body">
                      <h5 class="card-title card-text">{{ $stt->titre() }}</h5>
                      <div id = "{{$stt->id()}}" style = "height : 300px"></div>
                    </div>
                  </div>
                @endforeach
              @endif
            @endforeach
        </div>
@endsection()
