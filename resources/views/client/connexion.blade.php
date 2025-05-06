<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Connexion - Space-Co</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/fontawesome.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/templatemo-villa-agency.css') }}">
    <style>
        body {
            background: #f8f9fa;
            font-family: 'Poppins', Arial, sans-serif;
        }
        .auth-container {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .auth-card {
            background: #fff;
            border-radius: 12px;
            box-shadow: 0 4px 24px rgba(0,0,0,0.08);
            padding: 2.5rem 2rem;
            width: 100%;
            max-width: 400px;
        }
        .auth-card h5 {
            color: #f35525;
            font-weight: bold;
        }
        .btn-orange {
            background-color: #f35525 !important;
            border-color: #f35525 !important;
            color: #fff !important;
        }
        .btn-orange:hover {
            background-color: #000 !important;
            border-color: #000 !important;
            color: #fff !important;
        }
        .switch-link {
            color: #f35525;
            text-decoration: underline;
            cursor: pointer;
        }
        .switch-link:hover {
            color: #000;
        }
    </style>
</head>
<body>
    <!-- Header (optionnel, retire si tu veux une page "pure") -->

    <div class="auth-container">
        <div class="auth-card">
            <!-- Formulaire Connexion -->
            <form method="POST" action="{{ route('login') }}" id="loginForm" @if($errors->has('email') || $errors->has('password')) style="display:block;" @else style="display:block;" @endif>
                @csrf
                <h5 class="mb-3 text-center">Se connecter</h5>
                <hr>
                @if(session('status'))
                    <div class="alert alert-success">{{ session('status') }}</div>
                @endif
                <div class="mb-3">
                    <label for="loginEmail" class="form-label">Adresse email</label>
                    <input id="loginEmail" type="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="username" class="form-control @error('email') is-invalid @enderror">
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="loginPassword" class="form-label">Mot de passe</label>
                    <input id="loginPassword" type="password" name="password" required autocomplete="current-password" class="form-control @error('password') is-invalid @enderror">
                    @error('password')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3 form-check">
                    <input type="checkbox" name="remember" id="rememberMe" class="form-check-input" {{ old('remember') ? 'checked' : '' }}>
                    <label class="form-check-label" for="rememberMe">Se souvenir de moi</label>
                </div>
                <button type="submit" class="btn btn-orange w-100 mb-2">Se connecter</button>
                <div class="text-center mt-2">
                    <small>Pas encore de compte ? <span class="switch-link" id="showRegisterForm">S'inscrire</span></small>
                </div>
            </form>

            <!-- Formulaire Inscription -->
<form method="POST" action="{{ route('register') }}" id="registerForm" style="display: none;">
    @csrf
    <h5 class="mb-3 text-center">S'inscrire</h5>
    <hr>

    <div class="mb-3">
        <label for="registerName" class="form-label">Nom complet</label>
        <input id="registerName" type="text" name="name" value="{{ old('name') }}" required autofocus autocomplete="name" class="form-control @error('name') is-invalid @enderror">
        @error('name')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="registerEmail" class="form-label">Adresse email</label>
        <input id="registerEmail" type="email" name="email" value="{{ old('email') }}" required autocomplete="username" class="form-control @error('email') is-invalid @enderror">
        @error('email')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <!-- Nouveau champ téléphone -->
    <div class="mb-3">
        <label for="registerPhone" class="form-label">Numéro de téléphone</label>
        <input id="registerPhone"type="tel" name="phone" value="{{ old('phone') }}" autocomplete="tel" pattern="^[0-9+\-\s]*$" title="Veuillez entrer un numéro de téléphone valide (chiffres, +, -, espaces uniquement)" class="form-control @error('phone') is-invalid @enderror">
        @error('phone')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <!-- Nouveau champ sexe -->
    <div class="mb-3">
        <label for="registerSexe" class="form-label">Sexe</label>
        <select id="registerSexe" name="sexe" class="form-select @error('sexe') is-invalid @enderror" required>
            <option value="" disabled {{ old('sexe') ? '' : 'selected' }}>Choisir...</option>
            <option value="Masculin" {{ old('sexe') == 'Masculin' ? 'selected' : '' }}>Masculin</option>
            <option value="Féminin" {{ old('sexe') == 'Féminin' ? 'selected' : '' }}>Féminin</option>
        </select>
        @error('sexe')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="registerPassword" class="form-label">Mot de passe</label>
        <input id="registerPassword" type="password" name="password" required autocomplete="new-password" class="form-control @error('password') is-invalid @enderror">
        @error('password')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="registerPasswordConfirmation" class="form-label">Confirmer le mot de passe</label>
        <input id="registerPasswordConfirmation" type="password" name="password_confirmation" required autocomplete="new-password" class="form-control">
    </div>

    <button type="submit" class="btn btn-orange w-100 mb-2">S'inscrire</button>
    <div class="text-center mt-2">
        <small>Déjà un compte ? <span class="switch-link" id="showLoginForm">Se connecter</span></small>
    </div>
</form>

        </div>
    </div>

    <!-- Footer (optionnel) -->
    @include('client.layouts.footer')

    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script>
        // Switch between login and register forms
        document.getElementById('showRegisterForm').onclick = function(e) {
            e.preventDefault();
            document.getElementById('loginForm').style.display = 'none';
            document.getElementById('registerForm').style.display = 'block';
        };
        document.getElementById('showLoginForm').onclick = function(e) {
            e.preventDefault();
            document.getElementById('registerForm').style.display = 'none';
            document.getElementById('loginForm').style.display = 'block';
        };
        document.getElementById('registerPhone').addEventListener('input', function(e) {
        this.value = this.value.replace(/[^0-9+\-\s]/g, '');
        });

    </script>
</body>
</html>
