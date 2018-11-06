@extends('layouts.app')

@extends('aver.admin.menuAdmin')

@section('sousmenu')
@includeIf('fevec.sousmenu', ['menu' => $menu])
@endsection

@section('content')
<div class="container flex-row d-flex justify-content-between">

  @foreach($actions as $action)
  <div class="card d-flex bg-light justify-content-between" style="width: 18rem">
    <img class="card-img-top" src="{{ URL::asset(config('icones.path'))}}/fevec/{{$action['icone']}}" alt="{{ $action['icone'] }}">
    <div class="card-body">
      <h5 class="card-title card-text">{{ $action['titre'] }}</h5>
      @if(!empty($action['troupeaux']))
        @foreach($action['troupeaux'] as $troupeau)
          <p>{{ $troupeau->name }}</p>
        @endforeach
      @else
        <h1>0</h1>
      @endif
    </div>
  </div>
  @endforeach
</div>
@endsection
