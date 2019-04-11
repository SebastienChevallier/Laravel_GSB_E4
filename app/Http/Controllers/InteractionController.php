<?php
/**
 * Created by PhpStorm.
 * User: Sebastien Chevallier
 * Date: 28/03/2019
 * Time: 11:04
 */

namespace App\Http\Controllers;
use App\Http\metier\Interaction;
use App\Http\metier\Medicament;
use Exception;
use Illuminate\Support\Facades\Input;
use Request;
use Illuminate\Support\Facades\Session;

class InteractionController extends Controller
{
    public function getInteraction($id_medicament){
        try{
            $erreur = Session::get('erreur');
            Session::forget('erreur');
            $uneInteraction = new Interaction();
            $title = "Liste des interactions";
            $lesInteractions = $uneInteraction->getInteraction($id_medicament);
            return view('listerInteraction', compact('lesInteractions', 'erreur', 'title'));
        }catch (MonException $e){
            $monErreur = $e->getMessage();
            return view('error', compact('monErreur'));
        }catch (Exception $e){
            $monErreur = $e->getMessage();
            return view('error', compact('monErreur'));
        }
    }

    public function AjoutInteraction() {
        try {
            $erreur = "";
            $unMedicament = new Medicament();
            $mesMedicaments = $unMedicament->getMedicaments();
            $uneInteraction = new Interaction();
            $title = "Ajout d'une interaction";
            return view('formInteraction', compact('mesMedicaments', 'uneInteraction', 'title', 'erreur'));
        } catch (MonException $e) {
            $monErreur = $e->getMessage();
            return view('error', compact('monErreur'));
        } catch (Exception $e) {
            $monErreur = $e->getMessage();
            return view('error', compact('monErreur'));
        }
    }

    public function addInteraction(){
        try{
            $id_medicament = Request::input('medicament1');
            $med_id_medicament = Request::input('medicament2');


            $uneInteraction = new Interaction();
            $uneInteraction->insertInteraction($id_medicament, $med_id_medicament);
            $mesMedicaments = new Medicament();
            $mesMedicaments = $mesMedicaments->getMedicaments();
            $title = 'Liste de tous les medicaments';
            return view('listerMedicament',compact('title','mesMedicaments'));
        } catch(MonException $e) {
            $erreur = $e->getMessage();
            return view('error', compact('erreur'));
        } catch(Exception $e) {
            $erreur = $e->getMessage();
            return view('error', compact('erreur'));
        }
    }

    public function validateInteraction() {
        try {
            $id_medicament = Request::input('medicament1');
            $med_id_medicament = Request::input('medicament2');


            $uneInteraction = new Interaction();
            if($id_medicament > 0) {
                $uneInteraction->updateInteraction($id_medicament, $med_id_medicament);
            }
            else {
                $uneInteraction->insertInteraction($id_medicament, $med_id_medicament);
            }
            $mesMedicament = new Medicament();
            $mesMedicament = $mesMedicament->getMedicaments();
            $title = 'Liste de tous les medicaments';
            return view('listerMedicament',compact('title','mesMedicament'));
        } catch(MonException $e) {
            $erreur = $e->getMessage();
            return view('error', compact('erreur'));
        } catch(Exception $e) {
            $erreur = $e->getMessage();
            return view('error', compact('erreur'));
        }
    }

    public function updateInteraction($id_medicament, $med_id_medicament) {
        //TEST
        try {
            $erreur = "";
            $unMedic = new Interaction();
            $monInteraction = $unMedic->getUneInteraction($id_medicament, $med_id_medicament);
            $title = "Modification d'une Interaction";
            return view('formArticle', compact('monInteraction', 'title', 'erreur'));
        } catch (MonException $e) {
            $monErreur = $e->getMessage();
            return view('error', compact('monErreur'));
        } catch (Exception $e) {
            $monErreur = $e->getMessage();
            return view('error', compact('monErreur'));
        }
    }
}