<div class="d-flex flex-column">
    <h5 class="alert alert-success text-center">Sélectionner une espèce <span class="fa fa-angle-double-down"></span></h5>
    @foreach($cardGroupesEspece as $item)
        <img id="{{$item['parametre']}}" class="icone_espece espace curseur icone" src="{{ URL::asset('medias')}}/icones/{{$item['icone']}}"" title="{{ $item['texte']}}" alt="{{ $item['parametre'] }}">
    @endforeach
</div>

