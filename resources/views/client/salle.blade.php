<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <title>Space-Co</title>
    <link rel="icon" type="image/png" href="{{ asset('assets/images/favicon.png') }}" sizes="16x16">
    <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/fontawesome.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/templatemo-villa-agency.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/owl.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/animate.css') }}">
    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css"/>
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
                    <span class="breadcrumb"><a href="{{ route('accueil') }}">Accueil</a> / Salles</span>
                    <h3>Salles</h3>
                </div>
            </div>
        </div>
    </div>

    <div class="section properties">
        <div class="container">
            <!-- Filtres dynamiques par catégorie -->
            <ul class="properties-filter">
                <li>
                    <a class="{{ empty($categoryId) ? 'is_active' : '' }}" href="{{ route('salle') }}">Voir tout</a>
                </li>
                @foreach($categories as $category)
                    <li>
                        <a class="{{ (isset($categoryId) && $categoryId == $category->id) ? 'is_active' : '' }}"
                           href="{{ route('salle', ['category' => $category->id]) }}">
                            {{ $category->name }}
                        </a>
                    </li>
                @endforeach
            </ul>
            <div class="row properties-box">
                @forelse($rooms as $room)
                    <div class="col-lg-4 col-md-6 align-self-center mb-30 properties-items">
                        <div class="item">
                            <a href="{{ route('salledetails', ['id' => $room->id]) }}">
                                @php
                                    $images = json_decode($room->image);
                                    $firstImage = $images && count($images) > 0 ? $images[0] : asset('assets/images/default.jpg');
                                @endphp
                                <img src="{{ asset($firstImage) }}" alt="Image de la salle {{ $room->name }}">
                            </a>
                            <span class="category">{{ $room->category->name ?? 'Catégorie inconnue' }}</span>
                            <h6>{{ number_format($room->price, 0, ',', ' ') }} XOF / h</h6>
                            <h4>
                                <a href="{{ route('salledetails', ['id' => $room->id]) }}">{{ $room->name }}</a>
                            </h4>
                            <ul>
                                <li>Espace <span>café</span></li>
                                <li>Wifi <span>Haut débit</span></li>
                                <li>Equipée..<span></span></li>
                            </ul>
                            <div class="main-button">
                                <a href="{{ route('salledetails', ['id' => $room->id]) }}"><i class="fa fa-eye"></i> Voir plus de détail</a>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12">
                        <div class="alert alert-info text-center">
                            Aucune salle trouvée pour cette catégorie.
                        </div>
                    </div>
                @endforelse
            </div>
            <!-- Pagination -->
            <div class="row">
                <div class="">
                    {{ $rooms->appends(['category' => $categoryId])->links() }}
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

        if(showRegisterLink && showLoginLink && loginForm && registerForm){
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
        }
    });
    </script>
</body>
</html>
