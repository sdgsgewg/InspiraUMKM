<div class="modal fade" id="maxQtyModal-<?php echo e($design->id); ?>" tabindex="-1"
    aria-labelledby="maxQtyModalLabel-<?php echo e($design->id); ?>" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="maxQtyModalLabel-<?php echo e($design->id); ?>">
                    Quantity Limit Reached
                </h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                You have reached the maximum allowed quantity for "<?php echo e($design->title); ?>"
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-bs-dismiss="modal">OK</button>
            </div>
        </div>
    </div>
</div><?php /**PATH C:\Users\jesse\Herd\InspiraUMKM\resources\views/components/modals/cart/maxQtyModal.blade.php ENDPATH**/ ?>