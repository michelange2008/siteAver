<?php
namespace app\Factories;

class ProtocoleDeSoins
{
    protected $listeProtocoles;

    public function __construct()
    {
        $this->listeProtocoles = collect();

        $table = [
            [
                "<p>DIARRHEE NEONATALES DES VEAUX</p>",
                "<p>Fécès liquides, veau sans appétit, abattu, « baveur »</p>",
                "<ul>
                <li>
                Antibiotiques par voie orale : amoxicilline + acide clavulanique, sulfamides,
                </li>
                <li>Antibiotiques injectables : colistine + ampicilline, gentamycine, </li>
                <li>Huiles essentielles par voie orale</li>
                <li>Réhydratation par voie orale : sachets réhydratants avec ou sans suppression du lait";"Equilibre de la ration des vaches taries et en début de gestation</li>
                </ul>",

                "<p>Bonne hygiène du vêlage,</p>
                <p>Apport de colostrum suffisant à la naissance</p>
                <p>Alimentation lactée correcte: température, quantité, concentration en poudre,</p>
                <p>Logement des veaux adaptés: cases à veaux, box individuels les premiers jours, etc.</p>
                <p>Si besoin: vaccination des vaches (rotavec, trivacton, etc.) ou des veaux à la naissance.";"Etat critique du veau : déshydratation importante, veau qui ne se lève plus, état de choc,</p>",

                "<p>Echec du traitement.</p>
                <p>Fréquence anormales de diarrhées.</p>
                <p>Présence de signes cliniques inconnus.</p>",
            ],
        ];

    }
}
