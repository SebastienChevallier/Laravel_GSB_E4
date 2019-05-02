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

class Famille extends model
{
    protected $table = 'famille';
    public $timestamps = false;
    private $id_famille;
    protected $fillable = [
        'id_famille',
        'lib_famille'
    ];

    public function __construct()
    {
    }


    public function getFamille(){
        $lesFamilles = DB::table('famille')
            ->Select()
            ->get();
        return $lesFamilles;
    }
}