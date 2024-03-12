<?php

use App\Http\Controllers\AcceuilController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ChauffeurController;
use App\Http\Controllers\VehiculeController;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Node\CrapIndex;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Route::get('/accueil', [AcceuilController::class,'index']);


/////PARTIE ADMIN
Route::get('/', [AdminController::class,'index']);
//VEHICULE
Route::get('/vehicule', [VehiculeController::class,'index'])->name('VH');
Route::post('/vehicule',[VehiculeController::class,'store'])->name('ajoutVehicule');
Route::put('/vehicule/{vehicule}',[VehiculeController::class,'update'])->name('updateVehicule');
Route::delete('/vehicule/{vehicule}',[VehiculeController::class,'destroy'])->name('deleteVehicule');
//CHAUFFEUR
Route::get('/chauffeur',[ChauffeurController::class,'index'])->name('CH');
Route::post('/chauffeur',[ChauffeurController::class,'store'])->name('ajoutChauffeur');
Route::put('/chauffeur/{chauffeur}',[ChauffeurController::class,'update'])->name('updateChauffeur');
Route::delete('/chauffeur/{chauffeur}',[ChauffeurController::class,'destroy'])->name('deleteChauffeur');

Route::get('/client',[AdminController::class,'infoClient'])->name('client');
Route::post('/client', [AcceuilController::class,'storeAll'])->name('infoClient');

Route::get('/facture',[AcceuilController::class,'facture'])->name('factures');
Route::get('/reservation/{trajet_id}', [AcceuilController::class,'inReserve'])->name('reservation');
Route::get('/trajet1',[AdminController::class,'indexTrajet'] );
Route::post('/trajet', [AdminController::class,'store'])->name('trajetTab');

Route::post('/evaluation', [ChauffeurController::class,'commentaire'])->name('evaluer');

Route::get('/avis', [AcceuilController::class,'avis'])->name('avis');