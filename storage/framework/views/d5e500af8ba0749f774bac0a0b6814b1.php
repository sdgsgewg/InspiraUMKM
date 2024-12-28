<script>
    const qtyURL = "<?php echo e(route('carts.updateQuantity')); ?>";
    const checkURL = "<?php echo e(route('carts.updateIsChecked')); ?>";
</script>

<script src="<?php echo e(asset('js/cart/quantity.js')); ?>?v=<?php echo e(time()); ?>"></script>
<script src="<?php echo e(asset('js/cart/isChecked.js')); ?>?v=<?php echo e(time()); ?>"></script>
<script src="<?php echo e(asset('js/cart/checkoutButton.js')); ?>?v=<?php echo e(time()); ?>"></script>
<script src="<?php echo e(asset('js/cleanModalBackdrop.js')); ?>?v=<?php echo e(time()); ?>"></script>
<?php /**PATH C:\Users\jesse\Herd\InspiraUMKM\resources\views/components/cart/cart-script.blade.php ENDPATH**/ ?>