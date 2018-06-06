@extends('layouts.app')

@extends('aver.menuAdmin')

@section('sousmenu')
@includeIf('fevec.sousmenu', ['menu' => $menu])
@endsection

@section('content')

<div class="container-fluid d-flex flex-row justify-content-between espace">
    {{ Form::open(['route' => 'visite.modifProphyloBv'])}}
        {{ Form::submit('Mettre à jour', ['class' => 'btn btn-success'])}}
    <table id="listeEleveurs" class="table table-striped table-hover tablesorter">
        <thead >
            <tr class="bg-success">
                <th>Eleveur</th>
                <th>Troupeau</th>
                @foreach($annees as $annee)
                <th class="text-center">{{$annee->campagne}}</th>
                @endforeach()
            </tr>
        </thead>
        <tbody>
            @foreach($troupeaux as $troupeau)
            @if($troupeau->especes->groupe === 'BV')
            <tr>
                <td>{{$troupeau->user->name}}</td>
                <td class="{{$troupeau->especes->abbreviation}}">{{$troupeau->especes->nom}}</td>
                @foreach($annees as $annee)
                    <td class="align-content-center text-center">
                        @if(count($troupeau->anneeprophylos) == 0)
                            {{Form::checkbox($annee->id."_".$troupeau->id, $annee->id."_".$troupeau->id)}}
                        @else()
                            @foreach($troupeau->anneeprophylos as $tpp)
                                @if($tpp->debut === $annee->debut)
                                    {{Form::checkbox($annee->id."_".$troupeau->id, $annee->id."_".$troupeau->id, 'checked')}}
                                @else()
                                    {{Form::checkbox($annee->id."_".$troupeau->id, $annee->id."_".$troupeau->id)}}
                                @endif()
                            @endforeach()
                        @endif()
                    </td>
                @endforeach()
            </tr>
            @endif()
            @endforeach()
        </tbody>
    </table>
    {{ Form::close()}}
</div>

{{ Form::close() }}
@endsection
