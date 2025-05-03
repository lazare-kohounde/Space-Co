<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

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

  

  <div class="contact-page section">
    <div class="container">
      <div class="row">
        <div class="col-lg-6">
          <div class="section-heading">
            <h6>Contact</h6>
            <h2>Contactez notre agents</h2>
          </div>
          <p>Contactez notre équipe pour toute demande d'information ou assistance. Que vous souhaitiez réserver un espace de travail, poser une question sur nos services ou obtenir des détails supplémentaires, nos agents sont là pour vous aider. Remplissez le formulaire ci-dessous ou contactez-nous directement par téléphone ou par email, et nous vous répondrons dans les plus brefs délais.</p>
          <div class="row">
            <div class="col-lg-12">
              <div class="item phone">
                <img src="assets/images/phone-icon.png" alt="" style="max-width: 52px;">
                <h6>+229 0197987986<br><span>Numéro de téléphone</span></h6>
              </div>
            </div>
            <div class="col-lg-12">
              <div class="item email">
                <img src="assets/images/email-icon.png" alt="" style="max-width: 52px;">
                <h6>spaceco@gmail.com<br><span>Email professionnel</span></h6>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-6">
          <!-- Session Status -->
          <x-auth-session-status class="mb-4" :status="session('status')" />
          <form id="contact-form" method="POST" action="{{ route('login') }}">
            <div class="row">
              <!-- Email Address -->
              <div class="col-lg-12">
                <fieldset>
                  <label for="email">Adresse Email</label>
                  <input type="text" name="email" id="email" pattern="[^ @]*@[^ @]*" placeholder="Your E-mail..." required>
                </fieldset>
              </div>
              <!-- Password -->
              <div class="col-lg-12">
                <fieldset>
                  <label for="subject">Mot de passe</label>
                  <input type="password" name="password" id="subject" placeholder="Mot de passe..." autocomplete="on" required>
                </fieldset>
              </div>

              <!-- Remember Me -->
              <div class="block mt-4">
                  <label for="remember_me" class="inline-flex items-center">
                      <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember" required>
                      <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                  </label>
              </div>
              
              <div class="col-lg-12">
                <fieldset>
                  <button type="submit" id="form-submit" class="orange-button">Se connecter</button>
                </fieldset>
              </div>
            </div>
          </form>
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
