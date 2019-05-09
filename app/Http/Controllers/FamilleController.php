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

class FamilleController extends Controller
{
    public function getFamille(){
        try{

            $uneFamille = new Famille();
            $mesFamilles = $uneFamille->getFamille();
            $title = "Rechercher par famille";
            return view('formMedicFamille', compact('mesFamilles', 'erreur', 'title'));
        }catch (MonException $e){
            $monErreur = $e->getMessage();
            return view('error', compact('monErreur'));
        }catch (Exception $e){
            $monErreur = $e->getMessage();
            return view('error', compact('monErreur'));
        }
    }


}