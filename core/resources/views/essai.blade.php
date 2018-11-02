<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Aver') }}</title>
     <!-- Styles -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB"
      crossorigin="anonymous">
      @foreach(config('styles') as $path)
        <link rel="stylesheet" href="{{ asset($path)}}">
      @endforeach
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.0/jquery-confirm.min.css">
    @stack('css')

</head>
<body>
<table id="listeEleveurs" class="display dt-responsive nowrap" width="100%">
  <thead>
    <tr>
      <th>nom1</th>
      <th>nom2</th>
      <th>nom3</th>
      <th>nom4</th>
      <th>nom5</th>
      <th>nom6</th>
      <th>nom7</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>tagadatsointsoin</td>
      <td>tagadatsointsoin</td>
      <td>tagadatsointsoin</td>
      <td>tagadatsointsoin</td>
      <td>tagadatsointsoin</td>
      <td>tagadatsointsoin</td>
      <td>tagadatsointsoin</td>
    </tr>
    <tr>
      <td>trcumuche</td>
      <td>trcumuche</td>
      <td>trcumuche</td>
      <td>trcumuche</td>
      <td>trcumuche</td>
      <td>trcumuche</td>
      <td>trcumuche</td>
    </tr>
    <tr>
      <td>baragouine</td>
      <td>baragouine</td>
      <td>baragouine</td>
      <td>baragouine</td>
      <td>baragouine</td>
      <td>baragouine</td>
      <td>baragouine</td>
    </tr>
    <tr>
      <td>tagadatsointsoin</td>
      <td>tagadatsointsoin</td>
      <td>tagadatsointsoin</td>
      <td>tagadatsointsoin</td>
      <td>tagadatsointsoin</td>
      <td>tagadatsointsoin</td>
      <td>tagadatsointsoin</td>
    </tr>
    <tr>
      <td>trcumuche</td>
      <td>trcumuche</td>
      <td>trcumuche</td>
      <td>trcumuche</td>
      <td>trcumuche</td>
      <td>trcumuche</td>
      <td>trcumuche</td>
    </tr>
    <tr>
      <td>baragouine</td>
      <td>baragouine</td>
      <td>baragouine</td>
      <td>baragouine</td>
      <td>baragouine</td>
      <td>baragouine</td>
      <td>baragouine</td>
    </tr>
    <tr>
      <td>tagadatsointsoin</td>
      <td>tagadatsointsoin</td>
      <td>tagadatsointsoin</td>
      <td>tagadatsointsoin</td>
      <td>tagadatsointsoin</td>
      <td>tagadatsointsoin</td>
      <td>tagadatsointsoin</td>
    </tr>
    <tr>
      <td>trcumuche</td>
      <td>trcumuche</td>
      <td>trcumuche</td>
      <td>trcumuche</td>
      <td>trcumuche</td>
      <td>trcumuche</td>
      <td>trcumuche</td>
    </tr>
    <tr>
      <td>baragouine</td>
      <td>baragouine</td>
      <td>baragouine</td>
      <td>baragouine</td>
      <td>baragouine</td>
      <td>baragouine</td>
      <td>baragouine</td>
    </tr>
  </tbody>
</table>
 <script src="{{ asset(config('scripts.path'))}}/app.js"></script>
 <script src="{{ asset(config('scripts.path'))}}/user_gestion.js"></script>
 <script src="https://use.fontawesome.com/f8a7076b4b.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.0/jquery-confirm.min.js"></script>
 @stack(config('scripts.path'))



</body>
</html>
