@extends('layouts.app')

@extends('aver.menuAdmin')

@section('content')
<div class="container-fluid">
  <h3 class="alert alert-success">FEVEC</h3>
  <table class="table table-striped table-hover">
  <thead class="thead-dark">
    <tr><th>Nom</th><th>Numéro EDE</th><th>Email</th><th>Troupeaux</th>
    </thead>
  @foreach($clients as $client)
  <tr>
    <td>{!! $client->NomClient !!}</td>
    <td>{!! $client->NumeroEDE !!}</td>
    <td>{!! $client->email !!}</td>
    @foreach($liste_troupeaux as $troupeaux)
    @if(isset($troupeaux))
      @foreach($troupeaux as $tp)
        @if($tp->CodeClient == $client->CodeClient)
          @foreach($typeTroupeaux as $type)
            @if($tp->TypeTroupeau == $type->Cle)
              <td class="{{str_replace(' ', '_', $type->LibelleTroupeau)}}">{{ $type->LibelleTroupeau }}
                @foreach($racedominante as $race)
                  @if($tp->RaceDominante == $race->Cle)
                    ({{ $race->Race }})
                  @endif
                @endforeach
                - {{ round($tp->UIV) }} uiv
              </td>
            @endif
          @endforeach
        @endif
      @endforeach
      @endif
    @endforeach
  </tr>
  @endforeach
  </table>
</div>
@endsection
