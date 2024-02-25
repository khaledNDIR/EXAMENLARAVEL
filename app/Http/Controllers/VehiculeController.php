<?php

namespace App\Http\Controllers;

use App\Models\categorie;
use App\Models\Vehicule;
use Illuminate\Http\Request;

class VehiculeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categorie = Categorie::all();
        $vehicule = Vehicule::all();
        

        return view('admin.vehicule',['categories' => $categorie ,'vehicules'  => $vehicule]);
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
        'marque' => 'required|string',
        'date_achat' => 'required|date',
        'KM_defaut' => 'required|integer',
        'matricule' => 'required|string',
        'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Image validation
        'idCategorie' => 'required|exists:categories,id', // Vérifier que la catégorie existe
    ]);

    // Upload de l'image
    $imageName = null;
    if ($request->hasFile('image')) {
        $image = $request->file('image');
        $imageName = time() . '_' . $image->getClientOriginalName();
        $image->move(public_path('images'), $imageName); // Stockage de l'image dans le dossier public/images
    }

    // Création d'un nouveau véhicule avec les données du formulaire
    Vehicule::create([
        'marque' => $request->marque,
        'date_achat' => $request->date_achat,
        'KM_defaut' => $request->KM_defaut,
        'matricule' => $request->matricule,
        'image' => $imageName, // Nom de l'image stockée dans la base de données
        'idCategorie' => $request->idCategorie,
    ]);

    return redirect()->route('VH')->with('success', 'Véhicule ajouté avec succès!');
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
        $editVehicule = Vehicule::findOrFail($id);

        // Récupérer toutes les catégories pour le formulaire
        $categorie = Categorie::all();

        return view('admin.vehicule',['categories' => $categorie , 'editVehicule' => $editVehicule ]); 
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
      // Valider les données du formulaire
    $request->validate([
        'marque' => 'required|string',
        'date_achat' => 'required|date',
        'KM_defaut' => 'required|integer',
        'matricule' => 'required|string',
        'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Image validation
        'idCategorie' => 'required|exists:categories,id', // Vérifier que la catégorie existe
    ]);

    // Trouver le véhicule à mettre à jour
    $vehicule = Vehicule::findOrFail($id);

    // Upload de la nouvelle image si fournie
    if ($request->hasFile('image')) {
        $image = $request->file('image');
        $imageName = time() . '_' . $image->getClientOriginalName();
        $image->move(public_path('images'), $imageName); // Stockage de la nouvelle image dans le dossier public/images
        // Supprimer l'ancienne image si elle existe
        if ($vehicule->image) {
            unlink(public_path('images/' . $vehicule->image));
        }
        // Mettre à jour le nom de l'image dans la base de données
        $vehicule->image = $imageName;
    }

    // Mettre à jour les autres champs du véhicule
    $vehicule->marque = $request->marque;
    $vehicule->date_achat = $request->date_achat;
    $vehicule->KM_defaut = $request->KM_defaut;
    $vehicule->matricule = $request->matricule;
    $vehicule->idCategorie = $request->idCategorie;

    // Sauvegarder les modifications
    $vehicule->save();

    return redirect()->route('VH')->with('success', 'Véhicule modifier avec succès!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $vehicule = Vehicule::findOrFail($id);

        // Suppression du véhicule
        $vehicule->delete();

        return redirect()->route('VH')->with('success', 'Véhicule supprimer!');
    }
}
