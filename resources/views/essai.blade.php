@extends('layouts.app')

@extends('aver.admin.menuAdmin')

@section('content')
<br />
{{Form::open(['route' => 'ajax'])}}
<h1 id = 'nom'>Michel</h1>
<div id = "ajax">
  {{Form::checkbox('cb')}}
</div>

{{Form::submit('ok')}}

{{Form::close()}}

<div id='reponse'>
  COUCOU
</div>
@endsection()
