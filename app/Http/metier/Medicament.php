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
            ->get();
        return $lesMedicaments;
    }
}