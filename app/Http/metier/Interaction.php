<?php
/**
 * Created by PhpStorm.
 * User: S.Chevallier
 * Date: 14/03/2019
 * Time: 15:12
 */

namespace App\Http\metier;
use Illuminate\Database\Eloquent\Model;
use DB;

class Interaction extends model
{
    protected $table = 'interagir';
    public $timestamps = false;
    private $id_medicament;
    protected $fillable = [
        'id_medicament',
        'med_id_medicament'
    ];

    public function getInteraction($id_medicament)
    {
        $lesInteractions = DB::table('medicament')
            ->Select()
            ->join('interagir', 'medicament.id_medicament', '=', 'interagir.med_id_medicament')
            ->where('interagir.id_medicament', '=', $id_medicament)
            ->get();
        return $lesInteractions;

    }

    public function getUneInteraction($id_medicament, $med_id_medicament)
    {
        $lesInteractions = DB::table('interagir')
            ->Select()
            ->join('medicament', 'medicament.id_medicament', '=', 'interagir.med_id_medicament')
            ->where('interagir.id_medicament', '=', $id_medicament)
            ->where('interagir.med_id_medicament', '=', $med_id_medicament)
            ->get();
        return $lesInteractions;

    }


    public function addInteraction($id_medicament, $med_id_medicament)
    {
        try {
            DB::table('INTERAGIR')->insert(
                [
                    'id_medicament'=>$id_medicament,
                    'med_id_medicament'=>$med_id_medicament]

            );
        } catch (QueryException $e) {
            $e->getMessage();
        }
    }

    public function updateInteraction($id_medicament, $med_id_medicament) {
        try {
            DB::table('interagir')->where('id_medicament', '=', $id_medicament)
                ->update(['med_id_medicament' => $med_id_medicament]);
        } catch (QueryException $e) {
            $erreur =  $e->getMessage();
        }
    }
    public function insertInteraction($id_medicament, $med_id_medicament){
        try {
            DB::table('interagir')->insert(
                [
                    'id_medicament'=>$id_medicament,
                    'med_id_medicament'=> $med_id_medicament]
            );
        } catch (QueryException $e) {
            $e->getMessage();
        }
    }
}