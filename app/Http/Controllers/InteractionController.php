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

    public function supprInteraction($id_medicament, $med_id_medicament){
        try{

            $uneInteraction = new Interaction();
            $uneInteraction->supprInteraction($id_medicament, $med_id_medicament);
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
            $medid = Request::input('medid');


            $uneInteraction = new Interaction();
            $uneInteraction->updateInteraction($id_medicament, $med_id_medicament, $medid);

            $mesMedicament = new Medicament();
            $mesMedicaments = $mesMedicament->getMedicaments();
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

    public function updateInteraction($id_medicament, $med_id_medicament) {
        //TEST
        try {
            $erreur = "";
            $unMedic = new Interaction();
            $monInteraction = $unMedic->getUneInteraction($id_medicament, $med_id_medicament);

            $mesMedicaments = new medicament();
            $mesMedicaments = $mesMedicaments->getMedicaments();

            $monMedicament = new medicament();
            $monMedicament = $monMedicament->getMedicamentsParId($id_medicament);
            $title = "Modification d'une Interaction";
            return view('formInteraction', compact('monInteraction','monMedicament', 'mesMedicaments',"med_id_medicament",'title', 'erreur'));
        } catch (MonException $e) {
            $monErreur = $e->getMessage();
            return view('error', compact('monErreur'));
        } catch (Exception $e) {
            $monErreur = $e->getMessage();
            return view('error', compact('monErreur'));
        }
    }
}