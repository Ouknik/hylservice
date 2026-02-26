@extends('layouts.app')

@section('title', 'Vendre une Voiture - HYL Service')

@section('content')
    <!-- PAGE HEADER LUXURY -->
    <section class="page-header-luxury">
        <div class="luxury-overlay"></div>
        <div class="container">
            <div class="luxury-header-content">
                <span class="luxury-badge">
                    <i class="fas fa-crown"></i> Service Premium
                </span>
                <h1 class="luxury-title">
                    <i class="fas fa-tag"></i>
                    Vendez Votre Voiture
                </h1>
                <p class="luxury-subtitle">
                    Publiez votre annonce gratuitement et touchez des milliers d'acheteurs
                </p>
                <div class="luxury-features">
                    <div class="luxury-feature-item">
                        <i class="fas fa-check-circle"></i>
                        <span>Publication Gratuite</span>
                    </div>
                    <div class="luxury-feature-item">
                        <i class="fas fa-check-circle"></i>
                        <span>Visibilité Maximale</span>
                    </div>
                    <div class="luxury-feature-item">
                        <i class="fas fa-check-circle"></i>
                        <span>Vente Rapide</span>
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

            <form action="{{ route('vendre.store') }}" method="POST" enctype="multipart/form-data" class="form-vente-luxury">
                @csrf
                
                <!-- SECTION 1: Photos du Véhicule -->
                <div class="form-section-luxury">
                    <div class="section-header-luxury">
                        <div class="section-icon">
                            <i class="fas fa-camera"></i>
                        </div>
                        <div class="section-title-group">
                            <h3>Photos de Votre Véhicule</h3>
                            <p>Ajoutez jusqu'à 8 photos de qualité pour attirer plus d'acheteurs</p>
                        </div>
                    </div>

                    <div class="image-upload-zone">
                        <div class="upload-box main-upload">
                            <input type="file" name="image_principale" id="mainImage" accept="image/*" class="file-input">
                            <label for="mainImage" class="upload-label">
                                <div class="upload-icon">
                                    <i class="fas fa-cloud-upload-alt"></i>
                                </div>
                                <h4>Photo Principale</h4>
                                <p>Cliquez ou glissez-déposez</p>
                                <span class="upload-hint">JPG, PNG, WEBP (Max 5MB)</span>
                            </label>
                            <div class="image-preview" id="mainPreview"></div>
                        </div>

                        <div class="secondary-uploads">
                            @for($i = 1; $i <= 7; $i++)
                                <div class="upload-box">
                                    <input type="file" name="images[]" id="image{{ $i }}" accept="image/*" class="file-input">
                                    <label for="image{{ $i }}" class="upload-label">
                                        <i class="fas fa-plus"></i>
                                        <span>Photo {{ $i + 1 }}</span>
                                    </label>
                                    <div class="image-preview" id="preview{{ $i }}"></div>
                                </div>
                            @endfor
                        </div>
                    </div>

                    <div class="upload-tips">
                        <h4><i class="fas fa-lightbulb"></i> Conseils pour de bonnes photos :</h4>
                        <ul>
                            <li>Photographiez votre véhicule sous tous les angles</li>
                            <li>Utilisez la lumière naturelle du jour</li>
                            <li>Nettoyez votre voiture avant la prise de vue</li>
                            <li>Incluez des photos de l'intérieur et du tableau de bord</li>
                        </ul>
                    </div>
                </div>

                <!-- SECTION 2: Informations du Véhicule -->
                <div class="form-section-luxury">
                    <div class="section-header-luxury">
                        <div class="section-icon">
                            <i class="fas fa-car"></i>
                        </div>
                        <div class="section-title-group">
                            <h3>Informations du Véhicule</h3>
                            <p>Renseignez les caractéristiques techniques de votre voiture</p>
                        </div>
                    </div>

                    <div class="form-grid">
                        <div class="form-group-luxury">
                            <label for="marque">
                                <i class="fas fa-building"></i> Marque
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
                                <i class="fas fa-calendar-alt"></i> Année
                            </label>
                            <input type="number" name="annee" id="annee" value="{{ old('annee') }}" placeholder="2020" min="1990" max="2026" required>
                        </div>

                        <div class="form-group-luxury">
                            <label for="prix">
                                <i class="fas fa-coins"></i> Prix (DH)
                            </label>
                            <input type="number" name="prix" id="prix" value="{{ old('prix') }}" placeholder="150000" min="0" required>
                        </div>

                        <div class="form-group-luxury">
                            <label for="kilometrage">
                                <i class="fas fa-tachometer-alt"></i> Kilométrage (km)
                            </label>
                            <input type="number" name="kilometrage" id="kilometrage" value="{{ old('kilometrage') }}" placeholder="50000" min="0" required>
                        </div>

                        <div class="form-group-luxury">
                            <label for="carburant">
                                <i class="fas fa-gas-pump"></i> Carburant
                            </label>
                            <select name="carburant" id="carburant" required>
                                <option value="">-- Sélectionner --</option>
                                @foreach(['Essence', 'Diesel', 'Électrique', 'Hybride', 'GPL'] as $fuel)
                                    <option value="{{ $fuel }}" {{ old('carburant') == $fuel ? 'selected' : '' }}>{{ $fuel }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group-luxury">
                            <label for="transmission">
                                <i class="fas fa-cogs"></i> Transmission
                            </label>
                            <select name="transmission" id="transmission" required>
                                <option value="">-- Sélectionner --</option>
                                <option value="Manuelle" {{ old('transmission') == 'Manuelle' ? 'selected' : '' }}>Manuelle</option>
                                <option value="Automatique" {{ old('transmission') == 'Automatique' ? 'selected' : '' }}>Automatique</option>
                            </select>
                        </div>

                        <div class="form-group-luxury">
                            <label for="couleur">
                                <i class="fas fa-palette"></i> Couleur
                            </label>
                            <input type="text" name="couleur" id="couleur" value="{{ old('couleur') }}" placeholder="Ex: Noir, Blanc, Gris...">
                        </div>
                    </div>

                    <div class="form-group-luxury full-width">
                        <label for="description">
                            <i class="fas fa-align-left"></i> Description Détaillée
                        </label>
                        <textarea name="description" id="description" rows="6" placeholder="Décrivez votre véhicule : état général, équipements, historique d'entretien, options...">{{ old('description') }}</textarea>
                        <span class="char-count"><span id="charCount">0</span> / 1000 caractères</span>
                    </div>
                </div>

                <!-- SECTION 3: Vos Informations -->
                <div class="form-section-luxury">
                    <div class="section-header-luxury">
                        <div class="section-icon">
                            <i class="fas fa-user"></i>
                        </div>
                        <div class="section-title-group">
                            <h3>Vos Informations</h3>
                            <p>Coordonnées pour que les acheteurs puissent vous contacter</p>
                        </div>
                    </div>

                    <div class="form-grid">
                        <div class="form-group-luxury">
                            <label for="vendeur_nom">
                                <i class="fas fa-user-circle"></i> Nom Complet
                            </label>
                            <input type="text" name="vendeur_nom" id="vendeur_nom" value="{{ old('vendeur_nom') }}" placeholder="Jean Dupont" required>
                        </div>

                        <div class="form-group-luxury">
                            <label for="vendeur_email">
                                <i class="fas fa-envelope"></i> Email
                            </label>
                            <input type="email" name="vendeur_email" id="vendeur_email" value="{{ old('vendeur_email') }}" placeholder="jean.dupont@example.com" required>
                        </div>

                        <div class="form-group-luxury">
                            <label for="vendeur_telephone">
                                <i class="fas fa-phone"></i> Téléphone
                            </label>
                            <input type="tel" name="vendeur_telephone" id="vendeur_telephone" value="{{ old('vendeur_telephone') }}" placeholder="+212 6 12 34 56 78" required>
                        </div>

                        <div class="form-group-luxury">
                            <label for="vendeur_ville">
                                <i class="fas fa-map-marker-alt"></i> Ville
                            </label>
                            <input type="text" name="vendeur_ville" id="vendeur_ville" value="{{ old('vendeur_ville') }}" placeholder="Casablanca">
                        </div>
                    </div>
                </div>

                <!-- Bouton de soumission -->
                <div class="form-submit-section">
                    <button type="submit" class="btn-submit-luxury">
                        <span class="btn-icon">
                            <i class="fas fa-rocket"></i>
                        </span>
                        <span class="btn-text">Publier Mon Annonce</span>
                        <span class="btn-shine"></span>
                    </button>
                    
                    <p class="submit-info">
                        <i class="fas fa-shield-alt"></i>
                        Vos informations sont sécurisées et ne seront utilisées que pour la vente
                    </p>
                </div>
            </form>
        </div>
    </main>
@endsection

@push('scripts')
<script>
    // Character counter for description
    const desc = document.getElementById('description');
    const charCount = document.getElementById('charCount');
    if (desc && charCount) {
        desc.addEventListener('input', function() {
            charCount.textContent = this.value.length;
        });
    }

    // Image preview
    document.querySelectorAll('.file-input').forEach(input => {
        input.addEventListener('change', function(e) {
            const file = e.target.files[0];
            if (!file) return;
            const reader = new FileReader();
            const previewId = this.id === 'mainImage' ? 'mainPreview' : 'preview' + this.id.replace('image', '');
            reader.onload = function(ev) {
                const preview = document.getElementById(previewId);
                if (preview) {
                    preview.style.backgroundImage = `url(${ev.target.result})`;
                    preview.style.display = 'block';
                    preview.closest('.upload-box').classList.add('has-image');
                }
            };
            reader.readAsDataURL(file);
        });
    });
</script>
@endpush
