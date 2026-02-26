<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function create()
    {
        return view('contact');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nom' => 'required|string|max:100',
            'email' => 'required|email|max:100',
            'telephone' => 'nullable|string|max:20',
            'sujet' => 'required|string|max:100',
            'message' => 'required|string|max:500',
            'rgpd' => 'accepted',
        ]);

        Contact::create([
            'nom' => $validated['nom'],
            'email' => $validated['email'],
            'telephone' => $validated['telephone'] ?? null,
            'sujet' => $validated['sujet'],
            'message' => $validated['message'],
            'status' => 'Non lu',
        ]);

        return redirect()->route('contact')
            ->with('success', 'Votre message a été envoyé avec succès ! Nous vous répondrons dans les 24h.');
    }
}
