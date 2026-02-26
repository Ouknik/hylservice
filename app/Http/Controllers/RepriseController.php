<?php

namespace App\Http\Controllers;

use App\Models\Reprise;
use Illuminate\Http\Request;

class RepriseController extends Controller
{
    public function create()
    {
        return view('reprise');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'marque' => 'required|string|max:100',
            'modele' => 'required|string|max:100',
            'annee' => 'required|integer|min:1990|max:' . (date('Y') + 1),
            'kilometrage' => 'required|integer|min:0',
            'carburant' => 'required|in:Essence,Diesel,Électrique,Hybride,GPL',
            'etat' => 'required|in:Excellent,Bon,Moyen,Mauvais',
            'commentaires' => 'nullable|string|max:1000',
            'nom' => 'required|string|max:100',
            'email' => 'required|email|max:100',
            'telephone' => 'required|string|max:20',
            'ville' => 'nullable|string|max:100',
        ]);

        Reprise::create(array_merge($validated, ['status' => 'En attente']));

        return redirect()->route('reprise')
            ->with('success', 'Votre demande d\'évaluation a été envoyée avec succès ! Nous vous contacterons sous 24h.');
    }
}
