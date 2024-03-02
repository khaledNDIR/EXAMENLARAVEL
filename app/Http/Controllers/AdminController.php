<?php

namespace App\Http\Controllers;

use App\Models\Trajet;
use App\Models\Vehicule;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index() {
        $nombreVehiculesPoidsLeger = Vehicule::where('idCategorie', 1)->count();
        

        // Obtenir le nombre de véhicules poids lourd
        $nombreVehiculesPoidsLourd = Vehicule::where('idCategorie', 2)->count();
          
    
        return view('admin.indexAdmin', [
            'nombreVehiculesPoidsLeger' => $nombreVehiculesPoidsLeger,
            'nombreVehiculesPoidsLourd' => $nombreVehiculesPoidsLourd,
        ]);
    }

    public function indexTrajet(){
       
        $itineraire = Trajet::all();

        return  view('admin.trajet',['itineraires' => $itineraire ]);

    }


    public function store(Request $request) {

        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Assurez-vous que le fichier est une image et qu'il respecte les contraintes
            'trajet' => 'required|string',
            'tarif' => 'required|numeric',
        ]);
    
        // Enregistrer l'image dans le stockage
        $imagePath = null;
    if ($request->hasFile('image')) {
        $image = $request->file('image');
        $imagePath = time() . '_' . $image->getClientOriginalName();
        $image->move(public_path('images'), $imagePath); // Stockage de l'image dans le dossier public/images
    }
    
        // Créer un nouvel itinéraire
        $itineraire = new Trajet();
        $itineraire->itineraire = $imagePath; // Stockez le chemin de l'image dans la base de données
        $itineraire->trajet = $request->input('trajet');
        $itineraire->tarif = $request->input('tarif');
        $itineraire->save();
        
        return back();
    }
}
