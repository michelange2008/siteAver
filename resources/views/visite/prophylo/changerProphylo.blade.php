@extends('layouts.app')

@extends('aver.menuAdmin')

@section('sousmenu')
@includeIf('fevec.sousmenu', ['menu' => $menu])
@endsection

@section('content')

<div class="container d-flex flex-row justify-content-between espace">
@foreach($listeItem->listeCard() as $item)

    <div class="card" style="width: 18rem">
        <img class="card-img-top" src="{{ URL::asset('medias')}}/icones/{{$item->icone()}}"" alt="{{ $item->titre() }}">
        <div class="card-body">
            <h5 class=" alert-success card-title">{{ $item->titre()}}</h5>
            <p class="card-text">{{ $item->texte()}}</p>
            <a class="btn {{ $item->bouton()->couleur()}}" href="{{route($item->bouton()->route())}}" title='{{ $item->bouton()->bulle()}}'>{{ $item->bouton()->texte()}}</a>
    </div>

    </div>
    @endforeach
</div>

{{ Form::close() }}
@endsection
