<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <title>Mon Historique - Space-Co</title>
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
                <h3>Mes réservations</h3>
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

<!-- @if (session('error'))
    <div class="alert alert-danger alert-dismissible fade show container mt-4" role="alert">
        {{ session('error') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif -->


<div class="single-property section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="card shadow-sm p-4">
                    <h5 class="mb-4" style="color: #f35525">Historique de mes réservations</h5>

                   
                    <div class="table-responsive">
                        <table class="table align-middle">
                            <thead>
                                <tr>
                                    <th>ID Réservation</th>
                                    <th>Date</th>
                                    <th>Montant</th>
                                    <th>Statut</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if($reservations->count() > 0)
                                    @foreach($reservations as $reservation)
                                    <tr>
                                        <td>#{{ $reservation->id }}</td>
                                        <td>{{ \Carbon\Carbon::parse($reservation->reservation_date)->format('d/m/Y') }}</td>
                                        <td>{{ number_format($reservation->total_amount, 0, ',', ' ') }} XOF</td>
                                        <td>
                                        @if($reservation->status == 'pending')
                                            <span class="badge bg-warning text-dark">En attente</span>
                                        @elseif($reservation->status == 'completed')
                                            <span class="badge bg-success">Terminée</span>
                                        @elseif($reservation->status == 'cancelled')
                                            <span class="badge bg-secondary">Annulée</span>
                                        @else
                                            <span class="badge bg-info">{{ $reservation->status }}</span>
                                        @endif
                                        </td>
                                        <td>
                                        <a href="#" class="btn btn-sm btn-orange">Détails</a>
                                        </td>
                                    </tr>
                                    @endforeach
                                @else
                                    <tr>
                                    <td colspan="5" class="text-center">Aucune réservation trouvée</td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                    
                                        
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
