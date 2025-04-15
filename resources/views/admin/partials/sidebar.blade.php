<!-- ========== Left Sidebar Start ========== -->
<div class="left side-menu">
    <button type="button" class="button-menu-mobile button-menu-mobile-topbar open-left waves-effect">
        <i class="ion-close"></i>
    </button>

    <!-- LOGO -->
    <div class="topbar-left">
        <div class="text-center bg-logo">
            {{-- <a href="index.html" class="logo"><i class="mdi mdi-bowling text-success"></i> Dash
                Space-co</a> --}}
            <a href="index.html" class="logo"><img src="{{ asset('assets/images/logo.png') }}" height="50"
                    alt="logo"></a>
        </div>
    </div>
    <div class="sidebar-user">
        <img src="{{ asset('admin/assets/images/admin.png') }}" alt="user"
            class="rounded-circle img-thumbnail mb-1">
        <h6 class="">Mr. Michael Hill </h6>
        <p class=" online-icon text-dark"><i class="mdi mdi-record text-success"></i>en ligne</p>
        <ul class="list-unstyled list-inline mb-0 mt-2">
            <li class="list-inline-item">
                <a href="#" class="" data-toggle="tooltip" data-placement="top" title="Profil"><i
                        class="dripicons-user text-purple"></i></a>
            </li>
            <li class="list-inline-item">
                <a href="#" class="" data-toggle="tooltip" data-placement="top"
                    title="Déconnection"><i class="dripicons-power text-danger"></i></a>
            </li>
        </ul>
    </div>

    <div class="sidebar-inner slimscrollleft">

        <div id="sidebar-menu">
            <ul>
                <li>
                    <a href="{{Route('dashboard')}}" class="waves-effect">
                        <i class="dripicons-device-desktop"></i>
                        <span> Tableau de bord</span>
                    </a>
                </li>
                <li class="has-submenu">
                    <a href="{{ Route('categorie') }}" class="waves-effect"><i
                            class="fab fa-buromobelexperte"></i>Catégorie</a>
                </li>
                <li class="has-submenu">
                    <a href="{{ Route('gestionnaire') }}" class="waves-effect"><i class="mdi mdi-account-key"></i>Gestionnaire</a>
                </li>
                <li class="has-submenu">
                    <a href="{{ Route('reservation') }}" class="waves-effect"><i class="mdi mdi-calendar-plus"></i>Reservation</a>
                </li>
                <li class="has-submenu">
                    <a href="{{ Route('salle') }}" class="waves-effect"><i class="mdi mdi-home-variant"></i>Salle</a>
                </li>
            </ul>
        </div>
        <div class="clearfix"></div>
    </div> <!-- end sidebarinner -->
</div>
<!-- Left Sidebar End -->                       