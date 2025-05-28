<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <title>Tableau de bord</title>
    <meta content="Admin Dashboard" name="description" />
    <meta content="Mannatthemes" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <link rel="icon" type="image/png" href="{{ asset('assets/images/favicon.png') }}" sizes="16x16">
    <link href={{ asset('admin/assets/css/bootstrap.min.css') }} rel="stylesheet" type="text/css">
    <link href={{ asset('admin/assets/css/icons.css') }} rel="stylesheet" type="text/css">
    <link href={{ asset('admin/assets/css/style.css') }} rel="stylesheet" type="text/css">

    <style>
        .hidden-row {
            display: none;
        }
    </style>

</head>


<body class="fixed-left">

    <!-- Loader -->
    <div id="preloader">
        <div id="status">
            <div class="spinner"></div>
        </div>
    </div>


    <!-- Begin page -->
    <div id="wrapper">

        {{-- sidebar --}}
        @include ('admin.partials.sidebar')
        {{-- sidebar --}}


        <!-- Start right Content here -->
        <div class="content-page">
            <!-- Start content -->
            <div class="content">

                <!-- Top Bar Start -->
                @include ('admin.partials.header')
                <!-- Top Bar End -->

                <div class="page-content-wrapper ">

                    <div class="container-fluid">

                        <div class="row">
                            <div class="col-sm-12">
                                <div class="page-title-box">
                                    <div class="btn-group float-right">
                                        <ol class="breadcrumb hide-phone p-0 m-0">
                                            <li class="breadcrumb-item"><a href="#"><img
                                                        src="{{ asset('assets/images/logo.png') }}" alt=""
                                                        width="45" height="25"></a></li>
                                            <li class="breadcrumb-item active">Tableau de bord</li>
                                        </ol>
                                    </div>
                                    <h4 class="page-title">Tableau de bord</h4>
                                </div>
                            </div>
                        </div>
                        <!-- end page title end breadcrumb -->
                        <div class="row">
                            <div class="col-lg-9">
                                <div class="row">
                                    <div class="col-lg-3">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="icon-contain">
                                                    <div class="row">
                                                        <div class="col-2 align-self-center">
                                                            <i class="fas fa-calendar-alt text-gradient-danger"></i>
                                                        </div>
                                                        <div class="col-10 text-right">
                                                            <h5 class="mt-0 mb-1" id="reservations-count">0</h5>
                                                            <p class="mb-0 font-12 text-muted">Réservation</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="card">
                                            <div class="card-body justify-content-center">
                                                <div class="icon-contain">
                                                    <div class="row">
                                                        <div class="col-2 align-self-center">
                                                            <i class="far fa-building text-gradient-success"></i>
                                                        </div>
                                                        <div class="col-10 text-right">
                                                            <h5 class="mt-0 mb-1" id="rooms-count">0</h5>
                                                            <p class="mb-0 font-12 text-muted">Salles</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="icon-contain">
                                                    <div class="row">
                                                        <div class="col-2 align-self-center">
                                                            <i class="fas fa-layer-group text-gradient-warning"></i>
                                                        </div>
                                                        <div class="col-10 text-right">
                                                            <h5 class="mt-0 mb-1" id="categories-count">0</h5>
                                                            <p class="mb-0 font-12 text-muted">Catégories</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="card ">
                                            <div class="card-body">
                                                <div class="icon-contain">
                                                    <div class="row">
                                                        <div class="col-2 align-self-center">
                                                            <i class="fas fa-dollar-sign text-gradient-primary"></i>
                                                        </div>
                                                        <div class="col-10 text-right">
                                                            <h5 class="mt-0 mb-1"><span id="revenue-count">0</span> <span>XOF</span></h5>
                                                            <p class="mb-0 font-12 text-muted">Recette Globales</p>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-body">
                                        <div class="btn-group btn-group-toggle float-right" data-toggle="buttons">

                                        </div>
                                        <h5 class="header-title mb-4 mt-0">Statistiques</h5>
                                        <canvas id="lineChart" height="82"></canvas>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="dropdown d-inline-block float-right">
                                        </div>
                                        <h5 class="header-title mb-4 mt-0">Activité</h5>
                                        <div>
                                            <canvas id="dash-doughnut" height="200"></canvas>
                                        </div>
                                        <ul class="list-unstyled list-inline text-center mb-0 mt-3">
                                            <li class="mb-2 list-inline-item text-muted font-13"><i
                                                    class="mdi mdi-label text-success mr-2"></i>Active</li>
                                            <li class="mb-2 list-inline-item text-muted font-13"><i
                                                    class="mdi mdi-label text-danger mr-2"></i>Complet</li>
                                            <li class="mb-2 list-inline-item text-muted font-13"><i
                                                    class="mdi mdi-label text-warning mr-2"></i>En cours</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row mb-3">
                                            <div class="col-sm-6">
                                                <p class="mb-0 text-muted font-13"><i
                                                        class="mdi mdi-album mr-2 text-warning"></i>Nouveau prospects</p>
                                            </div>
                                            <div class="col-sm-6">
                                                <p class="mb-0 text-muted font-13"><i
                                                        class="mdi mdi-album mr-2 text-danger"></i>Objectif de nouveau prospects
                                                </p>
                                            </div>
                                        </div>
                                        <div class="progress bg-gradient1 mb-3" style="height:5px;">
                                            <div class="progress-bar bg-gradient3" role="progressbar"
                                                style="width: 65%" aria-valuenow="65" aria-valuemin="0"
                                                aria-valuemax="100"></div>
                                        </div>
                                        <a class="btn btn-primary btn-sm btn-block text-white">Voir plus</a>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="flex justify-between">
                                            <div class="card-body">
                                                <div class="d-flex justify-content-star mr-4 align-items-center mb-3">
                                                    <h5 class="header-title mb-0 mr-4">Listes des réservations plus récentes</h5>
                                                </div>
                                            </div>
                                            <div class="table-responsive">
                                                <table class="table table-hover mb-0">
                                                    <thead>
                                                        <tr class="align-self-center">
                                                            <th>Réservation</th>
                                                            <th>Auteur</th>
                                                            <th>Date de la réservation</th>
                                                            <th>Montant</th>
                                                            <th>Etat</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach($reservations as $index => $reservation)
                                                        <tr class="{{ $index >= 5 ? 'hidden-row' : '' }}">
                                                            <td>{{ str_pad($index + 1, 3, '0', STR_PAD_LEFT) }}</td>
                                                            <td>{{ $reservation['user_name'] ?? 'Utilisateur inconnu' }}</td>
                                                            <td>{{ $reservation['reservation_date'] }}</td>
                                                            <td>{{ number_format($reservation['total_amount'], 0, ',', ' ') }} XOF</td>
                                                            <td>
                                                                @if ($reservation['status'] =='pending')
                                                                <span class="badge badge-boxed badge-soft-primary p-2">
                                                                    En attente
                                                                </span>
                                                                @elseif ($reservation['status'] =='cancelled')
                                                                <span class="badge badge-boxed badge-soft-pink p-2">
                                                                    Annulée
                                                                </span>
                                                                @elseif ($reservation['status'] =='approved')
                                                                <span class="badge badge-boxed badge-soft-success p-2" style="color: black;">
                                                                    Approuvée
                                                                </span>
                                                                @endif
                                                            </td>
                                                        </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div><!--end table-responsive-->
                                            @if(count($reservations) > 5)
                                            <div class="pt-3 border-top text-right">
                                                <button id="showAllBtn" class="btn btn-primary">Voir tout</button>
                                            </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end row -->

                    </div><!-- container -->

                </div> <!-- Page content Wrapper -->

            </div> <!-- content -->

            {{-- footer --}}
            @include ('admin.partials.footer')
            {{-- footer --}}

        </div>
        <!-- End Right content here -->


    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Gestion de la recherche
            const searchInput = document.getElementById('searchInput');
            const tableBody = document.querySelector('table tbody');

            searchInput.addEventListener('keyup', function() {
                const filter = this.value.toLowerCase();
                const rows = tableBody.querySelectorAll('tr');
                let visibleCount = 0;

                rows.forEach(row => {
                    const cellsText = row.textContent.toLowerCase();
                    if (cellsText.includes(filter)) {
                        row.style.display = '';
                        visibleCount++;
                    } else {
                        row.style.display = 'none';
                    }
                });

                // Afficher un message si aucun résultat
                let noResultRow = document.getElementById('noResultRow');
                if (visibleCount === 0) {
                    if (!noResultRow) {
                        noResultRow = document.createElement('tr');
                        noResultRow.id = 'noResultRow';
                        noResultRow.innerHTML = `<td colspan="6" class="text-center">Aucun résultat trouvé</td>`;
                        tableBody.appendChild(noResultRow);
                    }
                } else if (noResultRow) {
                    noResultRow.remove();
                }
            });

            // Gestion du bouton "Voir tout"
            const showAllBtn = document.getElementById('showAllBtn');
            if (showAllBtn) {
                showAllBtn.addEventListener('click', function() {
                    const hiddenRows = document.querySelectorAll('tr.hidden-row');
                    hiddenRows.forEach(row => {
                        row.classList.remove('hidden-row');
                    });
                    this.style.display = 'none';
                });
            }
        });
    </script>

    <!-- END wrapper -->
    <!-- scripte pour les données comptées pour le dashboard -->

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            fetch('{{ route("dashboard.stats") }}')
                .then(response => response.json())
                .then(data => {
                    document.getElementById('reservations-count').textContent = data.reservations;
                    document.getElementById('rooms-count').textContent = data.rooms;
                    document.getElementById('categories-count').textContent = data.categories;
                    document.getElementById('revenue-count').textContent = Number(data.revenue).toLocaleString('fr-FR');
                })
                .catch(() => {
                    document.getElementById('reservations-count').textContent = '...';
                    document.getElementById('rooms-count').textContent = '...';
                    document.getElementById('categories-count').textContent = '...';
                    document.getElementById('revenue-count').textContent = '...';
                });

            // Gestion du bouton "Voir tout"
            const showAllBtn = document.getElementById('showAllBtn');
            if (showAllBtn) {
                showAllBtn.addEventListener('click', function() {
                    const hiddenRows = document.querySelectorAll('tr.hidden-row');
                    hiddenRows.forEach(row => {
                        row.classList.remove('hidden-row');
                    });
                    this.style.display = 'none';
                });
            }
        });
    </script>



    <!-- jQuery  -->
    <script src={{ asset('admin/assets/js/jquery.min.js') }}></script>
    <script src={{ asset('admin/assets/js/popper.min.js') }}></script>
    <script src={{ asset('admin/assets/js/bootstrap.min.js') }}></script>
    <script src={{ asset('admin/assets/js/modernizr.min.js') }}></script>
    <script src={{ asset('admin/assets/js/waves.js') }}></script>
    <script src={{ asset('admin/assets/js/jquery.slimscroll.js') }}></script>
    <script src={{ asset('admin/assets/js/jquery.nicescroll.js') }}></script>
    <script src={{ asset('admin/assets/js/jquery.scrollTo.min.js') }}></script>

    <!-- KNOB JS -->
    <script src={{ asset('admin/assets/plugins/jquery-knob/excanvas.js') }}></script>
    <script src={{ asset('admin/assets/plugins/jquery-knob/jquery.knob.js') }}></script>
    <script src={{ asset('admin/assets/plugins/chart.js/chart.min.js') }}></script>
    <script src={{ asset('admin/assets/pages/dashboard.js') }}></script>

    <!-- App js -->
    <script src={{ asset('admin/assets/js/app.js') }}></script>

</body>

</html>