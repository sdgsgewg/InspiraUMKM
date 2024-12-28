<?php $__env->startSection('css'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('css/designs/style.css')); ?>?v=<?php echo e(time()); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('container'); ?>
    <?php echo $__env->make('components.modals.addToCartModal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <div class="row justify-content-center mt-4 mb-5">
        <div class="col-11 col-md-8">
            <h1 class="mt-2 mb-3"><?php echo e($design['title']); ?></h1>
            <div class="mb-3">
                <p>
                    <?php echo app('translator')->get('designs.by'); ?>
                    <a href="<?php echo e(route('designs.seller', ['seller' => $design->seller->username])); ?>"
                        class="text-decoration-none">
                        <?php echo e($design->seller->name); ?>

                    </a>
                </p>
            </div>

            <div class="d-flex flex-row" style="max-height: 350px;">
                <div class="col-4 overflow-hidden">
                    <?php if($design->image): ?>
                        <div style="max-height: 350px; overflow:hidden">
                            <img src="<?php echo e(asset('storage/' . $design->image)); ?>" alt="<?php echo e($design->name); ?>" class="img-fluid">
                        </div>
                    <?php else: ?>
                        <img src="<?php echo e(asset('img/' . $design->product->name . '.jpg')); ?>" alt="<?php echo e($design->name); ?>"
                            width="1200" height="400" class="img-fluid">
                    <?php endif; ?>
                </div>
                <div class="col-7 d-flex flex-column ms-5">
                    <p><?php echo app('translator')->get('designs.product'); ?>
                        <a href="<?php echo e(route('designs.product', ['product' => $design->product->slug])); ?>"
                            class="text-decoration-none">
                            <?php
                                $productName = Lang::has('designs.products.' . $design->product->name)
                                    ? __('designs.products.' . $design->product->name)
                                    : $design->product->name;
                            ?>

                            <?php echo e($productName); ?>

                        </a>
                    </p>
                    <p><?php echo app('translator')->get('designs.category'); ?>
                        <a href="<?php echo e(route('designs.category', ['category' => $design->category->slug])); ?>"
                            class="text-decoration-none">
                            <?php
                                $categoryName = Lang::has('designs.categories.' . $design->category->name)
                                    ? __('designs.categories.' . $design->category->name)
                                    : $design->category->name;
                            ?>

                            <?php echo e($categoryName); ?>

                        </a>
                    </p>

                    <?php if($avgDesignRating > 0.0): ?>
                        <p><?php echo app('translator')->get('designs.rating'); ?> <span class="badge bg-warning text-dark shadow-sm"
                                style="font-size: 0.9rem; font-weight: bold;">
                                <?php echo e(number_format($avgDesignRating, 2)); ?>

                            </span></p>
                    <?php endif; ?>

                    <div class="d-flex flex-row gap-3 mt-auto">
                        <?php if(auth()->check() && auth()->user()->id !== $design->seller->id): ?>
                            <form action="<?php echo e(route('carts.store', ['design' => $design->slug])); ?>" method="POST"
                                class="d-inline">
                                <?php echo csrf_field(); ?>
                                <button type=<?php echo e($design->stock > 0 ? 'submit' : 'button'); ?>

                                    class="btn <?php echo e($design->stock > 0 ? 'btn-primary' : 'btn-secondary'); ?> d-inline-flex">
                                    <i class="bi bi-cart-plus me-2"></i><?php echo app('translator')->get('designs.add_to_cart'); ?>
                                </button>
                            </form>

                            <form action="<?php echo e(route('checkouts.checkoutFromDesign')); ?>" class="d-inline">
                                <?php echo csrf_field(); ?>

                                <input type="hidden" name="design_id" value="<?php echo e($design->id); ?>">

                                <button type=<?php echo e($design->stock > 0 ? 'submit' : 'button'); ?>

                                    class="btn <?php echo e($design->stock > 0 ? 'btn-success' : 'btn-secondary'); ?> d-inline-flex">
                                    <i class="bi bi-bag-check me-2"></i><?php echo app('translator')->get('designs.checkout'); ?>
                                </button>
                            </form>
                        <?php endif; ?>
                    </div>
                </div>
            </div>

            
            <article class="mt-4 fs-6">
                <hr>
                <h2 class="mb-3"><?php echo app('translator')->get('designs.detailed_information'); ?></h2>
                <p><?php echo app('translator')->get('designs.price'); ?> Rp<?php echo e(number_format($design->price, 2, ',', '.')); ?></p>
                <p><?php echo app('translator')->get('designs.stock'); ?> <?php echo e($design->stock); ?></p>
                <p><?php echo e(__('designs.sold') . ': ' . $soldQuantity); ?></p>
            </article>

            
            <article class="mt-3 fs-6">
                <hr>
                <h2><?php echo app('translator')->get('designs.description'); ?></h2>
                <?php echo $design->description; ?>

            </article>

            
            <?php echo $__env->make('components.designs.design-review-section', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

            
            <?php echo $__env->make('components.designs.comments.design-comment-section', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
    <?php echo $__env->make('components.designs.design-script', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\jesse\Herd\InspiraUMKM\resources\views/designs/design.blade.php ENDPATH**/ ?>