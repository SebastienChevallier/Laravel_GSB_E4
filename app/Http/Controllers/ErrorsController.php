<?php

namespace App\Http\Controllers;
use Request;
use Illuminate\Support\Facades\Session;
use Exception;

class ErrorsController extends Controller {

    /**
     * Affiche le message d'erreur passé en paramètre
     * Récupère dans la session l'URL de retour
     * @param type $retour : url de retour
     * @return type Vue errors
     */
    public function getErreurs($retour) {
        $erreur = Session::get('erreur');
        Session::forget('erreur');
        return view('error', compact('erreur', 'retour'));
    }

}
