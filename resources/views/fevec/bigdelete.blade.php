@extends('layouts.app')

@extends('aver.admin.menuAdmin')

@section('sousmenu')
@includeIf('fevec.sousmenu', ['menu' => $menu])
@endsection

@section('content')
<br />

<h4>@include('flash::message')</h4>

<div class="container">
    <h4 class="alert alert-warning">Il faut revoir l'importation de la base de donnée</h4>
</div>
@endsection
