@extends('layouts.app')

@section('title', 'Acheter une Voiture - HYL Service')

@section('content')
    <!-- PAGE HEADER LUXURY -->
    <section class="acheter-header-luxury">
        <div class="acheter-header-overlay"></div>
        <div class="container">
            <div class="acheter-header-content">
                <span class="acheter-badge">
                    <i class="fas fa-certificate"></i> Véhicules Certifiés
                </span>
                <h1 class="acheter-title">
                    <i class="fas fa-car"></i>
                    Trouvez Votre Voiture Idéale
                </h1>
                <p class="acheter-subtitle">
                    Plus de {{ $cars->total() }} véhicules inspectés, garantis et prêts à conduire
                </p>
                <div class="acheter-features">
                    <div class="acheter-feature-item">
                        <i class="fas fa-shield-alt"></i>
                        <span>Garantie 12 mois</span>
                    </div>
                    <div class="acheter-feature-item">
                        <i class="fas fa-tools"></i>
                        <span>Inspection 120 points</span>
                    </div>
                    <div class="acheter-feature-item">
                        <i class="fas fa-truck"></i>
                        <span>Livraison gratuite</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- STATISTIQUES RAPIDES -->
    <section class="quick-stats">
        <div class="container">
            <div class="stats-grid-quick">
                <div class="stat-quick">
                    <div class="stat-icon-quick"><i class="fas fa-car"></i></div>
                    <div class="stat-info-quick">
                        <h3>{{ $cars->total() }}+</h3>
                        <p>Véhicules disponibles</p>
                    </div>
                </div>
                <div class="stat-quick">
                    <div class="stat-icon-quick"><i class="fas fa-users"></i></div>
                    <div class="stat-info-quick">
                        <h3>10K+</h3>
                        <p>Clients satisfaits</p>
                    </div>
                </div>
                <div class="stat-quick">
                    <div class="stat-icon-quick"><i class="fas fa-star"></i></div>
                    <div class="stat-info-quick">
                        <h3>4.9/5</h3>
                        <p>Note moyenne</p>
                    </div>
                </div>
                <div class="stat-quick">
                    <div class="stat-icon-quick"><i class="fas fa-award"></i></div>
                    <div class="stat-info-quick">
                        <h3>98%</h3>
                        <p>Taux de satisfaction</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Main Content -->
    <main class="buy-page-luxury">
        <div class="container">
            <div class="buy-layout-luxury">
                <!-- FILTERS SIDEBAR -->
                <aside class="filters-sidebar-luxury">
                    <div class="filters-header">
                        <h3><i class="fas fa-sliders-h"></i> Filtres de Recherche</h3>
                        <a href="{{ route('acheter') }}" class="btn-clear-filters">
                            <i class="fas fa-times"></i> Effacer tout
                        </a>
                    </div>
                    
                    <form method="GET" action="{{ route('acheter') }}" id="filterForm">
                        <div class="filter-group-luxury">
                            <label for="marque"><i class="fas fa-industry"></i> Marque</label>
                            <select id="marque" name="marque" onchange="document.getElementById('filterForm').submit()">
                                <option value="">Toutes les marques</option>
                                @foreach($marques as $m)
                                    <option value="{{ $m }}" {{ request('marque') == $m ? 'selected' : '' }}>{{ $m }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="price-range-group">
                            <label><i class="fas fa-money-bill-wave"></i> Fourchette de Prix (DH)</label>
                            <div class="price-inputs">
                                <input type="number" name="prix_min" placeholder="Min" min="0" value="{{ request('prix_min') }}">
                                <span class="price-separator">-</span>
                                <input type="number" name="prix_max" placeholder="Max" min="0" value="{{ request('prix_max') }}">
                            </div>
                        </div>

                        <div class="filter-group-luxury">
                            <label for="annee"><i class="fas fa-calendar-alt"></i> Année</label>
                            <select id="annee" name="annee">
                                <option value="">Toutes les années</option>
                                @for($y = date('Y'); $y >= 2010; $y--)
                                    <option value="{{ $y }}" {{ request('annee') == $y ? 'selected' : '' }}>{{ $y }}</option>
                                @endfor
                            </select>
                        </div>

                        <div class="filter-group-luxury">
                            <label for="carburant"><i class="fas fa-gas-pump"></i> Carburant</label>
                            <select id="carburant" name="carburant">
                                <option value="">Tous les carburants</option>
                                <option value="Essence" {{ request('carburant') == 'Essence' ? 'selected' : '' }}>Essence</option>
                                <option value="Diesel" {{ request('carburant') == 'Diesel' ? 'selected' : '' }}>Diesel</option>
                                <option value="Électrique" {{ request('carburant') == 'Électrique' ? 'selected' : '' }}>Électrique</option>
                                <option value="Hybride" {{ request('carburant') == 'Hybride' ? 'selected' : '' }}>Hybride</option>
                            </select>
                        </div>

                        <div class="filter-group-luxury">
                            <label for="transmission"><i class="fas fa-cogs"></i> Transmission</label>
                            <select id="transmission" name="transmission">
                                <option value="">Tous les types</option>
                                <option value="Manuelle" {{ request('transmission') == 'Manuelle' ? 'selected' : '' }}>Manuelle</option>
                                <option value="Automatique" {{ request('transmission') == 'Automatique' ? 'selected' : '' }}>Automatique</option>
                            </select>
                        </div>

                        <div class="filter-buttons-luxury">
                            <button type="submit" class="btn-filter-luxury">
                                <i class="fas fa-search"></i>
                                <span>Rechercher</span>
                            </button>
                            <a href="{{ route('acheter') }}" class="btn-reset-luxury" style="text-decoration:none;text-align:center;">
                                <i class="fas fa-redo"></i>
                                <span>Réinitialiser</span>
                            </a>
                        </div>
                    </form>
                </aside>

                <!-- CARS LISTING -->
                <section class="cars-section-luxury">
                    <div class="cars-header-luxury">
                        <div class="cars-header-left">
                            <h2>Nos Véhicules</h2>
                            <p>{{ $cars->total() }} véhicule(s) trouvé(s)</p>
                        </div>
                    </div>

                    <div class="cars-grid-luxury" id="carsList">
                        @forelse($cars as $car)
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
                            <p style="grid-column: 1/-1; text-align: center; padding: 3rem; color: var(--text-light);">
                                Aucun véhicule ne correspond à vos critères de recherche.
                            </p>
                        @endforelse
                    </div>

                    <!-- PAGINATION -->
                    <div class="pagination-luxury">
                        {{ $cars->withQueryString()->links() }}
                    </div>
                </section>
            </div>
        </div>
    </main>
@endsection
