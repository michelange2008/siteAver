@extends('layouts.app_technique')

@section('gauche')
  @include('technique.gauche')
@endsection

@section('content')
  @include('technique.fichin', ['theme' => $theme])
@endsection

@section('droite')
  @include('technique.droite')
@endsection
