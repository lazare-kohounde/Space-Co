<header class="header-area header-sticky">
    <style>
        .nav li a {
            color: black;
            text-decoration: none;
            padding: 10px;
            display: inline-block;
        }

        .nav li a.active {
            color: #e74c3c; /* Tu peux changer cette couleur selon ton thème */
            font-weight: bold;
        }
    </style>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav class="main-nav">
                    <!-- ***** Logo Start ***** -->
                    <a href="{{ route('accueil') }}" class="logo">
                        <h1 style="font-family: Bradley Hand, cursive; font-style: italic;">
                            <img src="assets/images/logo.png" style="height: 1.5cm; width: 4cm" alt="">
                            <samp></samp>
                        </h1>
                    </a>
                    <!-- ***** Logo End ***** -->
                    <!-- ***** Menu Start ***** -->
                    <ul class="nav">
                        <li>
                            <a href="{{ route('accueil') }}" class="{{ request()->routeIs('accueil') ? 'active' : '' }}">Accueil</a>
                        </li>
                        <li>
                            <a href="{{ route('salle') }}" class="{{ request()->routeIs('salle') ? 'active' : '' }}">Salle</a>
                        </li>
                        <li>
                            <a href="{{ route('salledetails') }}" class="{{ request()->routeIs('salledetails') ? 'active' : '' }}">Salle détails</a>
                        </li>
                        <li>
                            <a href="{{ route('contact') }}" class="{{ request()->routeIs('contact') ? 'active' : '' }}">Contact</a>
                        </li>
                        <li>
                            <a href="#" class="">Panier</a>
                        </li>
                        <li>
  <a href="#" data-bs-toggle="modal" data-bs-target="#loginModal">
    <i class="fa fa-user" style="background-color: #f35525; color: white; display: inline-block; width: 40px; height: 40px; text-align: center; line-height: 40px; margin-right: 10px; border-radius: 50%; margin-left: -1px;"></i>
  </a>
</li>
                        
                        


                        </li>
                        <li>
                            
                        </li>
                    </ul>
                    <a class='menu-trigger'>
                        <span>Menu</span>
                    </a>
                    <!-- ***** Menu End ***** -->
                </nav>


            </div>
        </div>
    </div>
</header>
<!-- Modal -->
<div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fermer"></button>
      </div>
      <div class="modal-body">

        <!-- Formulaire Connexion -->
        <form method="POST" action="{{ route('login') }}" id="loginForm">
          @csrf
          <h5>Se connecter</h5>
          <hr>

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

          <button type="submit" class="btn w-100" 
            style="background-color: #000; border-color: #000; color: #fff;"
            onmouseover="this.style.backgroundColor='#f35525'; this.style.borderColor='#f35525'; this.style.color='#fff';"
            onmouseout="this.style.backgroundColor='#000'; this.style.borderColor='#000'; this.style.color='#fff';"
            onfocus="this.style.backgroundColor='#f35525'; this.style.borderColor='#f35525'; this.style.color='#fff';"
            onblur="this.style.backgroundColor='#000'; this.style.borderColor='#000'; this.style.color='#fff';"
          >
            Se connecter
          </button>

          <div class="text-center mt-3">
            <small>Pas encore de compte ? <a href="#" id="showRegisterForm">S'inscrire</a></small>
          </div>
        </form>

        <!-- Formulaire Inscription -->
        <form method="POST" action="{{ route('register') }}" id="registerForm" style="display: none;">
          @csrf
          <h5>S'inscrire</h5>
          <hr>

          <div class="mb-3">
            <label for="registerName" class="form-label">Nom complet</label>
            <input id="registerName" type="text" name="name" value="{{ old('name') }}" required autofocus autocomplete="name" 
                   class="form-control @error('name') is-invalid @enderror">
            @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>

          <div class="mb-3">
            <label for="registerEmail" class="form-label">Adresse email</label>
            <input id="registerEmail" type="email" name="email" value="{{ old('email') }}" required autocomplete="username" 
                   class="form-control @error('email') is-invalid @enderror">
            @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>

          <div class="mb-3">
            <label for="registerPassword" class="form-label">Mot de passe</label>
            <input id="registerPassword" type="password" name="password" required autocomplete="new-password" 
                   class="form-control @error('password') is-invalid @enderror">
            @error('password')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>

          <div class="mb-3">
            <label for="registerPasswordConfirmation" class="form-label">Confirmer le mot de passe</label>
            <input id="registerPasswordConfirmation" type="password" name="password_confirmation" required autocomplete="new-password" 
                   class="form-control">
          </div>

          <button type="submit" class="btn w-100" 
            style="background-color: #000; border-color: #000; color: #fff;"
            onmouseover="this.style.backgroundColor='#f35525'; this.style.borderColor='#f35525'; this.style.color='#fff';"
            onmouseout="this.style.backgroundColor='#000'; this.style.borderColor='#000'; this.style.color='#fff';"
            onfocus="this.style.backgroundColor='#f35525'; this.style.borderColor='#f35525'; this.style.color='#fff';"
            onblur="this.style.backgroundColor='#000'; this.style.borderColor='#000'; this.style.color='#fff';"
          >
            S'inscrire
          </button>

          <div class="text-center mt-3">
            <small>Déjà un compte ? <a href="#" id="showLoginForm">Se connecter</a></small>
          </div>
        </form>

      </div>
    </div>
  </div>
</div>




