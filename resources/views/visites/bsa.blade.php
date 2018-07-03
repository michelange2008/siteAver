@extends('layouts.app')

@extends('aver.menuAdmin')

@section('sousmenu')
@includeIf('fevec.sousmenu', ['menu' => $menu])
@endsection

@section('content')
@if(\Session::has('message'))
<div class="alert alert-success">{{\Session::get('message')}}</div>
@endif()

<div class="container-fluid d-flex flex-row">
    @includeIf('visites.choixGroupeEspece', ['cardGroupesEspece', $cardGroupesEspece])
    <div class="container-fluid d-flex flex-row">
        {{ Form::open(['route' => 'bsa.modif'])}}
        <div class="d-flex flex-row justify-content-between">
            {{ Form::submit('Mettre à jour', ['id' => 'maj', 'class' => 'btn btn-secondary btn-carre'])}}
        </div>
        <table id="listeEleveurs" class="table table-striped table-hover tablesorter">
            <thead>
                <tr id= "titres" class="bg-success">
                    <th>Eleveur</th>
                    <th>Troupeau</th>
                    <th class="text-center">BSA à faire</th>
                </tr>
            </thead>
            <tbody>
                @foreach($troupeaux as $troupeau)
                <tr class="ligne_eleveur" name = '{{$troupeau->especes->groupe}}'>
                    <td>{{$troupeau->user->name}}</td>
                    <td class="{{$troupeau->especes->abbreviation}}">{{$troupeau->especes->nom}}</td>
                    <td class="colonne align-content-center text-center">
                        {{Form::checkbox($troupeau->id, $troupeau->id, $troupeau->bsa)}}
                    </td>
                </tr>
                @endforeach()
            </tbody>
        </table>
        {{ Form::close()}}
    </div>
</div>

@endsection