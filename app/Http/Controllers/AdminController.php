<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Contact;
use App\Models\Reprise;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function loginForm()
    {
        if (Auth::check()) {
            return redirect()->route('admin.dashboard');
        }
        return view('admin.login');
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials, $request->boolean('remember'))) {
            $request->session()->regenerate();
            return redirect()->intended(route('admin.dashboard'));
        }

        return back()->withErrors([
            'email' => 'Les identifiants fournis sont incorrects.',
        ])->onlyInput('email');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('admin.login');
    }

    public function dashboard()
    {
        $stats = [
            'vehicules' => Car::count(),
            'ventes' => Car::where('status', 'En attente')->count(),
            'reprises' => Reprise::count(),
            'contacts' => Contact::count(),
        ];

        $cars = Car::latest()->get();
        $allCars = $cars;
        $reprises = Reprise::latest()->get();
        $contacts = Contact::latest()->get();

        return view('admin.dashboard', compact('stats', 'cars', 'allCars', 'reprises', 'contacts'));
    }

    public function updateCarStatus(Request $request, Car $car)
    {
        $request->validate(['status' => 'required|in:En attente,Approuvé,Vendu,Rejeté']);
        $car->update(['status' => $request->status]);
        return back()->with('success', 'Statut mis à jour.');
    }

    public function destroyCar(Car $car)
    {
        $car->delete();
        return back()->with('success', 'Véhicule supprimé.');
    }

    public function updateRepriseStatus(Request $request, Reprise $reprise)
    {
        $request->validate(['status' => 'required|in:En attente,En cours,Traité,Rejeté']);
        $reprise->update(['status' => $request->status]);
        return back()->with('success', 'Statut mis à jour.');
    }

    public function updateContactStatus(Request $request, Contact $contact)
    {
        $request->validate(['status' => 'required|in:Non lu,Lu,Traité']);
        $contact->update(['status' => $request->status]);
        return back()->with('success', 'Statut mis à jour.');
    }
}
