@extends('layouts.app')


@extends('aver.admin.menuAdmin')

@section('content')
<div class="container-fluid">
  <div class="alert alert-success">
    <h1>Tarissement <i class="fa fa-arrow-right"></i> ALERTES <i class="fa fa-exclamation-circle"></i></h1>
  </div>
    <form class="" action="index.html" method="post">
      <div class="form-row ">
        <div class="col-2">
          <a href="#" value="" onclick="$.alert({icon: 'fa fa-warning',title: 'Info',content:'Nombre de vaches ayant vélé depuis 1 an', theme:'supervan'})">
            <img style="max-height:50px" src="{{URL::asset(config('fichiers.icones'))}}/antikor/VA.svg" alt="">
          </a>
        </div>
        <div class="col-3">
          <input id="inputvelees" type="number" class="form-control vaches" name="Nbvelees" value="">
        </div>
        <div id="vachevelees" class="col-6 d-flex flex-column justify-content-center">

        </div>
      </div>
      @foreach ($datas as $value)
        <div class="form-row ">

          <div class="col-2">
            <a href="#" value={{$value->libelle}} onclick="$.alert({icon: 'fa fa-warning',title: 'Info',content:'{{$value->libelle}}', theme:'supervan'})">
              <img style="max-height:50px" src="{{URL::asset(config('fichiers.icones'))}}/antikor/{{$value->icone}}" alt="">
            </a>
          </div>

          <div class="col-3">
            <input id="{{$value->nom}}" type="number" class="form-control alertes" name="{{$value->nom}}" value="">
          </div>

          <div class="col-3 d-flex flex-column justify-content-center text-center">
            <h2 class="text-muted">-</h2>
          </div>

          <div class="col-3 d-flex flex-column justify-content-center text-center">
            <h2 class="text-secondary">({{$value->seuil}}%)</h2>
          </div>

        </div>
      @endforeach
    </form>
</div>

@endsection
