<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <!-- Owl Carousel CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">
    <!-- Owl Carousel CSS -->

    <!-- jQuery (Obligatoire) -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <!-- Owl Carousel JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>



    <title>Space-Co</title>
    <link rel="icon" type="image/png" href="{{ asset('assets/images/favicon.png') }}" sizes="16x16">
    <!-- Bootstrap core CSS -->
    <link href={{asset("vendor/bootstrap/css/bootstrap.min.css")}} rel="stylesheet">


    <!-- Additional CSS Files -->
    <link rel="stylesheet" href={{asset("assets/css/fontawesome.css")}}>
    <link rel="stylesheet" href={{asset("assets/css/templatemo-villa-agency.css")}}>
    <link rel="stylesheet" href={{asset("assets/css/owl.css")}}>
    <link rel="stylesheet" href={{asset("assets/css/animate.css")}}>
    <link rel="stylesheet"href="https://unpkg.com/swiper@7/swiper-bundle.min.css"/>
<!--

TemplateMo 591 villa agency

https://templatemo.com/tm-591-villa-agency

-->



  </head>
  <script>
    $(document).ready(function(){
        $(".owl-banner").owlCarousel({
            loop: true,             // Boucle infinie
            autoplay: true,         // Défilement automatique
            autoplayTimeout: 5000,  // Temps entre les slides (5000ms = 5s)
            autoplayHoverPause: true, // Pause au survol
            items: 1,               // Un slide à la fois
            nav: false,             // Pas de flèches de navigation
            dots: true,             // Affichage des points de navigation
            animateOut: 'fadeOut',  // Effet de transition (optionnel)
        });
    });
</script>



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
  @include('client.layouts.header');
  <!-- ***** Header Area End ***** -->

  <div class="main-banner">
    <div class="owl-carousel owl-banner">
      <div class="item item-1">
        <div class="header-text" style="margin-top: -2cm;">
          <span class="category">Calavi, <em>Arconville</em></span>
          <div style="font-size: 55px; color: white; font-family: Bradley Hand, cursive; font-style: italic; font-weight: 700;">Dépêchez-vous !<br>Trouvez l'espace Coworking idéale pour vous</div>
        </div>
      </div>
      <div class="item item-2">
        <div class="header-text" style="margin-top: -2cm;">
          <span class="category">Calavi, <em>Arconville</em></span>
          <div style="font-size: 55px; color: white; font-family: Bradley Hand, cursive; font-style: italic; font-weight: 700;">Ne cherchez plus !<br>Réservez en un instant la salle de réunion idéale pour vos succès.</div>
        </div>
      </div>
      <div class="item item-3">
        <div class="header-text" style="margin-top: -2cm;">
          <span class="category">Calavi, <em>Arconville</em></span>
          <div style="font-size: 55px; color: white; font-family: Bradley Hand, cursive; font-style: italic; font-weight: 700;">A voutre goût !<br>Votre bureau privé personnalisé, prêt à l’emploi !</div>
        </div>
      </div>
    </div>
  </div>

  <div class="featured section">
    <div class="container">
      <div class="row">
        <div class="col-lg-4">
          <div class="left-image">
            <img src="assets/images/featured.jpg" alt="">
          </div>
        </div>
        <div class="col-lg-5">
          <div class="section-heading">
            <h3>Espace CoWorking &amp; Et bureaux Professionnel</h3>
          </div>
          <div class="accordion" id="accordionExample">
            <div class="accordion-item">
              <h2 class="accordion-header" id="headingOne">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                    1. Qui sommes-nous ?
                </button>
              </h2>
              <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                    Nous sommes une plateforme dédiée à la <strong>réservation d’espaces de coworking et de bureaux privés.</strong> Notre mission est d’offrir aux professionnels, startups et indépendants un cadre de travail flexible, confortable et inspirant. Grâce à notre service, vous pouvez facilement trouver et réserver un espace adapté à vos besoins, que ce soit pour une heure, une journée ou plus.</div>
              </div>
            </div>
            <div class="accordion-item">
              <h2 class="accordion-header" id="headingTwo">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                    2. Comment ça marche ?
                </button>
              </h2>
              <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                    Notre plateforme est simple et intuitive :

                    Recherchez un espace de coworking ou un bureau privé selon votre localisation et vos préférences.

                    Sélectionnez l’option qui vous convient (durée, services inclus, etc.).

                    Réservez directement en ligne en quelques clics.

                    Accédez à votre espace le jour de votre réservation et profitez d’un environnement de travail optimal                </div>
              </div>
            </div>
            <div class="accordion-item">
              <h2 class="accordion-header" id="headingThree">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                    3. Pourquoi nous ?
                </button>
              </h2>
              <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                    Flexibilité totale : Réservez à l’heure, à la journée ou au mois, selon vos besoins.

                    Espaces modernes et équipés : Connexion haut débit, bureaux confortables, salles de réunion et espaces détente.

                    Réservation simple et rapide : Interface fluide et paiement sécurisé en ligne.

                    Communauté dynamique : Travaillez aux côtés d’autres professionnels et développez votre réseau.                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-3">
          <div class="info-table">
            <ul>
              <li>
                <img src="assets/images/info-icon-01.png" alt="" style="max-width: 52px;">
                <h4>250 m2<br><span>Surface totale de</span></h4>
              </li>
              <li>
                <img src="assets/images/info-icon-02.png" alt="" style="max-width: 52px;">
                <h4>Contrat<br><span>Contrat pret</span></h4>
              </li>
              <li>
                <img src="assets/images/info-icon-03.png" alt="" style="max-width: 52px;">
                <h4>Paiement<br><span>Moyen de paiement</span></h4>
              </li>
              <li>
                <img src="assets/images/info-icon-04.png" alt="" style="max-width: 52px;">
                <h4>Sécurité<br><span>sous contrôle 24h/7</span></h4>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="video section">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 offset-lg-4">
          <div class="section-heading text-center">

            <h2 style="font-family: Bradley Hand, cursive; font-style: italic;">Obtenez une vue rapprochée et une sensation différente</h2>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="video-content">
    <div class="container">
      <div class="row">
        <div class="col-lg-10 offset-lg-1">
          <div class="video-frame">
            <img src="assets/images/video-frame.jpg" alt="">
            <a href="https://youtube.com" target="_blank"><i class="fa fa-play"></i></a>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="fun-facts">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="wrapper">
            <div class="row">
              <div class="col-lg-4">
                <div class="counter">
                  <h2 class="timer count-title count-number" data-to="34" data-speed="1000"></h2>
                   <p class="count-text ">Salles<br>Prête à l'emploi</p>
                </div>
              </div>
              <div class="col-lg-4">
                <div class="counter">
                  <h2 class="timer count-title count-number" data-to="12" data-speed="1000"></h2>
                  <p class="count-text ">Années<br>d'Experience</p>
                </div>
              </div>
              <div class="col-lg-4">
                <div class="counter">
                  <h2 class="timer count-title count-number" data-to="24" data-speed="1000"></h2>
                  <p class="count-text ">Nombre<br>de réservations</p>
                </div>
              </div>
            </div>
          </div>
        </div>
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
                          <li>Surface totale plate <span>185 m2</span></li>
                          <li>Numéro de la Salle <span>26th</span></li>
                          <li>Nombre de siège <span>4</span></li>
                          <li>Stationnement disponible <span>Oui</span></li>
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
                        <a href="{{ route('salledetails') }}"><i class="fa fa-eye"></i> En savoire plus</a>                      </div>
                    </div>
                  </div>
                </div>
                <div class="tab-pane fade" id="villa" role="tabpanel" aria-labelledby="villa-tab">
                  <div class="row">
                    <div class="col-lg-3">
                      <div class="info-table">
                        <ul>
                            <li>Surface totale plate <span>185 m2</span></li>
                            <li>Numéro de la Salle <span>26th</span></li>
                            <li>Nombre de siège <span>4</span></li>
                            <li>Stationnement disponible <span>Oui</span></li>
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
                          <a href="{{ route('salledetails') }}"><i class="fa fa-eye"></i> En savoire plus</a>                      </div>
                      </div>
                  </div>
                </div>
                <div class="tab-pane fade" id="penthouse" role="tabpanel" aria-labelledby="penthouse-tab">
                  <div class="row">
                    <div class="col-lg-3">
                      <div class="info-table">
                        <ul>
                            <li>Surface totale plate <span>185 m2</span></li>
                            <li>Numéro de la Salle <span>26th</span></li>
                            <li>Nombre de siège <span>4</span></li>
                            <li>Stationnement disponible <span>Oui</span></li>
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
                          <a href="{{ route('salledetails') }}"><i class="fa fa-eye"></i> En savoire plus</a>                      </div>
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

  <div class="properties section">
    <div class="container">
      <div class="row">
        <div class="col-lg-4 offset-lg-4">
          <div class="section-heading text-center">
            <h6>| Salles</h6>
            <h2>L'idéale à votre portée.</h2>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-4 col-md-6">
          <div class="item">
            <a href="property-details.html"><img src="assets/images/property-01.jpg" alt=""></a>
            <span class="category">Bureau</span>
            <h6>264.000 FCFA / H</h6>
            <h4><a href="property-details.html">18 New Street Miami, OR 97219</a></h4>
            <ul>
              <li>Salle: <span>8</span></li>
              <li>Internet: <span>Oui</span></li>
              <li>Superficie: <span>545m2</span></li>
              <li>Parking: <span>Oui</span></li>
            </ul>
            <div class="main-button">
                <a href="{{ route('salledetails') }}"><i class="fa fa-eye"></i> En savoire plus</a>            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6">
          <div class="item">
            <a href="property-details.html"><img src="assets/images/property-02.jpg" alt=""></a>
            <span class="category">Bureau</span>
            <h6>1.180.000 FCFA / H</h6>
            <h4><a href="property-details.html">54 Mid Street Florida, OR 27001</a></h4>
            <ul>
                <li>Salle: <span>8</span></li>
                <li>Internet: <span>Oui</span></li>
                <li>Superficie: <span>545m2</span></li>
                <li>Parking: <span>Oui</span></li>
              </ul>
            <div class="main-button">
                <a href="{{ route('salledetails') }}"><i class="fa fa-eye"></i> En savoire plus</a>            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6">
          <div class="item">
            <a href="property-details.html"><img src="assets/images/property-03.jpg" alt=""></a>
            <span class="category">Bureau</span>
            <h6>1.460.000 FCFA / H</h6>
            <h4><a href="property-details.html">26 Old Street Miami, OR 38540</a></h4>
            <ul>
                <li>Salle: <span>8</span></li>
                <li>Internet: <span>Oui</span></li>
                <li>Superficie: <span>545m2</span></li>
                <li>Parking: <span>Oui</span></li>
              </ul>
            <div class="main-button">
                <a href="{{ route('salledetails') }}"><i class="fa fa-eye"></i> En savoire plus</a>            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6">
          <div class="item">
            <a href="property-details.html"><img src="assets/images/property-04.jpg" alt=""></a>
            <span class="category">Salle de conférence</span>
            <h6>584.500 FCFA / H</h6>
            <h4><a href="property-details.html">12 New Street Miami, OR 12650</a></h4>
            <ul>
                <li>Salle: <span>8</span></li>
                <li>Internet: <span>Oui</span></li>
                <li>Superficie: <span>545m2</span></li>
                <li>Parking: <span>Oui</span></li>
              </ul>
            <div class="main-button">
                <a href="{{ route('salledetails') }}"><i class="fa fa-eye"></i> En savoire plus</a>            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6">
          <div class="item">
            <a href="property-details.html"><img src="assets/images/property-05.jpg" alt=""></a>
            <span class="category">Salle de conférence</span>
            <h6>925.600 FCFA / H</h6>
            <h4><a href="property-details.html">34 Beach Street Miami, OR 42680</a></h4>
            <ul>
                <li>Salle: <span>8</span></li>
                <li>Internet: <span>Oui</span></li>
                <li>Superficie: <span>545m2</span></li>
                <li>Parking: <span>Oui</span></li>
              </ul>
            <div class="main-button">
                <a href="{{ route('salledetails') }}"><i class="fa fa-eye"></i> En savoire plus</a>            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6">
          <div class="item">
            <a href="property-details.html"><img src="assets/images/property-06.jpg" alt=""></a>
            <span class="category">Salle de Coworking</span>
            <h6>450.000 FCFA / H</h6>
            <h4><a href="property-details.html">22 New Street Portland, OR 16540</a></h4>
            <ul>
                <li>Salle: <span>8</span></li>
                <li>Internet: <span>Oui</span></li>
                <li>Superficie: <span>545m2</span></li>
                <li>Parking: <span>Oui</span></li>
              </ul>
            <div class="main-button">
                <a href="{{ route('salledetails') }}"><i class="fa fa-eye"></i> En savoire plus</a>            </div>
          </div>
        </div>
      </div>
    </div>
  </div>




  @include('client.layouts.footer');

  <!-- Scripts -->
  <!-- Bootstrap core JavaScript -->
  <script src={{asset("vendor/jquery/jquery.min.js")}}></script>
  <script src={{asset("vendor/bootstrap/js/bootstrap.min.js")}}></script>
  <script src={{asset("assets/js/isotope.min.js")}}></script>
  <script src={{asset("assets/js/owl-carousel.js")}}></script>
  <script src={{asset("assets/js/counter.js")}}></script>
  <script src={{asset("assets/js/custom.js")}}></script>


  </body>
</html>
