<?php
/**
 * Peuple le modèle Bsa avec la différence entre la date de réalisation du BSA et aujourd'hui
 * pour montrer les retards
 */
namespace App\Http\Middleware;

use Closure;
use App\Models\Bsa;
use Carbon\Carbon;

class DelaiBSA
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
        $listeBsa = Bsa::all();
        $aujourdhui = Carbon::now();
        foreach($listeBsa as $bsa )
        {
            $dateTab = explode("-", $bsa->date_bsa);
            $date_bsa = Carbon::createFromDate($dateTab[0], $dateTab[1], $dateTab[2]);
            $delai = $aujourdhui->diffInDays($date_bsa);
            $bsa_ajour = Bsa::firstOrCreate(['id' => $bsa->id]);
            $bsa_ajour->delaiBSA = $delai;
            $bsa_ajour->save();
        }
        return $next($request);
    }
}
