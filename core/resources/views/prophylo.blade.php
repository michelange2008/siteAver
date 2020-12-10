@extends('layouts.app')


@section('content')

  <div class="container-fluid">

    <div class="row my-3">

      <div class="col-11 offset-1">

        <h1 class="h1">PROPHYLAXIE</h1>

      </div>

    </div>

    <div class="row">

      <div class="col-5 offset-1">

        <p class="h4">HT</p>

      </div>

      <div class="col-4 text-right">

        <div id="ht" class="h4 prix"></div>

      </div>

    </div>

    <div class="row">

      <div class="col-5 offset-1">

        <p class="h5">TVA (20%)</p>

      </div>

      <div class="col-4 text-right">

        <div id="tva" class="h5 prix"></div>

      </div>

    </div>

  </div>

  <div class="row">

    <div class="col-5 offset-1">

      <hr>

      <p class="h4">TTC</p>

    </div>

    <div class="col-4 text-right">

      <hr class="divider">

      <div id="ttc" class="h4 prix "></div>

    </div>

  </div>

  <div class="row">

    <div class="col-10 offset-1">

      <hr class="divider">

      <div class="form-group">

        <label class="lead form-label" for="nombre">Nombre d'animaux</label>

        <input id="nombre" class="form-control" type="number" name="nombre" value="">

      </div>

    </div>

  </div>

  <div class="row justify-content-center">

    <div class="col-3">

      <img id="bv" class="espece noiretblanc" src="{{ url('public/images/bv.svg')}}" alt="">

    </div>

    <div class="col-3">

      <img id="pr" class="espece noiretblanc" src="{{ url('public/images/pr.svg')}}" alt="">

    </div>

    <div class="col-3">

      <img id="pc" class="espece noiretblanc" src="{{ url('public/images/pc.svg')}}" alt="">

    </div>

  </div>

</div>

</div>

@endsection

@push('css')

  <link rel="stylesheet" href="{{ asset('public/css/prophylo.css')}}">


@endpush
