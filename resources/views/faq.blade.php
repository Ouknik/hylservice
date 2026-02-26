@extends('layouts.app')

@section('title', 'FAQ - HYL Service')

@section('content')
    <!-- PAGE HEADER LUXURY -->
    <section class="page-header-luxury">
        <div class="luxury-overlay"></div>
        <div class="container">
            <div class="luxury-header-content">
                <span class="luxury-badge">
                    <i class="fas fa-question-circle"></i> Aide
                </span>
                <h1 class="luxury-title">
                    <i class="fas fa-question-circle"></i>
                    Questions Fréquentes
                </h1>
                <p class="luxury-subtitle">
                    Trouvez rapidement les réponses à vos questions
                </p>
            </div>
        </div>
    </section>

    <main style="padding: 3rem 0;">
        <div class="container">
            <div class="faq-list">
                @php
                $faqs = [
                    ['q' => 'Comment puis-je acheter une voiture ?', 'a' => 'Parcourez nos annonces, filtrez selon vos critères, consultez les détails et contactez le vendeur directement.'],
                    ['q' => 'Comment puis-je vendre ma voiture ?', 'a' => 'Cliquez sur "Vendre une voiture", remplissez le formulaire avec les détails de votre véhicule et publiez votre annonce.'],
                    ['q' => 'Avez-vous un service de reprise ?', 'a' => 'Oui ! Nous reprenons votre ancien véhicule à bon prix. Consultez notre page Reprise pour plus de détails.'],
                    ['q' => 'Les véhicules sont-ils garantis ?', 'a' => 'Oui, tous nos véhicules bénéficient d\'une garantie de 12 mois après l\'achat.'],
                    ['q' => 'Puis-je obtenir un financement ?', 'a' => 'Nous proposons des solutions de financement. Contactez notre équipe pour connaître les options disponibles.'],
                    ['q' => 'Comment puis-je contacter HYL Service ?', 'a' => 'Vous pouvez nous contacter via notre page Contact ou nous appeler directement.'],
                    ['q' => 'Les prix affichés incluent-ils les frais administratifs ?', 'a' => 'Non, les prix affichés sont le prix de base du véhicule. Les frais administratifs peuvent s\'ajouter.'],
                    ['q' => 'Quel est le délai de livraison ?', 'a' => 'Après accord et finalisation des documents, la livraison se fait généralement sous 3-5 jours.'],
                ];
                @endphp

                @foreach($faqs as $index => $faq)
                    <div class="faq-item">
                        <h3 class="faq-question" onclick="this.parentElement.classList.toggle('active')">
                            {{ $faq['q'] }}
                            <i class="fas fa-chevron-down" style="float:right; transition: transform 0.3s;"></i>
                        </h3>
                        <p class="faq-answer">{{ $faq['a'] }}</p>
                    </div>
                @endforeach
            </div>

            <!-- CTA -->
            <div style="text-align: center; margin-top: 3rem;">
                <p style="color: var(--text-light); margin-bottom: 1rem;">Vous n'avez pas trouvé votre réponse ?</p>
                <a href="{{ route('contact') }}" class="btn btn-primary">
                    <i class="fas fa-envelope"></i> Contactez-nous
                </a>
            </div>
        </div>
    </main>
@endsection

@push('scripts')
<script>
    document.querySelectorAll('.faq-question').forEach(q => {
        q.addEventListener('click', function() {
            const item = this.parentElement;
            const answer = item.querySelector('.faq-answer');
            const icon = this.querySelector('i');
            
            document.querySelectorAll('.faq-item').forEach(other => {
                if (other !== item) {
                    other.classList.remove('active');
                    other.querySelector('.faq-answer').style.maxHeight = null;
                    const otherIcon = other.querySelector('.faq-question i');
                    if (otherIcon) otherIcon.style.transform = 'rotate(0deg)';
                }
            });
            
            if (item.classList.contains('active')) {
                answer.style.maxHeight = answer.scrollHeight + 'px';
                if (icon) icon.style.transform = 'rotate(180deg)';
            } else {
                answer.style.maxHeight = null;
                if (icon) icon.style.transform = 'rotate(0deg)';
            }
        });
    });
</script>
@endpush
