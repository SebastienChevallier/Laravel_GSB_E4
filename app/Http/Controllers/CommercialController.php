<?php
namespace App\Http\Controllers;
use Request;
use App\Http\metier\Commercial;

class CommercialController extends Controller {


    public function getLogin(){
        $erreur = "";
        return view ('connexion', compact('erreur'));
    }

    public function signIn(){
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

    public function signOut(){
        $unVisiteur =new Visiteur();
        $unVisiteur->logout();
        return view('home');
    }
}