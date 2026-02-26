@extends('layouts.app')

@section('title', 'Administration - HYL Service')

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

    <!-- Main Admin Content -->
    <main class="admin-main">
        <div class="container">
            <!-- FORMULAIRE DE CONNEXION -->
            <section class="admin-login-section" id="loginSection">
                <div class="login-container">
                    <div class="login-header">
                        <div class="login-icon">
                            <i class="fas fa-lock"></i>
                        </div>
                        <h2>Connexion Administrateur</h2>
                        <p>Veuillez vous identifier pour accéder au panneau d'administration</p>
                    </div>

                    @if($errors->any())
                        <div style="background: #f8d7da; color: #721c24; padding: 1rem; border-radius: 8px; margin-bottom: 1.5rem; border-left: 4px solid #dc3545;">
                            @foreach($errors->all() as $error)
                                <p style="margin: 0;"><i class="fas fa-exclamation-circle"></i> {{ $error }}</p>
                            @endforeach
                        </div>
                    @endif

                    <form action="{{ route('admin.authenticate') }}" method="POST" class="admin-login-form">
                        @csrf
                        <div class="form-group-admin">
                            <label for="email">
                                <i class="fas fa-user"></i> Identifiant ou Email
                            </label>
                            <input type="text" name="email" id="email" value="{{ old('email') }}" placeholder="admin@hylservice.ma" required>
                        </div>

                        <div class="form-group-admin">
                            <label for="password">
                                <i class="fas fa-key"></i> Mot de passe
                            </label>
                            <div class="password-input-wrapper">
                                <input type="password" name="password" id="password" placeholder="••••••••" required>
                                <button type="button" class="toggle-password" onclick="togglePassword()">
                                    <i class="fas fa-eye" id="toggleIcon"></i>
                                </button>
                            </div>
                        </div>

                        <div class="form-options">
                            <label class="remember-me">
                                <input type="checkbox" name="remember" id="remember">
                                <span>Se souvenir de moi</span>
                            </label>
                        </div>

                        <button type="submit" class="btn-admin-login">
                            <i class="fas fa-sign-in-alt"></i> Se Connecter
                        </button>
                    </form>
                </div>
            </section>
        </div>
    </main>
@endsection

@push('scripts')
<script>
    function togglePassword() {
        const pwd = document.getElementById('password');
        const icon = document.getElementById('toggleIcon');
        if (pwd.type === 'password') {
            pwd.type = 'text';
            icon.classList.replace('fa-eye', 'fa-eye-slash');
        } else {
            pwd.type = 'password';
            icon.classList.replace('fa-eye-slash', 'fa-eye');
        }
    }
</script>
@endpush
