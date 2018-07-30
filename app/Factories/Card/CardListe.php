<?php
namespace app\Factories\Card;

use Illuminate\Support\Collection;
use App\Factories\Card\CardFactory;

class CardListe extends Collection
{
    protected $cardListe;
    
    public function addCard(Card $card)
    {
        $this->cardListe[$card->id()] = $card;
    }
    
    public function CardListe()
    {
        return $this->cardListe;    
    }
    
}

