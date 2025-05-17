<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <title>Salle</title>
    <meta content="Admin Dashboard" name="description" />
    <meta content="Mannatthemes" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <link rel="icon" type="image/png" href="{{ asset('assets/images/favicon.png') }}" sizes="16x16">
    <link href="{{ asset('admin/assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('admin/assets/css/icons.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('admin/assets/css/style.css') }}" rel="stylesheet" type="text/css">
    <style>
        .carousel-control-prev-icon,
        .carousel-control-next-icon {
            height: 30px;
            width: 30px;
            background-color: rgba(0, 0, 0, 0.9);
            /* Fond sombre semi-transparent */
            border-radius: 50%;
            padding: 10px;
            background-size: 70% 70%;
            /* Pour que l’icône ne déborde pas */
        }

        .carousel-control-prev,
        .carousel-control-next {
            width: 5%;
            /* Réduit la zone de clic pour éviter les conflits */
        }
    </style>

</head>

<body class="fixed-left">

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

                <div class="page-content-wrapper">
                    <div class="container-fluid">
                        <!-- page title and breadcrumb -->
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="page-title-box">
                                    <div class="btn-group float-right">
                                        <ol class="breadcrumb hide-phone p-0 m-0">
                                            <button type="button" class="btn btn-primary waves-effect waves-light"
                                                data-toggle="modal" data-animation="bounce"
                                                data-target="#addModal">Ajouter</button>
                                            <li class="breadcrumb-item"></li>
                                        </ol>
                                    </div>
                                    <h4 class="page-title">Salle</h4>
                                </div>
                            </div>
                        </div>
                        <!-- end page title end breadcrumb -->

                        <!-- Messages Laravel -->
                        @if (session('success'))
                            <div class="alert alert-success">{{ session('success') }}</div>
                        @endif
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
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
                                        <h5 class="header-title pb-3 mt-0">Listes des salles</h5>
                                        <div class="table-responsive">
                                            <table class="table table-hover mb-0">
                                                <thead>
                                                    <tr class="align-self-center">
                                                        <th>Nom</th>
                                                        <th>Catégorie</th>
                                                        <th>Prix</th>
                                                        <th>Équipements</th>
                                                        <th>Images</th>
                                                        <th>Actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($rooms as $room)
                                                        <tr>
                                                            <td>{{ $room->name }}</td>
                                                            <td>{{ $room->category->name }}</td>
                                                            <td>{{ number_format($room->price, 2, ',', ' ') }} XOF</td>
                                                            <td>
                                                                @if ($room->options === 'oui')
                                                                    Oui
                                                                @elseif($room->options === 'non')
                                                                    Non
                                                                @else
                                                                    Aucun
                                                                @endif
                                                            </td>
                                                            <td>
                                                                @if ($room->image)
                                                                    <a href="#" data-toggle="modal"
                                                                        data-target="#carouselModal{{ $room->id }}">
                                                                        @foreach (json_decode($room->image) as $image)
                                                                            <img src="{{ asset($image) }}"
                                                                                width="50"
                                                                                class="img-thumbnail m-1">
                                                                        @endforeach
                                                                    </a>

                                                                    <!-- Modal avec Carousel -->
                                                                    <div class="modal fade"
                                                                        id="carouselModal{{ $room->id }}"
                                                                        tabindex="-1" role="dialog"
                                                                        aria-labelledby="carouselLabel{{ $room->id }}"
                                                                        aria-hidden="true">
                                                                        <div class="modal-dialog modal-lg"
                                                                            role="document">
                                                                            <div class="modal-content">
                                                                                <div class="modal-header">
                                                                                    <h5 class="modal-title">Images de la
                                                                                        salle : {{ $room->name }}
                                                                                    </h5>
                                                                                    <button type="button"
                                                                                        class="close"
                                                                                        data-dismiss="modal"
                                                                                        aria-label="Fermer">
                                                                                        <span
                                                                                            aria-hidden="true">&times;</span>
                                                                                    </button>
                                                                                </div>
                                                                                <div class="modal-body">
                                                                                    <div id="carousel{{ $room->id }}"
                                                                                        class="carousel slide"
                                                                                        data-ride="carousel">
                                                                                        <div class="carousel-inner">
                                                                                            @foreach (json_decode($room->image) as $key => $image)
                                                                                                <div
                                                                                                    class="carousel-item {{ $key === 0 ? 'active' : '' }}">
                                                                                                    <img class="d-block w-100"
                                                                                                        src="{{ asset($image) }}"
                                                                                                        alt="Image {{ $key + 1 }}">
                                                                                                </div>
                                                                                            @endforeach
                                                                                        </div>
                                                                                        <a class="carousel-control-prev"
                                                                                            href="#carousel{{ $room->id }}"
                                                                                            role="button"
                                                                                            data-slide="prev">
                                                                                            <span
                                                                                                class="carousel-control-prev-icon"
                                                                                                aria-hidden="true"></span>
                                                                                            <span
                                                                                                class="sr-only">Précédent</span>
                                                                                        </a>
                                                                                        <a class="carousel-control-next"
                                                                                            href="#carousel{{ $room->id }}"
                                                                                            role="button"
                                                                                            data-slide="next">
                                                                                            <span
                                                                                                class="carousel-control-next-icon"
                                                                                                aria-hidden="true"></span>
                                                                                            <span
                                                                                                class="sr-only">Suivant</span>
                                                                                        </a>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                @else
                                                                    Aucune image
                                                                @endif
                                                            </td>


                                                            <td>
                                                                <button type="button" class="btn btn-sm btn-success"
                                                                    data-toggle="modal"
                                                                    data-target="#editModal{{ $room->id }}">
                                                                    <i class="fas fa-edit"></i>
                                                                </button>
                                                                <form action="{{ route('rooms.destroy', $room->id) }}"
                                                                    method="POST" style="display:inline">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button type="submit"
                                                                        class="btn btn-sm btn-danger"
                                                                        onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette salle ?')">
                                                                        <i class="fas fa-trash-alt"></i>
                                                                    </button>
                                                                </form>
                                                            </td>
                                                        </tr>

                                                        <!-- Edit Modal -->
                                                        <div class="modal fade" id="editModal{{ $room->id }}"
                                                            tabindex="-1" role="dialog" aria-hidden="true">
                                                            <div class="modal-dialog modal-lg">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title">Modifier la salle</h5>
                                                                        <button type="button" class="close"
                                                                            data-dismiss="modal"
                                                                            aria-hidden="true">×</button>
                                                                    </div>
                                                                    <form
                                                                        action="{{ route('rooms.update', $room->id) }}"
                                                                        method="POST" enctype="multipart/form-data">
                                                                        @csrf
                                                                        @method('PUT')
                                                                        <div class="modal-body">
                                                                            <div class="form-group">
                                                                                <label>Nom</label>
                                                                                <input type="text" name="name"
                                                                                    class="form-control"
                                                                                    value="{{ $room->name }}"
                                                                                    required>
                                                                            </div>

                                                                            <div class="form-group">
                                                                                <label>Catégorie</label>
                                                                                <select name="category_id"
                                                                                    class="form-control" required>
                                                                                    @foreach (App\Models\Categorie::all() as $category)
                                                                                        <option
                                                                                            value="{{ $category->id }}"
                                                                                            {{ $room->category_id == $category->id ? 'selected' : '' }}>
                                                                                            {{ $category->name }}
                                                                                        </option>
                                                                                    @endforeach
                                                                                </select>
                                                                            </div>

                                                                            <div class="form-group">
                                                                                <label>Prix</label>
                                                                                <input type="number" step="0.01"
                                                                                    name="price"
                                                                                    class="form-control"
                                                                                    value="{{ $room->price }}"
                                                                                    required>
                                                                            </div>

                                                                            <div class="form-group">
                                                                                <label>Équipements</label>
                                                                                <select name="options"
                                                                                    class="form-control" required>
                                                                                    <option value="oui"
                                                                                        {{ $room->options === 'oui' ? 'selected' : '' }}>
                                                                                        Oui</option>
                                                                                    <option value="non"
                                                                                        {{ $room->options === 'non' ? 'selected' : '' }}>
                                                                                        Non</option>
                                                                                </select>
                                                                            </div>

                                                                            <div class="form-group">
                                                                                <label>Description</label>
                                                                                <textarea name="description" class="form-control" rows="3" required>{{ $room->description }}</textarea>
                                                                            </div>

                                                                            <div class="form-group">
                                                                                <label>Images actuelles</label>
                                                                                <div class="row">
                                                                                    @if ($room->image)
                                                                                        @foreach (json_decode($room->image) as $image)
                                                                                            <div class="col-md-3 mb-2">
                                                                                                <img src="{{ $image }}"
                                                                                                    class="img-fluid">
                                                                                            </div>
                                                                                        @endforeach
                                                                                    @endif
                                                                                </div>
                                                                            </div>

                                                                            <div class="form-group">
                                                                                <label>Nouvelles images (laisser vide
                                                                                    pour conserver les images
                                                                                    actuelles)</label>
                                                                                <input type="file" name="images[]"
                                                                                    class="form-control-file" multiple>
                                                                            </div>
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button"
                                                                                class="btn btn-secondary"
                                                                                data-dismiss="modal">Annuler</button>
                                                                            <button type="submit"
                                                                                class="btn btn-primary">Mettre à
                                                                                jour</button>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="pt-3 border-top text-right">
                                            <a href="#" class="text-primary">Tous voir <i
                                                    class="mdi mdi-arrow-right"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Add Modal -->
                            <div class="modal fade" id="addModal" tabindex="-1" role="dialog"
                                aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Nouvelle Salle</h5>
                                            <button type="button" class="close" data-dismiss="modal"
                                                aria-hidden="true">×</button>
                                        </div>
                                        <form action="{{ route('rooms.store') }}" method="POST"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label>Nom</label>
                                                    <input type="text" name="name" class="form-control"
                                                        required placeholder="Entrez le nom de la salle">
                                                </div>

                                                <div class="form-group">
                                                    <label>Catégorie</label>
                                                    <select name="category_id" class="form-control" required>
                                                        <option value="">-- Sélectionnez une catégorie --
                                                        </option>
                                                        @foreach (App\Models\Categorie::all() as $category)
                                                            <option value="{{ $category->id }}">{{ $category->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>

                                                <div class="form-group">
                                                    <label>Prix</label>
                                                    <input type="number" step="0.01" name="price"
                                                        class="form-control" required
                                                        placeholder="Entrez le prix de la salle">
                                                </div>

                                                <div class="form-group">
                                                    <label>Équipements</label>
                                                    <select name="options" class="form-control" required>
                                                        <option value="">-- Sélectionnez --</option>
                                                        <option value="oui">Oui</option>
                                                        <option value="non">Non</option>
                                                    </select>
                                                </div>

                                                <div class="form-group">
                                                    <label>Description</label>
                                                    <textarea name="description" class="form-control" rows="3" required placeholder="Description de la salle"></textarea>
                                                </div>

                                                <div class="form-group">
                                                    <label>Images</label>
                                                    <input type="file" name="images[]" class="form-control-file"
                                                        multiple required>
                                                    <small class="form-text text-muted">Vous pouvez sélectionner
                                                        plusieurs images à la fois.</small>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">Annuler</button>
                                                <button type="submit" class="btn btn-primary">Enregistrer</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!-- End Add Modal -->
                        </div>
                    </div>
                </div>
            </div>
            @include ('admin.partials.footer')
        </div>
    </div>

    <!-- JS -->
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
