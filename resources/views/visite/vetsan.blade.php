@extends('layouts.app')

@extends('aver.menuAdmin')

@section('sousmenu')
@includeIf('fevec.sousmenu', ['menu' => $menu])
@endsection

@section('content')
{{ Form::open(['route' => 'visite.modifvetsan'])}}
{{ Form::token() }}
<div class="container-fluid d-flex align-content-center"> {{ Form::submit('mettre à jour', ['class' => 'btn btn-success']) }} </div>

<div class="container-fluid d-flex flex-row justify-content-between">
    
    @foreach($listeItem->listeCard() as $item)
    <div class="card" style="width: 25rem">
        <img class="card-img-top" src="{{ URL::asset('medias')}}/icones/{{$item->icone()}}"" alt="{{ $item->titre() }}">
        <div class="card-body">
            <h4 class=" alert-success card-title">{{ $item->titre()}}</h4>
            <table class="tab-content container-fluid">
                <thead>
                    <tr>
                        <th scope="col">Nom</th>
                        <th scope="col">Activité</th>
                        <th scope="col">Vét. san.</th>
                    </tr>
                </thead>
                <tbody>
                    
                    @foreach($users as $user)
                    
                    @if($user->vetsan === $item->texte())
                    <tr>
                        <td>{{ $user->name}}</td>
                        <td>{{ strtolower($user->activite->abbreviation)}}</td>
                        <td class="text-center">
                           {{ Form::checkbox('oui', 'oui', $user->vetsan )}}
                        </td>
                    </tr>
                    @endif
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>
    @endforeach
</div>
{{ Form::close()}}


@endsection
