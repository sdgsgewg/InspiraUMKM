<script>
    const choice = 'design';
</script>
<script src="<?php echo e(asset('js/dashboard/script.js')); ?>?v=<?php echo e(time()); ?>"></script>

<script>
    const routeGetCategoriesByProduct = '<?php echo e(route('admin.designs.getCategoriesByProduct', ':id')); ?>';
    const oldProductId = "<?php echo e(old('product_id', $design->product_id ?? '')); ?>";
    const oldCategoryId = "<?php echo e(old('category_id', $design->category_id ?? '')); ?>";
</script>
<script src="<?php echo e(asset('js/designs/loadCategory.js')); ?>?v=<?php echo e(time()); ?>"></script>
<?php /**PATH C:\Users\jesse\Herd\InspiraUMKM\resources\views/components/dashboard/design-script.blade.php ENDPATH**/ ?>