@extends('layouts.app')

@section('title', 'Nos Services - HYL Service')

@section('content')
    <!-- PAGE HEADER LUXURY -->
    <section class="page-header-luxury">
        <div class="luxury-overlay"></div>
        <div class="container">
            <div class="luxury-header-content">
                <span class="luxury-badge">
                    <i class="fas fa-star"></i> Excellence & Qualité
                </span>
                <h1 class="luxury-title">
                    <i class="fas fa-cogs"></i>
                    Nos Services
                </h1>
                <p class="luxury-subtitle">
                    Des solutions complètes pour tous vos besoins automobiles
                </p>
                <div class="luxury-features">
                    <div class="luxury-feature-item">
                        <i class="fas fa-shield-check"></i>
                        <span>Garantie 12 mois</span>
                    </div>
                    <div class="luxury-feature-item">
                        <i class="fas fa-users"></i>
                        <span>Experts certifiés</span>
                    </div>
                    <div class="luxury-feature-item">
                        <i class="fas fa-clock"></i>
                        <span>Service rapide</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Main Content -->
    <main class="services-main">
        <div class="container">

            <!-- SERVICES PRINCIPAUX -->
            <section class="main-services">
                <div class="section-header-center">
                    <h2>Nos Services Principaux</h2>
                    <p>Des prestations de qualité pour répondre à tous vos besoins</p>
                </div>

                <div class="services-grid-premium">
                    <!-- Service 1: Achat -->
                    <div class="service-card-premium">
                        <div class="service-card-header">
                            <div class="service-icon-premium">
                                <i class="fas fa-shopping-cart"></i>
                            </div>
                            <h3>Achat de Véhicules</h3>
                            <p class="service-tagline">Trouvez votre voiture idéale</p>
                        </div>
                        <div class="service-card-body">
                            <ul class="service-features-list">
                                <li><i class="fas fa-check-circle"></i> Large sélection de véhicules</li>
                                <li><i class="fas fa-check-circle"></i> Véhicules inspectés et certifiés</li>
                                <li><i class="fas fa-check-circle"></i> Historique complet disponible</li>
                                <li><i class="fas fa-check-circle"></i> Garantie 12 mois incluse</li>
                                <li><i class="fas fa-check-circle"></i> Financement disponible</li>
                            </ul>
                            <div class="service-price">
                                <span class="price-label">À partir de</span>
                                <span class="price-value">50,000 DH</span>
                            </div>
                            <a href="{{ route('acheter') }}" class="btn-service-premium">
                                <span>Voir les véhicules</span>
                                <i class="fas fa-arrow-right"></i>
                            </a>
                        </div>
                    </div>

                    <!-- Service 2: Vente -->
                    <div class="service-card-premium featured">
                        <div class="featured-badge">
                            <i class="fas fa-star"></i> Populaire
                        </div>
                        <div class="service-card-header">
                            <div class="service-icon-premium">
                                <i class="fas fa-tag"></i>
                            </div>
                            <h3>Vente de Votre Voiture</h3>
                            <p class="service-tagline">Vendez au meilleur prix</p>
                        </div>
                        <div class="service-card-body">
                            <ul class="service-features-list">
                                <li><i class="fas fa-check-circle"></i> Évaluation gratuite en ligne</li>
                                <li><i class="fas fa-check-circle"></i> Estimation rapide sous 24h</li>
                                <li><i class="fas fa-check-circle"></i> Annonce professionnelle</li>
                                <li><i class="fas fa-check-circle"></i> Large visibilité</li>
                                <li><i class="fas fa-check-circle"></i> Accompagnement personnalisé</li>
                            </ul>
                            <div class="service-price">
                                <span class="price-label">Commission</span>
                                <span class="price-value">0%</span>
                            </div>
                            <a href="{{ route('vendre') }}" class="btn-service-premium">
                                <span>Vendre ma voiture</span>
                                <i class="fas fa-arrow-right"></i>
                            </a>
                        </div>
                    </div>

                    <!-- Service 3: Reprise -->
                    <div class="service-card-premium">
                        <div class="service-card-header">
                            <div class="service-icon-premium">
                                <i class="fas fa-exchange-alt"></i>
                            </div>
                            <h3>Service de Reprise</h3>
                            <p class="service-tagline">Échangez facilement</p>
                        </div>
                        <div class="service-card-body">
                            <ul class="service-features-list">
                                <li><i class="fas fa-check-circle"></i> Reprise au meilleur prix</li>
                                <li><i class="fas fa-check-circle"></i> Évaluation transparente</li>
                                <li><i class="fas fa-check-circle"></i> Démarches simplifiées</li>
                                <li><i class="fas fa-check-circle"></i> Paiement immédiat</li>
                                <li><i class="fas fa-check-circle"></i> Sans frais cachés</li>
                            </ul>
                            <div class="service-price">
                                <span class="price-label">Évaluation</span>
                                <span class="price-value">Gratuite</span>
                            </div>
                            <a href="{{ route('reprise') }}" class="btn-service-premium">
                                <span>Demander une reprise</span>
                                <i class="fas fa-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </section>

            <!-- SERVICES ADDITIONNELS -->
            <section class="additional-services">
                <div class="section-header-center">
                    <h2>Services Additionnels</h2>
                    <p>Des prestations complémentaires pour vous accompagner</p>
                </div>

                <div class="additional-grid">
                    <div class="additional-card">
                        <div class="additional-icon"><i class="fas fa-file-contract"></i></div>
                        <h4>Assistance Administrative</h4>
                        <p>Nous gérons toutes les formalités : carte grise, immatriculation, assurance</p>
                    </div>
                    <div class="additional-card">
                        <div class="additional-icon"><i class="fas fa-truck"></i></div>
                        <h4>Livraison à Domicile</h4>
                        <p>Livraison gratuite dans tout le Maroc pour votre nouveau véhicule</p>
                    </div>
                    <div class="additional-card">
                        <div class="additional-icon"><i class="fas fa-wrench"></i></div>
                        <h4>Inspection Technique</h4>
                        <p>Contrôle complet de 150 points par nos experts certifiés</p>
                    </div>
                    <div class="additional-card">
                        <div class="additional-icon"><i class="fas fa-hand-holding-usd"></i></div>
                        <h4>Solutions de Financement</h4>
                        <p>Crédit auto avec nos partenaires bancaires aux meilleurs taux</p>
                    </div>
                    <div class="additional-card">
                        <div class="additional-icon"><i class="fas fa-calendar-check"></i></div>
                        <h4>Essai à Domicile</h4>
                        <p>Testez le véhicule chez vous pendant 24h avant de décider</p>
                    </div>
                    <div class="additional-card">
                        <div class="additional-icon"><i class="fas fa-headset"></i></div>
                        <h4>Support Client 24/7</h4>
                        <p>Une équipe dédiée disponible à tout moment pour vous aider</p>
                    </div>
                </div>
            </section>

            <!-- PROCESSUS -->
            <section class="process-section">
                <div class="section-header-center">
                    <h2>Notre Processus</h2>
                    <p>4 étapes simples pour acquérir votre véhicule</p>
                </div>

                <div class="process-timeline">
                    <div class="process-step">
                        <div class="process-number">1</div>
                        <div class="process-icon"><i class="fas fa-search"></i></div>
                        <h4>Recherche</h4>
                        <p>Parcourez notre catalogue et sélectionnez le véhicule qui vous convient</p>
                    </div>
                    <div class="process-step">
                        <div class="process-number">2</div>
                        <div class="process-icon"><i class="fas fa-car"></i></div>
                        <h4>Essai</h4>
                        <p>Prenez rendez-vous pour un essai routier ou demandez un essai à domicile</p>
                    </div>
                    <div class="process-step">
                        <div class="process-number">3</div>
                        <div class="process-icon"><i class="fas fa-file-signature"></i></div>
                        <h4>Financement</h4>
                        <p>Choisissez votre mode de paiement : comptant, crédit ou reprise</p>
                    </div>
                    <div class="process-step">
                        <div class="process-number">4</div>
                        <div class="process-icon"><i class="fas fa-key"></i></div>
                        <h4>Livraison</h4>
                        <p>Récupérez votre véhicule ou faites-le livrer chez vous gratuitement</p>
                    </div>
                </div>
            </section>

            <!-- CTA SECTION -->
            <section class="services-cta">
                <div class="cta-content-services">
                    <h2>Prêt à Démarrer ?</h2>
                    <p>Contactez-nous dès maintenant pour bénéficier de nos services</p>
                    <div class="cta-buttons-services">
                        <a href="{{ route('contact') }}" class="btn-cta-primary">
                            <i class="fas fa-phone"></i> Nous Contacter
                        </a>
                        <a href="{{ route('acheter') }}" class="btn-cta-secondary">
                            <i class="fas fa-car"></i> Voir les Véhicules
                        </a>
                    </div>
                </div>
            </section>

        </div>
    </main>
@endsection
