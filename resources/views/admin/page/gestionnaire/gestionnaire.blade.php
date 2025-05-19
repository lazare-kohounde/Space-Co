<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <title>Gestionnaire</title>
    <meta content="Admin Dashboard" name="description" />
    <meta content="Mannatthemes" name="author" />

    <link rel="icon" type="image/png" href="{{ asset('assets/images/favicon.png') }}" sizes="16x16">
    <link href="{{ asset('admin/assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('admin/assets/css/icons.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('admin/assets/css/style.css') }}" rel="stylesheet" type="text/css">
</head>

<body class="fixed-left">

    <div id="preloader">
        <div id="status">
            <div class="spinner"></div>
        </div>
    </div>

    <div id="wrapper">

        @include ('admin.partials.sidebar')

        <div class="content-page">
            <div class="content">
                @include ('admin.partials.header')

                <div class="page-content-wrapper ">
                    <div class="container-fluid">

                        <div class="row">
                            <div class="col-sm-12">
                                <div class="page-title-box">
                                    <div class="btn-group float-right">
                                        <ol class="breadcrumb hide-phone p-0 m-0">
                                            <button type="button" class="btn btn-primary waves-effect waves-light"
                                                data-toggle="modal" data-animation="bounce"
                                                data-target="#addManagerModal">Ajouter</button>
                                            <li class="breadcrumb-item"></li>
                                        </ol>
                                    </div>
                                    <h4 class="page-title">Gestionnaire</h4>
                                </div>
                            </div>
                        </div>

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

                        <div class="row mt-2">
                            <div class="col-xl-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-star mr-4 align-items-center mb-3">
                                        <h5 class="header-title mb-0 mr-4">Listes des gestionnaires</h5>
                                        <input type="text" id="searchInput" class="form-control w-auto" placeholder="Rechercher un gestionnaires..." style="min-width: 250px;">
                                    </div>
                                        <div class="table-responsive">
                                            <table class="table table-hover mb-0">
                                                <thead>
                                                    <tr>
                                                        <th>Nom</th>
                                                        <th>Sexe</th>
                                                        <th>Email</th>
                                                        <th>Numéro</th>
                                                        <th>Usertype</th>
                                                        <th>Actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($managers as $manager)
                                                    <tr>
                                                        <td>{{ $manager->name }}</td>
                                                        <td>{{ $manager->sexe }}</td>
                                                        <td>{{ $manager->email }}</td>
                                                        <td>{{ $manager->phone }}</td>
                                                        <td>{{ $manager->usertype }}</td>
                                                        <td>
                                                            <!-- Edit button -->
                                                            <button type="button" class="btn btn-sm btn-success"
                                                                data-toggle="modal"
                                                                data-target="#editManagerModal{{ $manager->id }}">
                                                                <i class="fas fa-edit"></i>
                                                            </button>
                                                            <!-- Delete form -->
                                                            <form action="{{ route('managers.destroy', $manager->id) }}" method="POST" style="display:inline">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" class="btn btn-sm btn-danger"
                                                                    onclick="return confirm('Voulez-vous vraiment supprimer ce gestionnaire ?')">
                                                                    <i class="fas fa-trash-alt"></i>
                                                                </button>
                                                            </form>
                                                        </td>
                                                    </tr>

                                                    <!-- Edit Modal -->
                                                    <div class="modal fade" id="editManagerModal{{ $manager->id }}" tabindex="-1" role="dialog" aria-labelledby="editManagerModalLabel{{ $manager->id }}" aria-hidden="true">
                                                        <div class="modal-dialog modal-lg">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="editManagerModalLabel{{ $manager->id }}">Modifier Gestionnaire</h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <form action="{{ route('managers.update', $manager->id) }}" method="POST">
                                                                        @csrf
                                                                        @method('PUT')
                                                                        <div class="form-group">
                                                                            <label>Nom complet</label>
                                                                            <input type="text" name="name" class="form-control" value="{{ $manager->name }}" required>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label>Sexe</label>
                                                                            <select name="sexe" class="form-control" required>
                                                                                <option value="Masculin" {{ $manager->sexe == 'Masculin' ? 'selected' : '' }}>Masculin</option>
                                                                                <option value="Féminin" {{ $manager->sexe == 'Féminin' ? 'selected' : '' }}>Féminin</option>
                                                                            </select>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label>Email</label>
                                                                            <input type="email" name="email" class="form-control" value="{{ $manager->email }}" required>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label>Numéro</label>
                                                                            <input type="text" name="phone" class="form-control" value="{{ $manager->phone }}" required>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label>Type</label>
                                                                            <select name="usertype" class="form-control" required>
                                                                                <option value="manager" {{ $manager->usertype == 'manager' ? 'selected' : '' }}>Manager</option>
                                                                                <option value="user" {{ $manager->usertype == 'user' ? 'selected' : '' }}>User</option>
                                                                                <option value="admin" {{ $manager->usertype == 'admin' ? 'selected' : '' }}>Admin</option>
                                                                            </select>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label>Nouveau mot de passe (laisser vide pour ne pas changer)</label>
                                                                            <input type="password" name="password" class="form-control" placeholder="Nouveau mot de passe">
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label>Confirmer le mot de passe</label>
                                                                            <input type="password" name="password_confirmation" class="form-control" placeholder="Confirmez le mot de passe">
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
                                            <div class="pt-3 border-top text-right">
                                                <a href="#" class="text-primary">Tous voir <i class="mdi mdi-arrow-right"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Add Manager Modal -->
                            <div class="modal fade" id="addManagerModal" tabindex="-1" role="dialog" aria-labelledby="addManagerModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="addManagerModalLabel">Nouveau gestionnaire</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{ route('managers.store') }}" method="POST">
                                                @csrf
                                                <div class="form-group">
                                                    <label>Nom complet</label>
                                                    <input type="text" name="name" class="form-control" required placeholder="Entrez le nom complet">
                                                </div>
                                                <div class="form-group">
                                                    <label>Sexe</label>
                                                    <select name="sexe" class="form-control" required>
                                                        <option value="">-- Sélectionnez --</option>
                                                        <option value="Masculin">Masculin</option>
                                                        <option value="Féminin">Féminin</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label>Email</label>
                                                    <input type="email" name="email" class="form-control" required placeholder="Adresse email">
                                                </div>
                                                <div class="form-group">
                                                    <label>Numéro</label>
                                                    <input type="text" name="phone" class="form-control" required placeholder="Numéro de téléphone">
                                                </div>
                                                <div class="form-group">
                                                    <label>Type</label>
                                                    <select name="usertype" class="form-control" required>
                                                        <option value="">-- Sélectionnez --</option>
                                                        <option value="manager" selected>Manager</option>
                                                        <option value="user">User</option>
                                                        <option value="admin">Admin</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label>Mot de passe</label>
                                                    <input type="password" name="password" class="form-control" required placeholder="Mot de passe">
                                                </div>
                                                <div class="form-group">
                                                    <label>Confirmer le mot de passe</label>
                                                    <input type="password" name="password_confirmation" class="form-control" required placeholder="Confirmez le mot de passe">
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
                            <!-- End Add Manager Modal -->
                        </div>
                    </div>
                </div>
            </div>
            @include ('admin.partials.footer')
        </div>
    </div>

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