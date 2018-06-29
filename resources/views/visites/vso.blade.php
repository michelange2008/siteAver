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
<div class="container-fluid d-flex flex-row">
    <div class="d-flex flex-column">
        <h5 class="alert alert-success text-center">Sélectionner une espèce <span class="fa fa-angle-double-down"></span></h5>
        @foreach($listeItem as $item)
            <img id="{{$item['parametre']}}" class="icone_espece espace curseur icone" src="{{ URL::asset('medias')}}/icones/{{$item['icone']}}"" title="{{ $item['texte']}}" alt="{{ $item['parametre'] }}">
        @endforeach
    </div>
    <div class="container-fluid d-flex flex-row">
        {{ Form::open(['route' => 'vso.modif'])}}
        <div id="estInactive">
            {{ Form::hidden('cache')}}
        </div>
            <div class="d-flex flex-row justify-content-between">
                <div class="d-flex flex-row justify-content-start">
                    <div id='bascule' class="btn btn-outline-info btn-carre btn-alert" title="permet de modifier les vso des années précédentes">Modifier tout le tableau</div>
                    <p>__</p>
                    <div id='remplitBv' title="remplit toutes les lignes de troupeaux bovins pour l'année en cours">
                        <a class="btn btn-navy btn-carre btn-alert"  href="{{ URL::route('vso.bv') }}">bovins</a>
                    </div>
                    <p>__</p>
                    <div id='remplitPr' title="remplit les lignes de troupeaux de petits rumimants pour l'année en cours">
                        <a class="btn btn-gold btn-carre btn-alert"  href="{{ URL::route('vso.pr') }}">petits rum</a>
                    </div>
                </div>
                {{ Form::submit('Mettre à jour', ['id' => 'maj', 'class' => 'btn btn-secondary btn-carre', 'disabled' => 'disabled'])}}
            </div>
        <table id="listeEleveurs" class="table table-striped table-hover tablesorter">
            <thead >
                <tr id= "titres" class="bg-success">
                    <th>Eleveur</th>
                    <th>Troupeau</th>
                    @foreach($annees as $annee)
                    <th class="text-center">{{$annee->campagne}}</th>
                    @endforeach()
                </tr>
            </thead>
            <tbody>
                @foreach($troupeaux as $troupeau)
                <tr class="ligne_eleveur" name = '{{$troupeau->especes->groupe}}'>
                    <td>{{$troupeau->user->name}}</td>
                    <td class="{{$troupeau->especes->abbreviation}}">{{$troupeau->especes->nom}}</td>
                    <?php $nb_col =1 ?>
                    @foreach($annees as $annee)
                        <td class="colonne align-content-center text-center {{$nb_col}}">
                            @if(count($troupeau->anneevso) == 0)
                                {{Form::checkbox($annee->id."_".$troupeau->id, $annee->id."_".$troupeau->id)}}
                            @else()
                            <?php $coche = 0 ?>
                                @foreach($troupeau->anneevso as $tpp)
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
                @endforeach()
            </tbody>
        </table>
        {{ Form::close()}}
    </div>
</div>

@endsection