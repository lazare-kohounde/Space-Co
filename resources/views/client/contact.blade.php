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

  <div class="page-heading header-text">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <span class="breadcrumb"><a href="#">Accueil</a>  /  Contact</span>
          <h3>Contact</h3>
        </div>
      </div>
    </div>
  </div>

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
          <form id="contact-form" action="" method="post">
            <div class="row">
              <div class="col-lg-12">
                <fieldset>
                  <label for="name">Full Name</label>
                  <input type="name" name="name" id="name" placeholder="Your Name..." autocomplete="on" required>
                </fieldset>
              </div>
              <div class="col-lg-12">
                <fieldset>
                  <label for="email">Email Address</label>
                  <input type="text" name="email" id="email" pattern="[^ @]*@[^ @]*" placeholder="Your E-mail..." required="">
                </fieldset>
              </div>
              <div class="col-lg-12">
                <fieldset>
                  <label for="subject">Subject</label>
                  <input type="subject" name="subject" id="subject" placeholder="Subject..." autocomplete="on" >
                </fieldset>
              </div>
              <div class="col-lg-12">
                <fieldset>
                  <label for="message">Message</label>
                  <textarea name="message" id="message" placeholder="Your Message"></textarea>
                </fieldset>
              </div>
              <div class="col-lg-12">
                <fieldset>
                  <button type="submit" id="form-submit" class="orange-button">Send Message</button>
                </fieldset>
              </div>
            </div>
          </form>
        </div>
        <div class="col-lg-12">
          <div id="map">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d4522.422296009583!2d2.3535891854198616!3d6.473285935073908!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x1024a965d911fc37%3A0xce8747a20fccb355!2sCarrefour%20Sporting%20club%20Arconville%20-%20RNIE2!5e0!3m2!1sfr!2sbj!4v1744120046170!5m2!1sfr!2sbj" width="100%" height="500px" frameborder="0" style="border:0; border-radius: 10px; box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.15);" allowfullscreen=""></iframe>
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
