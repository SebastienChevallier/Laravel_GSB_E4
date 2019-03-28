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

    public function addInteraction() {
        try {
            $erreur = "";
            $unArticle = new Interaction();
            $title = "Ajout d'une interaction";
            return view('formInteraction', compact('unArticle', 'title', 'erreur'));
        } catch (MonException $e) {
            $monErreur = $e->getMessage();
            return view('error', compact('monErreur'));
        } catch (Exception $e) {
            $monErreur = $e->getMessage();
            return view('error', compact('monErreur'));
        }
    }

    public function validateInteraction() {
        try {
            $id_medicament = Request::input('id_medicament');
            $med_id_medicament = Request::input('med_id_medicament');


            $unArticle = new Article();
            if($id_medicament > 0) {
                $unArticle->updateInteraction($id_medicament, $med_id_medicament);
            }
            else {
                $unArticle->insertInteraction($id_medicament, $med_id_medicament);
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
}