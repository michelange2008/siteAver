<?php
namespace App\Factories\Blasons;

class Blasons
{
    protected $identite; // nom résumé du blason
    protected $condition; // variable sans usage pour l'instant
    protected $icone; // icone qui est différente selon condition
    protected $alt; // texte alternatif à l'icone différent selon condition
    protected $titre; // titre du bouton
    protected $texteAdmin; // texte dans le contexte administrateur variable selon condition
    protected $texteUser; // texte dans le le contexte user variable selon condition
    protected $affichage; // booléen qui définit si on doit afficher ou non le blason
    

    public function setCondition($condition)
    {
        $this->condition = $condition;
    }
    
    public function identite()
    {
        return $this->identite;
    }
    
    public function condition()
    {
        return $this->condition;
    }
    
    public function icone()
    {
        return $this->icone;
    }
    
    public function alt()
    {
        return $this->alt;
    }
    
    public function titre()
    {
        return $this->titre;
    }

    public function texteAdmin()
    {
        return $this->texteAdmin;
    }
    
    public function texteUser()
    {
        return $this->texteUser;
    }
    
    public function affichage()
    {
        return $this->affichage;
    }
}