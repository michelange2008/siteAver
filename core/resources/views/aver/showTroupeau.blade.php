@extends('layouts.app')
@extends('aver.menuAver')

@section('troupeau')
@component('aver.afficheTroupeau', ['user' => Auth::user(), 'troupeau' => $troupeau, 'nombreTroupeaux' => 1])
@endcomponent
@endsection
