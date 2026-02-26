@extends('layouts.app')

@section('title', 'Reprise - HYL Service')

@section('content')
    <!-- PAGE HEADER LUXURY -->
    <section class="page-header-luxury">
        <div class="luxury-overlay"></div>
        <div class="container">
            <div class="luxury-header-content">
                <span class="luxury-badge">
                    <i class="fas fa-gift"></i> Évaluation Gratuite
                </span>
                <h1 class="luxury-title">
                    <i class="fas fa-exchange-alt"></i>
                    Service de Reprise
                </h1>
                <p class="luxury-subtitle">
                    Obtenez le meilleur prix pour votre véhicule en quelques minutes
                </p>
                <div class="luxury-features">
                    <div class="luxury-feature-item">
                        <i class="fas fa-calculator"></i>
                        <span>Estimation gratuite</span>
                    </div>
                    <div class="luxury-feature-item">
                        <i class="fas fa-handshake"></i>
                        <span>Prix équitable</span>
                    </div>
                    <div class="luxury-feature-item">
                        <i class="fas fa-bolt"></i>
                        <span>Réponse en 24h</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Main Content -->
    <main class="vendre-main">
        <div class="container">

            @if(session('success'))
                <div class="alert alert-success" style="background: #d4edda; color: #155724; padding: 1rem 1.5rem; border-radius: 8px; margin-bottom: 2rem; border-left: 4px solid #28a745;">
                    <i class="fas fa-check-circle"></i> {{ session('success') }}
                </div>
            @endif

            @if($errors->any())
                <div class="alert alert-danger" style="background: #f8d7da; color: #721c24; padding: 1rem 1.5rem; border-radius: 8px; margin-bottom: 2rem; border-left: 4px solid #dc3545;">
                    <ul style="margin: 0; padding-left: 1.2rem;">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            
            <!-- SECTION: Comment ça marche -->
            <section class="reprise-info">
                <h3>Comment fonctionne la reprise ?</h3>
                <div class="steps">
                    <div class="step">
                        <h4>Étape 1: Évaluation</h4>
                        <p>Nous évaluons votre véhicule gratuitement selon son état, année, kilométrage et historique.</p>
                    </div>
                    <div class="step">
                        <h4>Étape 2: Proposition</h4>
                        <p>Nous vous proposons une valeur de reprise équitable et transparente.</p>
                    </div>
                    <div class="step">
                        <h4>Étape 3: Échange</h4>
                        <p>Échangez votre ancien véhicule contre une nouvelle voiture ou recevez le montant en espèces.</p>
                    </div>
                    <div class="step">
                        <h4>Étape 4: Finalisation</h4>
                        <p>Nous nous chargeons de tous les documents administratifs.</p>
                    </div>
                </div>
            </section>

            <!-- FORMULAIRE DE REPRISE -->
            <form action="{{ route('reprise.store') }}" method="POST" class="form-vente-luxury">
                @csrf
                
                <!-- SECTION 1: Informations du Véhicule -->
                <div class="form-section-luxury">
                    <div class="section-header-luxury">
                        <div class="section-icon">
                            <i class="fas fa-car"></i>
                        </div>
                        <div class="section-title-group">
                            <h3>Informations du Véhicule</h3>
                            <p>Renseignez les détails de votre voiture pour obtenir une estimation</p>
                        </div>
                    </div>

                    <div class="form-grid">
                        <div class="form-group-luxury">
                            <label for="marque">
                                <i class="fas fa-industry"></i> Marque
                            </label>
                            <input type="text" name="marque" id="marque" value="{{ old('marque') }}" placeholder="Ex: Mercedes, BMW, Audi..." required>
                        </div>

                        <div class="form-group-luxury">
                            <label for="modele">
                                <i class="fas fa-car-side"></i> Modèle
                            </label>
                            <input type="text" name="modele" id="modele" value="{{ old('modele') }}" placeholder="Ex: Classe C, Série 3..." required>
                        </div>

                        <div class="form-group-luxury">
                            <label for="annee">
                                <i class="fas fa-calendar-alt"></i> Année de Mise en Circulation
                            </label>
                            <input type="number" name="annee" id="annee" value="{{ old('annee') }}" placeholder="2020" min="1990" max="2026" required>
                        </div>

                        <div class="form-group-luxury">
                            <label for="kilometrage">
                                <i class="fas fa-tachometer-alt"></i> Kilométrage (km)
                            </label>
                            <input type="number" name="kilometrage" id="kilometrage" value="{{ old('kilometrage') }}" placeholder="50000" min="0" required>
                        </div>

                        <div class="form-group-luxury">
                            <label for="carburant">
                                <i class="fas fa-gas-pump"></i> Type de Carburant
                            </label>
                            <select name="carburant" id="carburant" required>
                                <option value="">-- Sélectionner --</option>
                                @foreach(['Essence', 'Diesel', 'Électrique', 'Hybride', 'GPL'] as $fuel)
                                    <option value="{{ $fuel }}" {{ old('carburant') == $fuel ? 'selected' : '' }}>{{ $fuel }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group-luxury">
                            <label for="etat">
                                <i class="fas fa-star"></i> État Général
                            </label>
                            <select name="etat" id="etat" required>
                                <option value="">-- Sélectionner --</option>
                                @foreach(['Excellent' => 'Excellent (Comme neuf)', 'Bon' => 'Bon (Quelques traces d\'usure)', 'Moyen' => 'Moyen (Usure visible)', 'Mauvais' => 'Mauvais (Nécessite des réparations)'] as $val => $label)
                                    <option value="{{ $val }}" {{ old('etat') == $val ? 'selected' : '' }}>{{ $label }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group-luxury full-width">
                        <label for="commentaires">
                            <i class="fas fa-comment-dots"></i> Informations Complémentaires (Optionnel)
                        </label>
                        <textarea name="commentaires" id="commentaires" rows="4" placeholder="Options, historique d'entretien, travaux récents, etc.">{{ old('commentaires') }}</textarea>
                    </div>
                </div>

                <!-- SECTION 2: Vos Coordonnées -->
                <div class="form-section-luxury">
                    <div class="section-header-luxury">
                        <div class="section-icon">
                            <i class="fas fa-user"></i>
                        </div>
                        <div class="section-title-group">
                            <h3>Vos Coordonnées</h3>
                            <p>Pour que nous puissions vous contacter avec votre estimation</p>
                        </div>
                    </div>

                    <div class="form-grid">
                        <div class="form-group-luxury">
                            <label for="nom">
                                <i class="fas fa-user-circle"></i> Nom Complet
                            </label>
                            <input type="text" name="nom" id="nom" value="{{ old('nom') }}" placeholder="Jean Dupont" required>
                        </div>

                        <div class="form-group-luxury">
                            <label for="email">
                                <i class="fas fa-envelope"></i> Adresse Email
                            </label>
                            <input type="email" name="email" id="email" value="{{ old('email') }}" placeholder="jean.dupont@example.com" required>
                        </div>

                        <div class="form-group-luxury">
                            <label for="telephone">
                                <i class="fas fa-phone"></i> Téléphone
                            </label>
                            <input type="tel" name="telephone" id="telephone" value="{{ old('telephone') }}" placeholder="+212 6 12 34 56 78" required>
                        </div>

                        <div class="form-group-luxury">
                            <label for="ville">
                                <i class="fas fa-map-marker-alt"></i> Ville
                            </label>
                            <input type="text" name="ville" id="ville" value="{{ old('ville') }}" placeholder="Casablanca">
                        </div>
                    </div>
                </div>

                <!-- Bouton de soumission -->
                <div class="form-submit-section">
                    <button type="submit" class="btn-submit-luxury">
                        <span class="btn-icon">
                            <i class="fas fa-paper-plane"></i>
                        </span>
                        <span class="btn-text">Demander Mon Évaluation Gratuite</span>
                        <span class="btn-shine"></span>
                    </button>
                    
                    <p class="submit-info">
                        <i class="fas fa-shield-alt"></i>
                        Vos informations sont sécurisées et ne seront utilisées que pour l'évaluation
                    </p>
                </div>
            </form>

        </div>
    </main>
@endsection
