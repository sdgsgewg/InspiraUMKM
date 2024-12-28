<div class="mt-0">
    <hr>
    <h2 class="mb-3"><?php echo app('translator')->get('designs.discussions'); ?></h2>

    <!-- Comment Form -->
    <form action="<?php echo e(route('comments.store')); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <div class="mb-3">
            <input type="hidden" name="design_id" value="<?php echo e($design->id); ?>">
            <textarea name="comment" id="comment" class="form-control" placeholder="<?php echo app('translator')->get('designs.write_comment'); ?>" rows="3" required
                oninput="handlePostBtn()" onclick="toggleCommentButtonVisibility()"></textarea>
        </div>
        <!-- Button Container -->
        <div id="commentBtnContainer" class="justify-content-end gap-3" style="display: none;">
            <button id="cancel" type="button" class="btn btn-secondary"
                onclick="hideCommentButtonContainer()"><?php echo app('translator')->get('designs.cancel'); ?></button>
            <button id="post" type="submit" class="btn btn-primary" disabled><?php echo app('translator')->get('designs.post'); ?></button>
        </div>
    </form>

    <hr>

    <?php if($comments->count() > 0): ?>
        <!-- Existing Comments -->
        <div class="comments-list">
            <?php $__currentLoopData = $comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="mb-3">
                    <?php echo $__env->make('components.designs.comments.comment-section', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
        <hr>
    <?php endif; ?>
</div>
<?php /**PATH C:\Users\jesse\Herd\InspiraUMKM\resources\views/components/designs/comments/design-comment-section.blade.php ENDPATH**/ ?>