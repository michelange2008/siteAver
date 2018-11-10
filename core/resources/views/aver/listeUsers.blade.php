@extends('layouts.app')

@extends('aver.admin.menuAdmin')

@section('content')
  @if(isset($titre)) <h4>{{$titre}}</h4>@endif
  @if($titre != 'Admin')
  <div class="d-flex flex-wrap justify-content-around" style="column-gap:5px">
      <button id="tous" class="btn btn-sm btn-secondary text-white" > Tous </button>
      @foreach($especes as $espece)
        <button id="{{$espece->abbreviation}}" class="col btn btn-sm btn-secondary text-white espece {{$espece->abbreviation}}_bg" > {{$espece->nom }} </button>
      @endforeach
  </div>
  @endif()
  <table id="listeEleveurs" class="table table-hover table-sm tablesorter">
    <thead>
      <tr class="bg-success">
          <th scope="col">  Nom</th>
        <th scope="col">  Email</th>
        <th scope="col">  @if($titre == 'Admin') CRO @else() EDE @endif()</th>
        @if($titre != 'Admin')
        <th scope="col" class="text-left">  Troupeaux</th>
        @endif()
        <th scope="col" class="text-center">  Activité</th>
        <th scope="col" class="text-center">  Vet.San.</th>

      </tr>
    </thead>
    <tbody>
      @foreach($troupeaux as $troupeau)
      <tr id="{{ $troupeau->user->id }}" class="ligne_eleveur" name="{{$troupeau->especes->abbreviation}}">
          <th id="{{ $troupeau->id }}_{{ $troupeau->user->id }}" scope="row" class="align-middle nom_eleveur {{ $troupeau->id }}_{{ $troupeau->user->id }}">
            {!! link_to_route('troupeau.accueil',
              $troupeau->user->name, [$troupeau->id],
              [
                'class' => $troupeau->user->activite->abbreviation,
                'title' => "afficher la situation de ".$troupeau->user->name
                ]) !!}
          </th>
        <td class="{{ $troupeau->id }}_{{ $troupeau->user->id }} align-middle">
            @if(substr($troupeau->user->email, -2) != "af")
               {{ $troupeau->user->email }}
            @else -
            @endif
        </td>
        <td id="{{ $troupeau->id}}" class="{{ $troupeau->id }}_{{ $troupeau->user->id }} align-middle">{{ ($troupeau->user->ede == 0)? '-' : $troupeau->user->ede }}</td>
        @if($titre != 'Admin')
        <td class="align-middle text-left {{ $troupeau->especes->abbreviation }}">{{ $troupeau->especes->nom }}</td>
        @endif()
        <td class="align-middle text-center" >{{ $troupeau->user->activite->nom }}</td>
        <td class="align-middle text-center" >
            <button class="btn
                  @if($troupeau->user->vetsan) btn-success
                  @elseif($troupeau->user->vetsan === null) btn-warning
                  @else btn-danger
                  @endif"
                  ></button>

          {!! Form::close() !!}
      </tr>
      @endforeach
      <tbody>
    </table>
@endsection
