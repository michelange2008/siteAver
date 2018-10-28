@extends('layouts.app')

@extends('aver.admin.menuAdmin')

@section('sousmenu')
@includeIf('fevec.sousmenu', ['menu' => $menu])
@endsection

@section('content')

@if(session('status'))
     <div class="container-fluid">
<h4 class="alert-success">
    {{ session('status') }}
</h4></div>
@endif

<div class="container-fluid d-flex justify-content-between">
@foreach($tableSommaire->liste() as $item)
<div class="card bg-light" style="width: 14rem">
  <img class="card-img-top" src="{{ URL::asset(config('icones.path'))}}/fevec/{{$item->icone()}}" alt="{{ $item->icone() }}">
  <div class="card-body d-flex flex-column justify-content-between">
    <h5 class="card-title card-text">{{ $item->titre() }}</h5>
    <p class="card-text">{{ $item->texte() }}</p>
    <a href="{{ URL::route($item->bouton()->route()) }}">
      <button class="btn btn-success centpourcent" type="submit">
        <i class="fa fa-angle-double-right"></i>
          {{ $item->bouton()->texte() }}
      </button>
    </a>
  </div>
 </div>
  @endforeach
</div>
@endsection
