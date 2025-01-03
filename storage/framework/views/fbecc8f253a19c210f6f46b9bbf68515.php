<?php $__env->startSection('container'); ?>
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2"><?php echo app('translator')->get('dashboard.design_option_values'); ?></h1>
    </div>

    <?php if(session()->has('success')): ?>
        <div class="alert alert-success alert-dismissible fade show col-lg-8" role="alert">
            <?php echo e(session('success')); ?>

            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>

    
    <div class="table-responsive small col-lg-8">
        <a href="<?php echo e(route('admin.option-values.create')); ?>" class="btn btn-primary mb-3"><?php echo app('translator')->get('dashboard.create_new_option_value'); ?></a>

        <div class="accordion" id="accordionExample">
            <?php $__currentLoopData = $options; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $option): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php $idx = 0; ?>
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button <?php echo e($selectedOptionId == $option->id ? '' : 'collapsed'); ?>"
                            type="button" data-bs-toggle="collapse" data-bs-target="#collapse<?php echo e($loop->iteration); ?>"
                            aria-expanded="<?php echo e($selectedOptionId == $option->id ? 'true' : 'false'); ?>"
                            aria-controls="collapse<?php echo e($loop->iteration); ?>">
                            <?php
                                $optionName = Lang::has('options.options.' . $option->name)
                                    ? __('options.options.' . $option->name)
                                    : $option->name;
                            ?>

                            <?php echo e($optionName); ?>

                        </button>
                    </h2>
                    <div id="collapse<?php echo e($loop->iteration); ?>"
                        class="accordion-collapse collapse <?php echo e($selectedOptionId == $option->id ? 'show' : ''); ?>"
                        data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <table class="table table-striped table-sm">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col"><?php echo app('translator')->get('dashboard.option_value'); ?></th>
                                        <th scope="col"><?php echo app('translator')->get('dashboard.category'); ?></th>
                                        <th scope="col"><?php echo app('translator')->get('dashboard.action'); ?></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $optionValues; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ov): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php if($ov->option_id == $option->id): ?>
                                            <?php $idx++; ?>
                                            <tr>
                                                <td><?php echo e($idx); ?></td>
                                                <td>
                                                    <?php
                                                        $valueName = Lang::has('options.values.' . $ov->value)
                                                            ? __('options.values.' . $ov->value)
                                                            : $ov->value;
                                                    ?>
                                                    <?php echo e($valueName); ?>

                                                </td>
                                                <td>
                                                    <?php
                                                        // Jika kategori tersedia, cek apakah ada terjemahannya. Jika tidak, gunakan nama asli kategori.
                                                        $categoryName =
                                                            isset($ov->category->name) &&
                                                            Lang::has('designs.categories.' . $ov->category->name)
                                                                ? __('designs.categories.' . $ov->category->name)
                                                                : (isset($ov->category->name)
                                                                    ? $ov->category->name
                                                                    : '-');
                                                    ?>

                                                    <?php echo e($categoryName); ?>

                                                </td>
                                                <td>
                                                    <a href="<?php echo e(route('admin.option-values.edit', ['option_value' => $ov->slug])); ?>"
                                                        class="badge bg-warning">
                                                        <i class="bi bi-pencil-square icon"></i>
                                                    </a>

                                                    <button type="button" class="badge bg-danger border-0"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#deleteModal-<?php echo e($ov->id); ?>">
                                                        <i class="bi bi-x-circle icon"></i>
                                                    </button>

                                                    <?php echo $__env->make('components.modals.dashboard.delete-modal', [
                                                        'item' => $ov,
                                                        'resourceType' => 'option_value',
                                                        'resourceUrl' => 'option-values',
                                                    ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                                                </td>
                                            </tr>
                                        <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('dashboard.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\jesse\Herd\InspiraUMKM\resources\views/dashboard/option-values/index.blade.php ENDPATH**/ ?>