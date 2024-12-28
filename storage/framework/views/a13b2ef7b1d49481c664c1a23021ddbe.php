<script src="<?php echo e(asset('js/designs/card-slider.js')); ?>?v=<?php echo e(time()); ?>"></script>

<script src="<?php echo e(asset('js/designs/seeMore.js')); ?>?v=<?php echo e(time()); ?>"></script>

<script>
    var oldProductSlug = "<?php echo e(old('product', request()->product)); ?>";
    var oldCategorySlugs = <?php echo json_encode(old('category', request()->category ?? []), 512) ?>;
    var routeGetCategoriesByProduct = '<?php echo e(route('designFilter.getCategoriesByProduct', ':slug')); ?>';
</script>
<script src="<?php echo e(asset('js/designs/filter.js')); ?>?v=<?php echo e(time()); ?>"></script>

<script src="<?php echo e(asset('js/designs/comment.js')); ?>?v=<?php echo e(time()); ?>"></script>
<script src="<?php echo e(asset('js/designs/reply.js')); ?>?v=<?php echo e(time()); ?>"></script>
<?php /**PATH C:\Users\jesse\Herd\InspiraUMKM\resources\views/components/designs/design-script.blade.php ENDPATH**/ ?>