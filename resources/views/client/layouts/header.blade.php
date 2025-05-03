<header class="header-area header-sticky">
    <style>
        .nav li a {
            color: black;
            text-decoration: none;
            padding: 10px;
            display: inline-block;
        }

        .nav li a.active {
            color: #e74c3c; /* Tu peux changer cette couleur selon ton thème */
            font-weight: bold;
        }
    </style>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav class="main-nav">
                    <!-- ***** Logo Start ***** -->
                    <a href="{{ route('accueil') }}" class="logo">
                        <h1 style="font-family: Bradley Hand, cursive; font-style: italic;">
                            <img src="assets/images/logo.png" style="height: 1.5cm; width: 4cm" alt="">
                            <samp></samp>
                        </h1>
                    </a>
                    <!-- ***** Logo End ***** -->
                    <!-- ***** Menu Start ***** -->
                    <ul class="nav">
                        <li>
                            <a href="{{ route('accueil') }}" class="{{ request()->routeIs('accueil') ? 'active' : '' }}">Accueil</a>
                        </li>
                        <li>
                            <a href="{{ route('salle') }}" class="{{ request()->routeIs('salle') ? 'active' : '' }}">Salle</a>
                        </li>
                        <li>
                            <a href="{{ route('salledetails') }}" class="{{ request()->routeIs('salledetails') ? 'active' : '' }}">Salle détails</a>
                        </li>
                        <li>
                            <a href="{{ route('contact') }}" class="{{ request()->routeIs('contact') ? 'active' : '' }}">Contact</a>
                        </li>
                        <li>
                            <a href="#" class="">Panier</a>
                        </li>
                        <li>
                            <a href="{{ route('login_register') }}" class="{{ request()->routeIs('login_register') ? 'active' : '' }}"><i class="fa fa-user" style="background-color: #f35525; color: white; display: inline-block; width: 40px; height: 40px; text-align: center; line-height: 40px; margin-right: 10px; border-radius: 50%; margin-left: -1px;"></i></a>
                        </li>
                        


                        </li>
                        <li>
                            
                        </li>
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
