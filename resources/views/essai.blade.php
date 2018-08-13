@extends('layouts.app')

@extends('aver.admin.menuAdmin')

@section('content')
<br />
{{Form::open(['route' => 'ajax'])}}

<div id = "ajax">
  {{Form::text('bonjour', 'mon nom est michel')}}
</div>
{{Form::submit('ok')}}

{{Form::close()}}

<div id='reponse'>
  COUCOU
</div>
@endsection()

<script>

</script>
