@extends('layouts.app')

@extends('aver.admin.menuAdmin')


@section('content')
<div class="container-fluid bg-success">
  <h4 class="text-light">{{$ps->nom}} <span class="plus-petit">(
    @foreach($ps->especes as $espece)
      {{strToLower($espece->nom)}},
    @endforeach()
    )</span>
  </h4>
</div>

<div class="container">


@endsection()
