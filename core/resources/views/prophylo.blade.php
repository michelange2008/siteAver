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

        <p class="display-4">HT</p>

      </div>

      <div class="col-5">

      </div>

    </div>

    <div class="row">

      <div class="col-5 offset-1">

        <p class="display-4">TVA</p>

      </div>

      <div class="col-5">

      </div>

    </div>

    <div class="row">

      <div class="col-5 offset-1">

        <p class="display-4">TTC</p>

      </div>

      <div class="col-5">

      </div>

    </div>

    <div class="row">

      <div class="col-10 offset-1">

        <div class="form-group">

          <label class="form-label" for="nombre">Nombre d'animaux</label>
          <input id="nombre" class="form-control" type="number" name="nombre" value="">

        </div>

      </div>

    </div>

      <div class="row justify-content-center">

        <div class="col-3">

          <img src="{{ url('public/images/bv.svg')}}" alt="">

        </div>

        <div class="col-3">

          <img src="{{ url('public/images/pr.svg')}}" alt="">

        </div>

        <div class="col-3">

          <img src="{{ url('public/images/pc.svg')}}" alt="">

        </div>

      </div>

  </div>

</div>

@endsection
