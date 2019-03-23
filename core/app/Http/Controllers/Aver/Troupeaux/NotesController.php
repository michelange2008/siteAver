<?php

namespace App\Http\Controllers\Aver\Troupeaux;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Note;
use App\Models\Troupeau;
use Carbon\Carbon;

class NotesController extends Controller
{

    public function index($user_id, $troupeau_id)
    {
      $notes = Note::where('troupeau_id', $troupeau_id)
                      ->orderBy('updated_at', 'desc')
                      ->get();

      $troupeau = Troupeau::find($troupeau_id);

      return view('aver.troupeaux.notes', [
        'troupeau' => $troupeau,
        'notes' => $notes,
      ]);
    }

    public function note($note_id)
    {
      $note = Note::find($note_id);
      return response()->json([
        'texte' => $note->texte
      ]);
    }

    public function delete($note_id)
    {
      Note::destroy($note_id);
      return response()->json(['reponse' => 'C OK']);
    }
    public function modifieNote(Request $request)
    {
      $datas = $request->all();

      $note = Note::find($datas['note_id']);

      $note->texte = $datas['texte'];

      $note->save();

      return response()->json([
        "title" => $note->id
      ]);

    }
}
