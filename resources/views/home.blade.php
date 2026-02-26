@extends('layouts.app')

@section('title', 'HYL Service - Plateforme de Voitures Luxe')

@section('content')
    <!-- ==================== HERO SECTION ==================== -->
    <section class="hero">
        <div class="hero-bg">
            <img src="{{ asset('images/car-hero.jpg') }}" alt="Voiture Luxe">
        </div>
        <div class="hero-overlay"></div>

        <div class="container">
            <div class="hero-content">
                <!-- CONTENU GAUCHE -->
                <div class="hero-text-box">
                    <div class="hero-label">
                        <span>Bienvenue chez HYL Service</span>
                    </div>

                    <h1 class="hero-title">
                        Trouvez Votre<br>
                        <span class="highlight">Voiture Idéale</span>
                    </h1>

                    <p class="hero-description">
                        Plateforme de confiance pour l'achat et la vente<br>
                        de voitures d'occasion haut de gamme au Maroc
                    </p>

                    <!-- STATISTIQUES -->
                    <div class="stats-mini">
                        <div class="stat-mini">
                            <span class="stat-number">{{ $stats['vehicles'] ?? '500+' }}</span>
                            <span class="stat-label">Véhicules</span>
                        </div>
                        <div class="stat-mini">
                            <span class="stat-number">98%</span>
                            <span class="stat-label">Satisfaction</span>
                        </div>
                        <div class="stat-mini">
                            <span class="stat-number">12 mois</span>
                            <span class="stat-label">Garantie</span>
                        </div>
                    </div>

                    <!-- BOUTONS D'ACTION -->
                    <div class="hero-buttons">
                        <a href="{{ route('acheter') }}" class="btn btn-primary">
                            <i class="fas fa-search"></i>
                            Acheter
                        </a>
                        <a href="{{ route('vendre') }}" class="btn btn-secondary">
                            <i class="fas fa-tag"></i>
                            Vendre
                        </a>
                    </div>

                    <!-- AVANTAGES -->
                    <div class="hero-benefits">
                        <div class="benefit-item">
                            <i class="fas fa-check-circle"></i>
                            <span>Véhicules inspectés et garantis</span>
                        </div>
                        <div class="benefit-item">
                            <i class="fas fa-check-circle"></i>
                            <span>Prix transparents et justes</span>
                        </div>
                        <div class="benefit-item">
                            <i class="fas fa-check-circle"></i>
                            <span>Support client 24/7</span>
                        </div>
                    </div>
                </div>

                <!-- ENCADRÉ DROIT (Recherche rapide) -->
                <div class="hero-search-box">
                    <h3>Recherche Rapide</h3>
                    <form class="quick-search" action="{{ route('acheter') }}" method="GET">
                        <div class="search-input">
                            <label>Marque</label>
                            <select name="marque">
                                <option value="">Toutes les marques</option>
                                @foreach($marques ?? [] as $marque)
                                    <option value="{{ $marque }}">{{ $marque }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="search-input">
                            <label>Budget</label>
                            <select name="budget">
                                <option value="">Tous les budgets</option>
                                <option value="0-50000">0 - 50,000 DH</option>
                                <option value="50000-100000">50,000 - 100,000 DH</option>
                                <option value="100000-200000">100,000 - 200,000 DH</option>
                                <option value="200000+">200,000+ DH</option>
                            </select>
                        </div>

                        <button type="submit" class="btn-search">
                            <i class="fas fa-search"></i> Chercher
                        </button>
                    </form>

                    <div class="search-info">
                        <p><i class="fas fa-info-circle"></i> Trouvez votre voiture en 2 minutes</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ==================== CATÉGORIES ==================== -->
    <section class="categories">
        <div class="container">
            <div class="categories-grid">
                <div class="category-card">
                    <div class="category-icon">
                        <i class="fas fa-shopping-bag"></i>
                    </div>
                    <h3>Acheter une Voiture</h3>
                    <p>Parcourez notre sélection de véhicules vérifiés</p>
                    <a href="{{ route('acheter') }}" class="cat-link">Explorer <i class="fas fa-arrow-right"></i></a>
                </div>

                <div class="category-card">
                    <div class="category-icon">
                        <i class="fas fa-tag"></i>
                    </div>
                    <h3>Vendre Votre Voiture</h3>
                    <p>Obtenez une estimation gratuite en 2 minutes</p>
                    <a href="{{ route('vendre') }}" class="cat-link">Évaluer <i class="fas fa-arrow-right"></i></a>
                </div>

                <div class="category-card">
                    <div class="category-icon">
                        <i class="fas fa-exchange-alt"></i>
                    </div>
                    <h3>Service de Reprise</h3>
                    <p>Nous reprenons votre ancien véhicule</p>
                    <a href="{{ route('reprise') }}" class="cat-link">Demander <i class="fas fa-arrow-right"></i></a>
                </div>
            </div>
        </div>
    </section>

    <!-- ==================== VÉHICULES PHARES ==================== -->
    <section class="featured">
        <div class="container">
            <div class="section-header">
                <h2>Véhicules Phares</h2>
                <a href="{{ route('acheter') }}" class="view-all">Voir tous <i class="fas fa-arrow-right"></i></a>
            </div>
            <div class="vehicles-grid" id="featuredCars">
                @forelse($featuredCars ?? [] as $car)
                    <div class="car-card" onclick="window.location='{{ route('acheter.show', $car->id) }}'">
                        <img src="{{ $car->image ? asset('storage/' . $car->image) : 'https://via.placeholder.com/400x300?text=' . urlencode($car->marque . ' ' . $car->modele) }}" alt="{{ $car->marque }} {{ $car->modele }}">
                        <div class="car-card-content">
                            <h3>{{ $car->marque }} {{ $car->modele }}</h3>
                            <div class="car-card-price">{{ number_format($car->prix, 0, ',', '.') }} DH</div>
                            <div class="car-card-info"><i class="fas fa-calendar"></i> {{ $car->annee }}</div>
                            <div class="car-card-info"><i class="fas fa-gas-pump"></i> {{ $car->carburant }}</div>
                            <div class="car-card-info"><i class="fas fa-tachometer-alt"></i> {{ number_format($car->kilometrage, 0, ',', '.') }} km</div>
                            <a href="{{ route('acheter.show', $car->id) }}" class="btn btn-primary" onclick="event.stopPropagation();">
                                <i class="fas fa-eye"></i> Voir détails
                            </a>
                        </div>
                    </div>
                @empty
                    <p style="grid-column: 1/-1; text-align: center; color: var(--text-light);">Aucun véhicule disponible pour le moment.</p>
                @endforelse
            </div>
        </div>
    </section>

    <!-- ==================== POURQUOI NOUS ==================== -->
    <section class="why-us">
        <div class="container">
            <h2>Pourquoi HYL Service ?</h2>
            <div class="why-grid">
                <div class="why-card">
                    <div class="why-icon">
                        <i class="fas fa-shield-alt"></i>
                    </div>
                    <h3>100% Sécurisé</h3>
                    <p>Tous nos véhicules sont inspectés, testés et garantis 12 mois</p>
                </div>

                <div class="why-card">
                    <div class="why-icon">
                        <i class="fas fa-clock"></i>
                    </div>
                    <h3>Rapide & Transparent</h3>
                    <p>Processus simple et transparent, achetez en quelques jours</p>
                </div>

                <div class="why-card">
                    <div class="why-icon">
                        <i class="fas fa-gem"></i>
                    </div>
                    <h3>Meilleurs Prix</h3>
                    <p>Prix justes, sans frais cachés, négociation possible</p>
                </div>
            </div>
        </div>
    </section>

    <!-- ==================== STATISTIQUES ==================== -->
    <section class="stats">
        <div class="container">
            <div class="stats-grid">
                <div class="stat-box">
                    <h3>{{ $stats['vehicles'] ?? '500+' }}</h3>
                    <p>Véhicules en Stock</p>
                </div>
                <div class="stat-box">
                    <h3>10K+</h3>
                    <p>Clients Satisfaits</p>
                </div>
                <div class="stat-box">
                    <h3>98%</h3>
                    <p>Taux de Satisfaction</p>
                </div>
                <div class="stat-box">
                    <h3>24/7</h3>
                    <p>Support Client</p>
                </div>
            </div>
        </div>
    </section>

    <!-- ==================== CTA FINAL ==================== -->
    <section class="cta-final">
        <div class="container">
            <h2>Prêt à Trouver Votre Voiture ?</h2>
            <p>Rejoignez les milliers de clients satisfaits</p>
            <div class="final-buttons">
                <a href="{{ route('acheter') }}" class="btn btn-gold">
                    <i class="fas fa-car"></i> Voir les Véhicules
                </a>
                <a href="{{ route('contact') }}" class="btn btn-outline">
                    <i class="fas fa-phone"></i> Nous Contacter
                </a>
            </div>
        </div>
    </section>
@endsection
