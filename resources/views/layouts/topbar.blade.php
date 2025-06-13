<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 shadow-sm border-bottom">
    <ul class="navbar-nav ml-auto align-items-center">

        {{-- Profil Link --}}
        <li class="nav-item">
            <a href="{{ route('profile.show') }}" class="d-flex align-items-center text-dark text-decoration-none mr-3">
                <i class="fas fa-user-circle fa-lg text-primary mr-2"></i>
                <div class="d-flex flex-column align-items-start">
                    <strong style="font-size: 16px;">
                        {{ auth()->user()->name }}
                    </strong>
                    <span class="badge badge-secondary text-uppercase" style="font-size: 10px;">
                        {{ auth()->user()->role }}
                    </span>
                </div>
            </a>
        </li>

        {{-- Tombol Logout --}}
        <li class="nav-item">
            <form action="{{ route('logout') }}" method="POST" class="d-inline">
                @csrf
                <button class="btn btn-outline-danger btn-sm">
                    <i class="fas fa-sign-out-alt mr-1"></i> Logout
                </button>
            </form>
        </li>
    </ul>
</nav>
