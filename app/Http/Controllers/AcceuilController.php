<?php

namespace App\Http\Controllers;

use App\Models\categorie;
use App\Models\Chauffeur;
use App\Models\Client;
use App\Models\Commentaire;
use App\Models\Reservation;
use App\Models\Trajet;
use App\Models\Vehicule;
use Illuminate\Http\Request;

class AcceuilController extends Controller
{
    public function index() {
        
        $itineraire = Trajet::all();
        $chauffeur = Chauffeur::all();
        
        
        return  view('frontEnd.index',['itineraires' => $itineraire , 'chauffeurs'=> $chauffeur ]);
    }


    public function inReserve($trajet_id){
        $categorie = Categorie::all();

        return  view('frontEnd.reservation',['categories' => $categorie ,'trajet_id' => $trajet_id]);
    }


    public function avis(){

        $commentaire = Commentaire::all();

        return view('frontEnd.avisClient',['commentaires' => $commentaire]);
    }



    public function storeAll(Request $request){

        $validatedData = $request->validate([
            'nom' => 'required|string',
            'prenom' => 'required|string',
            'telephone' => 'required|string',
            'adresse' => 'required|string',
            'date' => 'required|date',
            'heure' => 'required|date_format:H:i', // Assure que l'heure est au bon format
            'nombre_place' => 'required|integer',
            'idCategorie' => 'required|exists:categories,id', // Vérifie que la catégorie existe dans la table categories
        ]);
    
     
    // Créez un nouvel enregistrement dans la table clients
    $client = new Client();
    $client->nom = $request->input('nom');
    $client->prenom = $request->input('prenom');
    $client->telephone = $request->input('telephone');
    $client->adresse = $request->input('adresse');
    $client->date = $request->input('date');
    $client->heure = $request->input('heure');
    $client->nombre_place = $request->input('nombre_place');
    $client->idCategorie = $request->input('idCategorie');
    $client->save();

    // Trouvez le véhicule correspondant
    $vehicule = Vehicule::where('idCategorie', $request->input('idCategorie'))
                         ->where('surTerrain', false)
                         ->inRandomOrder()
                         ->first();

    if (!$vehicule) {
        return redirect()->back()->with('error', 'Aucun véhicule disponible dans cette catégorie.');
    }

    // Mettez à jour le statut surTerrain du véhicule
    $vehicule->surTerrain = true;
    $vehicule->save();

    // Créez une réservation
    $reservation = new Reservation();
    $reservation->trajet_id = $request->input('trajet_id'); // Si l'ID du trajet est inclus dans le formulaire
    $reservation->client_id = $client->id;
    // Ajoutez d'autres champs de la réservation si nécessaire
    $reservation->save();

    return redirect()->route('factures')->with('success', 'Client ajouté et réservation effectuée avec succès.');
    }



    public function facture() {
    
        $reservation = Reservation::latest()->first();

        // Passez les détails à la vue
        return view('frontEnd.facture', ['reservation' => $reservation]);
      }
}

    
   