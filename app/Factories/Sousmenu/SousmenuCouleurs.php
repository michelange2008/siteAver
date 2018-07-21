<?php

/*
 * Définit les couleurs pour les boutons
 */

namespace App\Factories\Sousmenu;

/**
 * Description of SousmenuCouleurs
 *
 * @author michel
 */
class SousmenuCouleurs
{
    CONST VERT = 'btn-success';
    CONST ORANGE = 'btn-warning';
    CONST ROUGE = 'btn-danger';
    CONST GRIS = 'btn-secondary';
    CONST BLEU = 'btn-primary';
    CONST CLAIR = 'btn-light';
    CONST NOIR = 'btn-dark';
    CONST ROSE = 'btn-rose';
    CONST ROSE_O = 'btn-outline-rose';
    CONST NAVY = 'btn-navy';
    CONST NAVY_O = 'btn-outline-navy';
    CONST GOLD = 'btn-gold';
    CONST GOLD_O = 'btn-outline-gold';
    CONST BRIQUE = 'btn-brique';
    
    
    public static function couleur()
    {
        return self::LISTE_COULEURS;
    }
}
