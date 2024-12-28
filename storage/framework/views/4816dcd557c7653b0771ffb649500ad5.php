<div class="modal fade" id="removeModal-<?php echo e($design->id); ?>" tabindex="-1"
    aria-labelledby="removeModalLabel-<?php echo e($design->id); ?>" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="removeModalLabel-<?php echo e($design->id); ?>">
                    Confirm Removal
                </h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Are you sure you want to remove design "<?php echo e($design->title); ?>" from the
                cart?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <form action="<?php echo e(route('carts.destroy', ['cart' => $cart->id])); ?>" method="POST" class="d-inline">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('DELETE'); ?>
                    <input type="hidden" name="design_id" value="<?php echo e($design->id); ?>">
                    <button type="submit" class="btn btn-primary">Remove</button>
                </form>
            </div>
        </div>
    </div>
</div>
<?php /**PATH C:\Users\jesse\Herd\InspiraUMKM\resources\views/components/modals/cart/removeModal.blade.php ENDPATH**/ ?>