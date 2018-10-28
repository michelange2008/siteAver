<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Constantes;

use phpDocumentor\Reflection\Types\Self_;

/**
 * Description of ConstCards
 *
 * @author michel
 */
class ConstCards
{
    const PATH_ICONE_ANA = "/analyses/";

    const ANA_ID = 'ANA';
    const ANA_TITRE = "résultats d'analyse";
    const ANA_ICONE = SELF::PATH_ICONE_ANA.'analyses_carre.svg';
    const ANA_TEXTE_OUI = "Présente les analyses de laboratoire (toutes espèces).";
    const ANA_TEXTE_NON = "Il n'y a pas encore de résultats d'analyses téléchargeables";
    const ANA_BOUTON = 'troupeau.analyses';

    const PATH_ICONE_PS = "/ps/";

    const BSA_ID = 'BSA';
    const BSA_TITRE = "bilans sanitaires annuels";
    const BSA_ICONE = SELF::PATH_ICONE_PS.'ps_carre.svg';
    const BSA_TEXTE_OUI = "Toutes les dates des bilans sanitaires et les protocoles de soin";
    const BSA_TEXTE_NON = "Il n'y a pas encore de protocole de soin téléhcargeable";
    const BSA_BOUTON = 'troupeau.bsa';

}
