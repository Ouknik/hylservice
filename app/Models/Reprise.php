<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reprise extends Model
{
    protected $fillable = [
        'marque',
        'modele',
        'annee',
        'kilometrage',
        'carburant',
        'etat',
        'commentaires',
        'nom',
        'email',
        'telephone',
        'ville',
        'status',
    ];
}
