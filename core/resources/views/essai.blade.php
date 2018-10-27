@extends('layouts.app')

@extends('aver.menuprincipal')

@section('content')
<br />



<br />

@foreach($activite->listeSceaux() as $sceau)

  @if($sceau->affichage())

  {{$sceau->titre()}}<br />

  @endif()

@endforeach()

@endsection()
