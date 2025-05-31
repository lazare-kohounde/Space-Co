<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <title>Paiements</title>
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
                        <!-- page title and breadcrumb -->
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="page-title-box">
                                    <h4 class="page-title">Paiement</h4>
                                </div>
                            </div>
                        </div>
                        <!-- end page title end breadcrumb -->

                        <!-- Contenu proprement dit -->
                        <div class="row mt-2">
                            <div class="col-xl-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="flex justify-between">
                                            <div class="card-body">
                                                <div class="d-flex justify-content-star mr-4 align-items-center mb-3">
                                                    <h5 class="header-title mb-0 mr-4">Listes des paiements</h5>
                                                    <input type="text" id="searchInput" class="form-control w-auto" placeholder="Rechercher un paiement..." style="min-width: 250px;">
                                                </div>
                                            </div>
                                            <div class="table-responsive">
                                                <table class="table table-hover mb-0">
                                                    <thead>
                                                        <tr class="align-self-center">
                                                            <th>Paiement</th>
                                                            <th>Auteur</th>
                                                            <th>Date de la transaction (fedapay)</th>
                                                            <th>Date du règlement</th>
                                                            <th>Montant</th>
                                                            <th>Etat</th>
                                                            <th>Gestionnaire</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach($paiements->sortByDesc('created_at')->values() as $index => $paiement)
                                                        <tr class="{{ $index >= 10 ? 'hidden-row' : '' }}">
                                                            <td>{{ str_pad($index + 1, 3, '0', STR_PAD_LEFT) }}</td>
                                                            <td>{{ $paiement['author'] ?? 'Utilisateur inconnu' }}</td>
                                                            <td>{{ $paiement['created_at'] }}</td>
                                                            <td>{{ $paiement['updated_at'] }}</td>
                                                            <td>{{ number_format($paiement['amount_paid'], 0, ',', ' ') }} XOF</td>
                                                            <td>
                                                                @if ($paiement['status'] =='pending')
                                                                <span class="badge badge-boxed badge-soft-primary p-2">
                                                                    En attente
                                                                </span>
                                                                @elseif ($paiement['status'] =='cancelled')
                                                                <span class="badge badge-boxed badge-soft-pink p-2">
                                                                    Annulée
                                                                </span>
                                                                @elseif ($paiement['status'] =='approved')
                                                                <span class="badge badge-boxed badge-soft-success p-2" style="color: black;">
                                                                    Approuvée
                                                                </span>
                                                                @endif
                                                            </td>
                                                            <td>{{ $paiement['manager'] ?? 'Non approuvé' }}</td>

                                                        </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div><!--end table-responsive-->
                                            @if(count($paiements) > 10)
                                            <div class="pt-3 border-top text-right">
                                                <button id="showAllBtn" class="btn btn-primary">Voir tout</button>
                                            </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Contenu proprement dit -->
                        </div>
                        <!-- container -->
                    </div>
                    <!-- Page content Wrapper -->

                </div>
                <!-- content -->

                {{-- footer --}}
                @include ('admin.partials.footer')
                {{-- footer --}}

            </div>
            <!-- End Right content here -->

        </div>
        <!-- END wrapper -->

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
