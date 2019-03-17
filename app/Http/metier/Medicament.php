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

    public function deleteArticle($id_medicament)
    {
        try {
            DB::table('medicament')->where('id_medicament', '=', $id_medicament)->delete();
        } catch (QueryException $e) {
            throw new MonException($e->getMessage(), 5);
        }
    }

    public function updateArticle($DESCART, $PRIXART, $PRIXLIVRAISON, $QTESTOCK) {
        try {
            DB::table('ARTICLE')->where('NUMART', '=', $NUMART)
                ->update(['DESCART' => $DESCART, 'PRIXART' => $PRIXART,'PRIXLIVRAISON' => $PRIXLIVRAISON,'QTESTOCK' => $QTESTOCK]);
        } catch (QueryException $e) {
            throw new MonException($e->getMessage(), 5);
        }
    }
}