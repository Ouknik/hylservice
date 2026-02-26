@extends('layouts.app')

@section('title', 'Dashboard Admin - HYL Service')

@section('content')
    <!-- PAGE HEADER ADMIN -->
    <section class="admin-header">
        <div class="admin-overlay"></div>
        <div class="container">
            <div class="admin-header-content">
                <div class="admin-icon-large">
                    <i class="fas fa-shield-alt"></i>
                </div>
                <h1>Panneau d'Administration</h1>
                <p>Gestion complète de la plateforme HYL Service</p>
            </div>
        </div>
    </section>

    <main class="admin-main">
        <div class="container">
            <section class="admin-dashboard" style="display: block;" id="adminDashboard">
                
                <!-- Header Dashboard -->
                <div class="dashboard-header">
                    <div>
                        <h2 class="dashboard-title">
                            <i class="fas fa-chart-line"></i> Tableau de Bord
                        </h2>
                        <p class="dashboard-subtitle">Bienvenue, <span id="adminName">{{ auth()->user()->name }}</span></p>
                    </div>
                    <form action="{{ route('admin.logout') }}" method="POST" style="display:inline;">
                        @csrf
                        <button type="submit" class="btn-logout">
                            <i class="fas fa-sign-out-alt"></i> Déconnexion
                        </button>
                    </form>
                </div>

                <!-- Menu de navigation admin -->
                <div class="admin-nav-tabs">
                    <button class="admin-tab-btn active" onclick="showTab('stats')">
                        <i class="fas fa-chart-bar"></i> Statistiques
                    </button>
                    <button class="admin-tab-btn" onclick="showTab('ventes')">
                        <i class="fas fa-tag"></i> Ventes <span class="badge">{{ $stats['ventes'] ?? 0 }}</span>
                    </button>
                    <button class="admin-tab-btn" onclick="showTab('reprises')">
                        <i class="fas fa-exchange-alt"></i> Reprises <span class="badge">{{ $stats['reprises'] ?? 0 }}</span>
                    </button>
                    <button class="admin-tab-btn" onclick="showTab('contacts')">
                        <i class="fas fa-envelope"></i> Contacts <span class="badge">{{ $stats['contacts'] ?? 0 }}</span>
                    </button>
                    <button class="admin-tab-btn" onclick="showTab('vehicules')">
                        <i class="fas fa-car"></i> Véhicules
                    </button>
                </div>

                <!-- TAB 1: STATISTIQUES -->
                <div id="tab-stats" class="admin-tab-content active">
                    <h3><i class="fas fa-chart-pie"></i> Vue d'ensemble</h3>
                    
                    <div class="stats-cards-grid">
                        <div class="stat-card-admin">
                            <div class="stat-card-icon" style="background: linear-gradient(135deg, #4CAF50, #45a049);">
                                <i class="fas fa-car"></i>
                            </div>
                            <div class="stat-card-info">
                                <h3>Véhicules</h3>
                                <p class="stat-number">{{ $stats['vehicules'] ?? 0 }}</p>
                                <span class="stat-change positive">Total en catalogue</span>
                            </div>
                        </div>

                        <div class="stat-card-admin">
                            <div class="stat-card-icon" style="background: linear-gradient(135deg, #FF9800, #F57C00);">
                                <i class="fas fa-tag"></i>
                            </div>
                            <div class="stat-card-info">
                                <h3>Annonces Vente</h3>
                                <p class="stat-number">{{ $stats['ventes'] ?? 0 }}</p>
                                <span class="stat-change positive">Annonces reçues</span>
                            </div>
                        </div>

                        <div class="stat-card-admin">
                            <div class="stat-card-icon" style="background: linear-gradient(135deg, #2196F3, #1976D2);">
                                <i class="fas fa-exchange-alt"></i>
                            </div>
                            <div class="stat-card-info">
                                <h3>Demandes Reprise</h3>
                                <p class="stat-number">{{ $stats['reprises'] ?? 0 }}</p>
                                <span class="stat-change positive">Demandes reçues</span>
                            </div>
                        </div>

                        <div class="stat-card-admin">
                            <div class="stat-card-icon" style="background: linear-gradient(135deg, #9C27B0, #7B1FA2);">
                                <i class="fas fa-envelope"></i>
                            </div>
                            <div class="stat-card-info">
                                <h3>Messages</h3>
                                <p class="stat-number">{{ $stats['contacts'] ?? 0 }}</p>
                                <span class="stat-change positive">Messages reçus</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- TAB 2: GESTION DES VENTES -->
                <div id="tab-ventes" class="admin-tab-content">
                    <div class="tab-header">
                        <h3><i class="fas fa-tag"></i> Gestion des Annonces de Vente</h3>
                    </div>

                    <div class="table-container">
                        <table class="admin-table" id="ventesTable">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Vendeur</th>
                                    <th>Véhicule</th>
                                    <th>Prix</th>
                                    <th>Date</th>
                                    <th>Statut</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($cars as $car)
                                    <tr>
                                        <td>#{{ $car->id }}</td>
                                        <td>{{ $car->vendeur_nom }}<br><small>{{ $car->vendeur_email }}</small></td>
                                        <td>{{ $car->marque }} {{ $car->modele }} ({{ $car->annee }})</td>
                                        <td>{{ number_format($car->prix, 0, ',', '.') }} DH</td>
                                        <td>{{ $car->created_at->format('d/m/Y') }}</td>
                                        <td>
                                            <span class="status-badge status-{{ strtolower($car->status) }}">
                                                {{ $car->status }}
                                            </span>
                                        </td>
                                        <td>
                                            <div style="display: flex; gap: 0.5rem;">
                                                <a href="{{ route('acheter.show', $car) }}" class="btn-action" title="Voir">
                                                    <i class="fas fa-eye"></i>
                                                </a>
                                                <form action="{{ route('admin.car.updateStatus', $car) }}" method="POST" style="display:inline;">
                                                    @csrf
                                                    @method('PATCH')
                                                    <select name="status" onchange="this.form.submit()" style="padding: 0.3rem; border-radius: 4px; border: 1px solid #ddd;">
                                                        @foreach(['En attente', 'Approuvé', 'Vendu', 'Rejeté'] as $s)
                                                            <option value="{{ $s }}" {{ $car->status == $s ? 'selected' : '' }}>{{ $s }}</option>
                                                        @endforeach
                                                    </select>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr><td colspan="7" style="text-align: center; padding: 2rem;">Aucune annonce de vente</td></tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- TAB 3: GESTION DES REPRISES -->
                <div id="tab-reprises" class="admin-tab-content">
                    <div class="tab-header">
                        <h3><i class="fas fa-exchange-alt"></i> Gestion des Demandes de Reprise</h3>
                    </div>

                    <div class="table-container">
                        <table class="admin-table" id="reprisesTable">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Client</th>
                                    <th>Véhicule</th>
                                    <th>Année</th>
                                    <th>Kilométrage</th>
                                    <th>État</th>
                                    <th>Date</th>
                                    <th>Statut</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($reprises as $reprise)
                                    <tr>
                                        <td>#{{ $reprise->id }}</td>
                                        <td>{{ $reprise->nom }}<br><small>{{ $reprise->email }}</small><br><small>{{ $reprise->telephone }}</small></td>
                                        <td>{{ $reprise->marque }} {{ $reprise->modele }}</td>
                                        <td>{{ $reprise->annee }}</td>
                                        <td>{{ number_format($reprise->kilometrage, 0, ',', '.') }} km</td>
                                        <td>{{ $reprise->etat }}</td>
                                        <td>{{ $reprise->created_at->format('d/m/Y') }}</td>
                                        <td>
                                            <form action="{{ route('admin.reprise.updateStatus', $reprise) }}" method="POST">
                                                @csrf
                                                @method('PATCH')
                                                <select name="status" onchange="this.form.submit()" style="padding: 0.3rem; border-radius: 4px; border: 1px solid #ddd;">
                                                    @foreach(['En attente', 'En cours', 'Traité', 'Rejeté'] as $s)
                                                        <option value="{{ $s }}" {{ $reprise->status == $s ? 'selected' : '' }}>{{ $s }}</option>
                                                    @endforeach
                                                </select>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr><td colspan="8" style="text-align: center; padding: 2rem;">Aucune demande de reprise</td></tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- TAB 4: GESTION DES CONTACTS -->
                <div id="tab-contacts" class="admin-tab-content">
                    <div class="tab-header">
                        <h3><i class="fas fa-envelope"></i> Messages de Contact</h3>
                    </div>

                    <div class="table-container">
                        <table class="admin-table" id="contactsTable">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nom</th>
                                    <th>Email</th>
                                    <th>Téléphone</th>
                                    <th>Sujet</th>
                                    <th>Message</th>
                                    <th>Date</th>
                                    <th>Statut</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($contacts as $contact)
                                    <tr>
                                        <td>#{{ $contact->id }}</td>
                                        <td>{{ $contact->nom }}</td>
                                        <td>{{ $contact->email }}</td>
                                        <td>{{ $contact->telephone }}</td>
                                        <td>{{ $contact->sujet }}</td>
                                        <td style="max-width: 200px; overflow: hidden; text-overflow: ellipsis;">{{ Str::limit($contact->message, 80) }}</td>
                                        <td>{{ $contact->created_at->format('d/m/Y') }}</td>
                                        <td>
                                            <form action="{{ route('admin.contact.updateStatus', $contact) }}" method="POST">
                                                @csrf
                                                @method('PATCH')
                                                <select name="status" onchange="this.form.submit()" style="padding: 0.3rem; border-radius: 4px; border: 1px solid #ddd;">
                                                    @foreach(['Non lu', 'Lu', 'Traité'] as $s)
                                                        <option value="{{ $s }}" {{ $contact->status == $s ? 'selected' : '' }}>{{ $s }}</option>
                                                    @endforeach
                                                </select>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr><td colspan="8" style="text-align: center; padding: 2rem;">Aucun message</td></tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- TAB 5: GESTION DES VÉHICULES -->
                <div id="tab-vehicules" class="admin-tab-content">
                    <div class="tab-header">
                        <h3><i class="fas fa-car"></i> Tous les Véhicules</h3>
                    </div>

                    <div class="table-container">
                        <table class="admin-table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Marque</th>
                                    <th>Modèle</th>
                                    <th>Année</th>
                                    <th>Prix</th>
                                    <th>Km</th>
                                    <th>Statut</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($allCars as $car)
                                    <tr>
                                        <td>#{{ $car->id }}</td>
                                        <td>{{ $car->marque }}</td>
                                        <td>{{ $car->modele }}</td>
                                        <td>{{ $car->annee }}</td>
                                        <td>{{ number_format($car->prix, 0, ',', '.') }} DH</td>
                                        <td>{{ number_format($car->kilometrage, 0, ',', '.') }} km</td>
                                        <td><span class="status-badge status-{{ strtolower($car->status) }}">{{ $car->status }}</span></td>
                                        <td>
                                            <a href="{{ route('acheter.show', $car) }}" class="btn-action" title="Voir">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            <form action="{{ route('admin.car.destroy', $car) }}" method="POST" style="display:inline;" onsubmit="return confirm('Êtes-vous sûr ?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn-action" style="color: #dc3545; background: none; border: none; cursor: pointer;" title="Supprimer">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr><td colspan="8" style="text-align: center; padding: 2rem;">Aucun véhicule</td></tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>

            </section>
        </div>
    </main>
@endsection

@push('scripts')
<script>
    function showTab(tabName) {
        document.querySelectorAll('.admin-tab-content').forEach(tab => {
            tab.classList.remove('active');
        });
        document.querySelectorAll('.admin-tab-btn').forEach(btn => {
            btn.classList.remove('active');
        });
        
        const targetTab = document.getElementById('tab-' + tabName);
        if (targetTab) targetTab.classList.add('active');
        
        event.currentTarget.classList.add('active');
    }
</script>
@endpush
