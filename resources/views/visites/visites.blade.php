@extends('layouts.app')

@extends('aver.admin.menuAdmin')

@section('sousmenu')
@includeIf('fevec.sousmenu', ['menu' => $menu])
@endsection

@section('content')
<div class="container d-flex flex-row justify-content-between espace">
@foreach($liste->listeCard() as $item)

    <div class="card" style="width: 15rem">
        <img class="card-img-top" src="{{ URL::asset('medias')}}/icones/{{$item->icone()}}"" alt="{{ $item->titre() }}">
        <div class="card-body d-flex flex-column justify-content-between ">
            <h5 class=" alert-success card-title">{{ $item->titre()}}</h5>
            <p class="card-text">{{ $item->texte()}}</p>
            <a class="btn btn-carre {{ $item->bouton()->couleur()}}" href="{{route($item->bouton()->route(), [$item->option()])}}" title='{{ $item->bouton()->bulle()}}'>{{ $item->bouton()->texte()}}</a>
    </div>

    </div>
    @endforeach
</div>

{{ Form::close() }}
@endsection()