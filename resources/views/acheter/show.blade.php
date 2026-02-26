@extends('layouts.app')

@section('title', $car->marque . ' ' . $car->modele . ' - HYL Service')

@section('content')
    <!-- PAGE HEADER -->
    <section class="acheter-header-luxury" style="padding: 3rem 2rem;">
        <div class="acheter-header-overlay"></div>
        <div class="container">
            <div class="acheter-header-content">
                <h1 class="acheter-title" style="font-size: 2.5rem;">
                    <i class="fas fa-car"></i>
                    {{ $car->marque }} {{ $car->modele }}
                </h1>
                <p class="acheter-subtitle">{{ $car->annee }} &bull; {{ $car->carburant }} &bull; {{ number_format($car->kilometrage, 0, ',', '.') }} km</p>
            </div>
        </div>
    </section>

    <main class="buy-page-luxury" style="padding: 3rem 2rem;">
        <div class="container">
            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 3rem; align-items: start;">
                <!-- IMAGE -->
                <div>
                    <img src="{{ $car->image ? asset('storage/' . $car->image) : 'https://via.placeholder.com/800x500?text=' . urlencode($car->marque . ' ' . $car->modele) }}" 
                         alt="{{ $car->marque }} {{ $car->modele }}" 
                         style="width: 100%; border-radius: 16px; box-shadow: 0 10px 30px rgba(0,0,0,0.2);">
                    
                    @if($car->images && count($car->images) > 0)
                        <div style="display: grid; grid-template-columns: repeat(4, 1fr); gap: 0.5rem; margin-top: 1rem;">
                            @foreach($car->images as $img)
                                <img src="{{ asset('storage/' . $img) }}" alt="Photo" style="width:100%;height:80px;object-fit:cover;border-radius:8px;cursor:pointer;">
                            @endforeach
                        </div>
                    @endif
                </div>

                <!-- INFO -->
                <div>
                    <h2 style="color: var(--gold); font-size: 2.5rem; font-weight: 900; font-family: 'Playfair Display', serif; margin-bottom: 0.5rem;">
                        {{ number_format($car->prix, 0, ',', '.') }} DH
                    </h2>

                    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1rem; margin: 2rem 0;">
                        <div class="car-spec" style="display:flex;align-items:center;gap:0.75rem;padding:1rem;background:var(--light);border-radius:8px;">
                            <i class="fas fa-calendar" style="color:var(--gold);font-size:1.3rem;"></i>
                            <div><strong>Année</strong><br>{{ $car->annee }}</div>
                        </div>
                        <div class="car-spec" style="display:flex;align-items:center;gap:0.75rem;padding:1rem;background:var(--light);border-radius:8px;">
                            <i class="fas fa-tachometer-alt" style="color:var(--gold);font-size:1.3rem;"></i>
                            <div><strong>Kilométrage</strong><br>{{ number_format($car->kilometrage, 0, ',', '.') }} km</div>
                        </div>
                        <div class="car-spec" style="display:flex;align-items:center;gap:0.75rem;padding:1rem;background:var(--light);border-radius:8px;">
                            <i class="fas fa-gas-pump" style="color:var(--gold);font-size:1.3rem;"></i>
                            <div><strong>Carburant</strong><br>{{ $car->carburant }}</div>
                        </div>
                        <div class="car-spec" style="display:flex;align-items:center;gap:0.75rem;padding:1rem;background:var(--light);border-radius:8px;">
                            <i class="fas fa-cogs" style="color:var(--gold);font-size:1.3rem;"></i>
                            <div><strong>Transmission</strong><br>{{ $car->transmission }}</div>
                        </div>
                    </div>

                    @if($car->description)
                        <div style="margin-bottom: 2rem;">
                            <h3 style="color: var(--text); margin-bottom: 0.75rem;"><i class="fas fa-info-circle" style="color:var(--gold);"></i> Description</h3>
                            <p style="color: var(--text-light); line-height: 1.8;">{{ $car->description }}</p>
                        </div>
                    @endif

                    <!-- Contact Buttons -->
                    <div style="display: flex; gap: 1rem; flex-wrap: wrap;">
                        <a href="{{ route('contact') }}?sujet=Achat&vehicule={{ urlencode($car->marque . ' ' . $car->modele) }}" class="btn btn-primary">
                            <i class="fas fa-envelope"></i> Contacter le vendeur
                        </a>
                        <a href="https://wa.me/212522112323?text={{ urlencode('Bonjour, je suis intéressé par la ' . $car->marque . ' ' . $car->modele . ' (' . $car->annee . ') à ' . number_format($car->prix, 0, ',', '.') . ' DH') }}" 
                           class="btn btn-primary" style="background: #25D366; color: white;" target="_blank">
                            <i class="fab fa-whatsapp"></i> WhatsApp
                        </a>
                        <a href="{{ route('acheter') }}" class="btn btn-secondary">
                            <i class="fas fa-arrow-left"></i> Retour
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
