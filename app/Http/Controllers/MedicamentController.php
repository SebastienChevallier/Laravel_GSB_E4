<?php
/**
 * Created by PhpStorm.
 * User: S.Chevallier
 * Date: 14/03/2019
 * Time: 15:28
 */

namespace App\Http\Controllers;
use App\Http\metier\Medicaments;
use Exception;
use Request;
use Illuminate\Support\Facades\Session;

class MedicamentController extends Controller
{
    public function getMedicaments(){
        try{
            $erreur = Session::get('erreur');
            Session::forget('erreur');
            $unMedicament = new Medicaments();
            $mesMedicaments = $unMedicament->getMedicaments();
            return view('listerMedicament', compact('mesMedicaments', 'erreur'));
        }catch (MonException $e){
            $monErreur = $e->getMessage();
            return view('error', compact('monErreur'));
        }catch (Exception $e){
            $monErreur = $e->getMessage();
            return view('error', compact('monErreur'));
        }
    }
}