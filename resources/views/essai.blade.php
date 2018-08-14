@extends('layouts.app')

@extends('aver.admin.menuAdmin')

@section('content')
<br />

@foreach($liste as $item)
<p class=" {{$item->especes->abbreviation}}">{{$item->user->name}}</p>
@endforeach()
@endsection()

