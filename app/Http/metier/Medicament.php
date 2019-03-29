<?php
/**
 * Created by PhpStorm.
 * User: S.Chevallier
 * Date: 14/03/2019
 * Time: 15:10
 */

namespace App\Http\metier;
use Illuminate\Database\Eloquent\Model;
use DB;

class Medicament extends model
{
    protected $table = 'medicament';
    public $timestamps = false;
    private $id_medicament;
    protected $fillable = [
        'id_medicament',
        'id_famille',
        'depot_legal',
        'nom_commercial',
        'effets',
        'contre_indication',
        'prix_echantillon'
    ];

    public function __construct()
    {
    }

    public function getMedicaments(){
        $lesMedicaments = DB::table('medicament')
            ->Select()
            ->join('famille', 'medicament.id_famille', '=', 'famille.id_famille')
            ->get();
        return $lesMedicaments;
    }

    public function getMedicamentsParFamille($id_famille){
        $lesMedicaments = DB::table('medicament')
            ->Select()
            ->where('id_famille','=',$id_famille)
            ->join('famille', 'medicament.id_famille', '=', 'famille.id_famille')
            ->get();
        return $lesMedicaments;
    }

    public function getMedicamentsParNom($nom_medicament){
        $lesMedicaments = DB::table('medicament')
            ->Select()
            ->where('nom_commercial','=',$nom_medicament)
            ->join('famille', 'medicament.id_famille', '=', 'famille.id_famille')
            ->get();
        return $lesMedicaments;
    }

    public function getInteractionMedicaments($id_medicament){
        $lesInteraction = DB::table('interaction')
            ->Select()
            ->join('medicament', 'medicament.id_medicament', '=', $id_medicament)
            ->get();
        return $lesInteraction;
    }
}