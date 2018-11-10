@extends('layouts.app')

@extends('aver.menuprincipal')

@extends('aver.admin.menuAdmin')


@section('content')
<div class="fond">
  <div id="informations">
    <div class="alert bandeau">
      <h3>Informations</h3>
    </div>
    <div class="info-contenu">
      <table class="table table-stripped table-focus">
        <thead>
          <tr>
            <th>Libellé</th>
            <th>Info</th>
          </tr>
        </thead>
        <tbody>
            <tr>
              <td>Numéro Ordre SCOP</td>
              <td>XXXXXX</td>
            </tr>
        </tbody>
      </table>
    </div>
  </div>
  <div id="liens" class="alert bandeau">
    <h3>Liens</h3>
  </div>
</div>

@endsection
