<div class="modal fade" id="sendFeedbackModal-<?php echo e($design->id); ?>" tabindex="-1"
    aria-labelledby="sendFeedbackModalLabel-<?php echo e($design->id); ?>" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="sendFeedbackModalLabel-<?php echo e($design->id); ?>">
                    <?php echo app('translator')->get('feedback.send_feedback_form'); ?>
                </h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <!-- Form for sending feedback -->
            <form action="<?php echo e(route('sendFeedback')); ?>" method="POST">
                <?php echo csrf_field(); ?>

                <div class="modal-body">
                    <div class="col-12 mb-3 d-flex flex-row">
                        <div class="img-wrapper col-2 col-lg-2">
                            <?php if($design->image): ?>
                                <img src="<?php echo e(asset('storage/' . $design->image)); ?>" alt="...">
                            <?php else: ?>
                                <img src="<?php echo e(asset('img/' . $design->product->name) . '.jpg'); ?>" alt="...">
                            <?php endif; ?>
                        </div>
                        <div class="card-info col-10 col-lg-10 ps-3">
                            <div>
                                <p class="fw-bold"><?php echo e($design->title); ?></p>
                            </div>
                        </div>
                    </div>

                    <input type="hidden" name="design_id" value="<?php echo e($design->id); ?>">

                    <div class="mb-3">
                        <label for="rating-<?php echo e($design->id); ?>"
                            class="form-label"><?php echo e(__('feedback.rate') . ':'); ?></label>
                        <select class="form-select" id="rating-<?php echo e($design->id); ?>" name="rating" required>
                            <option value="" disabled selected><?php echo app('translator')->get('feedback.select_rating'); ?></option>
                            <option value="1">1 - <?php echo app('translator')->get('feedback.very_bad'); ?></option>
                            <option value="2">2 - <?php echo app('translator')->get('feedback.bad'); ?></option>
                            <option value="3">3 - <?php echo app('translator')->get('feedback.average'); ?></option>
                            <option value="4">4 - <?php echo app('translator')->get('feedback.good'); ?></option>
                            <option value="5">5 - <?php echo app('translator')->get('feedback.very_good'); ?></option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="feedback-<?php echo e($design->id); ?>"
                            class="form-label"><?php echo e(__('feedback.feedback') . ': '); ?></label>
                        <textarea class="form-control" id="feedback-<?php echo e($design->id); ?>" name="feedback" rows="3"
                            placeholder="<?php echo e(__('feedback.optional_feedback')); ?>"></textarea>

                    </div>
                </div>

                <!-- Submit button -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><?php echo app('translator')->get('feedback.cancel'); ?></button>
                    <button type="submit" class="btn btn-primary"><?php echo app('translator')->get('feedback.send_feedback'); ?></button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php /**PATH C:\Users\jesse\Herd\InspiraUMKM\resources\views/components/modals/sendFeedbackModal.blade.php ENDPATH**/ ?>