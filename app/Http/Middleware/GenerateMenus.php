<?php

namespace App\Http\Middleware;

use Closure;
use Lavary\Menu\Menu;

class GenerateMenus
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        \Menu::make('menuAdmin', function($menuAdmin){
            $menuAdmin->add('Accueil');
            
            $menuAdmin->add('Liste Eleveurs');
            
            $menuAdmin->add('Gestion Fevec');
            
            $menuAdmin->add('Gestion Visites');
            
                $menuAdmin->gestionVisites->add('Sommaire');
                $menuAdmin->gestionVisites->add('Vét.San.');
                $menuAdmin->gestionVisites->add('Prophylaxie');
                $menuAdmin->gestionVisites->add('Bilan Annuel');
                $menuAdmin->gestionVisites->add('Visite Obligatoire');

            $menuAdmin->add('Admin');
        });
        
        return $next($request);
    }
}
