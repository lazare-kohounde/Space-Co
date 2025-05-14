<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <title>Mon Panier - Space-Co</title>
    <link rel="icon" type="image/png" href="{{ asset('assets/images/favicon.png') }}" sizes="16x16">
    <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/fontawesome.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/templatemo-villa-agency.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/owl.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/animate.css') }}">
    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css"/>
    <style>
    .btn-orange {
        background-color: #f35525 !important;
        border-color: #f35525 !important;
        color: #fff !important;
    }
    .btn-orange:hover, .btn-orange:focus {
        background-color: #000 !important;
        border-color: #000 !important;
        color: #fff !important;
    }
    </style>
</head>

<body>

<!-- ***** Preloader Start ***** -->
<div id="js-preloader" class="js-preloader">
    <div class="preloader-inner">
        <span class="dot"></span>
        <div class="dots">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>
</div>
<!-- ***** Preloader End ***** -->

<!-- ***** Header Area Start ***** -->
@include('client.layouts.header')
<!-- ***** Header Area End ***** -->

<div class="page-heading header-text">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h3>Mon panier</h3>
            </div>
        </div>
    </div>
</div>


@if (session('success'))
    <div class="alert alert-success alert-dismissible fade show container mt-4" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

@if (session('error'))
    <div class="alert alert-danger alert-dismissible fade show container mt-4" role="alert">
        {{ session('error') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif


<div class="single-property section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="card shadow-sm p-4">
                    <h5 class="mb-4" style="color: #f35525">Liste des salles ajoutées au panier</h5>

                    @if(isset($panier) && count($panier) > 0)
                    <div class="table-responsive">
                        <table class="table align-middle">
                            <thead>
                                <tr>
                                    <th scope="col">Salle</th>
                                    <th scope="col">Date début</th>
                                    <th scope="col">Date fin</th>
                                    <th scope="col">Option</th>
                                    <th scope="col">Montant</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            @forelse($panier as $item)
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <img src="{{ asset($item['image']) }}" alt="Salle" style="width: 60px; height: 60px; object-fit:cover; border-radius:8px; margin-right:10px;">
                                            <div>
                                                <strong>{{ $item['nom'] }}</strong>
                                                <div class="text-muted small">{{ $item['adresse'] }}</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>{{ $item['date_debut'] }}</td>
                                    <td>{{ $item['date_fin'] }}</td>
                                    <td>{{ $item['option'] }}</td>
                                    <td class="fw-bold" style="color:#f35525">{{ number_format($item['montant'], 0, ',', ' ') }} XOF</td>
                                    <td>
                                        <form action="{{ route('panier.supprimer', $item['id']) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-sm btn-outline-danger delete-button" title="Retirer du panier"><i class="fa fa-trash"></i></button>
                                        </form>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="6" class="text-center">Votre panier est vide.</td>
                                </tr>
                                @endforelse

                            </tbody>
                        </table>
                    </div>
                    @php
                        $total = collect($panier)->sum('montant');
                    @endphp

                    <div class="d-flex justify-content-end align-items-center mt-3">
                        <h5 class="me-3 mb-0">Total :</h5>
                        <h4 class="mb-0 fw-bold" style="color:#f35525">
                            {{ number_format($total, 0, ',', ' ') }} XOF
                        </h4>
                    </div>

                    <div class="d-flex justify-content-end mt-4 gap-2">
                        <a href="{{ route('salle') }}" class="btn btn-outline-secondary">
                         Continuer mes réservations
                        </a>
                        {{-- <a href="{{ route('checkout') }}" class="btn btn-orange">Valider la réservation</a> --}}
                        <a href="{{ route('paiement') }}"><button class="btn btn-orange">Valider la réservation</button></a>
                    </div>

                    
                    @else
                    <div class="alert alert-info">
                        Votre panier est vide.
                    </div>
                    <div class="d-flex justify-content-center mt-4">
                        <a href="{{ route('salle') }}" class="btn btn-orange">Continuer mes réservations</a>
                    </div>
                    @endif
                    
                </div>
            </div>
        </div>
    </div>
</div>

@include('client.layouts.footer')

<!-- Scripts -->
<script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('vendor/bootstrap/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/js/isotope.min.js') }}"></script>
<script src="{{ asset('assets/js/owl-carousel.js') }}"></script>
<script src="{{ asset('assets/js/counter.js') }}"></script>
<script src="{{ asset('assets/js/custom.js') }}"></script>

<script>
  document.addEventListener('DOMContentLoaded', function () {
    const loginForm = document.getElementById('loginForm');
    const registerForm = document.getElementById('registerForm');
    const showRegisterLink = document.getElementById('showRegisterForm');
    const showLoginLink = document.getElementById('showLoginForm');

    showRegisterLink.addEventListener('click', function (e) {
      e.preventDefault();
      loginForm.style.display = 'none';
      registerForm.style.display = 'block';
    });

    showLoginLink.addEventListener('click', function (e) {
      e.preventDefault();
      registerForm.style.display = 'none';
      loginForm.style.display = 'block';
    });
  });
</script>
<!-- scripte de confirmation de suppression de salle de panier -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const deleteButtons = document.querySelectorAll('.delete-button');

        deleteButtons.forEach(function (button) {
            button.addEventListener('click', function (event) {
                event.preventDefault(); // Empêche l'envoi immédiat

                if (confirm('Voulez-vous vraiment supprimer cette salle du panier ?')) {
                    // Soumettre le formulaire parent
                    this.closest('form').submit();
                }
            });
        });
    });
</script>

    
</body>
</html>
