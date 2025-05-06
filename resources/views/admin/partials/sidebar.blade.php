<!-- ========== Left Sidebar Start ========== -->
<div class="left side-menu">
    <button type="button" class="button-menu-mobile button-menu-mobile-topbar open-left waves-effect">
        <i class="ion-close"></i>
    </button>

    <!-- LOGO -->
    <div class="topbar-left">
        <div class="text-center bg-logo">
            <a href="{{ route('accueil') }}" class="logo">
                <img src="{{ asset('assets/images/logo.png') }}" height="50" alt="logo">
            </a>
        </div>
    </div>

    <!-- User info -->
    <div class="sidebar-user">
        <img src="{{ asset('admin/assets/images/admin.png') }}" alt="user" class="rounded-circle img-thumbnail mb-1">
        <h6 class="">{{ Auth::user()->name }}</h6>
        <p class="online-icon text-dark"><i class="mdi mdi-record text-success"></i> en ligne</p>
        <ul class="list-unstyled list-inline mb-0 mt-2">
            <li class="list-inline-item">
                <a href="{{ route('profil') }}" data-toggle="tooltip" data-placement="top" title="Profil">
                    <i class="dripicons-user text-purple"></i>
                </a>
            </li>
            <li class="list-inline-item">
                <form method="POST" action="{{ route('logout') }}" style="display: inline;">
                    @csrf
                    <button type="submit" class="btn btn-link p-0 m-0 align-baseline" data-toggle="tooltip" data-placement="top" title="Déconnexion" style="color: inherit;">
                        <i class="dripicons-power text-danger" style="cursor:pointer;"></i>
                    </button>
                </form>
            </li>
        </ul>
    </div>

    <div class="sidebar-inner slimscrollleft">
        <div id="sidebar-menu">
            <ul>
                <li>
                    <a href="{{ route('dashboard') }}" class="waves-effect">
                        <i class="dripicons-device-desktop"></i>
                        <span> Tableau de bord</span>
                    </a>
                </li>
                <li class="has-submenu">
                    <a href="{{ route('categorie') }}" class="waves-effect">
                        <i class="fab fa-buromobelexperte"></i>Catégorie
                    </a>
                </li>
                <li class="has-submenu">
                    <a href="{{ route('gestionnaire') }}" class="waves-effect">
                        <i class="mdi mdi-account-key"></i>Gestionnaire
                    </a>
                </li>
                <li class="has-submenu">
                    <a href="{{ route('reservation') }}" class="waves-effect">
                        <i class="mdi mdi-calendar-plus"></i>Reservation
                    </a>
                </li>
                <li class="has-submenu">
                    <a href="{{ route('salleAdmin') }}" class="waves-effect">
                        <i class="mdi mdi-home-variant"></i>Salle
                    </a>
                </li>
            </ul>
        </div>
        <div class="clearfix"></div>
    </div> <!-- end sidebarinner -->
</div>
<!-- Left Sidebar End -->
