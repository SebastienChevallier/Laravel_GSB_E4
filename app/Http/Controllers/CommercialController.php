<?php
namespace App\Http\Controllers;
use Request;
use App\Http\metier\Commercial;

class CommercialController extends Controller {

    public function login(){
        $login = Request::input('login');
        $pwd = Request::input('pwd');
        $unCommercial = new Commercial();
        $connected = $unCommercial->login($login, $pwd);
        if($connected){
            return view ('home');
        }
        else{
            $erreur = "login ou mot de passe inconnu ! ";
            return view('connexion', compact('erreur'));
        }
    }

    public function Logout(){
        $unCommercial =new Commercial();
        $unCommercial->logout();
        return view('home');
    }
}