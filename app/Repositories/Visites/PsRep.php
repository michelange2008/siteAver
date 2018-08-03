<?php
namespace App\Repositories\Visites;
use Illuminate\Http\Request;
use Validator;
use App\Models\Ps;
use App\Traits\GestionFichier;
use App\Traits\EspecesPresentes;

class PsRep
{
    use GestionFichier;
    use EspecesPresentes;
        
    public function getById($id)
    {
        return Ps::where('id', $id)->first();
    }
    
    public function destroy($id)
    {
        $ps = $this->getById($id);
        $this->detruitFichier(config('ps_path.path'), $ps->fichier);
        
        $ps->delete();
    }
    
    public function enregistre($request) {
        $datas = array_slice($request->all(), 1);
        // Ajoute les nouveaux couples ps espece
        $listeEspecesPs = $this->traiteDatas($datas);
        foreach($listeEspecesPs as $especePs)
        {
            $ps = Ps::find($especePs['ps_id']);
            if(!$ps->especes->contains($especePs['espece_id']))
            {
                $ps->especes()->attach($especePs['espece_id']);
            }
        }
        // Enleve les couples ps espece qui ont été décochés
        $listePs = Ps::all();
        foreach($listePs as $ps)
        {
            if($ps->especes->count()>0)
            {
                foreach($ps->especes as $espece)
                {
                    if(!$this->listeDatas($datas)->contains($ps->id."_".$espece->id))
                    {
                        $ps->especes()->detach($espece->id);
                    }
                }
            }
        }
    }
    
    public function store(Request $request) 
    {
        $inputs = $request->all();
        $file = $request->file('fichier');
        // Valide la saisie
        $validator = Validator::make($inputs, [
            'nom' => 'required|max:255',
            'fichier' => 'required|file|mimetypes:application/pdf',
        ], $this->messages())->validate();
        // Crée le nouveau protocole de soin dans la bdd
        $nouvPs = $this->storePs($inputs['nom'], $file->getClientOriginalName());
        // Associe ce ps à des especes selon la saisie
        $this->storeEspecesPs($nouvPs, $inputs);
        // Copie le fichier àl'emplacement voulu
        $file->move('pdf/ps', $file->getClientOriginalName());
    }
    
    public function storePs($nom, $fichier)
    {
        $ps = new Ps();
        $ps->nom = $nom;
        $ps->fichier = $fichier;
        $ps->save();
        return $ps;
    }
    
    public function storeEspecesPs($ps, $inputs)
    {
        $listeEspeces = $this->nomEspecesPresentes();
        dump($listeEspeces);
        foreach($inputs as $key => $espece)
        {
            if($listeEspeces->contains($espece))
            {
                $ps->especes()->attach($key);
            }
        }
    }
    
    public function messages()
    {
        return [
            'nom.required' => 'Un nom de protocole de soin est indispensable',
            'fichier.required'  => 'Il faut fournir un fichier',
        ];
    }
    
    
    public function traiteDatas($datas)
    {
        $listeEspecesPs = collect();
        foreach($datas as $key => $data)
        {
            $infos = explode("_", $key);
            $ps_id = $infos[0];
            $espece_id = $infos[1];
            $listeEspecesPs->push(["ps_id" => $ps_id, "espece_id" => $espece_id]);
        }
        return $listeEspecesPs;
    }
    
    public function listeDatas($datas)
    {
        $listeEspecesPs = collect();
        foreach($datas as $key => $data)
        {
            $listeEspecesPs->push($key);
        }
        return $listeEspecesPs;
        
    }
}

