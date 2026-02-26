<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class VendreController extends Controller
{
    public function create()
    {
        return view('vendre');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'marque' => 'required|string|max:100',
            'modele' => 'required|string|max:100',
            'annee' => 'required|integer|min:1990|max:' . (date('Y') + 1),
            'prix' => 'required|numeric|min:0',
            'kilometrage' => 'required|integer|min:0',
            'carburant' => 'required|in:Essence,Diesel,Électrique,Hybride,GPL',
            'transmission' => 'required|in:Manuelle,Automatique',
            'couleur' => 'nullable|string|max:50',
            'description' => 'nullable|string|max:1000',
            'vendeur_nom' => 'required|string|max:100',
            'vendeur_email' => 'required|email|max:100',
            'vendeur_telephone' => 'required|string|max:20',
            'vendeur_ville' => 'nullable|string|max:100',
            'image_principale' => 'nullable|image|max:5120',
            'images.*' => 'nullable|image|max:5120',
        ]);

        // Handle main image
        $imagePath = null;
        if ($request->hasFile('image_principale')) {
            $imagePath = $request->file('image_principale')->store('cars', 'public');
        }

        // Handle additional images
        $additionalImages = [];
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $additionalImages[] = $image->store('cars', 'public');
            }
        }

        Car::create([
            'marque' => $validated['marque'],
            'modele' => $validated['modele'],
            'annee' => $validated['annee'],
            'prix' => $validated['prix'],
            'kilometrage' => $validated['kilometrage'],
            'carburant' => $validated['carburant'],
            'transmission' => $validated['transmission'],
            'couleur' => $validated['couleur'] ?? null,
            'description' => $validated['description'] ?? null,
            'vendeur_nom' => $validated['vendeur_nom'],
            'vendeur_email' => $validated['vendeur_email'],
            'vendeur_telephone' => $validated['vendeur_telephone'],
            'vendeur_ville' => $validated['vendeur_ville'] ?? null,
            'image' => $imagePath,
            'images' => !empty($additionalImages) ? $additionalImages : null,
            'status' => 'En attente',
        ]);

        return redirect()->route('vendre')
            ->with('success', 'Votre annonce a été soumise avec succès ! Elle sera publiée après validation.');
    }
}
