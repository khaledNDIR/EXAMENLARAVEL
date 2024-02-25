<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chauffeur extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'nom', 'prenom', 'experience', 'numero_permit', 'date_emission', 'date_expiration', 'idCategorie'
    ];

    public function categorie()
    {
        return $this->belongsTo('App\Categorie', 'idCategorie');
    }
}
