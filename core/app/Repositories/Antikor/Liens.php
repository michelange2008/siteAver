<?php
namespace App\Repositories\Antikor;

class Liens {

  protected $nom;
  protected $url;
  protected $icone;

  public function __construct($nom, $url, $icone)
  {
    $this->nom = $nom;
    $this->url = $url;
    $this->icone = $icone;
  }

  public function nom()
  {
    return $this->nom;
  }

  public function url()
  {
    return $this->url;
  }

  public function icone()
  {
    return $this->icone;
  }
}
