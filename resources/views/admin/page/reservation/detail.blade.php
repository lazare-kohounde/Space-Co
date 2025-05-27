<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <title>Reservation</title>
    <meta content="Admin Dashboard" name="description" />
    <meta content="Mannatthemes" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <link rel="icon" type="image/png" href="{{ asset('assets/images/favicon.png') }}" sizes="16x16">
    <link href={{ asset('admin/assets/css/bootstrap.min.css') }} rel="stylesheet" type="text/css">
    <link href={{ asset('admin/assets/css/icons.css') }} rel="stylesheet" type="text/css">
    <link href={{ asset('admin/assets/css/style.css') }} rel="stylesheet" type="text/css">
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
        <div class="content-page" >
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
                                    <h4 class="page-title">Réservation @if ($reservation['status'] =='pending') en cours @elseif ($reservation['status'] =='cancelled') annulée @elseif ($reservation['status'] =='approved') approuvée  @endif</h4>
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
                                            <h5 class="header-title pb-3 mt-0">Les details de la réservation
                                            </h5>

                                        </div>
                                        <div class="table-responsive">
                                            <table class="table table-hover mb-0">
                                                <thead>
                                                    <tr class="align-self-center">
                                                        <th>#</th>
                                                        <th>Salle</th>
                                                        <th>Date début</th>
                                                        <th>Date fin</th>
                                                        <th>Montant</th>
                                                        <th>Images</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                    
                                                @foreach($reservation_details_info as $index => $reservation_el)
                                                <tr>
                                                    <td>{{ str_pad($index + 1, 3, '0', STR_PAD_LEFT) }}</td> {{-- Affiche 001, 002, etc. --}}
                                                    <td>{{ $reservation_el['room_name'] ?? 'Salle inconnu' }}</td>
                                                    <td>{{$reservation_el['date_debut'] }}</td>
                                                    <td>{{$reservation_el['date_fin'] }}</td>
                                                    <td>{{ number_format($reservation_el['prix'], 0, ',', ' ') }} XOF</td>
                                                    <td><img src="{{ asset($reservation_el['img']) }}" alt="ceec" width="50" class="img-thumbnail m-1"></td>
                                                </tr>
                                                @endforeach

                                                </tbody>
                                            </table>
                                        </div><!--end table-responsive-->
                                        @if ($reservation['status'] =='pending')      
                                        <div class="pt-3 border-top text-right">
                                         <form method="POST" action="{{ route('reservation.approved',$reservation['id']) }}" onsubmit="return confirmCancel();">
                                                @csrf
                                                <button type="submit" class="list-group-item text-danger" style="font-weight:600;" >
                                                <i class="fa fa-sign me-2"></i> Approuver
                                                </button>
                                            </form>
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
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const deleteButtons = document.querySelectorAll('.delete-button');

            deleteButtons.forEach(function(button) {
                button.addEventListener('click', function(event) {
                    event.preventDefault(); // Empêche l'envoi immédiat

                    if (confirm('Voulez-vous vraiment supprimer cette salle du panier ?')) {
                        // Soumettre le formulaire parent
                        this.closest('form').submit();
                    }
                });
            });
        });
    </script>

</body>

</html>
