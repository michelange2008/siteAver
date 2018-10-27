@extends('layouts.app')

@extends('aver.admin.menuAdmin')

@section('sousmenu')
@includeIf('fevec.sousmenu', ['menu' => $menu])
@endsection

@section('content')
    {{ Form::open(['route' => ['fevec.majParam']]) }}
        <div class="container-fluid  d-flex justify-content-end">
           {!! Form::submit('Enregistrer les modifications', ['class' => 'btn btn-menu btn-success']) !!}
        </div>
        <div class="container d-flex flex-row justify-content-around">

        @foreach($params as $param)
            <div class="card" style="width: 25rem">
                <img class="card-img-top" src="{{ URL::asset('medias')}}/icones/fevec/{{ $param->icone() }}" alt="type">
                <div class="card-body">
                    <div class="card-text">
                        <h4>{{ $param->titre() }}</h4>
                    </div>
                    <div class="card-text">
                        <div class="form-group">
                            @foreach($param->liste()->liste() as $item)
                            <div class="form-check">
                            <div class="form-check-input">
                            {{ Form::checkbox($param->abbreviation().'_'.$item->id, $item->id, $item->utile) }}
                            </div><div class="form-check-label">
                            {{ Form::label($param->abbreviation().'_'.$item->id, $item->nom) }}
                            </div>
                        </div>
                        @endforeach
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        </div>
    {{ Form::close() }}
@endsection
