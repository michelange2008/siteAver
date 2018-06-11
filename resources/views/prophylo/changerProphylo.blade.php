@extends('layouts.app')

@extends('aver.menuAdmin')

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
<div class="container-fluid d-flex flex-row justify-content-between espace">
    {{ Form::open(['route' => 'prophylo.modif'])}}
        {{ Form::submit('Mettre à jour', ['class' => 'btn btn-success'])}}
        <div id='bascule' class="btn btn-outline-info btn-carre" title="permet de modifier les prophylaxies des années précédentes">Modifier tout le tableau</div>
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
            @if($troupeau->especes->groupe === $groupe)
            <tr>
                <td>{{$troupeau->user->name}}</td>
                <td class="{{$troupeau->especes->abbreviation}}">{{$troupeau->especes->nom}}</td>
                <?php $nb_col =1 ?>
                @foreach($annees as $annee)
                    <td class="colonne align-content-center text-center {{$nb_col}}">
                        @if(count($troupeau->anneeprophylos) == 0)
                            {{Form::checkbox($annee->id."_".$troupeau->id, $annee->id."_".$troupeau->id)}}
                        @else()
                        <?php $coche = 0 ?>
                            @foreach($troupeau->anneeprophylos as $tpp)
                                @if($tpp->debut === $annee->debut)
                                    <?php $coche = 1 ?>
                                @endif()
                            @endforeach()
                            @if($coche > 0)
                                {{Form::checkbox($annee->id."_".$troupeau->id, $annee->id."_".$troupeau->id, 'checked')}}
                            @else()
                                {{Form::checkbox($annee->id."_".$troupeau->id, $annee->id."_".$troupeau->id)}}
                            @endif()
                        @endif()
                    </td>
                    <?php $nb_col++ ?>
                @endforeach()
            </tr>
            @endif()
            @endforeach()
        </tbody>
    </table>
    {{ Form::close()}}
</div>

@endsection
