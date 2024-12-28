<?php $__currentLoopData = $checkoutItems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sellerId => $sellerGroup): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="seller-section">
        <?php $__currentLoopData = $sellerGroup['items']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $design): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php $__currentLoopData = $design->product->options; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $option): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="mb-2">
                    <label for="option_value<?php echo e($option->id); ?>" class="form-label">
                        <?php
                            $productName = Lang::has('designs.products.' . $design->product->name)
                                ? __('designs.products.' . $design->product->name)
                                : $design->product->name;

                            $optionName = Lang::has('options.options.' . $option->name)
                                ? __('options.options.' . $option->name)
                                : $option->name;
                        ?>

                        <?php if(app()->getLocale() === 'en'): ?>
                            <?php echo e($productName . ' ' . $optionName . ' (' . $design->title . ') :'); ?>

                        <?php else: ?>
                            <?php echo e($optionName . ' ' . $productName . ' (' . $design->title . ') :'); ?>

                        <?php endif; ?>
                    </label>

                    <select
                        class="form-select <?php $__errorArgs = ['option_value_id.' . $design->id . '.' . $option->id];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                        name="option_value_id[<?php echo e($design->id); ?>][<?php echo e($option->id); ?>]"
                        id="option_value<?php echo e($option->id); ?>" required>
                        <option value=""><?php echo app('translator')->get('checkout.select_option_value'); ?></option>
                        <?php $__currentLoopData = $design->product->name === 'Packaging' ? $option->values : $design->category->optionValues; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($value->id); ?>"
                                <?php echo e(old('option_value_id.' . $design->id . '.' . $option->id) == $value->id ? 'selected' : ''); ?>>
                                <?php
                                    $valueName = Lang::has('options.values.' . $value->value) ? __('options.values.' . $value->value) : $value->value;
                                ?>
                                <?php echo e($valueName); ?>

                            </option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                    <?php $__errorArgs = ['option_value_id.' . $design->id . '.' . $option->id];
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
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php /**PATH C:\Users\jesse\Herd\InspiraUMKM\resources\views/components/checkout/design-option.blade.php ENDPATH**/ ?>