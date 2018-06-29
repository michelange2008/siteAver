<div class="container-fluid d-flex flex-row justify-content-between">
  <h3 class="alert alert-success"><?php echo $menu->titreSousmenu() ?></h3>
  <div>
  @foreach($menu->listeSousmenu() as $sousmenuItem)
  <a id="{{$sousmenuItem->parametre()}}" class="btn-alert" href="{{route($sousmenuItem->route(), [$sousmenuItem->parametre()]) }}">
        <button id="{{$sousmenuItem->texte()}}" class="btn btn-carre {{ $sousmenuItem->couleur() }}  btn-menu" title="{{ $sousmenuItem->bulle() }}">
         {{$sousmenuItem->texte()}}
      </button>
    </a>
    @endforeach
  </div>
</div>
