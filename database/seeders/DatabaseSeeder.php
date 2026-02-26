<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Car;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create admin user
        User::create([
            'name' => 'Admin HYL',
            'email' => 'admin@hylservice.ma',
            'password' => Hash::make('admin123'),
        ]);

        // Seed sample cars
        $cars = [
            [
                'marque' => 'Mercedes-Benz', 'modele' => 'Classe C 220d', 'annee' => 2022,
                'prix' => 380000, 'kilometrage' => 25000, 'carburant' => 'Diesel',
                'transmission' => 'Automatique', 'couleur' => 'Noir',
                'description' => 'Mercedes Classe C en excellent état, full options, toit ouvrant, caméra de recul, GPS.',
                'vendeur_nom' => 'HYL Service', 'vendeur_email' => 'contact@hylservice.ma',
                'vendeur_telephone' => '+212522112323', 'vendeur_ville' => 'Casablanca', 'status' => 'Approuvé',
            ],
            [
                'marque' => 'BMW', 'modele' => 'Série 3 320i', 'annee' => 2021,
                'prix' => 320000, 'kilometrage' => 35000, 'carburant' => 'Essence',
                'transmission' => 'Automatique', 'couleur' => 'Blanc',
                'description' => 'BMW Série 3 avec pack M Sport, intérieur cuir, jantes 19 pouces.',
                'vendeur_nom' => 'HYL Service', 'vendeur_email' => 'contact@hylservice.ma',
                'vendeur_telephone' => '+212522112323', 'vendeur_ville' => 'Casablanca', 'status' => 'Approuvé',
            ],
            [
                'marque' => 'Audi', 'modele' => 'A4 2.0 TDI', 'annee' => 2020,
                'prix' => 280000, 'kilometrage' => 45000, 'carburant' => 'Diesel',
                'transmission' => 'Automatique', 'couleur' => 'Gris',
                'description' => 'Audi A4 S-Line, virtual cockpit, sièges sport, LED Matrix.',
                'vendeur_nom' => 'HYL Service', 'vendeur_email' => 'contact@hylservice.ma',
                'vendeur_telephone' => '+212522112323', 'vendeur_ville' => 'Casablanca', 'status' => 'Approuvé',
            ],
            [
                'marque' => 'Volkswagen', 'modele' => 'Golf 8 GTI', 'annee' => 2023,
                'prix' => 420000, 'kilometrage' => 10000, 'carburant' => 'Essence',
                'transmission' => 'Automatique', 'couleur' => 'Rouge',
                'description' => 'Golf 8 GTI presque neuve, garantie constructeur encore valide.',
                'vendeur_nom' => 'HYL Service', 'vendeur_email' => 'contact@hylservice.ma',
                'vendeur_telephone' => '+212522112323', 'vendeur_ville' => 'Casablanca', 'status' => 'Approuvé',
            ],
            [
                'marque' => 'Renault', 'modele' => 'Clio 5', 'annee' => 2022,
                'prix' => 150000, 'kilometrage' => 20000, 'carburant' => 'Essence',
                'transmission' => 'Manuelle', 'couleur' => 'Bleu',
                'description' => 'Renault Clio 5 Intens, écran tactile, caméra de recul, régulateur adaptatif.',
                'vendeur_nom' => 'Ahmed Benali', 'vendeur_email' => 'ahmed@example.com',
                'vendeur_telephone' => '+212612345678', 'vendeur_ville' => 'Rabat', 'status' => 'Approuvé',
            ],
            [
                'marque' => 'Dacia', 'modele' => 'Duster', 'annee' => 2023,
                'prix' => 200000, 'kilometrage' => 15000, 'carburant' => 'Diesel',
                'transmission' => 'Manuelle', 'couleur' => 'Vert',
                'description' => 'Dacia Duster Journey, GPS, climatisation auto, 4x2.',
                'vendeur_nom' => 'Sara Idrissi', 'vendeur_email' => 'sara@example.com',
                'vendeur_telephone' => '+212698765432', 'vendeur_ville' => 'Marrakech', 'status' => 'Approuvé',
            ],
            [
                'marque' => 'Peugeot', 'modele' => '3008 GT', 'annee' => 2021,
                'prix' => 350000, 'kilometrage' => 30000, 'carburant' => 'Diesel',
                'transmission' => 'Automatique', 'couleur' => 'Noir',
                'description' => 'Peugeot 3008 GT Line, i-Cockpit, toit panoramique, grip control.',
                'vendeur_nom' => 'HYL Service', 'vendeur_email' => 'contact@hylservice.ma',
                'vendeur_telephone' => '+212522112323', 'vendeur_ville' => 'Casablanca', 'status' => 'Approuvé',
            ],
            [
                'marque' => 'Toyota', 'modele' => 'Corolla Hybride', 'annee' => 2023,
                'prix' => 290000, 'kilometrage' => 8000, 'carburant' => 'Hybride',
                'transmission' => 'Automatique', 'couleur' => 'Blanc',
                'description' => 'Toyota Corolla Hybride 122h, consommation ultra basse, fiabilité japonaise.',
                'vendeur_nom' => 'HYL Service', 'vendeur_email' => 'contact@hylservice.ma',
                'vendeur_telephone' => '+212522112323', 'vendeur_ville' => 'Casablanca', 'status' => 'Approuvé',
            ],
        ];

        foreach ($cars as $car) {
            Car::create($car);
        }
    }
}
