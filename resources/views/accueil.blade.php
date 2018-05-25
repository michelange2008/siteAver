<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
  	<meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta content="text/html; charset=utf-8" http-equiv="content-type">
    <title>ANTIKOR</title>
    <link rel="icon" type="image/png" href="{{URL::asset('medias/logo.png')}}" />
    <link rel="stylesheet" type="text/css" href="{{URL::asset('css/accueil.css')}}" />

  </head>
  <body>


  <div id="trait"></div>
  <div id="container">
  @foreach ($liste as $element)
    <div id = "{{$element['nom']}}" class = "boite">
      @if ($element['affiche'] != 0)
      <a href="{{$element['lien']}}">
      @endif
         <div class="img"><img src="{{URL::asset(config('images_accueil.path').$element['image'])}}" alt=""></div>
     @if ($element['affiche'] != 0)
         <div class="intitule"><p>{{$element['intitule']}}</p></div>
     @endif
      </a>
  </div>

  @endforeach
  </div>
	<script
			  src="https://code.jquery.com/jquery-3.2.1.min.js"
			  integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
			  crossorigin="anonymous"></script>
	<script
			  src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"
			  integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU="
			  crossorigin="anonymous"></script>


 </body>
</html>
