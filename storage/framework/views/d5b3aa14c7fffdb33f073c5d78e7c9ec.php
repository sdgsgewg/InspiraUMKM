<div class="modal fade" id="deleteModal-<?php echo e($item->id); ?>" tabindex="-1"
    aria-labelledby="deleteModalLabel-<?php echo e($item->id); ?>" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="deleteModalLabel-<?php echo e($item->id); ?>">
                    <?php echo app('translator')->get('dashboard.confirm_deletion'); ?></h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <?php
                    $resourceName = $resourceType == 'design' ? $item->title : $item->name;
                ?>
                <?php echo e(__('dashboard.delete_confirmation') . ' ' . $resourceType . ' "' . $resourceName . '" ?'); ?>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><?php echo app('translator')->get('dashboard.cancel'); ?></button>
                <form action="<?php echo e(route('admin.' . $resourceUrl . '.destroy', [$resourceType => $item->slug])); ?>"
                    method="POST" class="d-inline">
                    <?php echo method_field('DELETE'); ?>
                    <?php echo csrf_field(); ?>
                    <button type="submit" class="btn btn-primary"><?php echo app('translator')->get('dashboard.delete'); ?></button>
                </form>
            </div>
        </div>
    </div>
</div>
<?php /**PATH C:\Users\jesse\Herd\InspiraUMKM\resources\views/components/modals/dashboard/delete-modal.blade.php ENDPATH**/ ?>