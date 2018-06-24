@extends('layouts.app')

@extends('aver.menuAdmin')

@section('sousmenu')
@includeIf('fevec.sousmenu', ['menu' => $menu])
@endsection

@section('content')


@endsection