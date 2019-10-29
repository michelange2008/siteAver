<?php

namespace App\Traits;

/**
 *
 */
trait LitJSON
{
  function litJSON($nomfichier)
  {
    $file = asset(config("fichiers.json"))."/".$nomfichier.".json";

    $content = file_get_contents($file);

    return json_decode($content);
  }
}
