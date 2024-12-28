<div class="d-flex flex-column">
    <label for="shippingMethod" class="form-label">Shipping Method:</label>

    <select class="form-select" <?php $__errorArgs = ['shipping_method_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="shipping_method_id"
        id="shippingMethod" required>
        <option value="">Select a shipping method</option>
        <?php $__currentLoopData = $shippingMethods; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sm): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <option value="<?php echo e($sm->id); ?> <?php echo e(old('shipping_method_id' == $sm->id) ? 'selected' : ''); ?>">
                <p><?php echo e($sm->name); ?></p>
                <small><?php echo e(' (' . $sm->description . ')'); ?></small>
            </option>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </select>
    <?php $__errorArgs = ['shipping_method_id'];
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
<?php /**PATH C:\Users\jesse\Herd\InspiraUMKM\resources\views/checkout/shipping-method.blade.php ENDPATH**/ ?>