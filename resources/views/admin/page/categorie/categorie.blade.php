<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <title>Categorie</title>
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
                                    <div class="btn-group float-right">
                                        <ol class="breadcrumb hide-phone p-0 m-0">
                                            <!--Bouton du modal -->
                                            <button type="button" class="btn btn-primary waves-effect waves-light"
                                                data-toggle="modal" data-animation="bounce"
                                                data-target=".bs-example-modal-lg">Ajouter</button>
                                            <!-- end Bouton modal -->
                                            <li class="breadcrumb-item"></a></li>

                                        </ol>
                                    </div>
                                    <h4 class="page-title">Categorie</h4>
                                </div>
                            </div>
                        </div>
                        <!-- end page title end breadcrumb -->

                        <!-- Contenu proprement dit -->
                        <div class="row mt-2" style="padding-top: 70px;">
                            <div class="col-xl-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="flex justify-between">
                                            <h5 class="header-title pb-3 mt-0">Listes des catégories
                                            </h5>

                                        </div>
                                        <div class="table-responsive">
                                            <table class="table table-hover mb-0">
                                                <thead>
                                                    <tr class="align-self-center">
                                                        <th>Nom</th>
                                                        <th>Description</th>
                                                        <th>Actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            Esdras Agn
                                                        </td>
                                                        <td>Paypal</td>
                                                        <td>                                                       
                                                            <button type="button" class="btn btn-sm btn-success"><i class="fas fa-edit"></i></button>
                                                            <button type="button" class="btn btn-sm btn-danger"><i class="fas fa-trash-alt"></i></button>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            Frank M. Lyons
                                                        </td>
                                                        <td>Paypal</td>
                                                        <td>                                                       
                                                            <button type="button" class="btn btn-sm btn-success"><i class="fas fa-edit"></i></button>
                                                            <button type="button" class="btn btn-sm btn-danger"><i class="fas fa-trash-alt"></i></button>
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td>
                                                            Angelo Butler
                                                        </td>
                                                        <td>Pioneer</td>
                                                        <td>                                                       
                                                            <button type="button" class="btn btn-sm btn-success"><i class="fas fa-edit"></i></button>
                                                            <button type="button" class="btn btn-sm btn-danger"><i class="fas fa-trash-alt"></i></button>
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td>
                                                            Kevin Heal
                                                        </td>
                                                        <td>Paypal</td>
                                                        <td>                                                       
                                                            <button type="button" class="btn btn-sm btn-success"><i class="fas fa-edit"></i></button>
                                                            <button type="button" class="btn btn-sm btn-danger"><i class="fas fa-trash-alt"></i></button>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            Frank M. Lyons
                                                        </td>
                                                        <td>Paypal</td>
                                                        <td>                                                       
                                                            <button type="button" class="btn btn-sm btn-success"><i class="fas fa-edit"></i></button>
                                                            <button type="button" class="btn btn-sm btn-danger"><i class="fas fa-trash-alt"></i></button>
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

                            <!-- modal -->
                            <div class="modal fade bs-example-modal-lg mt-4" tabindex="-1" role="dialog"
                                aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        
                                        <div class="modal-header">
                                            <h5 class="modal-title mt-0" id="myLargeModalLabel">Nouvelle catégorie</h5>
                                            <button type="button" class="close" data-dismiss="modal"
                                                aria-hidden="true">×</button>
                                        </div>
                                        <div class="modal-body">
                                            <form class="" action="#">
                                                <!-- nom catégorie -->
                                                <div class="form-group">
                                                    <label>Nom</label>
                                                    <div>
                                                        <input data-parsley-type="alphanum" type="text"
                                                            class="form-control" required
                                                            placeholder="Enter le nom de la catégorie" />
                                                    </div>
                                                </div>
                                                <!-- nom catégorie -->

                                                <!-- description catégorie -->
                                                <div class="form-group">
                                                    <label>Description</label>
                                                    <div>
                                                        <textarea required class="form-control" rows="5"></textarea>
                                                    </div>
                                                </div>
                                                <!-- description catégorie -->

                                                <!-- Actions -->
                                                <div class="form-group mb-0">
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">Annuler</button>
                                                        <button type="submit"
                                                            class="btn btn-primary">Enregistre</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div><!-- /.modal-content -->
                                </div><!-- /.modal-dialog -->
                            </div>
                            <!-- /.modal -->
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

</body>

</html>
