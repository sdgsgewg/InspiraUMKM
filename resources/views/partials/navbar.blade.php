<style>
    .nav-link {
        text-transform: uppercase;
    }

    .dropdown-menu {
        transition: opacity 0.3s ease, visibility 0.3s ease;
    }

    .d-none {
        display: none !important;
    }

    @media (max-width: 992px) {
        .offcanvas .col-12 {
            width: 100%;
        }
    }
</style>

<nav class="navbar navbar-expand-lg bg-dark sticky-top border-bottom" data-bs-theme="dark">
    <div class="col-12 d-flex justify-content-between px-5 py-2">
        {{-- Logo Inspira UMKM --}}
        @include('partials.logo')

        {{-- Dropdown Toggle --}}
        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvas"
            aria-controls="offcanvas" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        {{-- Offcanvas Menu --}}
        <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvas" aria-labelledby="offcanvasLabel">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="offcanvasLabel">InspiraUMKM</h5>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>

            <div class="offcanvas-body">
                <ul class="navbar-nav flex-grow-1 justify-content-between">
                    {{-- Menu --}}
                    @include('partials.menu')
                    {{-- Dropdown Menu --}}
                    @include('partials.dropdown-menu')
                </ul>
            </div>
        </div>
    </div>
</nav>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const mainMenu = document.querySelector('.dropdown-menu.main-menu');
        const localizationMenu = document.querySelector('.dropdown-menu.localization-menu');
        const themeMenu = document.querySelector('.color-theme-menu');
        const localizationButton = document.getElementById('localization-button');
        const themeButton = document.getElementById('color-theme-button');
        const backToMainMenuButtons = document.querySelectorAll('.back-to-main-menu');

        // Tampilkan menu Localization
        localizationButton.addEventListener('click', (e) => {
            e.stopPropagation(); // Mencegah penutupan otomatis
            mainMenu.classList.remove('show');
            localizationMenu.classList.add('show');
        });

        themeButton.addEventListener('click', (e) => {
            e.stopPropagation();
            mainMenu.classList.remove('show');
            themeMenu.classList.toggle('show');
        });

        // Kembali ke menu utama untuk semua tombol "back-to-main-menu"
        backToMainMenuButtons.forEach((button) => {
            button.addEventListener('click', (e) => {
                e.stopPropagation(); // Mencegah penutupan otomatis
                localizationMenu.classList.remove('show');
                themeMenu.classList.remove('show');
                mainMenu.classList.add('show');
            });
        });
    });
</script>
