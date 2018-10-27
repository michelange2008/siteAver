@if($nombreTroupeaux = 1 && isset($troupeau))
<div class="container">
  <div class="card" style="width: 18rem;">
    @if(file_exists("../public/medias/races/".$troupeau->races['abbreviation'].".jpg"))
      <img class="card-img-top" src="{{URL::asset('medias/races')}}/{{ $troupeau->races['abbreviation'] }}.jpg" alt="{{ $troupeau->races['nom'] }}">
    @else
      <img class="card-img-top" src="{{URL::asset('medias/races')}}/defaut.jpg" alt="{{ $troupeau->races['nom'] }}">
    @endif
      <div class="card-body card-cadre">
          <h3 class="card-title">{{ $troupeau->especes['nom'] }}</h3>
          <p>( {{ $troupeau->races['nom'] }} )</p>
          <p>{{ $troupeau->uiv}} UIV</p>
      </div>
  </div>
</div>

@else($nombreTroupeaux > 1)
<div class="container d-flex justify-content-between">
@foreach($troupeaux as $troupeau)
  <div>
    <div class="card" style="width: 18rem;">
      @if(file_exists("../public/medias/races/".$troupeau->races['abbreviation'].".jpg"))
        <img class="card-img-top" src="{{URL::asset('medias/races')}}/{{ $troupeau->races['abbreviation'] }}.jpg" alt="{{ $troupeau->races['nom'] }}">
      @else
        <img class="card-img-top" src="{{URL::asset('medias/races')}}/defaut.jpg" alt="{{ $troupeau->races['nom'] }}">
      @endif
        <div class="card-body card-cadre">
            <h3 class="card-title">{{ $troupeau->especes['nom'] }}</h3>
            <p>( {{ $troupeau->races['nom'] }} )</p>
            <p>{{ $troupeau->uiv}} UIV</p>
        </div>
    </div>
  </div>
  @endforeach
</div>
  @endif
  @if($user)
    <div class="container">
      {!! link_to_route('troupeau.create', 'Ajouter un troupeau', ['userId' => $user->id], ['class' => 'btn btn-success text-white']) !!}
    </div>
  @endif
