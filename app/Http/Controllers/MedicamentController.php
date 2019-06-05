<?php
/**
 * Created by PhpStorm.
 * User: S.Chevallier
 * Date: 14/03/2019
 * Time: 15:28
 */

namespace App\Http\Controllers;
use App\Http\metier\Medicament;
use App\Http\metier\Famille;
use Exception;
use Request;
use Illuminate\Support\Facades\Session;

class MedicamentController extends Controller
{
    public function getMedicaments(){
        try{
            $erreur = Session::get('erreur');
            Session::forget('erreur');
            $unMedicament = new Medicament();
            $uneFamille = new Famille();
            $mesFamilles = $uneFamille->getFamille();
            $title = "Liste des medicaments";
            $mesMedicaments = $unMedicament->getMedicaments();
            return view('listerMedicament', compact('mesMedicaments','mesFamilles', 'erreur', 'title'));
        }catch (MonException $e){
            $monErreur = $e->getMessage();
            return view('error', compact('monErreur'));
        }catch (Exception $e){
            $monErreur = $e->getMessage();
            return view('error', compact('monErreur'));
        }
    }

    public function getUnMedicament(){
        try{
            $id_medicament = Request::get('nom');
            $erreur = Session::get('erreur');
            Session::forget('erreur');
            $title = 'Resultat';
            $unMedicament = new Medicament();
            $mesMedicaments = $unMedicament->getMedicamentsParId($id_medicament);
            return view('listerMedicament', compact('mesMedicaments','title', 'erreur'));
        }catch (MonException $e){
            $monErreur = $e->getMessage();
            return view('error', compact('monErreur'));
        }catch (Exception $e){
            $monErreur = $e->getMessage();
            return view('error', compact('monErreur'));
        }
    }

    public function getMedicamentsParNom(){
        try{
            $erreur = Session::get('erreur');
            Session::forget('erreur');
            $unMedicament = new Medicament();
            $title = "Liste des medicaments";
            $mesMedicaments = $unMedicament->getMedicaments();
            return view('formMedicNom', compact('mesMedicaments', 'erreur', 'title'));
        }catch (MonException $e){
            $monErreur = $e->getMessage();
            return view('error', compact('monErreur'));
        }catch (Exception $e){
            $monErreur = $e->getMessage();
            return view('error', compact('monErreur'));
        }
    }

    public function getMedicamentsParFamille(){
        try{
            $erreur = Session::get('erreur');
            Session::forget('erreur');
            $title = 'Resultat';
            $id_famille = Request::input('famille');
            $unMedicament = new Medicament();
            $mesMedicaments = $unMedicament->getMedicamentsParFamille($id_famille);
            return view('listerMedicament', compact('mesMedicaments', 'erreur', 'title'));
        }catch (MonException $e){
            $monErreur = $e->getMessage();
            return view('error', compact('monErreur'));
        }catch (Exception $e){
            $monErreur = $e->getMessage();
            return view('error', compact('monErreur'));
        }
    }
}