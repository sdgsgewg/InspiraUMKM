

<?php $__env->startSection('container'); ?>
    <div class="container">
        <div class="row my-3">
            <div class="col-12 col-lg-10">
                <h1 class="mb-3"><?php echo e($design['title']); ?></h1>

                <a href="<?php echo e(route('admin.designs.index')); ?>" class="btn btn-success d-inline-flex"><i
                        class="bi bi-arrow-left me-2"></i> Back</a>

                <a href="<?php echo e(route('admin.designs.edit', ['design' => $design->slug])); ?>"
                    class="btn btn-warning d-inline-flex"><i class="bi bi-pencil-square me-2"></i>
                    Edit</a>

                <button type="button" class="btn btn-danger d-inline-flex" data-bs-toggle="modal"
                    data-bs-target="#deleteModal-<?php echo e($design->id); ?>">
                    <i class="bi bi-x-circle icon me-2"></i> Delete
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
                        <p>Product: <?php echo e($design->product->name); ?></p>
                        <p>Category: <?php echo e($design->category->name); ?>

                        </p>
                        <?php
                            $averageRating = number_format($design->reviews()->avg('rating'), 2);
                        ?>
                        <?php if($averageRating != 0.0): ?>
                            <p>Rating: <span class="text-warning"><?php echo e($averageRating); ?></span></p>
                        <?php endif; ?>
                    </div>
                </div>

                <article class="mt-4 fs-6">
                    <hr>
                    <h2 class="mb-3">Detail Information</h2>
                    <p>Stock: <?php echo e($design->stock); ?></p>
                    <p>Price: Rp<?php echo e(number_format($design->price, 2, ',', '.')); ?></p>
                </article>

                <article class="mt-3 fs-6">
                    <hr>
                    <h2>Description</h2>
                    <p><?php echo $design->description; ?></p>
                    <hr>
                </article>

            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('dashboard.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\jesse\Herd\InspiraUMKM\resources\views/dashboard/designs/show.blade.php ENDPATH**/ ?>