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
        <a class="navbar-brand d-inline-flex align-items-center d-lg-none" href="<?php echo e(route('home')); ?>">
            <div class="d-flex align-items-center overflow-hidden" style="width: 40px; height: 40px;">
                <img src="<?php echo e(secure_asset('img/inspira.png')); ?>" alt=""
                    style="width: 100%; height: 100%; object-fit: cover;">
            </div>
            <div class="ms-2">
                <p class="m-0">InspiraUMKM</p>
            </div>
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

                    <li class="nav-item mb-3 mb-lg-0">
                        <div class="d-flex align-items-center" style="width: 40px; height: 40px;">
                            <a class="nav-link <?php echo e(Request::is('/') ? 'active' : ''); ?> p-0" href="<?php echo e(route('home')); ?>">
                                <img src="<?php echo e(secure_asset('img/inspira.png')); ?>" alt=""
                                    style="width: 100%; height: 100%; object-fit: cover;">
                            </a>
                        </div>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link <?php echo e(Request::is('/') ? 'active' : ''); ?>"
                            href="<?php echo e(route('home')); ?>"><?php echo app('translator')->get('navbar.home'); ?></a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link <?php echo e(Request::is('designs*') || Request::is('filtered-designs*') ? 'active' : ''); ?>"
                            href="<?php echo e(route('designs.index')); ?>"><?php echo app('translator')->get('navbar.designs'); ?></a>
                    </li>

                    <div class="col-lg-5 my-3 my-lg-0">
                        <?php echo $__env->make('components.search', ['id' => 1], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>

                    <li class="nav-item">
                        <a class="nav-link <?php echo e(Request::is('about') ? 'active' : ''); ?>"
                            href="<?php echo e(route('about')); ?>"><?php echo app('translator')->get('navbar.about_us'); ?></a>
                    </li>

                    
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            <i class="bi bi-translate"></i>
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <a class="dropdown-item <?php echo e(app()->getLocale() === 'en' ? 'active' : ''); ?>"
                                    href="<?php echo e(route('changeLanguage', ['lang' => 'en'])); ?>">
                                    <?php echo app('translator')->get('navbar.english'); ?>
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item <?php echo e(app()->getLocale() === 'id' ? 'active' : ''); ?>"
                                    href="<?php echo e(route('changeLanguage', ['lang' => 'id'])); ?>">
                                    <?php echo app('translator')->get('navbar.bahasa_indonesia'); ?>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <?php if(auth()->guard()->check()): ?>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                <?php echo app('translator')->get('navbar.greet'); ?>, <?php echo e(Str::words(auth()->user()->name, 1, '')); ?>

                            </a>
                            <ul class="dropdown-menu">
                                
                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin')): ?>
                                    <li>
                                        <a class="dropdown-item d-flex" href="<?php echo e(route('admin.dashboard')); ?>">
                                            <i class="bi bi-layout-text-sidebar-reverse me-2"></i> <?php echo app('translator')->get('navbar.my_dashboard'); ?>
                                        </a>
                                    </li>
                                <?php endif; ?>

                                
                                <?php if(!auth()->user()->is_admin): ?>
                                    <li class="nav-item">
                                        <a class="dropdown-item d-flex <?php echo e(Request::is('carts*') ? 'active' : ''); ?>"
                                            href="<?php echo e(route('carts.index')); ?>">
                                            <i class="bi bi-cart3 me-2"></i> <?php echo app('translator')->get('navbar.cart'); ?>
                                        </a>
                                    </li>
                                <?php endif; ?>

                                
                                <li>
                                    <a class="dropdown-item d-flex <?php echo e(Request::is('chats*') ? 'active' : ''); ?>"
                                        href="<?php echo e(route('chats.index')); ?>">
                                        <i class="bi bi-chat-dots me-2"></i> <?php echo app('translator')->get('navbar.chat'); ?>
                                    </a>
                                </li>

                                
                                <li>
                                    <a class="dropdown-item d-flex <?php echo e(Request::is('users*') ? 'active' : ''); ?>"
                                        href="<?php echo e(route('users.index')); ?>">
                                        <i class="bi bi-person-circle me-2"></i> <?php echo app('translator')->get('navbar.profile'); ?>
                                    </a>
                                </li>
                                <hr class="dropdown-divider">

                                
                                <?php if(!auth()->user()->is_admin): ?>
                                    <li>
                                        <a class="dropdown-item d-flex <?php echo e(request()->routeIs('transactions.index') || request()->routeIs('transactions.show') ? 'active' : ''); ?>"
                                            href="<?php echo e(route('transactions.index')); ?>">
                                            <i class="bi bi-file-earmark-text me-2"></i> <?php echo app('translator')->get('navbar.my_orders'); ?>
                                        </a>
                                    </li>
                                <?php else: ?>
                                    <li>
                                        <a class="dropdown-item d-flex <?php echo e(request()->routeIs('transactions.orderRequest') ? 'active' : ''); ?>"
                                            href="<?php echo e(route('transactions.orderRequest')); ?>">
                                            <i class="bi bi-inbox me-2"></i> <?php echo app('translator')->get('navbar.order_requests'); ?>
                                        </a>
                                    </li>
                                <?php endif; ?>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>

                                <li>
                                    <form action="<?php echo e(route('logout')); ?>" method="POST">
                                        <?php echo csrf_field(); ?>
                                        <button type="submit" class="dropdown-item d-flex">
                                            <i class="bi bi-box-arrow-right me-2"></i> <?php echo app('translator')->get('navbar.logout'); ?>
                                        </button>
                                    </form>
                                </li>
                            </ul>
                        </li>
                    <?php else: ?>
                        <li class="nav-item">
                            <a href="<?php echo e(route('login')); ?>"
                                class="nav-link d-flex <?php echo e(Request::is('login') ? 'active' : ''); ?>">
                                <i class="bi bi-box-arrow-in-right me-2"></i> <?php echo app('translator')->get('navbar.login'); ?>
                            </a>
                        </li>
                    <?php endif; ?>

                </ul>
            </div>
        </div>
    </div>
</nav>
<?php /**PATH C:\Users\jesse\Herd\InspiraUMKM\resources\views/partials/navbar.blade.php ENDPATH**/ ?>