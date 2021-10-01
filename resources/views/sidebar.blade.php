<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-utensils"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Resep Makanan</div>
    </a>

    <hr class="sidebar-divider my-0">

    <li class="nav-item {{ request()->is('recipes*') ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('recipes.index') }}">
            <i class="fas fa-fw fa-hamburger"></i>
            <span>Resep</span></a>
    </li>

    <li class="nav-item {{ request()->is('ingredients*') ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('ingredients.index') }}">
            <i class="fas fa-fw fa-seedling"></i>
            <span>Bahan</span></a>
    </li>

    <li class="nav-item {{ request()->is('category*') ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('category.index') }}">
            <i class="fas fa-fw fa-list"></i>
            <span>Kategori</span></a>
    </li>

    <hr class="sidebar-divider">

    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
