<?php
namespace App\Traits;

use App\Constantes\Constantes_diverses;

trait VerifieAdresseMail
{

  public function verif($adresse_mail)
  {
      $atom   = '[-a-z0-9!#$%&\'*+\\/=?^_`{|}~]';   // caractères autorisés avant l'arobase
      $domain = '([a-z0-9]([-a-z0-9]*[a-z0-9]+)?)'; // caractères autorisés après l'arobase (nom de domaine)

      $regex = '/^' . $atom . '+' .   // Une ou plusieurs fois les caractères autorisés avant l'arobase
      '(\.' . $atom . '+)*' .         // Suivis par zéro point ou plus
                                      // séparés par des caractères autorisés avant l'arobase
      '@' .                           // Suivis d'un arobase
      '(' . $domain . '{1,63}\.)+' .  // Suivis par 1 à 63 caractères autorisés pour le nom de domaine
                                      // séparés par des points
      $domain . '{2,63}$/i';          // Suivi de 2 à 63 caractères autorisés pour le nom de domaine

      // test de l'adresse e-mail
      if (preg_match($regex, $adresse_mail)) {
          return true;
      } else {
          return false;
      }
  }

  public function nomail($adresse_mail)
  {

    if(explode('@', $adresse_mail)[1] == Constantes_diverses::FAUX_MAIL)
    {
      return true;
    }
    else
    {
      return false;
    }
  }
}
