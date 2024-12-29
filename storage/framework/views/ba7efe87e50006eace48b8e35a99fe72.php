<?php $__env->startSection('container'); ?>

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2"><?php echo app('translator')->get('dashboard.my_designs'); ?></h1>
    </div>

    <?php if(session()->has('success')): ?>
        <div class="alert alert-success alert-dismissible fade show col-lg-10" role="alert">
            <?php echo e(session('success')); ?>

            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>

    <div class="table-responsive small col-lg-10">
        <a href="<?php echo e(route('admin.designs.create')); ?>" class="btn btn-primary mb-3"><?php echo app('translator')->get('dashboard.create_new_design'); ?></a>

        <?php if($designs->count()): ?>
            <table class="table table-striped table-sm">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col"><?php echo app('translator')->get('dashboard.title'); ?></th>
                        <th scope="col"><?php echo app('translator')->get('dashboard.product'); ?></th>
                        <th scope="col"><?php echo app('translator')->get('dashboard.category'); ?></th>
                        <th scope="col"><?php echo app('translator')->get('dashboard.action'); ?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $designs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $design): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($loop->iteration); ?></td>
                            <td><?php echo e($design->title); ?></td>
                            <td>
                                <?php
                                    $productName = Lang::has('designs.products.' . $design->product->name)
                                        ? __('designs.products.' . $design->product->name)
                                        : $design->product->name;
                                ?>
                                <?php echo e($productName); ?>

                            </td>
                            <td>
                                <?php
                                    $categpryName = Lang::has('designs.categories.' . $design->category->name)
                                        ? __('designs.categories.' . $design->category->name)
                                        : $design->category->name;
                                ?>
                                <?php echo e($categpryName); ?>

                            </td>
                            <td>
                                <a href="<?php echo e(route('admin.designs.show', ['design' => $design->slug])); ?>"
                                    class="badge bg-info">
                                    <i class="bi bi-eye icon"></i>
                                </a>

                                <a href="<?php echo e(route('admin.designs.edit', ['design' => $design->slug])); ?>"
                                    class="badge bg-warning">
                                    <i class="bi bi-pencil-square icon"></i>
                                </a>

                                <button type="button" class="badge bg-danger border-0" data-bs-toggle="modal"
                                    data-bs-target="#deleteModal-<?php echo e($design->id); ?>">
                                    <i class="bi bi-x-circle icon"></i>
                                </button>

                                <?php echo $__env->make('components.modals.dashboard.delete-modal', [
                                    'item' => $design,
                                    'resourceType' => 'design',
                                    'resourceUrl' => 'designs',
                                ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        <?php else: ?>
            <tbody>
                <tr>
                    <td class="col-lg-8">
                        <p class="text-center"><?php echo app('translator')->get('dashboard.no_design'); ?></p>
                    </td>
                </tr>
            </tbody>
        <?php endif; ?>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('dashboard.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\jesse\Herd\InspiraUMKM\resources\views/dashboard/designs/index.blade.php ENDPATH**/ ?>