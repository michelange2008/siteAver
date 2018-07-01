@extends('layouts\app')

@extends('aver\menuAdmin')

@section('content')

<div class="container-fluid">
    <h3 class="alert alert-success">Tableau de bord</h3>
      @if($dernMaJ > 3)
          <h4 class="alert alert-warning">attention dernière mise à jour il y a {{$dernMaJ}} mois</h4>
      @elseif($dernMaJ > 6)
         <h4 class="alert alert-danger">attention dernière mise à jour il y a {{$dernMaJ}} mois</h4>
      @endif()
  </h3>
  <div class="container d-flex flex-row justify-content-between">
@foreach($stats as $key => $stat)
  @if($key = "graph")
    @foreach($stat as $stt)
      {!! $stt->graph() !!}
      <div class="card d-flex bg-light justify-content-between" style="width: 35rem">
        <div class="card-body">
          <h5 class="card-title card-text">{{ $stt->titre() }}</h5>
          <div id = "{{$stt->id()}}" style = "height : 300px"></div>
        </div>
      </div>
    @endforeach
  @endif
@endforeach
</div>
</div>
@endsection

<script>
</script>
