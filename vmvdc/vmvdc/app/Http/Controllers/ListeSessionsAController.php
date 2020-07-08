<?php

namespace App\Http\Controllers;

session_start();

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ListeSessionsAController extends Controller
{

  public function sessionsA()
  {
      //dd("coucou");
      $sessions = DB::table('sessions')->select('date', 'id', 'heure', 'idClasse', 'effectifMax')->get();
      return view('listeSessionsA', [
          'sessions' => $sessions,
      ]);
  }


}