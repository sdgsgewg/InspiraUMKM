

<?php $__env->startSection('container'); ?>
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Design Products</h1>
    </div>

    <?php if(session()->has('success')): ?>
        <div class="alert alert-success alert-dismissible fade show col-lg-6" role="alert">
            <?php echo e(session('success')); ?>

            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>

    <div class="table-responsive small col-lg-6">
        <a href="<?php echo e(route('admin.products.create')); ?>" class="btn btn-primary mb-3">Create new product</a>

        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Product Name</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($loop->iteration); ?></td>
                        <td><?php echo e($product->name); ?></td>
                        <td>

                            <a href="<?php echo e(route('admin.products.edit', ['product' => $product->slug])); ?>"
                                class="badge bg-warning">
                                <i class="bi bi-pencil-square icon"></i>
                            </a>

                            <button type="button" class="badge bg-danger border-0" data-bs-toggle="modal"
                                data-bs-target="#deleteModal-<?php echo e($product->id); ?>">
                                <i class="bi bi-x-circle icon"></i>
                            </button>

                            <?php echo $__env->make('components.modals.dashboard.delete-modal', [
                                'item' => $product,
                                'resourceType' => 'product',
                                'resourceUrl' => 'products',
                            ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('dashboard.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\jesse\Herd\InspiraUMKM\resources\views/dashboard/products/index.blade.php ENDPATH**/ ?>