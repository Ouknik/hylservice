<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    protected $fillable = [
        'marque',
        'modele',
        'annee',
        'prix',
        'kilometrage',
        'carburant',
        'transmission',
        'couleur',
        'description',
        'image',
        'images',
        'vendeur_nom',
        'vendeur_email',
        'vendeur_telephone',
        'vendeur_ville',
        'status',
    ];

    protected $casts = [
        'images' => 'array',
        'prix' => 'decimal:2',
    ];
}
