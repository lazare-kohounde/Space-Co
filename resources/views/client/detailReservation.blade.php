<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <title>Détail réservation - Space-Co</title>
    <link rel="icon" type="image/png" href="{{ asset('assets/images/favicon.png') }}" sizes="16x16">
    <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/fontawesome.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/templatemo-villa-agency.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/owl.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/animate.css') }}">
    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />
    <style>
        .btn-orange {
            background-color: #f35525 !important;
            border-color: #f35525 !important;
            color: #fff !important;
        }

        .btn-orange:hover,
        .btn-orange:focus {
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
                    <h3>Détail de la réservation</h3>
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
                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <h5 style="color: #f35525">Les détails</h5>
                            @if (in_array($reservation['status'], ['pending', 'approved']))
                            <a href="{{ route('reservation.facture', $reservation->id) }}" class="btn btn-orange">
                                Télécharger la facture PDF
                            </a>
                            @endif
                        </div>




                        <div class="table-responsive">
                            <table class="table align-middle">
                                <thead>
                                    <tr class="align-self-center">
                                        <th>#</th>
                                        <th>Salle</th>
                                        <th>Date début</th>
                                        <th>Date fin</th>
                                        <th>Montant</th>
                                        <th>Images</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach($reservation_details_info as $index => $reservation_el)
                                    <tr>
                                        <td>{{ str_pad($index + 1, 3, '0', STR_PAD_LEFT) }}</td> {{-- Affiche 001, 002, etc. --}}
                                        <td>{{ $reservation_el['room_name'] ?? 'Salle inconnu' }}</td>
                                        <td>{{$reservation_el['date_debut'] }}</td>
                                        <td>{{$reservation_el['date_fin'] }}</td>
                                        <td>{{ number_format($reservation_el['prix'], 0, ',', ' ') }} XOF</td>
                                        <td><img src="{{ asset($reservation_el['img']) }}" alt="ceec" style="width: 60px; height: 60px; object-fit:cover; border-radius:8px; margin-right:10px;" class="img-thumbnail m-1"></td>
                                        <td><a href="{{ route('salledetails', ['id' => $reservation_el['roomid']]) }}" class="btn btn-sm btn-orange">Réserver la même salle</a></td>
                                    </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div><!--end table-responsive-->
                        @if ($reservation['status'] =='pending')
                        <div class="pt-3 border-top text-right">
                            <form method="POST" action="{{ route('reservation.cancelled', $reservation['id']) }}" onsubmit="return confirmCancel();">
                                @csrf
                                <button type="submit" class="list-group-item text-danger" style="font-weight:600;">
                                    <i class="fa fa-ban text-danger me-2"></i> Annuler la réservation
                                </button>
                            </form>

                        </div>
                        @endif
                    </div>
                    <br>
                    @if (in_array($reservation['status'], ['pending', 'approved']))
                    <h5>Paiement</h5>
                            @if ($payment)
                            @if ($payment->status === 'pending')
                            <p>Montant payé : {{ $payment->amount_paid }} F CFA</p>
                            <p>Status : En attente</p>
                            <p><strong>Rappel :</strong> Vous avez effectué un paiement partiel. Pour confirmer définitivement votre réservation, merci de régler le reste du montant.</p>
                            @elseif ($payment->status === 'approved')
                            <p><strong>Paiement soldé ✅</strong></p>
                            <p>Montant payé : {{ $payment->amount_paid }} F CFA</p>
                            <p>Status : Approuvé</p>
                            <p>Approuvé par : {{ $payment->manager }}</p>
                            <p>Date du 1er paiement (via FedaPay) : {{ $payment->created_at}}</p>
                            <p>Date du paiement final : {{ $payment->updated_at }}</p>
                            @else
                            <p>Status de paiement inconnu.</p>
                            @endif
                            @else
                            <p>Aucun paiement enregistré pour cette réservation.</p>
                            @endif

                     @endif

                </div>
            </div>
        </div>
    </div>
    </div>

    @include('client.layouts.footer')

    <script>
        function confirmCancel() {
            return confirm("❗ Cette action est irréversible. Voulez-vous vraiment annler cette réservation ?");
        }
    </script>


    <!-- Scripts -->
    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/isotope.min.js') }}"></script>
    <script src="{{ asset('assets/js/owl-carousel.js') }}"></script>
    <script src="{{ asset('assets/js/counter.js') }}"></script>
    <script src="{{ asset('assets/js/custom.js') }}"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const loginForm = document.getElementById('loginForm');
            const registerForm = document.getElementById('registerForm');
            const showRegisterLink = document.getElementById('showRegisterForm');
            const showLoginLink = document.getElementById('showLoginForm');

            showRegisterLink.addEventListener('click', function(e) {
                e.preventDefault();
                loginForm.style.display = 'none';
                registerForm.style.display = 'block';
            });

            showLoginLink.addEventListener('click', function(e) {
                e.preventDefault();
                registerForm.style.display = 'none';
                loginForm.style.display = 'block';
            });
        });
    </script>
    <!-- scripte de confirmation de suppression de salle de panier -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const deleteButtons = document.querySelectorAll('.delete-button');

            deleteButtons.forEach(function(button) {
                button.addEventListener('click', function(event) {
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