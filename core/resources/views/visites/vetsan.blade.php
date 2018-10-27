@extends('layouts.app')

@extends('aver.admin.menuAdmin')

@section('sousmenu')
@includeIf('fevec.sousmenu', ['menu' => $menu])
@endsection

@section('content')

@if(\Session::has('message'))
<div class="alert alert-success">{{\Session::get('message')}}</div>
@endif()
@if(\Session::has('rien'))
<div class="alert alert-warning">{{\Session::get('rien')}}</div>
@endif()

{{ Form::open(['route' => 'vetsan.modifier'])}}

<div class="container-fluid d-flex justify-content-end">
        {{ Form::submit('mettre à jour', ['id' => 'maj', 'class' => 'btn btn-secondary btn-carre', 'disabled' => 'disabled']) }}
</div>
<div class="container-fluid d-flex flex-row justify-content-between espace">

    @foreach($listeItem->listeCard() as $item)
    <div class="card" style="width: 25rem">
        <img class="card-img-top" src="{{ URL::asset('medias')}}/icones/visites/{{$item->icone()}}"" alt="{{ $item->titre() }}">
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
