@extends('layouts.app')

@extends('aver.menuprincipal')

@section('content')
<br />

{{$activite->affichage()}}

<br />

{!!dd($activite)!!}

@endsection()
