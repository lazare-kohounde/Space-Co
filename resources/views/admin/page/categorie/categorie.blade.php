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

    <link href="{{ asset('admin/assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('admin/assets/css/icons.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('admin/assets/css/style.css') }}" rel="stylesheet" type="text/css">
</head>

<body class="fixed-left">

    <!-- Loader -->
    <div id="preloader">
        <div id="status">
            <div class="spinner"></div>
        </div>
    </div>

    <div id="wrapper">

        {{-- sidebar --}}
        @include ('admin.partials.sidebar')
        {{-- sidebar --}}

        <div class="content-page">
            <div class="content">

                @include ('admin.partials.header')

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
                                                data-target="#addCategoryModal">Ajouter</button>
                                            <!-- end Bouton modal -->
                                            <li class="breadcrumb-item"></li>
                                        </ol>
                                    </div>
                                    <div class="d-flex justify-content-star mr-4 align-items-center mb-3">
                                        <h5 class="header-title mb-0 mr-4">Listes des catégories</h5>
                                        <input type="text" id="searchInput" class="form-control w-auto" placeholder="Rechercher une catégorie..." style="min-width: 250px;">
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- end page title end breadcrumb -->

                        <!-- Messages Laravel -->
                        @if(session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                        @endif
                        @if($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif

                        <!-- Contenu proprement dit -->
                        <div class="row mt-2">
                            <div class="col-xl-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="flex justify-between">
                                            <h5 class="header-title pb-3 mt-0">Listes des catégories</h5>
                                        </div>
                                        <div class="table-responsive">
                                            <table class="table table-hover mb-0">
                                                <thead>
                                                    <tr class="align-self-center">
                                                        <th>Catégorie</th>
                                                        <th>Nom</th>
                                                        <th>Description</th>
                                                        <th>Actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                    @foreach($categories as $index => $category)
                                                    <tr class="{{ $index >= 10 ? 'hidden-row' : '' }}">
                                                        <td>{{ str_pad($index + 1, 3, '0', STR_PAD_LEFT) }}</td>
                                                        <td>{{ $category->name }}</td>
                                                        <td>{{ $category->description }}</td>
                                                        <td>
                                                            <!-- Edit button -->
                                                            <button type="button" class="btn btn-sm btn-success"
                                                                data-toggle="modal"
                                                                data-target="#editCategoryModal{{ $category->id }}">
                                                                <i class="fas fa-edit"></i>
                                                            </button>
                                                            <!-- Delete form -->
                                                            <form action="{{ route('categories.destroy', $category->id) }}" method="POST" style="display:inline">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" class="btn btn-sm btn-danger"
                                                                    onclick="return confirm('Voulez-vous vraiment supprimer cette catégorie ?')">
                                                                    <i class="fas fa-trash-alt"></i>
                                                                </button>
                                                            </form>
                                                        </td>
                                                    </tr>

                                                    <!-- Edit Modal -->
                                                    <div class="modal fade" id="editCategoryModal{{ $category->id }}" tabindex="-1" role="dialog" aria-labelledby="editCategoryModalLabel{{ $category->id }}" aria-hidden="true">
                                                        <div class="modal-dialog modal-lg">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="editCategoryModalLabel{{ $category->id }}">Modifier la catégorie</h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <form action="{{ route('categories.update', $category->id) }}" method="POST">
                                                                        @csrf
                                                                        @method('PUT')
                                                                        <div class="form-group">
                                                                            <label>Nom</label>
                                                                            <input type="text" name="name" class="form-control" value="{{ $category->name }}" required>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label>Description</label>
                                                                            <textarea name="description" class="form-control" rows="5" required>{{ $category->description }}</textarea>
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                                                                            <button type="submit" class="btn btn-primary">Mettre à jour</button>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div><!--end table-responsive-->
                                        
                                    </div>
                                </div>
                            </div>

                            <!-- Add Category Modal -->
                            <div class="modal fade" id="addCategoryModal" tabindex="-1" role="dialog" aria-labelledby="addCategoryModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="addCategoryModalLabel">Nouvelle catégorie</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{ route('categories.store') }}" method="POST">
                                                @csrf
                                                <div class="form-group">
                                                    <label>Nom</label>
                                                    <input type="text" name="name" class="form-control" required placeholder="Entrez le nom de la catégorie" />
                                                </div>
                                                <div class="form-group">
                                                    <label>Description</label>
                                                    <textarea name="description" class="form-control" rows="5" required placeholder="Entrez la description"></textarea>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                                                    <button type="submit" class="btn btn-primary">Enregistrer</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End Add Category Modal -->
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

                // Optionnel : afficher un message si aucun résultat
                let noResultRow = document.getElementById('noResultRow');
                if (visibleCount === 0) {
                    if (!noResultRow) {
                        noResultRow = document.createElement('tr');
                        noResultRow.id = 'noResultRow';
                        noResultRow.innerHTML = `<td colspan="3" class="text-center">Aucun résultat trouvé</td>`;
                        tableBody.appendChild(noResultRow);
                    }
                } else if (noResultRow) {
                    noResultRow.remove();
                }
            });
        });
    </script>

    <!-- jQuery  -->
    <script src="{{ asset('admin/assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('admin/assets/js/popper.min.js') }}"></script>
    <script src="{{ asset('admin/assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('admin/assets/js/modernizr.min.js') }}"></script>
    <script src="{{ asset('admin/assets/js/waves.js') }}"></script>
    <script src="{{ asset('admin/assets/js/jquery.slimscroll.js') }}"></script>
    <script src="{{ asset('admin/assets/js/jquery.nicescroll.js') }}"></script>
    <script src="{{ asset('admin/assets/js/jquery.scrollTo.min.js') }}"></script>
    <script src="{{ asset('admin/assets/plugins/jquery-knob/excanvas.js') }}"></script>
    <script src="{{ asset('admin/assets/plugins/jquery-knob/jquery.knob.js') }}"></script>
    <script src="{{ asset('admin/assets/plugins/chart.js/chart.min.js') }}"></script>
    <script src="{{ asset('admin/assets/pages/dashboard.js') }}"></script>
    <script src="{{ asset('admin/assets/js/app.js') }}"></script>

</body>

</html>