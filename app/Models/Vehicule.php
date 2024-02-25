<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicule extends Model
{
    use HasFactory;
    protected $fillable = [
        'marque',
        'date_achat',
        'KM_defaut',
        'matricule',
        'image',
        'idCategorie',
    ];
}
