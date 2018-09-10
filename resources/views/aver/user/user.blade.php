@extends('layouts.app')

@section('menuprincipal')
  @include('aver.menuprincipal')
@stop

@section('menu')
  @include('aver.user.menuUser')
@stop

@section('sousmenu')
  @include('aver.user.sousmenuUser', ['sousmenu' => $sousmenu])
@stop

@section('content')

<h1>Vue User</h1>

@stop
