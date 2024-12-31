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

<nav class="position-relative navbar navbar-expand-lg bg-dark sticky-top border-bottom" data-bs-theme="dark">
    <div class="col-12 d-flex justify-content-between px-5 py-2">
        
        <?php echo $__env->make('partials.logo', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        
        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvas"
            aria-controls="offcanvas" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        
        <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvas" aria-labelledby="offcanvasLabel">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="offcanvasLabel">InspiraUMKM</h5>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>

            <div class="offcanvas-body position-relative">
                <ul class="navbar-nav position-relative flex-grow-1 justify-content-between">
                    
                    <?php echo $__env->make('partials.menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    
                    <?php echo $__env->make('partials.dropdown-menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </ul>
            </div>
        </div>
    </div>
</nav>

<script src="<?php echo e(secure_asset('js/navbar.js')); ?>"></script>
<?php /**PATH C:\Users\jesse\Herd\InspiraUMKM\resources\views/partials/navbar.blade.php ENDPATH**/ ?>