<?php

namespace App\Http\Controllers;

session_start();

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CompteEController extends Controller
{

      public function accueil(){
        if(isset($_SESSION['connecte']) and preg_match("#^administrateurs$#", $_SESSION['connecte']) and isset($_SESSION['id'])){
          $data = DB::table('administrateurs')->select('nom', 'prenom', 'email')->where('id', $_SESSION['id'])->get();
          //la personne est tojours connectée
          return view ('administrateurs', [
            'data' => $data
          ]);
        }

        return view('connexionE');
      }

      public function deconnexion()
      {
        if(isset($_SESSION['connecte'])){
          unset($_SESSION['connecte']);
        }

        return redirect ('/');
      }
}
