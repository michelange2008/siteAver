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
            $menuAdmin->add('Accueil', ['route' => 'fevec.index', 'class' => 'nav-item'])
                    ->link->attr('class', 'nav-link');
            
            $menuAdmin->add('Liste Eleveurs', ['route' => 'user.index', 'class' => 'nav-item'])
                    ->link->attr('class', 'nav-link');
            
            $menuAdmin->add('Gestion Fevec', ['route' => 'fevec.gestion', 'class' => 'nav-item'])
                    ->link->attr('class', 'nav-link');
            
            $menuAdmin->add('Gestion Visites', ['class' => 'nav-item dropdown'])
                    ->link->attr(['id'=>'navbarDropdown', 'class' => 'nav-link dropdown-toggle nav-link',
                        'role' => 'button', 'data-toggle' => 'dropdown', 'aria-haspopup' => 'true', 'aria-expanded' => 'true']);
            
                $menuAdmin->gestionVisites->add('Sommaire', ['route' => 'visites.accueil', 'class' => 'dropdown-menu bg-dark text-light', 'aria-labelledBy' => 'navbarDropdown'])
                        ->link->attr(['class' => 'dropdown-item text-muted']);
                $menuAdmin->gestionVisites->add('Vét.San.', ['route' => 'vetsan.changer', 'class' => 'dropdown-menu bg-dark text-light', 'aria-labelledBy' => 'navbarDropdown'])
                        ->link->attr(['class' => 'dropdown-item text-muted']);
                $menuAdmin->gestionVisites->add('Prophylaxie', ['route' => 'prophylo.index', 'class' => 'dropdown-menu bg-dark text-light', 'aria-labelledBy' => 'navbarDropdown'])
                        ->link->attr(['class' => 'dropdown-item text-muted']);
                $menuAdmin->gestionVisites->add('Bilan Annuel', ['route' => 'bsa.index', 'class' => 'dropdown-menu bg-dark text-light', 'aria-labelledBy' => 'navbarDropdown'])
                        ->link->attr(['class' => 'dropdown-item text-muted']);
                $menuAdmin->gestionVisites->add('Visite Obligatoire', ['route' => 'vso.index', 'class' => 'dropdown-menu bg-dark text-light', 'aria-labelledBy' => 'navbarDropdown'])
                        ->link->attr(['class' => 'dropdown-item text-muted']);

            $menuAdmin->add('Admin', ['route' => 'user.admin', 'class' => 'nav-item'])
                    ->link->attr(['class' => 'nav-link']);
        });
        
        return $next($request);
    }
}
