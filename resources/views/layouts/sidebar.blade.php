<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion shadow-sm" id="accordionSidebar">

    <!-- Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center py-3" href="{{ url('/') }}">
        <div class="sidebar-brand-icon">
            <i class="fas fa-newspaper fa-lg"></i>
        </div>
        <div class="sidebar-brand-text mx-2 fw-bold">News Core</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider">
    <div class="sidebar-heading text-white-50 px-3 small">
        Section Title
    </div>

    <!-- Dashboard -->
    <li class="nav-item mt-3">
        <a class="nav-link" href="{{ route('dashboard') }}">
            <i class="fas fa-home me-2"></i>
            <span>Dashboard</span>
        </a>
    </li>

    <!-- Berita -->
    <li class="nav-item">
        <a class="nav-link" href="{{ route('news.index') }}">
            <i class="fas fa-newspaper me-2"></i>
            <span>Berita</span>
        </a>
    </li>

</ul>
