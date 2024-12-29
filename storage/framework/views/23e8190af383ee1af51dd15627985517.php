<?php $__env->startSection('container'); ?>
    <div class="d-flex flex-column justify-content-between align-items-start gap-2 pt-3 pb-3 mb-3 border-bottom">
        <h1 class="h2"><?php echo app('translator')->get('dashboard.create_new_option_value'); ?></h1>

        <a href="<?php echo e(route('admin.option-values.index')); ?>" class="btn btn-success d-inline-flex"><i
                class="bi bi-arrow-left me-2"></i><?php echo app('translator')->get('dashboard.cancel'); ?></a>
    </div>

    <div class="col-lg-8">
        <form method="post" action="<?php echo e(route('admin.option-values.index')); ?>" class="mb-5">
            <?php echo csrf_field(); ?>
            <div class="mb-3">
                <label for="value" class="form-label"><?php echo app('translator')->get('dashboard.option_value'); ?></label>
                <input type="text" class="form-control <?php $__errorArgs = ['value'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="value"
                    name="value" required value="<?php echo e(old('value')); ?>" autofocus>
                <?php $__errorArgs = ['value'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <div class="invalid-feedback"><?php echo e($message); ?>

                    </div>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>

            <div class="mb-3">
                <label for="slug" class="form-label"><?php echo app('translator')->get('dashboard.slug'); ?></label>
                <input type="text" class="form-control <?php $__errorArgs = ['slug'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="slug" name="slug"
                    required value="<?php echo e(old('slug')); ?>">
                <?php $__errorArgs = ['slug'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <div class="invalid-feedback"><?php echo e($message); ?></div>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>

            <div class="mb-3">
                <label for="option" class="form-label"><?php echo app('translator')->get('dashboard.option'); ?></label>
                <select class="form-select <?php $__errorArgs = ['option_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="option_id" required>
                    <option value=""><?php echo app('translator')->get('dashboard.select_option'); ?></option>
                    <?php $__currentLoopData = $options; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $option): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($option->id); ?>" <?php echo e(old('option_id') == $option->id ? 'selected' : ''); ?>>
                            <?php
                                $optionName = Lang::has('options.options.' . $option->name)
                                    ? __('options.options.' . $option->name)
                                    : $option->name;
                            ?>

                            <?php echo e($optionName); ?>

                        </option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>

            <div class="mb-3">
                <label for="category" class="form-label"><?php echo app('translator')->get('dashboard.category'); ?></label>
                <select class="form-select" name="category_id">
                    <option value=""><?php echo app('translator')->get('dashboard.select_category'); ?></option>
                    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($category->id); ?>" <?php echo e(old('category_id') == $category->id ? 'selected' : ''); ?>>
                            <?php
                                $productName = Lang::has('designs.products.' . $category->product->name)
                                    ? __('designs.products.' . $category->product->name)
                                    : $category->product->name;

                                $categoryName = Lang::has('designs.categories.' . $category->name)
                                    ? __('designs.categories.' . $category->name)
                                    : $category->name;
                            ?>

                            <?php if($category->product->name === 'Banners'): ?>
                                <?php echo e($categoryName); ?>

                            <?php else: ?>
                                <?php if(app()->getLocale() === 'en'): ?>
                                    <?php echo e($categoryName . ' ' . $productName); ?>

                                <?php else: ?>
                                    <?php echo e($productName . ' ' . $categoryName); ?>

                                <?php endif; ?>
                            <?php endif; ?>
                        </option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
                <small class="fst-italic  text-secondary">
                    <?php echo app('translator')->get('dashboard.optional_category'); ?>
                </small>
            </div>

            <button type="submit" class="btn btn-primary">
                <?php echo app('translator')->get('dashboard.create_option_value'); ?>
            </button>
        </form>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
    <?php echo $__env->make('components.dashboard.option-value-script', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('dashboard.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\jesse\Herd\InspiraUMKM\resources\views/dashboard/option-values/create.blade.php ENDPATH**/ ?>