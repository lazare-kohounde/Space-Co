<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Espace Membre - Space-Co</title>

  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet" />
  <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" />
  <link rel="stylesheet" href="{{ asset('assets/css/fontawesome.css') }}" />
  <link rel="stylesheet" href="{{ asset('assets/css/templatemo-villa-agency.css') }}" />
  <link rel="stylesheet" href="{{ asset('assets/css/owl.css') }}" />
  <link rel="stylesheet" href="{{ asset('assets/css/animate.css') }}" />
  <style>
    .btn-orange {
      background-color: #f35525 !important;
      border-color: #f35525 !important;
      color: #fff !important;
    }
    .btn-orange:hover {
      background-color: #d84315 !important;
      border-color: #d84315 !important;
    }
    .dashboard-menu {
      background: #fff;
      border-radius: 8px;
      box-shadow: 0 2px 15px rgba(0, 0, 0, 0.07);
      margin-bottom: 2rem;
      position: sticky;
      top: 80px;
      padding-top: 1rem;
      height: fit-content;
    }
    .dashboard-menu .list-group-item {
      border: none;
      border-radius: 0;
      padding: 1rem 1.5rem;
      font-weight: 600;
      color: #333;
      background: transparent;
      cursor: pointer;
      transition: background-color 0.3s, color 0.3s;
    }
    .dashboard-menu .list-group-item.active,
    .dashboard-menu .list-group-item:hover {
      background: #f35525;
      color: #fff;
    }
    .dashboard-content {
      background: #fff;
      border-radius: 8px;
      box-shadow: 0 2px 15px rgba(0, 0, 0, 0.07);
      padding: 2rem;
      min-height: 400px;
    }
    .form-label {
      font-weight: 600;
    }
    .profile-summary {
      display: flex;
      align-items: center;
      gap: 1.5rem;
      margin-bottom: 2rem;
    }
    .profile-avatar {
      width: 90px;
      height: 90px;
      border-radius: 50%;
      background: #f35525;
      color: #fff;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 2.5rem;
      font-weight: bold;
      box-shadow: 0 2px 10px rgba(0,0,0,0.10);
      overflow: hidden;
      object-fit: cover;
    }
    @media (max-width: 576px) {
      .profile-summary { flex-direction: column; align-items: flex-start; }
      .profile-avatar { margin-bottom: 1rem; }
    }
  </style>
</head>

<body>
  <!-- Header -->
  @include('client.layouts.header')

  <!-- Page Heading -->
  <div class="page-heading header-text">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <h3>Espace Membre</h3>
        </div>
      </div>
    </div>
  </div>

  <!-- Main Content -->
  <div class="single-property section">
    <div class="container">
      <div class="row justify-content-center">
        <!-- Menu Dashboard -->
        <div class="col-lg-2">
          <div class="dashboard-menu">
            <div class="list-group list-group-flush" id="dashboardMenu" role="tablist" aria-orientation="vertical">
              <button class="list-group-item active" data-bs-target="#profilContent" type="button" role="tab" aria-selected="true" aria-controls="profilContent">
                <i class="fa fa-user me-2"></i> Mon Profil
              </button>
              <button class="list-group-item" data-bs-target="#historiqueContent" type="button" role="tab" aria-selected="false" aria-controls="historiqueContent">
                <i class="fa fa-history me-2"></i> Historique Réservations
              </button>
              <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="list-group-item text-danger" style="font-weight:600;">
                  <i class="fa fa-sign-out-alt me-2"></i> Déconnexion
                </button>
              </form>
            </div>
          </div>
        </div>

        <!-- Contenu Dashboard -->
        <div class="col-lg-10">
          <!-- Profil -->
          <div class="dashboard-content" id="profilContent" role="tabpanel" tabindex="0">
            <h4 class="mb-4" style="color: #f35525">Mon Profil</h4>

            <!-- Volet résumé profil -->
            <div class="profile-summary mb-4">
              @php
                  $user = auth()->user();
                  // Avatar image si tu en as, sinon initiales
                  $avatar = $user->avatar ?? null; // à adapter si tu stockes une image
                  $initiales = strtoupper(mb_substr($user->name, 0, 1));
              @endphp
              @if($avatar)
                <img src="{{ asset('storage/avatars/'.$avatar) }}" alt="Avatar" class="profile-avatar">
              @else
                <div class="profile-avatar">{{ $initiales }}</div>
              @endif
              <div>
                <h5 class="mb-1">{{ $user->name }}</h5>
                <p class="mb-1"><i class="fa fa-envelope me-2"></i>{{ $user->email }}</p>
                <p class="mb-1"><i class="fa fa-phone me-2"></i>{{ $user->phone ?? 'Non renseigné' }}</p>
                <p class="mb-0 text-muted"><i class="fa fa-calendar me-2"></i>Inscrit le {{ $user->created_at->format('d/m/Y') }}</p>
              </div>
            </div>

            <!-- Formulaire de modification -->
            <h5 class="mb-3">Modifier mes informations</h5>

            {{-- Affichage des erreurs --}}
            @if ($errors->any())
              <div class="alert alert-danger">
                <ul class="mb-0">
                  @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                  @endforeach
                </ul>
              </div>
            @endif

            {{-- Message succès --}}
            @if (session('status') == 'profile-updated')
              <div class="alert alert-success">
                Profil mis à jour avec succès.
              </div>
            @endif

            <form method="POST" action="{{ route('profile.update') }}">
              @csrf
              @method('PATCH')
              <div class="mb-3">
                <label for="name" class="form-label">Nom complet</label>
                <input type="text" id="name" name="name" class="form-control" value="{{ old('name', $user->name) }}" required autofocus>
              </div>
              <div class="mb-3">
                <label for="email" class="form-label">Adresse email</label>
                <input type="email" id="email" name="email" class="form-control" value="{{ old('email', $user->email) }}" required>
              </div>
              <div class="mb-3">
                <label for="phone" class="form-label">Téléphone</label>
                <input type="text" id="phone" name="phone" class="form-control" value="{{ old('phone', $user->phone ?? '') }}">
              </div>
              <button type="submit" class="btn btn-orange">Mettre à jour</button>
            </form>
          </div>

          <!-- Historique -->
          <div class="dashboard-content d-none" id="historiqueContent" role="tabpanel" tabindex="0">
            <h4 class="mb-4" style="color: #f35525">Historique des réservations</h4>
            <div class="table-responsive">
              <table class="table align-middle">
                <thead>
                  <tr>
                    <th>ID Réservation</th>
                    <th>Date</th>
                    <th>Utilisateur</th>
                    <th>Statut</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>#12345</td>
                    <td>15/04/2025</td>
                    <td>{{ $user->name }}</td>
                    <td><span class="badge bg-success">Terminée</span></td>
                    <td><a href="#" class="btn btn-sm btn-orange">Détails</a></td>
                  </tr>
                  <tr>
                    <td>#12346</td>
                    <td>10/03/2025</td>
                    <td>{{ $user->name }}</td>
                    <td><span class="badge bg-warning text-dark">En cours</span></td>
                    <td><a href="#" class="btn btn-sm btn-orange">Détails</a></td>
                  </tr>
                  <tr>
                    <td>#12347</td>
                    <td>05/02/2025</td>
                    <td>{{ $user->name }}</td>
                    <td><span class="badge bg-secondary">Annulée</span></td>
                    <td><a href="#" class="btn btn-sm btn-orange">Détails</a></td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Footer -->
  @include('client.layouts.footer')

  <!-- Scripts -->
  <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
  <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('assets/js/isotope.min.js') }}"></script>
  <script src="{{ asset('assets/js/owl-carousel.js') }}"></script>
  <script src="{{ asset('assets/js/counter.js') }}"></script>
  <script src="{{ asset('assets/js/custom.js') }}"></script>

  <script>
    // Gestion simple du menu dashboard
    document.querySelectorAll('.dashboard-menu .list-group-item').forEach(function (btn) {
      btn.addEventListener('click', function (e) {
        // Ignore le bouton déconnexion (form submit)
        if (btn.tagName === 'BUTTON' && btn.type === 'submit') return;
        e.preventDefault();

        document.querySelectorAll('.dashboard-menu .list-group-item').forEach(i => i.classList.remove('active'));
        btn.classList.add('active');

        const targetId = btn.getAttribute('data-bs-target');
        if (!targetId) return;

        document.querySelectorAll('.dashboard-content').forEach(section => {
          section.classList.add('d-none');
        });
        const targetSection = document.querySelector(targetId);
        if (targetSection) targetSection.classList.remove('d-none');
      });
    });
  </script>
</body>
</html>
