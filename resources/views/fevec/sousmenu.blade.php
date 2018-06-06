<div class="container-fluid d-flex flex-row justify-content-between">
  <h3 class="alert alert-success"><?php echo $menu->titreSousmenu() ?></h3>
  <div>
  @foreach($menu->listeSousmenu() as $sousmenuItem)
    <a href="{{URL::route($sousmenuItem->route()) }}">
        <button class="btn {{ $sousmenuItem->couleur() }}  btn-menu" title="{{ $sousmenuItem->bulle() }}">
         {{$sousmenuItem->texte()}}
      </button>
    </a>
    @endforeach
  </div>
</div>
