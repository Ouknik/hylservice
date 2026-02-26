@extends('layouts.app')

@section('title', 'Contact - HYL Service')

@section('content')
    <!-- PAGE HEADER CONTACT -->
    <section class="contact-header-luxury">
        <div class="contact-header-overlay"></div>
        <div class="container">
            <div class="contact-header-content">
                <span class="contact-badge">
                    <i class="fas fa-headset"></i> Support 24/7
                </span>
                <h1 class="contact-title">
                    <i class="fas fa-comments"></i>
                    Contactez-Nous
                </h1>
                <p class="contact-subtitle">
                    Notre équipe est à votre écoute pour répondre à toutes vos questions
                </p>
            </div>
        </div>
    </section>

    <!-- Main Content -->
    <main class="contact-main">
        <div class="container">
            
            <!-- CARTES DE CONTACT RAPIDE -->
            <div class="contact-quick-cards">
                <div class="quick-card">
                    <div class="quick-card-icon">
                        <i class="fas fa-phone-alt"></i>
                    </div>
                    <h3>Appelez-nous</h3>
                    <p><a href="tel:+212522112323">+212 5 22 11 23 23</a></p>
                    <p><a href="tel:+212277765890">+212 2 77 65 80 90</a></p>
                    <span class="quick-card-label">Lun-Sam: 9h-19h</span>
                </div>

                <div class="quick-card">
                    <div class="quick-card-icon">
                        <i class="fas fa-envelope"></i>
                    </div>
                    <h3>Envoyez un Email</h3>
                    <p><a href="mailto:contact@hylservice.ma">contact@hylservice.ma</a></p>
                    <p><a href="mailto:ventes@hylservice.ma">ventes@hylservice.ma</a></p>
                    <span class="quick-card-label">Réponse sous 24h</span>
                </div>

                <div class="quick-card">
                    <div class="quick-card-icon">
                        <i class="fas fa-map-marker-alt"></i>
                    </div>
                    <h3>Visitez-nous</h3>
                    <p>90, Boulevard My Slimane</p>
                    <p>Casablanca 20250, Maroc</p>
                    <span class="quick-card-label">Lun-Sam: 9h-19h</span>
                </div>

                <div class="quick-card">
                    <div class="quick-card-icon">
                        <i class="fab fa-whatsapp"></i>
                    </div>
                    <h3>WhatsApp</h3>
                    <p><a href="https://wa.me/212522112323">+212 5 22 11 23 23</a></p>
                    <p>Chat en direct</p>
                    <span class="quick-card-label">Réponse immédiate</span>
                </div>
            </div>

            <!-- SECTION PRINCIPALE -->
            <div class="contact-section-luxury">
                
                <!-- COLONNE GAUCHE: Informations -->
                <div class="contact-info-luxury">
                    <div class="info-header">
                        <h2>Nos Coordonnées</h2>
                        <p>N'hésitez pas à nous contacter par le moyen qui vous convient le mieux</p>
                    </div>

                    <div class="info-card">
                        <div class="info-icon"><i class="fas fa-building"></i></div>
                        <div class="info-content">
                            <h4>Adresse</h4>
                            <p>90, Boulevard My Slimane<br>Casablanca 20250, Maroc</p>
                        </div>
                    </div>

                    <div class="info-card">
                        <div class="info-icon"><i class="fas fa-phone-volume"></i></div>
                        <div class="info-content">
                            <h4>Téléphones</h4>
                            <p><a href="tel:+212522112323">+212 5 22 11 23 23</a></p>
                            <p><a href="tel:+212277765890">+212 2 77 65 80 90</a></p>
                        </div>
                    </div>

                    <div class="info-card">
                        <div class="info-icon"><i class="fas fa-envelope-open-text"></i></div>
                        <div class="info-content">
                            <h4>Email</h4>
                            <p><a href="mailto:contact@hylservice.ma">contact@hylservice.ma</a></p>
                            <p><a href="mailto:support@hylservice.ma">support@hylservice.ma</a></p>
                        </div>
                    </div>

                    <div class="info-card">
                        <div class="info-icon"><i class="fas fa-clock"></i></div>
                        <div class="info-content">
                            <h4>Horaires d'Ouverture</h4>
                            <p><strong>Lundi - Vendredi:</strong> 9h00 - 19h00</p>
                            <p><strong>Samedi:</strong> 9h00 - 17h00</p>
                            <p><strong>Dimanche:</strong> Fermé</p>
                        </div>
                    </div>

                    <!-- Réseaux Sociaux -->
                    <div class="social-media-section">
                        <h4>Suivez-nous</h4>
                        <div class="social-icons">
                            <a href="#" class="social-icon facebook"><i class="fab fa-facebook-f"></i></a>
                            <a href="#" class="social-icon instagram"><i class="fab fa-instagram"></i></a>
                            <a href="#" class="social-icon twitter"><i class="fab fa-twitter"></i></a>
                            <a href="#" class="social-icon linkedin"><i class="fab fa-linkedin-in"></i></a>
                            <a href="#" class="social-icon youtube"><i class="fab fa-youtube"></i></a>
                        </div>
                    </div>
                </div>

                <!-- COLONNE DROITE: Formulaire -->
                <div class="contact-form-luxury">
                    <div class="form-header">
                        <div class="form-header-icon">
                            <i class="fas fa-paper-plane"></i>
                        </div>
                        <h2>Envoyez-nous un Message</h2>
                        <p>Remplissez le formulaire ci-dessous et nous vous répondrons dans les plus brefs délais</p>
                    </div>

                    @if(session('success'))
                        <div class="form-success-message" style="display: block;">
                            <i class="fas fa-check-circle"></i>
                            {{ session('success') }}
                        </div>
                    @endif

                    <form action="{{ route('contact.store') }}" method="POST" class="luxury-contact-form">
                        @csrf
                        <div class="form-row-luxury">
                            <div class="form-group-luxury">
                                <label for="nom"><i class="fas fa-user"></i> Nom Complet</label>
                                <input type="text" name="nom" id="nom" value="{{ old('nom') }}" placeholder="Jean Dupont" required>
                            </div>

                            <div class="form-group-luxury">
                                <label for="email"><i class="fas fa-envelope"></i> Email</label>
                                <input type="email" name="email" id="email" value="{{ old('email') }}" placeholder="jean.dupont@example.com" required>
                            </div>
                        </div>

                        <div class="form-row-luxury">
                            <div class="form-group-luxury">
                                <label for="telephone"><i class="fas fa-phone"></i> Téléphone</label>
                                <input type="tel" name="telephone" id="telephone" value="{{ old('telephone') }}" placeholder="+212 6 12 34 56 78">
                            </div>

                            <div class="form-group-luxury">
                                <label for="sujet"><i class="fas fa-tag"></i> Sujet</label>
                                <select name="sujet" id="sujet" required>
                                    <option value="">-- Sélectionner --</option>
                                    @foreach(['Achat' => 'Question sur un achat', 'Vente' => 'Vendre ma voiture', 'Reprise' => 'Demande de reprise', 'SAV' => 'Service après-vente', 'Partenariat' => 'Partenariat', 'Autre' => 'Autre demande'] as $val => $label)
                                        <option value="{{ $val }}" {{ old('sujet', request('sujet')) == $val ? 'selected' : '' }}>{{ $label }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group-luxury full-width">
                            <label for="message"><i class="fas fa-comment-dots"></i> Votre Message</label>
                            <textarea name="message" id="message" rows="6" placeholder="Décrivez votre demande en détail..." required>{{ old('message', request('vehicule') ? 'Bonjour, je suis intéressé par le véhicule : ' . request('vehicule') : '') }}</textarea>
                            <span class="char-count"><span id="charCount">0</span> / 500 caractères</span>
                        </div>

                        <div class="form-checkbox">
                            <input type="checkbox" name="rgpd" id="rgpd" required>
                            <label for="rgpd">
                                J'accepte que mes données soient utilisées pour me recontacter
                                <a href="#">(Politique de confidentialité)</a>
                            </label>
                        </div>

                        <button type="submit" class="btn-submit-contact">
                            <span class="btn-icon"><i class="fas fa-paper-plane"></i></span>
                            <span class="btn-text">Envoyer le Message</span>
                            <span class="btn-shine"></span>
                        </button>
                    </form>
                </div>
            </div>

            <!-- CARTE GOOGLE MAPS -->
            <div class="map-section">
                <div class="map-header">
                    <h2>Notre Localisation</h2>
                    <p>Retrouvez-nous facilement à Casablanca</p>
                </div>
                <div class="map-container">
                    <iframe 
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3323.7558927894767!2d-7.626109484770562!3d33.58908598072779!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zMzPCsDM1JzIwLjciTiA3wrAzNyczMC4wIlc!5e0!3m2!1sen!2sma!4v1234567890"
                        width="100%" 
                        height="450" 
                        style="border:0;" 
                        allowfullscreen="" 
                        loading="lazy" 
                        referrerpolicy="no-referrer-when-downgrade">
                    </iframe>
                </div>
            </div>

            <!-- FAQ RAPIDE -->
            <div class="contact-faq">
                <h2>Questions Fréquentes</h2>
                <div class="faq-grid">
                    <div class="faq-card">
                        <div class="faq-icon"><i class="fas fa-clock"></i></div>
                        <h4>Quel est votre délai de réponse ?</h4>
                        <p>Nous répondons généralement sous 24h maximum aux demandes reçues par email ou formulaire.</p>
                    </div>
                    <div class="faq-card">
                        <div class="faq-icon"><i class="fas fa-car"></i></div>
                        <h4>Puis-je visiter vos véhicules ?</h4>
                        <p>Oui, nos véhicules sont disponibles sur rendez-vous du lundi au samedi.</p>
                    </div>
                    <div class="faq-card">
                        <div class="faq-icon"><i class="fas fa-credit-card"></i></div>
                        <h4>Quels moyens de paiement ?</h4>
                        <p>Nous acceptons les virements, chèques certifiés et espèces pour les transactions.</p>
                    </div>
                    <div class="faq-card">
                        <div class="faq-icon"><i class="fas fa-shield-alt"></i></div>
                        <h4>Vos véhicules sont-ils garantis ?</h4>
                        <p>Tous nos véhicules bénéficient d'une garantie de 12 mois et sont rigoureusement inspectés.</p>
                    </div>
                </div>
            </div>

        </div>
    </main>
@endsection

@push('scripts')
<script>
    const msg = document.getElementById('message');
    const charCount = document.getElementById('charCount');
    if (msg && charCount) {
        charCount.textContent = msg.value.length;
        msg.addEventListener('input', function() {
            charCount.textContent = this.value.length;
        });
    }
</script>
@endpush
