<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <title>Space-Co</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">


    <link rel="icon" type="image/png" href="{{ asset('assets/images/favicon.png') }}" sizes="16x16">
    <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/fontawesome.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/templatemo-villa-agency.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/owl.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/animate.css') }}">
    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />
    <style>
        .btn-orange {
            background-color: #000 !important;
            border-color: #000 !important;
            color: #fff !important;
        }

        .btn-orange:hover,
        .btn-orange:focus {
            background-color: #f35525 !important;
            border-color: #f35525 !important;
            color: #fff !important;
        }

        /* --- Owl Carousel Nav Custom --- */
        .main-image {
            position: relative;
        }

        .main-image .owl-nav {
            display: flex;
            justify-content: space-between;
            position: absolute;
            top: 45%;
            left: 0;
            width: 100%;
            pointer-events: none;
            z-index: 2;
        }

        .main-image .owl-nav button.owl-prev,
        .main-image .owl-nav button.owl-next {
            background: rgba(0, 0, 0, 0.7) !important;
            color: #fff !important;
            border: none !important;
            border-radius: 50%;
            width: 48px;
            height: 48px;
            font-size: 2rem !important;
            display: flex;
            align-items: center;
            justify-content: center;
            pointer-events: all;
            transition: background 0.2s;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.15);
        }

        .main-image .owl-nav button.owl-prev:hover,
        .main-image .owl-nav button.owl-next:hover {
            background: #f35525 !important;
            color: #fff !important;
        }

        .main-image .owl-nav button span,
        .main-image .owl-nav button i {
            font-size: 2rem;
            line-height: 1;
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
                <!-- Carrousel et détails -->
                <div class="col-lg-8">
                    <!-- Carrousel Owl Carousel -->
                    <div class="main-image owl-carousel owl-theme">
                        @foreach($images as $img)
                        <div class="item">
                            <img src="{{ asset($img) }}" alt="Image de la salle {{ $room->name }}" style="width:100%; border-radius:10px;">
                        </div>
                        @endforeach
                    </div>
                    <div class="main-content mt-4">
                        <div class="ligne d-flex flex-row align-items-end justify-content-between">
                            <span class="category">{{ $room->category->name ?? 'Catégorie inconnue' }}</span>
                            <h6>{{ number_format($room->price, 0, ',', ' ') }} XOF / h</h6>
                        </div>
                        <h4>{{ $room->name }}</h4>
                        <p>{{ $room->description }}</p>
                    </div>
                </div>
                <!-- Bloc réservation -->
                <!-- Bloc réservation -->
                <div class="col-lg-4">
                    <div class="card p-4 shadow-sm">
                        <h5 class="mb-3" style="color: #f35525">Réserver cette salle</h5>
                        <div class="mb-3">
                            <label class="form-label">Montant</label>
                            <div id="montant_affiche" class="form-control-plaintext fw-bold" style="font-size:1.2em;">
                                0 XOF
                            </div>
                        </div>

                        <form id="reservationForm" action="{{ route('panier.ajouter') }}" method="POST" autocomplete="off">
                            @csrf

                            <!-- Calendrier date début -->
                            <div class="mb-3">
                                <label>Date de début</label>
                                <div id="calendarStart"></div>
                                <div id="hoursStart" class="mt-2"></div>
                                <input type="hidden" id="date_debut" name="date_debut" required>
                            </div>

                            <!-- Heures de fin -->
                            <div class="mb-3">
                                <label>Heure de fin</label>
                                <div id="hoursEnd" class="mt-2"></div>
                                <input type="hidden" id="date_fin" name="date_fin" required>
                            </div>

                            <div class="mb-3">
                                <label for="option" class="form-label">Option</label>
                                <select class="form-select" id="option" name="option" required>
                                    <option value="">Sélectionner une option</option>
                                    <option value="equipée">Equipée</option>
                                    <option value="non_equipée">Non équipée</option>
                                </select>
                            </div>

                            @php
                            $images = json_decode($room->image);
                            $firstImage = $images && count($images) > 0 ? $images[0] : asset('assets/images/default.jpg');
                            @endphp

                            <!-- Champs cachés supplémentaires -->
                            <input type="hidden" name="id" value="{{ $room->id }}">
                            <input type="hidden" name="nom" value="{{ $room->name }}">
                            <input type="hidden" name="adresse" value="Arconville / Space-Co">
                            <input type="hidden" name="montant" id="montant" value="0">
                            <input type="hidden" name="image" value="{{ asset($firstImage) }}">

                            <button type="submit" class="btn btn-orange w-100">Ajouter au panier</button>
                        </form>
                    </div>
                </div>
                <!-- Fin bloc réservation -->

                <!-- Fin bloc réservation -->
            </div>
        </div>
    </div>

    <!-- SECTION BEST DEAL (inchangée) -->
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
                                            <img src={{asset("assets/images/deal-01.jpg")}} alt="">
                                        </div>
                                        <div class="col-lg-3">
                                            <h4>Informations supplémentaires sur le Bureau</h4>
                                            <p>Profitez d’un espace de travail privé, entièrement meublé et équipé, offrant une connexion Internet haut débit et un accès sécurisé 24/7.
                                                <br><br>Situé dans un quartier dynamique, l’emplacement offre une proximité immédiate avec des restaurants, cafés et autres commodités essentielles.
                                            </p>
                                            <div class="icon-button">
                                                <a href="{{ route('salle') }}"><i class="fa fa-eye"></i> Voire plus</a>
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
                                            <img src={{asset("assets/images/deal-02.jpg")}} alt="">
                                        </div>
                                        <div class="col-lg-3">
                                            <h4>Informations supplémentaires sur la salle de conférence</h4>
                                            <p>Profitez d’un espace de travail privé, entièrement meublé et équipé, offrant une connexion Internet haut débit et un accès sécurisé 24/7.
                                                <br><br>Situé dans un quartier dynamique, l’emplacement offre une proximité immédiate avec des restaurants, cafés et autres commodités essentielles.
                                            </p>
                                            <div class="icon-button">
                                                <a href="{{ route('salle') }}"><i class="fa fa-eye"></i> Voire plus</a>
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
                                            <img src={{asset("assets/images/deal-03.jpg")}} alt="">
                                        </div>
                                        <div class="col-lg-3">
                                            <h4>Informations supplémentaires sur la salle de Coworking</h4>
                                            <p>Profitez d’un espace de travail privé, entièrement meublé et équipé, offrant une connexion Internet haut débit et un accès sécurisé 24/7.
                                                <br><br>Situé dans un quartier dynamique, l’emplacement offre une proximité immédiate avec des restaurants, cafés et autres commodités essentielles.
                                            </p>
                                            <div class="icon-button">
                                                <a href="{{ route('salle') }}"><i class="fa fa-eye"></i>Voire plus</a>
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
    <script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>

    <!-- Initialiser Owl Carousel pour le carrousel d'images -->
    <script>
        $(document).ready(function() {
            $('.main-image.owl-carousel').owlCarousel({
                items: 1,
                loop: true,
                margin: 10,
                nav: true,
                dots: true,
                autoplay: true,
                autoplayTimeout: 4000,
                autoplayHoverPause: true,
                navText: [
                    '<i class="fa fa-chevron-left"></i>',
                    '<i class="fa fa-chevron-right"></i>'
                ]
            });
        });
    </script>

    <!-- Bloquer les dates antérieures pour les champs datetime-local -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
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

            document.getElementById('date_debut').addEventListener('change', function() {
                document.getElementById('date_fin').setAttribute('min', this.value);
            });
        });
    </script>

    <!-- Script de montant -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const dateDebut = document.getElementById('date_debut');
            const dateFin = document.getElementById('date_fin');
            const montantAffiche = document.getElementById('montant_affiche');
            const montantInput = document.getElementById('montant');

            const prixParHeure = parseFloat("{{ $room->price }}"); // prix depuis Laravel

            function updateMontant() {
                const debut = new Date(dateDebut.value);
                const fin = new Date(dateFin.value);

                if (debut && fin && fin > debut) {
                    const diffMinutes = (fin - debut) / (1000 * 60); // durée en minutes
                    const dureeHeures = diffMinutes / 60; // durée en heures décimales

                    if (dureeHeures < 1) {
                        alert("La réservation doit durer au moins 1 heure.");
                        dateFin.value = "";
                        montantAffiche.textContent = "0 XOF";
                        montantInput.value = 0;
                        return;
                    }

                    const montantTotal = dureeHeures * prixParHeure;

                    // Affichage formaté
                    montantAffiche.textContent = `${Math.round(montantTotal).toLocaleString('fr-FR')} XOF`;
                    montantInput.value = Math.round(montantTotal);
                } else {
                    montantAffiche.textContent = "0 XOF";
                    montantInput.value = 0;
                }
            }

            dateDebut.addEventListener('change', updateMontant);
            dateFin.addEventListener('change', updateMontant);
        });
    </script>

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


    <!-- Scripte de calendrier -->

    <!-- ... (le même HTML que précédemment) ... -->

    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const roomId = "{{ $room->id }}";
    const roomPrice = "{{ $room->price }}";
    let reservedSlots = [];

    const serviceStart = 6, serviceEnd = 19; // Heures de service

    let selection = {
        date: null,
        heure_debut: null,
        heure_fin: null
    };

    // Format jj/mm/aaaa hh:mm
    function formatDateTime(date, hour) {
        const d = new Date(date);
        const [h, m] = hour.split(':');
        d.setHours(parseInt(h), parseInt(m));
        return `${String(d.getDate()).padStart(2,'0')}/${String(d.getMonth()+1).padStart(2,'0')}/${d.getFullYear()} ${h}:${m}`;
    }

    function parseDateTime(str) {
        const [date, time] = str.split(' ');
        const [d, m, y] = date.split('/');
        const [h, min] = time.split(':');
        return new Date(`${y}-${m}-${d}T${h}:${min}:00`);
    }

    // Récupère les créneaux réservés
    fetch(`/rooms/${roomId}/reserved-slots`)
        .then(res => res.json())
        .then(slots => {
            reservedSlots = slots.map(slot => ({
                start: new Date(slot.start_date),
                end: new Date(slot.end_date)
            }));
            renderCalendarStart();
        });

    // Retourne les heures disponibles pour une date, à partir de minHour (par défaut serviceStart)
    function getAvailableHours(date, minHour = serviceStart) {
        let available = [];
        for(let h = serviceStart; h < serviceEnd; h++) {
            if (h < minHour) continue;
            let dStart = new Date(date.getFullYear(), date.getMonth(), date.getDate(), h, 0, 0);
            let dEnd = new Date(date.getFullYear(), date.getMonth(), date.getDate(), h + 1, 0, 0);
            let taken = reservedSlots.some(slot => dStart < slot.end && dEnd > slot.start);
            if (!taken) available.push(`${h.toString().padStart(2,'0')}:00`);
        }
        return available;
    }

    // Affiche calendrier date début
    function renderCalendarStart() {
        flatpickr("#calendarStart", {
            inline: true,
            minDate: "today",
            dateFormat: "Y-m-d",
            disable: [
                function(date) {
                    return getAvailableHours(date).length === 0;
                }
            ],
            onChange: function(selectedDates) {
                if (selectedDates.length) {
                    selection.date = selectedDates[0];
                    selection.heure_debut = null;
                    selection.heure_fin = null;
                    document.getElementById('date_debut').value = '';
                    document.getElementById('date_fin').value = '';
                    document.getElementById('montant').value = 0;
                    document.getElementById('montant_affiche').textContent = "0 XOF";
                    renderHoursStart();
                    clearHoursEnd();
                }
            }
        });
    }

    // Affiche heures début
    function renderHoursStart() {
        const container = document.getElementById('hoursStart');
        container.innerHTML = '';
        if (!selection.date) return;

        let availableHours = getAvailableHours(selection.date);
        if (availableHours.length === 0) {
            container.innerHTML = "<span class='text-danger'>Aucune heure disponible ce jour</span>";
            return;
        }

        let ul = document.createElement('ul');
        ul.className = "list-group list-group-horizontal flex-wrap";

        availableHours.forEach(hour => {
            let li = document.createElement('li');
            li.className = "list-group-item m-1";
            li.style.cursor = "pointer";
            li.textContent = hour;
            li.onclick = () => {
                selection.heure_debut = hour;
                document.getElementById('date_debut').value = formatDateTime(selection.date, hour);
                Array.from(ul.children).forEach(c => c.classList.remove('active','bg-success','text-white'));
                li.classList.add('active','bg-success','text-white');
                renderHoursEnd();
                document.getElementById('date_fin').value = ''; // Reset fin
                selection.heure_fin = null;
                document.getElementById('montant').value = 0;
                document.getElementById('montant_affiche').textContent = "0 XOF";
            };
            ul.appendChild(li);
        });

        container.appendChild(ul);
    }

    // Vide les heures de fin
    function clearHoursEnd() {
        const container = document.getElementById('hoursEnd');
        container.innerHTML = '';
    }

    // Affiche heures fin (même date, heure fin > heure début, sans chevauchement)
    function renderHoursEnd() {
        const container = document.getElementById('hoursEnd');
        container.innerHTML = '';
        if (!selection.date || !selection.heure_debut) return;

        const minHour = parseInt(selection.heure_debut.split(':')[0]) + 1;
        let availableHours = [];
        let stop = false;
        for (let h = minHour; h < serviceEnd; h++) {
            if (stop) break;
            let dStart = new Date(selection.date.getFullYear(), selection.date.getMonth(), selection.date.getDate(), h, 0, 0);
            let dEnd = new Date(selection.date.getFullYear(), selection.date.getMonth(), selection.date.getDate(), h + 1, 0, 0);
            let taken = reservedSlots.some(slot => dStart < slot.end && dEnd > slot.start);
            if (taken) {
                stop = true;
            } else {
                availableHours.push(`${h.toString().padStart(2,'0')}:00`);
            }
        }

        if (availableHours.length === 0) {
            container.innerHTML = "<span class='text-danger'>Aucune heure de fin disponible</span>";
            return;
        }

        let ul = document.createElement('ul');
        ul.className = "list-group list-group-horizontal flex-wrap";

        availableHours.forEach(hour => {
            let li = document.createElement('li');
            li.className = "list-group-item m-1";
            li.style.cursor = "pointer";
            li.textContent = hour;
            li.onclick = () => {
                selection.heure_fin = hour;
                document.getElementById('date_fin').value = formatDateTime(selection.date, hour);
                Array.from(ul.children).forEach(c => c.classList.remove('active','bg-success','text-white'));
                li.classList.add('active','bg-success','text-white');
                calculerMontant();
            };
            ul.appendChild(li);
        });

        container.appendChild(ul);
    }

    // Calcul montant
    function calculerMontant() {
        const debutStr = document.getElementById('date_debut').value;
        const finStr = document.getElementById('date_fin').value;
        if (debutStr && finStr) {
            const debut = parseDateTime(debutStr);
            const fin = parseDateTime(finStr);
            let diff = (fin - debut) / 1000 / 60 / 60; // heures
            if (diff < 1) {
                document.getElementById('montant_affiche').textContent = "Durée minimale : 1 heure";
                document.getElementById('montant').value = 0;
                return;
            }
            diff = Math.ceil(diff);
            const montant = diff * roomPrice;
            document.getElementById('montant_affiche').textContent = `${montant.toLocaleString()} XOF`;
            document.getElementById('montant').value = montant;
        } else {
            document.getElementById('montant_affiche').textContent = "0 XOF";
            document.getElementById('montant').value = 0;
        }
    }

    // Validation soumission
    document.getElementById('reservationForm').addEventListener('submit', function(e) {
        const formElements = this.querySelectorAll('[name]');
        const formData = {};
        formElements.forEach(el => {
            if ((el.type === 'checkbox' || el.type === 'radio') && !el.checked) return;
            formData[el.name] = el.value;
        });
        console.log("Données envoyées au backend :", formData);

        if (!formData.date_debut || !formData.date_fin || formData.montant == 0) {
            e.preventDefault();
            alert("Veuillez sélectionner une date et une heure de début et de fin valides, et respecter une durée minimale de 1 heure.");
        }
    });
});
</script>


</body>

</html>