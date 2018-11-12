@extends('layouts.app')

@extends('aver.admin.menuAdmin')

@section('content')
<br>
  <div class="alert bandeau">
    <h5>Choix des formations</h5>
    <div class="bandeau-choix">
      <button id="tous"class="akboutons btn btn-sm" type="button" name="button">
        tous
      </button>
      @foreach($formations as $formation)
        <button id="{{$formation->abbreviation}}" class="choix akboutons btn rounded-0 btn-sm" type="button" name="button">
          {{$formation->nom}}
        </button>
      @endforeach
    </div>
  </div>
  {{Form::open(['route' => 'aromaliste.choix'])}}
  <div class="preparations">
    <div class="alert bandeau">
      <h5>Liste des préparations</h5>
    </div>
    <table id="" class="table table-striped table-hover liste-preparations">
      @foreach ($preparations as $preparation)

        <tr id="prep_{{$preparation->id}}" class="preparation preparation-oui
          {{-- méthode un peu tordue pour mettre en classe les noms de l'abbreviation du type de formation
          correspondant à une préparation -> pour agir avec jquery --}}
          @foreach($preparation->formations as $prep)
             {{$prep->abbreviation}}
          @endforeach
        ">
        <td hidden>{{Form::checkbox('cb_'.$preparation->id, 1 ,true , ['id' => 'cb_'.$preparation->id])}}</td>
          <td>{{$preparation->nom}}</td>
          <td id="oui" class="affiche-prep" type="icone-prep">
            <img src="../{{config('fichiers.icones')}}aromaliste/oui.svg" alt="oui">
          </td>
          <td id="non" class="non-affiche-prep" type="icone-prep">
            <img src="../{{config('fichiers.icones')}}aromaliste/non.svg" alt="non">
          </td>
        </tr>
      @endforeach
    </table>
    {{Form::label('nb','nombre de stagiaires', ['class' => 'form-label'])}}
    {{Form::number('nb', 15, ['class' => 'form-control'])}}
    {{Form::submit('ok', ['class' => "akboutons btn btn-success btn-sm"])}}
  </div>
  {{Form::close()}}
@endsection
