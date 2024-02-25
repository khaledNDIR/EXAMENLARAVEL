<?php

namespace App\Http\Controllers;

use App\Models\categorie;
use App\Models\Chauffeur;
use Illuminate\Http\Request;

class ChauffeurController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categorie = categorie::all();
        $chauffeur = Chauffeur::all();
        

        return view('admin.chauffeur',['categories' => $categorie ,'chauffeurs'  => $chauffeur]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
           // Valider les données du formulaire
    $request->validate([
        'nom' => 'required|string',
        'prenom' => 'required|string',
        'experience' => 'required|integer',
        'numero_permit' => 'required|string',
        'date_emission' => 'required|date',
        'date_expiration' => 'required|date',
        'idCategorie' => 'required|exists:categories,id', // Vérifier que la catégorie existe
    ]);

    // Créer un nouveau chauffeur avec les données du formulaire
    Chauffeur::create([
        'nom' => $request->nom,
        'prenom' => $request->prenom,
        'experience' => $request->experience,
        'numero_permit' => $request->numero_permit,
        'date_emission' => $request->date_emission,
        'date_expiration' => $request->date_expiration,
        'idCategorie' => $request->idCategorie,
    ]);

    return redirect()->route('CH')->with('success', 'Véhicule ajouté avec succès!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
          // Recherche du chauffeur à supprimer
    $chauffeur = Chauffeur::findOrFail($id);

    // Suppression du chauffeur
    $chauffeur->delete();

    // Redirection avec un message de succès ou vers toute autre action que vous souhaitez
    return redirect()->back()->with('success', 'Chauffeur supprimé avec succès!');
    }
}
