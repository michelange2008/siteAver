<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Constantes;

/**
 * Description of BlasonsConstantes
 *
 * @author michel
 */


class ConstSceaux
{
    const TYPE_INFO = "info";
    const TYPE_LIEN = "lien";
    const PATH_ICONES = "/ruban/";

    const VETSAN_IDENTITE = "vetsan";
    const VETSAN_TITRE = "mandat sanitaire";
    const VETSAN_ICONE_VRAI = SELF::PATH_ICONES."vetsan_carre.svg";
    const VETSAN_ICONE_FAUX = SELF::PATH_ICONES."vetsan_no_carre.svg";
    const VETSAN_TEXT_ADMIN_VRAI = "Antikor est vétérinaire sanitaire de ";
    const VETSAN_TEXT_ADMIN_FAUX = "Antikor n'est pas vétérinaire sanitaire de ";
    const VETSAN_TEXT_USER_VRAI = "Antikor est votre vétérinaire sanitaire";
    const VETSAN_TEXT_USER_FAUX = "Antikor n'est pas votre vétérinaire sanitaire";
    const VETSAN_PLUS = 'false';
    const VETSAN_PLUS_LIEN = "";

    const PROPHYLO_IDENTITE = "prophylo";
    const PROPHYLO_TITRE = "prophylaxies";
    const PROPHYLO_ICONE_VRAI = SELF::PATH_ICONES."prophylo_carre.svg";
    const PROPHYLO_ICONE_FAUX = SELF::PATH_ICONES."prophylo_no_carre.svg";
    const PROPHYLO_TEXT_ADMIN_VRAI = "Les prophylaxies sont à faire pour la campagne ";
    const PROPHYLO_TEXT_ADMIN_FAUX = "Il n'y a pas de prophylaxie pour la campagne ";
    const PROPHYLO_TEXT_USER_VRAI = "Les prophylaxies sont à faire pour la campagne ";
    const PROPHYLO_TEXT_USER_FAUX = "Il n'y a pas de prophylaxie pour la campagne ";
    const PROPHYLO_PLUS = 'false';
    const PROPHYLO_PLUS_LIEN = "";

    const BSAIMP_IDENTITE = "bsaimportant";
    const BSAIMP_TITRE = "bilan sanitaire annuel";
    const BSAIMP_ICONE_VRAI = SELF::PATH_ICONES."bsaimportant_carre.svg";
    const BSAIMP_ICONE_FAUX = SELF::PATH_ICONES."bsaimportant_no_carre.svg";
    const BSAIMP_TEXT_ADMIN_VRAI = "Bilan sanitaire à faire en ";
    const BSAIMP_TEXT_ADMIN_FAUX = "Bilan sanitaire annuel non obligatoire en ";
    const BSAIMP_TEXT_USER_VRAI = "Le bilan sanitaire est à faire en ";
    const BSAIMP_TEXT_USER_FAUX = "Il n'y a pas de bilan sanitaire à faire en ";
    const BSA_IMP_PLUS = 'false';
    const BSA_IMP_PLUS_LIEN = "";

    const ACTIVITE_IDENTITE = "activite";
    const ACTIVITE_TITRE = "type d'activité";
    const ACTIVITE_ICONE_CONV = SELF::PATH_ICONES."CONV.svg";
    const ACTIVITE_ICONE_SUIV = SELF::PATH_ICONES."SUIV.svg";
    const ACTIVITE_ICONE_SANI = SELF::PATH_ICONES."SANI.svg";
    const ACTIVITE_TEXT_ADMIN = "Convention, suivi ou vétérinaire sanitaire";
    const ACTIVITE_TEXT_USER = "Convention, suivi ou vétérinaire sanitaire";
    const ACTIVITE_PLUS = 'false';
    const ACTIVITE_PLUS_LIEN = "";

    const VSO_IDENTITE = "vso";
    const VSO_TITRE = "visite sanitaire obligatoire";
    const VSO_ICONE_VRAI = SELF::PATH_ICONES."vso_carre.svg";
    const VSO_ICONE_FAUX = SELF::PATH_ICONES."vso_no_carre.svg";
    const VSO_TEXT_ADMIN_VRAI = "VSO à faire en ";
    const VSO_TEXT_ADMIN_FAUX = "pas de VSO à faire en ";
    const VSO_TEXT_USER_VRAI = "VSO à faire en ";
    const VSO_TEXT_USER_FAUX = "pas de VSO à faire en ";
    const VSO_PLUS = 'false';
    const VSO_PLUS_LIEN = "";

    const PATH_ICONE_PS = "/ps/";

    const BSAPS_IDENTITE = 'bsaps';
    const BSAPS_TITRE = "Protocoles de soin";
    const BSAPS_SOUSTITRE = "";
    const BSAPS_ICONE = SELF::PATH_ICONE_PS.'ps_carre.svg';
    const BSAPS_TEXTE_ADMIN_VRAI = "Dates des BSA et protocoles de soin";
    const BSAPS_TEXTE_USER_VRAI = "Dates des bilans sanitaires et protocoles de soin";
    const BSAPS_TEXTE_ADMIN_FAUX = "Il n'y a pas encore de protocole de soin téléchargeable";
    const BSAPS_TEXTE_USER_FAUX = "Il n'y a pas encore de protocole de soin téléchargeable";
    const BSAPS_BOUTON = 'troupeau.bsa';
    const BSAPS_PLUS = 'true';
    const BSAPS_PLUS_LIEN = 'bsa.saisie';

    const PATH_ICONE_ANA = "/analyses/";

    const ANA_IDENTITE = 'analyses';
    const ANA_TITRE = "résultats d'analyse";
    const ANA_SOUSTITRE = "";
    const ANA_ICONE = SELF::PATH_ICONE_ANA.'analyses_carre.svg';
    const ANA_TEXTE_ADMIN_VRAI = "(toutes espèces)";
    const ANA_TEXTE_ADMIN_FAUX = "Pas d'analyses téléchargeables";
    const ANA_TEXTE_USER_VRAI = "(toutes espèces)";
    const ANA_TEXTE_USER_FAUX = "Pas d'analyses téléchargeables";
    const ANA_BOUTON = 'troupeau.analyses';
    const ANA_PLUS = 'false';
    const ANA_PLUS_LIEN = '';

    const NOTE_IDENTITE = 'commentaires';
    const NOTE_TITRE = "Notes";
    const NOTE_SOUSTITRE = "";
    const NOTE_ICONE = SELF::PATH_ICONES.'commentaire_carre.svg';
    const NOTE_TEXTE_ADMIN_VRAI = "Observation sur l'élevage";
    const NOTE_TEXTE_ADMIN_FAUX = "Pas de notes";
    const NOTE_TEXTE_USER_VRAI = "Observation sur l'élevage";
    const NOTE_TEXTE_USER_FAUX = "Pas de notes";
    const NOTE_BOUTON = 'troupeau.notes';
    const NOTE_PLUS = 'true';
    const NOTE_PLUS_LIEN = 'troupeau.notes';

}
