@extends('layouts.app_technique')

@section('gauche')
  @include('technique.gauche')
@endsection

@section('content')
  @include('technique.fichin', ['categorie' => $categorie])
@endsection
