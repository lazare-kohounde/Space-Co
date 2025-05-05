<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <title>Space-Co</title>
    <link rel="icon" type="image/png" href="{{ asset('assets/images/favicon.png') }}" sizes="16x16">
    <!-- Bootstrap core CSS -->
    <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="{{ asset('assets/css/fontawesome.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/templatemo-villa-agency.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/owl.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/animate.css') }}">
    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css"/>
    <style>
.btn-orange {
  background-color: #000 !important;
  border-color: #000 !important;
  color: #fff !important;
}
.btn-orange:hover, .btn-orange:focus {
  background-color: #f35525 !important;
  border-color: #f35525 !important;
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
                <h3>Détails de la salle</h3>
            </div>
        </div>
    </div>
</div>

<div class="single-property section">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="main-image">
                    <img src="assets/images/single-property.jpg" alt="">
                </div>
                <div class="main-content">
                    <div class="ligne" style="display: flex; flex-direction: row; align-items: end;justify-content: space-between;">
                        <span class="category">Bureau</span><h6>2.000 XOF</h6>
                    </div>
                    <h4>24 New Street Miami, OR 24560</h4>
                    <p>
                        Get <strong>the best villa agency</strong> HTML CSS Bootstrap Template for your company website. TemplateMo provides you the <a href="https://www.google.com/search?q=best+free+css+templates" target="_blank">best free CSS templates</a> in the world. Please tell your friends about it. Thank you. Cloud bread kogi bitters pitchfork shoreditch tumblr yr succulents single-origin coffee schlitz enamel pin you probably haven't heard of them ugh hella.
                        <br><br>
                        When you look for free CSS templates, you can simply type TemplateMo in any search engine website. In addition, you can type TemplateMo Digital Marketing, TemplateMo Corporate Layouts, etc. Master cleanse +1 intelligentsia swag post-ironic, slow-carb chambray knausgaard PBR&B DSA poutine neutra cardigan hoodie pop-up.
                    </p>
                </div>
                
            </div>
            <!-- Bloc réservation -->
            <div class="col-lg-4">
                <div class="card p-4 shadow-sm">
                    <h5 class="mb-3" style="color: #f35525">Réserver cette salle</h5>
                    <!-- Montant affiché, non modifiable -->
                    <div class="mb-3">
                        <label class="form-label">Montant</label>
                        <div class="form-control-plaintext fw-bold" style="font-size:1.2em;">2.000 XOF</div>
                    </div>
                    <form action="" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="date_debut" class="form-label">Date de début</label>
                            <input type="datetime-local" class="form-control" id="date_debut" name="date_debut" required>
                        </div>
                        <div class="mb-3">
                            <label for="date_fin" class="form-label">Date de fin</label>
                            <input type="datetime-local" class="form-control" id="date_fin" name="date_fin" required>
                        </div>
                        <div class="mb-3">
                            <label for="option" class="form-label">Option</label>
                            <select class="form-select" id="option" name="option" required>
                                <option>Sélectionner une option</option>
                                <option value="equipée">Equipée</option>
                                <option value="non_equipée">Non equipée</option>
                            </select>
                        </div>
                        <!--<button type="submit" class="btn btn-orange w-100">Ajouter au panier</button>-->
                    </form>
                    <a href="{{ route('panier') }}"><button type="submit" class="btn btn-orange w-100">Ajouter au panier</button></a>
                </div>
            </div>
            <!-- Fin bloc réservation -->
        </div>
    </div>
</div>

<div class="section best-deal">
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <div class="section-heading">
                    <h6>| Offre exclusive</h6>
                    <h2>Que des espaces idéales !</h2>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="tabs-content">
                    <div class="row">
                        <div class="nav-wrapper ">
                            <ul class="nav nav-tabs" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="appartment-tab" data-bs-toggle="tab" data-bs-target="#appartment" type="button" role="tab" aria-controls="appartment" aria-selected="true">Bureau</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="villa-tab" data-bs-toggle="tab" data-bs-target="#villa" type="button" role="tab" aria-controls="villa" aria-selected="false">Salle de conférence</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="penthouse-tab" data-bs-toggle="tab" data-bs-target="#penthouse" type="button" role="tab" aria-controls="penthouse" aria-selected="false">Salle de Coworking</button>
                                </li>
                            </ul>
                        </div>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="appartment" role="tabpanel" aria-labelledby="appartment-tab">
                                <div class="row">
                                    <div class="col-lg-3">
                                        <div class="info-table">
                                            <ul>
                                                <li>Surface totale plate <span>5 m2</span></li>
                                                <li>Equipement Professionnel </li>
                                                <li>Espace café </li>
                                                <li>Stationnement disponible </li>
                                                <li>Moyen de paiement <span>MoMo</span></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <img src="assets/images/deal-01.jpg" alt="">
                                    </div>
                                    <div class="col-lg-3">
                                        <h4>Informations supplémentaires sur le Bureau</h4>
                                        <p>Profitez d’un espace de travail privé, entièrement meublé et équipé, offrant une connexion Internet haut débit et un accès sécurisé 24/7.
                                            <br><br>Situé dans un quartier dynamique, l’emplacement offre une proximité immédiate avec des restaurants, cafés et autres commodités essentielles.</p>
                                        <div class="icon-button">
                                            <a href="{{ route('salledetails') }}"><i class="fa fa-eye"></i> Voire plus</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="villa" role="tabpanel" aria-labelledby="villa-tab">
                                <div class="row">
                                    <div class="col-lg-3">
                                        <div class="info-table">
                                            <ul>
                                                <li>Surface totale plate <span>5 m2</span></li>
                                                <li>Equipement Professionnel </li>
                                                <li>Espace café </li>
                                                <li>Stationnement disponible </li>
                                                <li>Moyen de paiement <span>MoMo</span></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <img src="assets/images/deal-02.jpg" alt="">
                                    </div>
                                    <div class="col-lg-3">
                                        <h4>Informations supplémentaires sur la salle de conférence</h4>
                                        <p>Profitez d’un espace de travail privé, entièrement meublé et équipé, offrant une connexion Internet haut débit et un accès sécurisé 24/7.
                                            <br><br>Situé dans un quartier dynamique, l’emplacement offre une proximité immédiate avec des restaurants, cafés et autres commodités essentielles.</p>
                                        <div class="icon-button">
                                            <a href="{{ route('salledetails') }}"><i class="fa fa-eye"></i> Voire plus</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="penthouse" role="tabpanel" aria-labelledby="penthouse-tab">
                                <div class="row">
                                    <div class="col-lg-3">
                                        <div class="info-table">
                                            <ul>
                                                <li>Surface totale plate <span>5 m2</span></li>
                                                <li>Equipement Professionnel </li>
                                                <li>Espace café </li>
                                                <li>Stationnement disponible </li>
                                                <li>Moyen de paiement <span>MoMo</span></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <img src="assets/images/deal-03.jpg" alt="">
                                    </div>
                                    <div class="col-lg-3">
                                        <h4>Informations supplémentaires sur la salle de Coworking</h4>
                                        <p>Profitez d’un espace de travail privé, entièrement meublé et équipé, offrant une connexion Internet haut débit et un accès sécurisé 24/7.
                                            <br><br>Situé dans un quartier dynamique, l’emplacement offre une proximité immédiate avec des restaurants, cafés et autres commodités essentielles.</p>
                                        <div class="icon-button">
                                            <a href="{{ route('salledetails') }}"><i class="fa fa-eye"></i>Voire plus</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
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

// Bloquer les dates antérieures pour les champs datetime-local
<script>
document.addEventListener('DOMContentLoaded', function () {
    function getNowLocalDatetime() {
        const now = new Date();
        now.setSeconds(0, 0);
        const pad = n => n.toString().padStart(2, '0');
        return now.getFullYear() + '-' +
            pad(now.getMonth() + 1) + '-' +
            pad(now.getDate()) + 'T' +
            pad(now.getHours()) + ':' +
            pad(now.getMinutes());
    }
    const minDate = getNowLocalDatetime();
    document.getElementById('date_debut').setAttribute('min', minDate);
    document.getElementById('date_fin').setAttribute('min', minDate);

    // Empêcher date_fin < date_debut
    document.getElementById('date_debut').addEventListener('change', function() {
        document.getElementById('date_fin').setAttribute('min', this.value);
    });
});
</script>

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
