<style>
    .nav-link {
        text-transform: uppercase;
    }

    @media (max-width: 992px) {
        .offcanvas .col-12 {
            width: 100%;
        }
    }
</style>

<nav class="navbar navbar-expand-lg bg-dark sticky-top border-bottom" data-bs-theme="dark">
    <div class="col-12 d-flex justify-content-between px-5 py-2">
        <a class="navbar-brand d-lg-none" href="{{ route('home') }}">
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
                        <div class="d-flex align-items-center" style="width: 40px; height: 40px;">
                            <a class="nav-link {{ Request::is('/') ? 'active' : '' }} p-0" href="{{ route('home') }}">
                                <img src="{{ asset('img/inspira.png') }}" alt=""
                                    style="width: 100%; height: 100%; object-fit: cover;">
                            </a>
                        </div>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('/') ? 'active' : '' }}" href="{{ route('home') }}">Home</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('designs*') || Request::is('filtered-designs*') ? 'active' : '' }}"
                            href="{{ route('designs.index') }}">Designs</a>
                    </li>

                    <div class="col-lg-5">
                        @include('components.search', ['id' => 1])
                    </div>

                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('about') ? 'active' : '' }}" href="/about">About Us</a>
                    </li>

                    @auth
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                Welcome back, {{ Str::words(auth()->user()->name, 1, '') }}
                            </a>
                            <ul class="dropdown-menu">
                                {{-- Orders --}}
                                @if (!auth()->user()->is_admin)
                                    <li>
                                        <a class="dropdown-item d-flex {{ request()->routeIs('transactions.index') || request()->routeIs('transactions.show') ? 'active' : '' }}"
                                            href="{{ route('transactions.index') }}">
                                            <i class="bi bi-file-earmark-text me-2"></i> My Orders
                                        </a>
                                    </li>
                                @else
                                    <li>
                                        <a class="dropdown-item d-flex {{ request()->routeIs('transactions.orderRequest') ? 'active' : '' }}"
                                            href="{{ route('transactions.orderRequest') }}">
                                            <i class="bi bi-inbox me-2"></i> Order Requests
                                        </a>
                                    </li>
                                @endif
                                <li>
                                    <hr class="dropdown-divider">
                                </li>

                                {{-- Dashboard --}}
                                @can('admin')
                                    <li>
                                        <a class="dropdown-item d-flex" href="{{ route('admin.dashboard') }}">
                                            <i class="bi bi-layout-text-sidebar-reverse me-2"></i> My Dashboard
                                        </a>
                                    </li>
                                @endcan
                                <li class="nav-item">
                                    <a class="dropdown-item d-flex {{ Request::is('carts*') ? 'active' : '' }}"
                                        href="{{ route('carts.index') }}">
                                        <i class="bi bi-cart3 me-2"></i> Cart
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item d-flex {{ Request::is('profile*') ? 'active' : '' }}"
                                        href="{{ route('users.index') }}">
                                        <i class="bi bi-person-circle me-2"></i> Profile
                                    </a>
                                </li>
                                <hr class="dropdown-divider">
                                <li>
                                    <form action="{{ route('logout') }}" method="POST">
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
                            <a href="{{ route('login') }}"
                                class="nav-link d-flex {{ Request::is('login') ? 'active' : '' }}">
                                <i class="bi bi-box-arrow-in-right me-2"></i> Login
                            </a>
                        </li>
                    @endauth

                </ul>
            </div>
        </div>
    </div>
</nav>
