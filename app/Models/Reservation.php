<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;
    protected $fillable = [
        'trajet_id',
        'client_id',
        // Ajoutez d'autres colonnes spécifiques à la réservation ici si nécessaire
    ];

    // Relation avec le modèle Trajet
    public function trajet()
    {
        return $this->belongsTo(Trajet::class);
    }

    // Relation avec le modèle Client
    public function client()
    {
        return $this->belongsTo(Client::class);
    }
}
