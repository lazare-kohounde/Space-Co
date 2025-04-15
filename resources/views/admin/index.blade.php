<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <title>Dashboard</title>
    <meta content="Admin Dashboard" name="description" />
    <meta content="Mannatthemes" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <link rel="shortcut icon" href="admin/assets/images/favicon.ico">

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
            <div class="content-page">
                <!-- Start content -->
                <div class="content">

                    <!-- Top Bar Start -->
                    <div class="topbar">

                        <nav class="navbar-custom">

                            <ul class="list-inline float-right mb-0">
                                <li class="list-inline-item dropdown notification-list">
                                    <a class="nav-link dropdown-toggle arrow-none waves-effect" data-toggle="dropdown"
                                        href="#" role="button" aria-haspopup="false" aria-expanded="false">
                                        <i class="dripicons-mail noti-icon"></i>
                                        <span class="badge badge-danger noti-icon-badge">5</span>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right dropdown-arrow dropdown-menu-lg">
                                        <!-- item-->
                                        <div class="dropdown-item noti-title">
                                            <h5><span class="badge badge-danger float-right">745</span>Messages</h5>
                                        </div>

                                        <!-- item-->
                                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                                            <div class="notify-icon"><img
                                                    src="{{ asset('admin/assets/images/users/user.png') }}"
                                                    alt="user-img" class="img-fluid rounded-circle" /> </div>
                                            <p class="notify-details"><b>Charles M. Jones</b><small
                                                    class="text-muted">Dummy
                                                    text of the printing and typesetting
                                                    industry.</small></p>
                                        </a>

                                        <!-- item-->
                                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                                            <div class="notify-icon"><img
                                                    src="{{ asset('admin/assets/images/users/user.png') }}"
                                                    alt="user-img" class="img-fluid rounded-circle" /> </div>
                                            <p class="notify-details"><b>Thomas J. Mimms</b><small
                                                    class="text-muted">You
                                                    have 87 unread messages</small></p>
                                        </a>

                                        <!-- item-->
                                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                                            <div class="notify-icon"><img
                                                    src="{{ asset('admin/assets/images/users/user.png') }}"
                                                    alt="user-img" class="img-fluid rounded-circle" /> </div>
                                            <p class="notify-details"><b>Luis M. Konrad</b><small class="text-muted">It
                                                    is
                                                    a long established fact that a reader will</small></p>
                                        </a>

                                        <!-- All-->
                                        <a href="javascript:void(0);" class="dropdown-item notify-item border-top">
                                            View All
                                        </a>

                                    </div>
                                </li>

                                <li class="list-inline-item dropdown notification-list">
                                    <a class="nav-link dropdown-toggle arrow-none waves-effect" data-toggle="dropdown"
                                        href="#" role="button" aria-haspopup="false" aria-expanded="false">
                                        <i class="dripicons-bell noti-icon"></i>
                                        <span class="badge badge-success noti-icon-badge">2</span>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right dropdown-arrow dropdown-menu-lg">
                                        <!-- item-->
                                        <div class="dropdown-item noti-title">
                                            <h5><span class="badge badge-danger float-right">87</span>Notification</h5>
                                        </div>

                                        <!-- item-->
                                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                                            <div class="notify-icon bg-primary"><i class="mdi mdi-cart-outline"></i>
                                            </div>
                                            <p class="notify-details"><b>Your order is placed</b><small
                                                    class="text-muted">Dummy text of the printing and typesetting
                                                    industry.</small></p>
                                        </a>

                                        <!-- item-->
                                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                                            <div class="notify-icon bg-success"><i class="mdi mdi-message"></i></div>
                                            <p class="notify-details"><b>New Message received</b><small
                                                    class="text-muted">You have 87 unread messages</small></p>
                                        </a>

                                        <!-- item-->
                                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                                            <div class="notify-icon bg-warning"><i class="mdi mdi-glass-cocktail"></i>
                                            </div>
                                            <p class="notify-details"><b>Your item is shipped</b><small
                                                    class="text-muted">It is a long established fact that a reader
                                                    will</small></p>
                                        </a>

                                        <!-- All-->
                                        <a href="javascript:void(0);" class="dropdown-item notify-item border-top">
                                            View All
                                        </a>

                                    </div>
                                </li>

                                <li class="list-inline-item dropdown notification-list">
                                    <a class="nav-link dropdown-toggle arrow-none waves-effect nav-user"
                                        data-toggle="dropdown" href="#" role="button" aria-haspopup="false"
                                        aria-expanded="false">
                                        <img src="{{ asset('admin/assets/images/admin.png') }}" alt="user"
                                            class="rounded-circle">
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                                        <!-- item-->
                                        <a class="dropdown-item" href="#"><i
                                                class="mdi mdi-account-circle m-r-5 text-muted"></i> Profil</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="#"><i
                                                class="mdi mdi-logout m-r-5 text-muted"></i>
                                            Déconnection</a>
                                    </div>
                                </li>
                            </ul>

                            <ul class="list-inline menu-left mb-0">
                                <li class="float-left">
                                    <button class="button-menu-mobile open-left waves-light waves-effect">
                                        <i class="mdi mdi-menu"></i>
                                    </button>
                                </li>
                                <li class="hide-phone app-search">
                                    <form role="search" class="">
                                        <input type="text" placeholder="Recherche..." class="form-control">
                                        <a href=""><i class="fas fa-search"></i></a>
                                    </form>
                                </li>
                            </ul>

                            <div class="clearfix"></div>
                        </nav>
                    </div>
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
                                                                <i class="fas fa-tasks text-gradient-success"></i>
                                                            </div>
                                                            <div class="col-10 text-right">
                                                                <h5 class="mt-0 mb-1">190</h5>
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
                                                                <i class="far fa-gem text-gradient-danger"></i>
                                                            </div>
                                                            <div class="col-10 text-right">
                                                                <h5 class="mt-0 mb-1">62</h5>
                                                                <p class="mb-0 font-12 text-muted">Project</p>
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
                                                                <i class="fas fa-users text-gradient-warning"></i>
                                                            </div>
                                                            <div class="col-10 text-right">
                                                                <h5 class="mt-0 mb-1">14</h5>
                                                                <p class="mb-0 font-12 text-muted">Administrateur</p>
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
                                                                <i class="fas fa-database text-gradient-primary"></i>
                                                            </div>
                                                            <div class="col-10 text-right">
                                                                <h5 class="mt-0 mb-1">$15562</h5>
                                                                <p class="mb-0 font-12 text-muted">Budget</p>
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
                                                <label class="btn btn-primary btn-sm active">
                                                    <input type="radio" name="options" id="option1"
                                                        checked="">
                                                    Cette semaine
                                                </label>
                                                <label class="btn btn-primary btn-sm">
                                                    <input type="radio" name="options" id="option2">Mois passé
                                                </label>
                                            </div>
                                            <h5 class="header-title mb-4 mt-0">Record de la semaine</h5>
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
                                                        class="mdi mdi-label text-danger mr-2"></i>Complete</li>
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
                                                            class="mdi mdi-album mr-2 text-warning"></i>New Leads</p>
                                                </div>
                                                <div class="col-sm-6">
                                                    <p class="mb-0 text-muted font-13"><i
                                                            class="mdi mdi-album mr-2 text-danger"></i>New Leads Target
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
                                            <h5 class="header-title pb-3 mt-0">Listes des réservations
                                            </h5>
                                            <div class="table-responsive">
                                                <table class="table table-hover mb-0">
                                                    <thead>
                                                        <tr class="align-self-center">
                                                            <th>Nom et prenom du client</th>
                                                            <th>Type de paiement</th>
                                                            <th>Date du paiement</th>
                                                            <th>Montant</th>
                                                            <th>Etat</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>
                                                                Esdras Agn
                                                            </td>
                                                            <td>Paypal</td>
                                                            <td>5/8/2018</td>
                                                            <td>$15,000</td>
                                                            <td><span
                                                                    class="badge badge-boxed badge-soft-warning p-2">En
                                                                    cours</span>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                Frank M. Lyons
                                                            </td>
                                                            <td>Paypal</td>
                                                            <td>15/7/2018</td>
                                                            <td>$35,000</td>
                                                            <td><span
                                                                    class="badge badge-boxed badge-soft-primary p-2">Terminé</span>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td>
                                                                Angelo Butler
                                                            </td>
                                                            <td>Pioneer</td>
                                                            <td>30/9/2018</td>
                                                            <td>$45,000</td>
                                                            <td><span
                                                                    class="badge badge-boxed badge-soft-warning p-2">En
                                                                    cours</span>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td>
                                                                Phillip Morse
                                                            </td>
                                                            <td>Paypal</td>
                                                            <td>2/6/2018</td>
                                                            <td>$70,000</td>
                                                            <td><span
                                                                    class="badge badge-boxed badge-soft-warning p-2">En
                                                                    cours</span>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                Kevin Heal
                                                            </td>
                                                            <td>Paypal</td>
                                                            <td>5/8/2018</td>
                                                            <td>$15,000</td>
                                                            <td><span
                                                                    class="badge badge-boxed badge-soft-primary p-2">Terminé</span>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                Frank M. Lyons
                                                            </td>
                                                            <td>Paypal</td>
                                                            <td>15/7/2018</td>
                                                            <td>$35,000</td>
                                                            <td><span
                                                                    class="badge badge-boxed badge-soft-primary p-2">Terminé</span>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div><!--end table-responsive-->
                                            <div class="pt-3 border-top text-right">
                                                <a href="#" class="text-primary">Tous voir <i
                                                        class="mdi mdi-arrow-right"></i></a>
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

</body>

</html>
