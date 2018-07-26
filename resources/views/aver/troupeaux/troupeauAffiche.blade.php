@extends('layouts.app')

@extends('aver.admin.menuAdmin')

@extends('aver.admin.rubanTroupeau', [
  'admin' => $admin,
  'listeBlasons' => $listeBlasons,
  'troupeau' => $troupeau,
  'autreTroupeaux' => $autreTroupeaux,
  'campagne' => $campagne,
])

@section('content')
{{ link_to_route('troupeau.analyses', "Analyses", [$troupeau->id]) }}
@endsection()
