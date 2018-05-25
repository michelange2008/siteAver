@extends('layouts\app')

@extends('aver\menuAdmin')

@section('sousmenu')
@includeIf('fevec.sousmenu', ['menu' => $menu])
@endsection

@section('content')
    {{ Form::open(['route' => 'fevec.majParam']) }}
        <div class="container d-flex flex-row justify-content-around">
        {{ csrf_field() }}
        @foreach($element as $item)
        {{ Form::checkbox($item, $item, true) }}
        {{ Form::label($item, $item)}}
        @endforeach
                            {!! Form::submit('Enregistrer les modifications', ['class' => 'btn btn-success']) !!}

    {{ Form::close() }}

@endsection
