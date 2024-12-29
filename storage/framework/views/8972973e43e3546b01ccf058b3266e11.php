<?php $__env->startSection('container'); ?>
    <div class="row my-3">
        <div class="col-12 col-sm-11 col-lg-10">
            <h1 class="mb-3"><?php echo e($design['title']); ?></h1>

            <a href="<?php echo e(route('admin.designs.index')); ?>" class="btn btn-success d-inline-flex"><i
                    class="bi bi-arrow-left me-2"></i><?php echo app('translator')->get('dashboard.back'); ?></a>

            <a href="<?php echo e(route('admin.designs.edit', ['design' => $design->slug])); ?>" class="btn btn-warning d-inline-flex"><i
                    class="bi bi-pencil-square me-2"></i>
                <?php echo app('translator')->get('dashboard.edit'); ?></a>

            <button type="button" class="btn btn-danger d-inline-flex" data-bs-toggle="modal"
                data-bs-target="#deleteModal-<?php echo e($design->id); ?>">
                <i class="bi bi-x-circle icon me-2"></i><?php echo app('translator')->get('dashboard.delete'); ?>
            </button>

            <?php echo $__env->make('components.modals.dashboard.delete-modal', [
                'item' => $design,
                'resourceType' => 'design',
                'resourceUrl' => 'designs',
            ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

            <div class="d-flex flex-row mt-4" style="max-height: 350px;">
                <div class="col-4 overflow-hidden" style="height: 100%;">
                    <?php if($design->image): ?>
                        <img src="<?php echo e(secure_asset('storage/' . $design->image)); ?>" alt="<?php echo e($design->category->name); ?>"
                            class="img-fluid">
                    <?php else: ?>
                        <img src="<?php echo e(secure_asset('img/' . $design->product->name . '.jpg')); ?>"
                            alt="<?php echo e($design->category->name); ?>" style="width: 100%; height: 100%; object-fit:cover;">
                    <?php endif; ?>
                </div>
                <div class="col-7 d-flex flex-column ms-5">
                    
                    <p>
                        <?php echo app('translator')->get('designs.product'); ?>
                        <?php
                            $productName = Lang::has('designs.products.' . $design->product->name)
                                ? __('designs.products.' . $design->product->name)
                                : $design->product->name;
                        ?>
                        <?php echo e($productName); ?>

                    </p>

                    
                    <p>
                        <?php echo app('translator')->get('designs.category'); ?>
                        <?php
                            $categoryName = Lang::has('designs.categories.' . $design->category->name)
                                ? __('designs.categories.' . $design->category->name)
                                : $design->category->name;
                        ?>
                        <?php echo e($categoryName); ?>

                    </p>

                    
                    <?php if($avgDesignRating > 0.0): ?>
                        <p>
                            <?php echo app('translator')->get('designs.rating'); ?> <span class="badge bg-warning text-dark shadow-sm"
                                style="font-size: 0.9rem; font-weight: bold;">
                                <?php echo e(number_format($avgDesignRating, 2)); ?>

                            </span>
                        </p>
                    <?php endif; ?>
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

                <hr>
            </article>

        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('dashboard.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\jesse\Herd\InspiraUMKM\resources\views/dashboard/designs/show.blade.php ENDPATH**/ ?>