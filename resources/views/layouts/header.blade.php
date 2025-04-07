<header class="header-area header-sticky">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav class="main-nav">
                    <!-- ***** Logo Start ***** -->
                    <a href="{{ route('accueil') }}" class="logo">

                        <h1 style="font-family: Bradley Hand, cursive; font-style: italic; "><img src="assets/images/logo.png" style="height: 1.5cm; width: 4cm" alt=""><samp></samp></h1>
                    </a>
                    <!-- ***** Logo End ***** -->
                    <!-- ***** Menu Start ***** -->
                    <ul class="nav">
                      <li><a href="{{ route('accueil') }}" class="active">Accueil</a></li>
                      <li><a href="{{ route('salle') }}">Salle</a></li>
                      <li><a href="{{ route('salledetails') }}">Salle details</a></li>
                      <li><a href="{{ route('contact') }}">Contact</a></li>
                      <li><a href="#"><i class="fa fa-user"></i>Espace Membre</a></li>
                  </ul>
                    <a class='menu-trigger'>
                        <span>Menu</span>
                    </a>
                    <!-- ***** Menu End ***** -->
                </nav>
            </div>
        </div>
    </div>
  </header>
