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
    protected $table = 'interaction';
    public $timestamps = false;
    protected $fillable = [
        'id_medicament',
        'med_id_medicament'
    ];

    public function __construct()
    {
    }

    public function getInteractionMedicaments($id_medicament){
        $lesInteraction = DB::table('interaction')
            ->Select()
            ->join('medicament', 'medicament.id_medicament', '=', $id_medicament)
            ->get();
        return $lesInteraction;
    }

    public function deleteInteraction($med_id_medicament)
    {
        try {
            DB::table('interaction')->where('med_id_medicament', '=', $med_id_medicament)->delete();
        } catch (QueryException $e) {
            throw new MonException($e->getMessage(), 5);
        }
    }

    public function updateMedicament($id_medicament, $med_id_medicament) {
        try {
            DB::table('medicament')->where('id_medicament', '=', $id_medicament)
                ->update(['med_id_medicament' => $med_id_medicament]);
        } catch (QueryException $e) {
            throw new MonException($e->getMessage(), 5);
        }
    }
}