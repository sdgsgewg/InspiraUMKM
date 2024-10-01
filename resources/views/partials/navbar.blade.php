<nav class="navbar navbar-expand-md bg-dark sticky-top border-bottom" data-bs-theme="dark">
    <div class="container">
        <a class="navbar-brand d-md-none" href="/">
            <svg class="bi" width="24" height="24">
                <use xlink:href="#aperture" />
            </svg>
            InspiraUMKM
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvas"
            aria-controls="offcanvas" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvas" aria-labelledby="offcanvasLabel">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="offcanvasLabel">InspiraUMKM</h5>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>

            <div class="offcanvas-body">
                <ul class="navbar-nav flex-grow-1 justify-content-between">

                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <svg class="bi" width="24" height="24">
                                <use xlink:href="#aperture" />
                            </svg>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('/') ? 'active' : '' }}" href="/">Home</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('about') ? 'active' : '' }}" href="/about">About</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('designs*') ? 'active' : '' }}" href="/designs">Design</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('categories') ? 'active' : '' }}"
                            href="/categories">Categories</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <svg class="bi" width="24" height="24">
                                <use xlink:href="#cart" />
                            </svg>
                        </a>
                    </li>

                    @auth
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                Welcome back, {{ auth()->user()->name }}
                            </a>
                            <ul class="dropdown-menu">
                                @can('admin')
                                    <li>
                                        <a class="dropdown-item d-flex" href="/dashboard">
                                            <i class="bi bi-layout-text-sidebar-reverse me-2"></i> My Dashboard
                                        </a>
                                    </li>
                                @endcan
                                <li>
                                    <a class="dropdown-item d-flex" href="/profile">
                                        <i class="bi bi-person-circle me-2"></i> Profile
                                    </a>
                                </li>
                                <hr class="dropdown-divider">
                                <li>
                                    <form action="/logout" method="POST">
                                        @csrf
                                        <button type="submit" class="dropdown-item d-flex">
                                            <i class="bi bi-box-arrow-right me-2"></i> Logout
                                        </button>
                                    </form>
                                </li>
                            </ul>
                        </li>
                    @else
                        <li class="nav-item">
                            <a href="/login" class="nav-link d-flex {{ Request::is('login') ? 'active' : '' }}">
                                <i class="bi bi-box-arrow-in-right me-2"></i> Login
                            </a>
                        </li>
                    @endauth

                </ul>
            </div>
        </div>
    </div>
</nav>
