<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;

class CarController extends Controller
{
    public function index(Request $request)
    {
        $query = Car::where('status', 'Approuvé');

        // Filters
        if ($request->filled('marque')) {
            $query->where('marque', 'like', '%' . $request->marque . '%');
        }
        if ($request->filled('prix_min')) {
            $query->where('prix', '>=', $request->prix_min);
        }
        if ($request->filled('prix_max')) {
            $query->where('prix', '<=', $request->prix_max);
        }
        if ($request->filled('annee')) {
            $query->where('annee', '>=', $request->annee);
        }
        if ($request->filled('carburant')) {
            $query->where('carburant', $request->carburant);
        }
        if ($request->filled('transmission')) {
            $query->where('transmission', $request->transmission);
        }
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('marque', 'like', "%{$search}%")
                  ->orWhere('modele', 'like', "%{$search}%");
            });
        }

        // Sorting
        $sort = $request->get('sort', 'recent');
        switch ($sort) {
            case 'prix_asc':
                $query->orderBy('prix', 'asc');
                break;
            case 'prix_desc':
                $query->orderBy('prix', 'desc');
                break;
            case 'annee':
                $query->orderBy('annee', 'desc');
                break;
            case 'km':
                $query->orderBy('kilometrage', 'asc');
                break;
            default:
                $query->latest();
                break;
        }

        $cars = $query->paginate(12);

        $marques = Car::where('status', 'Approuvé')
            ->select('marque')
            ->distinct()
            ->orderBy('marque')
            ->pluck('marque');

        return view('acheter.index', compact('cars', 'marques'));
    }

    public function show(Car $car)
    {
        return view('acheter.show', compact('car'));
    }
}
