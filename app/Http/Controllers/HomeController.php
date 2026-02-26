<?php

namespace App\Http\Controllers;

use App\Models\Car;

class HomeController extends Controller
{
    public function index()
    {
        $featuredCars = Car::where('status', 'Approuvé')
            ->latest()
            ->take(6)
            ->get();

        $stats = [
            'vehicles' => Car::where('status', 'Approuvé')->count(),
            'clients' => Car::distinct('vendeur_email')->count('vendeur_email'),
            'sold' => Car::where('status', 'Vendu')->count(),
        ];

        return view('home', compact('featuredCars', 'stats'));
    }
}
