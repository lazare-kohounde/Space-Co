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
    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />
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
                    <a class="{{ empty($categoryId) ? 'is_active' : '' }}" href="{{ route('salle') }}" data-category="">Voir tout</a>
                </li>
                @foreach($categories as $category)
                <li>
                    <a class="{{ (isset($categoryId) && $categoryId == $category->id) ? 'is_active' : '' }}"
                        href="{{ route('salle', ['category' => $category->id]) }}"
                        data-category="{{ $category->id }}">
                        {{ $category->name }}
                    </a>
                </li>
                @endforeach

                <!-- Barre de recherche -->
                <li class="ms-auto search-container">
                    <div class="input-group">
                        <input type="text" id="searchInput" class="form-control" placeholder="Rechercher...">
                        <button id="searchButton" class="btn" style="background-color: #f35525; color: white;">
                            <i class="fa fa-search"></i>
                        </button>
                    </div>
                </li>
            </ul>

            <div class="row properties-box">
                @forelse($rooms as $room)
                <div class="col-lg-4 col-md-6 align-self-center mb-30 properties-items category-{{ $room->category_id }}">
                    <div class="item">
                        <a href="{{ route('salledetails', ['id' => $room->id]) }}">
                            @php
                            $images = json_decode($room->image);
                            $firstImage = $images && count($images) > 0 ? $images[0] : asset('assets/images/default.jpg');
                            @endphp
                            <img src="{{ asset($firstImage) }}" alt="Image de la salle {{ $room->name }}" style="height: 250px">
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
            {{ $rooms->appends(['category' => $categoryId])->links() }}

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
        document.addEventListener('DOMContentLoaded', function() {
            const loginForm = document.getElementById('loginForm');
            const registerForm = document.getElementById('registerForm');
            const showRegisterLink = document.getElementById('showRegisterForm');
            const showLoginLink = document.getElementById('showLoginForm');

            if (showRegisterLink && showLoginLink && loginForm && registerForm) {
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
            }
        });
    </script>



    <!-- Scrypte pour trie -->


    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const searchInput = document.getElementById('searchInput');
            const searchButton = document.getElementById('searchButton');
            const propertiesBox = document.querySelector('.properties-box');
            const originalItems = Array.from(document.querySelectorAll('.properties-items'));
            let noResultsMessage = null;

            function filterItems() {
                const searchTerm = searchInput.value.trim().toLowerCase();
                let hasVisibleItems = false;

                // Cache tous les éléments avant filtrage
                originalItems.forEach(item => {
                    item.style.display = 'none';
                });

                // Filtre les éléments correspondants
                const matchingItems = originalItems.filter(item => {
                    const itemText = item.textContent.toLowerCase();
                    return itemText.includes(searchTerm);
                });

                // Affiche les éléments correspondants
                matchingItems.forEach(item => {
                    item.style.display = 'block';
                    hasVisibleItems = true;
                });

                // Gère le message "Aucun résultat"
                if (!hasVisibleItems && !noResultsMessage) {
                    noResultsMessage = document.createElement('div');
                    noResultsMessage.className = 'col-12';
                    noResultsMessage.innerHTML = `
                <div class="alert alert-info text-center">
                    Aucune salle trouvée pour votre recherche.
                </div>
            `;
                    propertiesBox.appendChild(noResultsMessage);
                } else if (hasVisibleItems && noResultsMessage) {
                    noResultsMessage.remove();
                    noResultsMessage = null;
                }
            }

            // Écouteurs d'événements
            searchButton.addEventListener('click', filterItems);
            searchInput.addEventListener('keyup', function(e) {
                if (e.key === 'Enter') filterItems();
            });
        });
    </script>

    <!-- Ajoute d'abord la référence à Isotope si ce n'est pas déjà fait -->
    <script src="https://unpkg.com/isotope-layout@3/dist/isotope.pkgd.min.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // 1. Initialisation d'Isotope
            const grid = document.querySelector('.properties-box');
            const iso = new Isotope(grid, {
                itemSelector: '.properties-items',
                layoutMode: 'fitRows',
                fitRows: {
                    gutter: 0
                }
            });

            // 2. Fonction de recherche améliorée
            const searchInput = document.getElementById('searchInput');
            const searchButton = document.getElementById('searchButton');

            function filterItems() {
                const searchTerm = searchInput.value.trim().toLowerCase();

                if (searchTerm === '') {
                    // Si recherche vide, affiche tout
                    iso.arrange({
                        filter: '*'
                    });
                    return;
                }

                // Filtre les éléments qui contiennent le terme recherché
                iso.arrange({
                    filter: function(itemElem) {
                        return itemElem.textContent.toLowerCase().includes(searchTerm);
                    }
                });

                // Vérifie s'il n'y a aucun résultat
                let visibleItems = grid.querySelectorAll('.properties-items:not(.isotope-hidden)');
                if (visibleItems.length === 0) {
                    // Si aucun résultat, affiche un message
                    if (!document.querySelector('.no-results')) {
                        const noResults = document.createElement('div');
                        noResults.className = 'col-12 no-results';
                        noResults.innerHTML = '<div class="alert alert-info text-center my-3">Aucune salle trouvée pour votre recherche.</div>';
                        grid.appendChild(noResults);
                        // Layout à nouveau pour positionner le message
                        iso.layout();
                    }
                } else {
                    // S'il y a des résultats, retire le message s'il existe
                    const noResults = document.querySelector('.no-results');
                    if (noResults) {
                        noResults.remove();
                        iso.layout();
                    }
                }
            }

            // 3. Ajoute les écouteurs d'événements
            if (searchButton) searchButton.addEventListener('click', filterItems);
            if (searchInput) searchInput.addEventListener('keyup', function(e) {
                if (e.key === 'Enter') filterItems();
            });

            // 4. Ajoute les filtres par catégorie
            const categoryFilters = document.querySelectorAll('.properties-filter a');
            categoryFilters.forEach(filter => {
                filter.addEventListener('click', function(e) {
                    e.preventDefault();
                    const categoryId = this.getAttribute('data-category');

                    // Met à jour la classe active
                    categoryFilters.forEach(f => f.classList.remove('is_active'));
                    this.classList.add('is_active');

                    // Si "Voir tout" est cliqué
                    if (!categoryId) {
                        iso.arrange({
                            filter: '*'
                        });
                        return;
                    }

                    // Filtre par catégorie
                    iso.arrange({
                        filter: `.category-${categoryId}`
                    });
                });
            });
        });
    </script>

<script src={{asset("/path/to/isotope.pkgd.min.js")}}></script>


    <!-- Style optionnel pour améliorer l'UI -->
    <style>
        .input-group {
            margin-left: auto;
            width: auto !important;
        }

        .btn-orange {
            background-color: #f35525 !important;
            color: white !important;
        }

        #searchInput:focus {
            border-color: #f35525;
            box-shadow: 0 0 0 0.25rem rgba(243, 85, 37, 0.25);
        }
    </style>
</body>

</html>