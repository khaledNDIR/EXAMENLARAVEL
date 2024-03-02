<?php

namespace App\Http\Controllers;

use App\Models\categorie;
use App\Models\Trajet;
use Illuminate\Http\Request;

class AcceuilController extends Controller
{
    public function index() {
        
        $itineraire = Trajet::all();
        
        
        return  view('frontEnd.index',['itineraires' => $itineraire]);
    }


    public function inReserve(){
        $categorie = Categorie::all();
        return  view('frontEnd.reservation',['categories' => $categorie ]);
    }
}
