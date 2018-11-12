<div class="">
  @foreach($liste as $item)

  @if($item->formation_id === $formation->id)
  <div class="alert alert-success produit d-flex flex-row justify-content-between">
    <div class="d-flex flex-row">
      <div class="container-icone">
        <img src="{{asset('svg')}}/{{$item->produit->categorie->icone}}" alt="{{$item->produit->abbreviation}}" class="icone"/>
      </div>
      <div class="d-flex flex-row {{$item->produit->categorie->couleur}}">
        <span style="font-size: 0.7rem">{{$item->produit->categorie->abbreviation}}</span>
        <h5 style="margin-left:10px">{{$item->produit->nom}}
        ({{$item->qtt_unitaire * $nombre }} {{$item->produit->detail}})
        </h5>
      </div>
    </div>
    <div id="marque_{{$item->id}}" class="container-icone marque">
      <img id="afaire_{{$item->id}}" src="{{asset('svg/afaire.svg')}}" alt="afaire" class="icone">
      <img id="fait_{{$item->id}}" src="{{asset('svg/fait.svg')}}" alt="fait" class="icone invisible">
    </div>

  </div>
  @endif
  @endforeach
</div>
