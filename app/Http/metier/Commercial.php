<?php
namespace App\Http\metier;
use Illuminate\Support\Facades\Session;
use Illuminate\Database\Eloquent\Model;
use DB;

class Commercial extends Model{
    protected $table = 'visiteur';
    public $timestamps =  false;
    protected $fillable = [
        'id_visiteur',
        'id_laboratoire',
        'id_secteur',
        'nom_visiteur',
        'prenom_visiteur',
        'adresse_visiteur',
        'cp_visiteur',
        'ville_visiteur',
        'date_embauche',
        'login_visiteur',
        'pwd_visiteur',
        'type_visiteur',
    ];

    public function login($login, $pwd){
        $connected = false;
        $visiteur = DB::table('visiteur')
            ->select()
            ->where('login_visiteur', '=', $login)
            ->first();
        if($visiteur){
            if($visiteur->pwd_visiteur == $pwd){
                Session::put('id', $visiteur->id_visiteur);
                $connected = true;
            }
        }
        return $connected;
    }

    public function logout(){
        Session::put('id', 0);
    }
}