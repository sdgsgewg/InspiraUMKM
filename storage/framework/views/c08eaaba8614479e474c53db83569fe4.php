<div class="sidebar border border-right col-md-3 col-lg-2 p-0 bg-body-tertiary">
    <div class="offcanvas-md offcanvas-end bg-body-tertiary" tabindex="-1" id="sidebarMenu"
        aria-labelledby="sidebarMenuLabel">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="sidebarMenuLabel">InspiraUMKM</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" data-bs-target="#sidebarMenu"
                aria-label="Close"></button>
        </div>
        <div class="offcanvas-body d-md-flex flex-column p-0 pt-lg-3 overflow-y-auto">
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link d-flex gap-2 <?php echo e(Request::is('dashboard') ? 'active' : 'text-muted'); ?>"
                        aria-current="page" href="<?php echo e(route('admin.dashboard')); ?>">
                        <i class="bi bi-house"></i>
                        <?php echo app('translator')->get('dashboard.dashboard'); ?>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link d-flex gap-2 <?php echo e(Request::is('dashboard/designs*') ? 'active' : 'text-muted'); ?>"
                        href="<?php echo e(route('admin.designs.index')); ?>"><i class="bi bi-palette"></i> <?php echo app('translator')->get('dashboard.my_designs'); ?>
                    </a>
                </li>
            </ul>

            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin')): ?>
                <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
                    <span><?php echo app('translator')->get('dashboard.administrator'); ?></span>
                </h6>

                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link d-flex gap-2 <?php echo e(Request::is('dashboard/products*') ? 'active' : 'text-muted'); ?>"
                            aria-current="page" href="<?php echo e(route('admin.products.index')); ?>">
                            <i class="bi bi-box"></i> <?php echo app('translator')->get('dashboard.design_products'); ?>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link d-flex gap-2 <?php echo e(Request::is('dashboard/categories*') ? 'active' : 'text-muted'); ?>"
                            aria-current="page" href="<?php echo e(route('admin.categories.index')); ?>">
                            <i class="bi bi-grid"></i> <?php echo app('translator')->get('dashboard.design_categories'); ?>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link d-flex gap-2 <?php echo e(Request::is('dashboard/options*') ? 'active' : 'text-muted'); ?>"
                            aria-current="page" href="<?php echo e(route('admin.options.index')); ?>">
                            <i class="bi bi-menu-button-wide"></i> <?php echo app('translator')->get('dashboard.design_options'); ?>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link d-flex gap-2 <?php echo e(Request::is('dashboard/option-values*') ? 'active' : 'text-muted'); ?>"
                            aria-current="page" href="<?php echo e(route('admin.option-values.index')); ?>">
                            <i class="bi bi-menu-button-wide"></i>
                            <?php echo app('translator')->get('dashboard.design_option_values'); ?>
                        </a>
                    </li>
                </ul>
            <?php endif; ?>

            <hr class="my-3">

            <ul class="nav flex-column">
                <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mb-1 text-muted">
                    <span><?php echo app('translator')->get('dashboard.personalization'); ?></span>
                </h6>

                
                <li class="nav-item dropdown text-muted">
                    <a class="nav-link dropdown-toggle text-muted" href="#" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-translate text-muted"></i>
                        <span class="d-inline-flex mx-1"><?php echo app('translator')->get('dashboard.change_language'); ?></span>
                    </a>
                    <ul class="dropdown-menu ms-3">
                        <li>
                            <a class="dropdown-item <?php echo e(app()->getLocale() === 'en' ? 'active' : ''); ?>"
                                href="<?php echo e(route('changeLanguage', ['lang' => 'en'])); ?>">
                                <?php echo app('translator')->get('dashboard.english'); ?>
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item <?php echo e(app()->getLocale() === 'id' ? 'active' : ''); ?>"
                                href="<?php echo e(route('changeLanguage', ['lang' => 'id'])); ?>">
                                <?php echo app('translator')->get('dashboard.bahasa_indonesia'); ?>
                            </a>
                        </li>
                    </ul>
                </li>

                
                <li class="nav-item dropdown text-muted">
                    <button
                        class="btn btn-bd-primary nav-link dropdown-toggle d-flex align-items-center text-muted mx-3 px-0 py-2 rounded"
                        id="bd-theme" type="button" aria-expanded="false" data-bs-toggle="dropdown"
                        aria-label="Toggle theme (auto)">
                        <svg class="bi theme-icon-active text-muted" width="1.2em" height="1.2em">
                            <use href="#circle-half"></use>
                        </svg>
                        <span class="d-inline-flex ms-2 me-1" id="bd-theme-text"><?php echo app('translator')->get('dashboard.toggle_theme'); ?></span>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-start shadow rounded" aria-labelledby="bd-theme-text">
                        
                        <li>
                            <button type="button" class="dropdown-item d-flex align-items-center gap-2 py-2 px-3"
                                data-bs-theme-value="light" aria-pressed="false">
                                <svg class="bi opacity-75 text-muted" width="1.2em" height="1.2em">
                                    <use href="#sun-fill"></use>
                                </svg>
                                <?php echo app('translator')->get('dashboard.light'); ?>
                                <svg class="bi ms-auto d-none text-muted" width="1.2em" height="1.2em">
                                    <use href="#check2"></use>
                                </svg>
                            </button>
                        </li>
                        
                        <li>
                            <button type="button" class="dropdown-item d-flex align-items-center gap-2 py-2 px-3"
                                data-bs-theme-value="dark" aria-pressed="false">
                                <svg class="bi opacity-75 text-muted" width="1.2em" height="1.2em">
                                    <use href="#moon-stars-fill"></use>
                                </svg>
                                <?php echo app('translator')->get('dashboard.dark'); ?>
                                <svg class="bi ms-auto d-none text-muted" width="1.2em" height="1.2em">
                                    <use href="#check2"></use>
                                </svg>
                            </button>
                        </li>
                        
                        <li>
                            <button type="button"
                                class="dropdown-item d-flex align-items-center gap-2 py-2 px-3 active"
                                data-bs-theme-value="auto" aria-pressed="true">
                                <svg class="bi opacity-75 text-muted" width="1.2em" height="1.2em">
                                    <use href="#circle-half"></use>
                                </svg>
                                <?php echo app('translator')->get('dashboard.auto'); ?>
                                <svg class="bi ms-auto d-none text-muted" width="1.2em" height="1.2em">
                                    <use href="#check2"></use>
                                </svg>
                            </button>
                        </li>
                    </ul>
                </li>

            </ul>

            <hr class="my-3">

            
            <ul class="nav flex-column mb-auto">
                <li class="nav-item">
                    <form action="<?php echo e(route('logout')); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        <button type="submit" class="nav-link d-flex gap-2 text-muted">
                            <i class="bi bi-box-arrow-right"></i> <?php echo app('translator')->get('dashboard.logout'); ?>
                        </button>
                    </form>
                </li>
            </ul>

        </div>
    </div>
</div>
<?php /**PATH C:\Users\jesse\Herd\InspiraUMKM\resources\views/dashboard/layouts/sidebar.blade.php ENDPATH**/ ?>