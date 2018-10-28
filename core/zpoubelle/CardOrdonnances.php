<?php
namespace app\Factories\Card;

class CardOrdonnances extends Card
{

    public function __construct($id_troupeau)
    {
        parent::__construct($id_troupeau);
        
        $this->setId("ORD");
        $this->setTexte('Affiche la liste des ordonnances de '.$this->troupeau->user->name);
        $this->setIcone('ordonnances.svg');
        $this->setTitre("ordonnances");
        $this->setBouton('troupeau.ordonnances');
        $this->setAffichage(false);
    }
}

