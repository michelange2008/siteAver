@extends('layouts.app')

@extends('aver.menuAdmin')

@section('sousmenu')
@includeIf('fevec.sousmenu', ['menu' => $menu])
@endsection

@section('content')
{{ Form::open(['route' => 'visite.modifvetsan'])}}

<div class="container-fluid d-flex justify-content-end"> {{ Form::submit('mettre à jour', ['class' => 'btn btn-success']) }} </div>
<div class="container-fluid d-flex flex-row justify-content-between espace">
    
    @foreach($listeItem->listeCard() as $item)
    <div class="card" style="width: 25rem">
        <img class="card-img-top" src="{{ URL::asset('medias')}}/icones/{{$item->icone()}}"" alt="{{ $item->titre() }}">
        <div class="card-body">
            <h4 class=" alert-success card-title">{{ $item->titre()}}</h4>
            <table class="tab-content container-fluid">
                <tbody>
                    
                    @foreach($users as $user)
                    
                    @if($user->vetsan === $item->texte())
                    <tr>
                        <td class="{{$user->activite->abbreviation}}" >{{ $user->name}}</td>
                        <td class="text-center">
                           {{ Form::checkbox('cb_'.$user->id, $user->id, $user->vetsan )}}
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
