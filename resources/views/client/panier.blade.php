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

<div class="single-property section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="card shadow-sm p-4">
                    <h5 class="mb-4" style="color: #f35525">Liste des salles ajoutées au panier</h5>

                    {{-- @if(isset($panier) && count($panier) > 0) --}}
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
                                {{-- @foreach($panier as $item) --}}
                                <!-- Données fictives -->
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <img src="{{ asset('assets/images/single-property.jpg') }}" alt="Salle" style="width: 60px; height: 60px; object-fit:cover; border-radius:8px; margin-right:10px;">
                                            <div>
                                                <strong>Bureau Prestige</strong>
                                                <div class="text-muted small">24 New Street Miami</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>12/05/2025 09:00</td>
                                    <td>12/05/2025 18:00</td>
                                    <td>Bureau équipé</td>
                                    <td class="fw-bold" style="color:#f35525">20 000 XOF</td>
                                    <td>
                                        {{-- 
                                        <form action="{{ route('panier.remove', $item->id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-outline-danger" title="Retirer du panier"><i class="fa fa-trash"></i></button>
                                        </form>
                                        --}}
                                        <button class="btn btn-sm btn-outline-danger" title="Retirer du panier" disabled><i class="fa fa-trash"></i></button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <img src="{{ asset('assets/images/deal-02.jpg') }}" alt="Salle" style="width: 60px; height: 60px; object-fit:cover; border-radius:8px; margin-right:10px;">
                                            <div>
                                                <strong>Salle de Conférence</strong>
                                                <div class="text-muted small">Avenue Business City</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>15/05/2025 14:00</td>
                                    <td>15/05/2025 17:00</td>
                                    <td>Salle de conférence</td>
                                    <td class="fw-bold" style="color:#f35525">35 000 XOF</td>
                                    <td>
                                        <button class="btn btn-sm btn-outline-danger" title="Retirer du panier" disabled><i class="fa fa-trash"></i></button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <img src="{{ asset('assets/images/deal-03.jpg') }}" alt="Salle" style="width: 60px; height: 60px; object-fit:cover; border-radius:8px; margin-right:10px;">
                                            <div>
                                                <strong>Salle Coworking</strong>
                                                <div class="text-muted small">Tech Park, Plateau</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>20/05/2025 08:00</td>
                                    <td>20/05/2025 18:00</td>
                                    <td>Coworking</td>
                                    <td class="fw-bold" style="color:#f35525">15 000 XOF</td>
                                    <td>
                                        <button class="btn btn-sm btn-outline-danger" title="Retirer du panier" disabled><i class="fa fa-trash"></i></button>
                                    </td>
                                </tr>
                                {{-- @endforeach --}}
                            </tbody>
                        </table>
                    </div>
                    <div class="d-flex justify-content-end align-items-center mt-3">
                        <h5 class="me-3 mb-0">Total :</h5>
                        <h4 class="mb-0 fw-bold" style="color:#f35525">
                            {{-- {{ number_format($panier->sum('montant'), 0, ',', ' ') }} XOF --}}
                            70 000 XOF
                        </h4>
                    </div>
                    <div class="d-flex justify-content-end mt-4 gap-2">
                        <a href="{{ route('accueil') }}" class="btn btn-outline-secondary">
                         Continuer mes réservations
                        </a>
                        {{-- <a href="{{ route('checkout') }}" class="btn btn-orange">Valider la réservation</a> --}}
                        <a href="{{ route('paiement') }}"><button class="btn btn-orange">Valider la réservation</button></a>
                    </div>

                    {{-- 
                    @else
                    <div class="alert alert-info">
                        Votre panier est vide.
                    </div>
                    <div class="d-flex justify-content-center mt-4">
                        <a href="{{ route('accueil') }}" class="btn btn-orange">Continuer mes réservations</a>
                    </div>
                    @endif
                    --}}
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
    
</body>
</html>
