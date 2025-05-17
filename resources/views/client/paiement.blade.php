<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <title>Paiement - Space-Co</title>
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
    <!-- Script FedaPay (sandbox) -->
    <script src="https://cdn.fedapay.com/checkout.js?v=1.1.7"></script>
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

@include('client.layouts.header')

<div class="page-heading header-text">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h3>Paiement</h3>
            </div>
        </div>
    </div>
</div>

<div class="single-property section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-12">
            <div class="alert alert-danger alert-dismissible fade show container mt-4" role="alert">
                Vous payez la moitié du montant total pour valider votre réservation et solder la moitié restant le jour d'usage de la propriété
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
                <div class="card shadow-sm p-4 mb-4">
                    <h5 class="mb-4" style="color: #f35525">Récapitulatif de votre panier</h5>
                    <div class="table-responsive">
                        <table class="table align-middle">
                            <thead>
                                <tr>
                                    <th scope="col">Salle</th>
                                    <th scope="col">Date début</th>
                                    <th scope="col">Date fin</th>
                                    <th scope="col">Option</th>
                                    <th scope="col">Montant</th>
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
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center">Aucun élément dans le panier.</td>
                                </tr>
                            @endforelse
                            </tbody>

                        </table>
                    </div>
                    <div class="d-flex justify-content-end align-items-center mt-3">
                        <h5 class="me-3 mb-0">Total :</h5>
                        <h4 class="mb-0 fw-bold" style="color:#f35525">
                            {{ number_format($total, 0, ',', ' ') }} XOF
                        </h4>
                    </div>

                </div>

                <!-- Formulaire de paiement FedaPay -->
                <div class="card shadow-sm p-4">
                    <h5 class="mb-4">Procéder au paiement</h5>
                    <form id="fedapay-form" onsubmit="handleFedaPay(event)">
                        <div class="mb-3">
                            <label for="prenom" class="form-label">Prénom</label>
                            <input type="text" class="form-control" id="prenom" name="prenom" required placeholder="Votre prénom">
                        </div>
                        <div class="mb-3">
                            <label for="nom" class="form-label">Nom</label>
                            <input type="text" class="form-control" id="nom" name="nom" required placeholder="Votre nom">
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Adresse email</label>
                            <input type="email" class="form-control" id="email" name="email" required placeholder="exemple@email.com">
                        </div>
                        <div class="mb-3">
                            <label for="telephone" class="form-label">Téléphone</label>
                            <input type="tel" class="form-control" id="telephone" name="telephone" required placeholder="ex: 22997000000">
                        </div>
                        <button type="submit" class="btn btn-orange w-100 mt-2" id="fedapay-btn">
                            Payer maintenant
                        </button>
                    </form>
                    <div class="text-center mt-3">
                        <img src="https://docs-v1.fedapay.com/assets/feda-logo-blue-321eee300a4d16670cbaf7d5be77f632632781529e018009a77b7aaffdfb9a4e.svg" alt="FedaPay" style="height:32px;">
                        <p class="text-muted small mb-0">Paiement sécurisé via FedaPay</p>
                    </div>
                </div>
                <!-- Fin formulaire paiement -->
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
// Fonction pour déclencher le paiement FedaPay
function handleFedaPay(event) {
    event.preventDefault();
    // Récupérer les infos du formulaire
    var prenom = document.getElementById('prenom').value;
    var nom = document.getElementById('nom').value;
    var email = document.getElementById('email').value;
    var telephone = document.getElementById('telephone').value;
    var route = "route('payment.callback')";


    console.log("route", route)
    // Appel du widget FedaPay (mode test)
    FedaPay.init('#fedapay-btn', {
        public_key: "pk_sandbox_1l6bRH8oSU0oei0VTTB0MvxE", // Remplace par ta clé publique sandbox
        transaction: {
            amount: parseFloat("{{ $total }}") / 2,
            currency: {
                iso: "XOF"
            },
            description: "Paiement de réservation Space-Co",
        },
        customer: {
            firstname: prenom,
            lastname: nom,
            email: email,
            phone_number: {
                number: telephone,
                country: "BJ" // Adapter selon le pays
            }
        }
    });

    console.log("route-1", route)
}
</script>
</body>
</html>
