@extends('layouts.app')


@section('content')

  <div class="container-fluid">

    <div class="row my-3">

      <div class="col-11 col-md-3 offset-1">

        <h1 class="h1">PROPHYLAXIE</h1>

      </div>

    </div>

    <div class="row">

      <div class="col-5 col-md-2 offset-1">

        <p class="h4">HT</p>

      </div>

      <div class="col-4 col-md-1 text-right">

        <div id="ht" class="h4 prix"></div>

      </div>

    </div>

    <div class="row">

      <div class="col-5 col-md-2 offset-1">

        <p class="h5">TVA (20%)</p>

      </div>

      <div class="col-4 col-md-1 text-right">

        <div id="tva" class="h5 prix"></div>

      </div>

    </div>


  <div class="row">

    <div class="col-5 col-md-2 offset-1">

      <hr>

      <p class="h4">TTC</p>

    </div>

    <div class="col-4 col-md-1 text-right">

      <hr class="divider">

      <div id="ttc" class="h4 prix "></div>

    </div>

  </div>

  <div class="row">

    <div class="col-10 col-md-3 offset-1">

      <hr class="divider">

      <div class="form-group">

        <label class="lead form-label" for="nombre">Nombre d'animaux</label>

        <input id="nombre" class="form-control" type="number" name="nombre" value="">

      </div>

    </div>

  </div>

  <div class="row justify-content-center justify-content-md-start">

    <div class="col-3 col-md-1 offset-md-1">

      <img id="bv" class="espece noiretblanc" src="{{ url('public/images/bv.svg')}}" alt="">

    </div>

    <div class="col-3 col-md-1">

      <img id="pr" class="espece noiretblanc" src="{{ url('public/images/pr.svg')}}" alt="">

    </div>

    <div class="col-3 col-md-1">

      <img id="pc" class="espece noiretblanc" src="{{ url('public/images/pc.svg')}}" alt="">

    </div>

  </div>

  <div class="row my-3">

    <div class="col-10 col-md-3 offset-1">

      <p>Saisir le nombre d'animaux puis choisir l'espèce pour obtenir le montant de la facture.</p>

    </div>

  </div>

</div>

@endsection

@push('css')

  <link rel="stylesheet" href="{{ asset('public/css/prophylo.css')}}">


@endpush
