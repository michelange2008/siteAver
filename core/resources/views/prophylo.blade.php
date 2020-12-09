@extends('layouts.app')


@section('content')

  <div class="container-fluid">

    <div class="row my-3">

      <div class="col-11 offset-1">

        <h1 class="lead">Calcul d'une facture de prophylaxie</h1>

      </div>

      </div>

      <div class="row">

        <div class="col-10 offset-1">

        <div class="form-group">


          <select id="espece" class="form-select" name="espece">

            <option disabled selected>Choisir une espèce</option>
            <option value="bovin">Bovins</option>
            <option value="petitrum">Petits ruminants</option>
            <option value="porcs">Porcs</option>

          </select>



        </div>

        <div class="form-group">

          <label class="form-label" for="nombre">Nombre d'animaux</label>
          <input id="nombre" class="form-control" type="number" name="nombre" value="">

        </div>

      </div>
</div>
    </div>

  </div>

@endsection
