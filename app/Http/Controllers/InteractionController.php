<?php
/**
 * Created by PhpStorm.
 * User: Seb
 * Date: 17/03/2019
 * Time: 13:27
 */

namespace App\Http\Controllers;
use App\Http\metier\Interaction;
use App\Http\metier\medicament;
use Exception;
use Request;
use Illuminate\Support\Facades\Session;

class InteractionController extends Controller
{
    public function getInteraction($id_medicament){
        try{
            $erreur = Session::get('erreur');
            Session::forget('erreur');
            $uneInteraction = new Interaction();
            $mesInteractions = $uneInteraction->getInteractionMedicaments($id_medicament);
            return view('formInteraction', compact('mesInteractions', 'erreur'));
        }catch (MonException $e){
            $monErreur = $e->getMessage();
            return view('error', compact('monErreur'));
        }catch (Exception $e){
            $monErreur = $e->getMessage();
            return view('error', compact('monErreur'));
        }
    }
}