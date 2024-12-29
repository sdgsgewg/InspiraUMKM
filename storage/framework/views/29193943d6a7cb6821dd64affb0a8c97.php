
<div class="comment-section my-0">
    <div class="d-flex">
        <div class="align-items-start rounded-circle overflow-hidden" style="width: 50px; height: 50px;">
            <?php if($comment->user->image): ?>
                <img src="<?php echo e(secure_asset('storage/' . $comment->user->image)); ?>" alt="<?php echo e($comment->user->name); ?>"
                    style="width: 100%; height: 100%; object-fit: cover;">
            <?php else: ?>
                <img src="<?php echo e(secure_asset('img/' . $comment->user->gender . ' icon.png')); ?>" alt="<?php echo e($comment->user->name); ?>"
                    style="width: 100%; height: 100%; object-fit: cover;">
            <?php endif; ?>
        </div>
        <div class="col-11 d-flex flex-column ms-2">
            <div class="d-flex align-items-center m-0">
                
                <small class="me-2"><?php echo e('@' . $comment->user->username); ?></small>
                
                <small class="m-0"><?php echo e($comment->created_at->diffForHumans()); ?></small>
            </div>
            <div>
                <p class="m-0">
                    <?php echo e($comment->comment_text); ?>

                </p>
            </div>

            
            <div class="d-flex flex-row my-0 align-items-center">
                <div class="cursor-pointer">
                    <button class="btn custom-btn rounded-circle p-0 px-1 me-2">
                        <i class="bi bi-hand-thumbs-up"></i>
                    </button>
                </div>
                <div class="cursor-pointer">
                    <button class="btn custom-btn rounded-circle p-0 px-1">
                        <i class="bi bi-hand-thumbs-down"></i>
                    </button>
                </div>
                <div class="cursor-pointer">
                    <button onclick="showReplyForm(<?php echo e($comment->id); ?>)"
                        class="toggleButton btn custom-btn rounded-pill my-0"
                        data-id=<?php echo e($comment->id); ?>><?php echo app('translator')->get('designs.reply'); ?>
                    </button>
                </div>
            </div>

            <!-- Reply Form -->
            <form action="<?php echo e(route('replies.store')); ?>" method="POST" class="col-12">
                <?php echo csrf_field(); ?>
                <div class="replyForm col-12" style="display: none;" data-id=<?php echo e($comment->id); ?>>
                    <div class="col-12 mb-3">
                        <input type="hidden" name="comment_id" value="<?php echo e($comment->id); ?>">
                        <textarea name="reply" class="reply form-control" data-id=<?php echo e($comment->id); ?> placeholder="<?php echo app('translator')->get('designs.write_reply'); ?>"
                            rows="2" required oninput="handleReplyBtn(<?php echo e($comment->id); ?>)"></textarea>
                    </div>
                    <div class="col-12 justify-content-end gap-3">
                        <button class="cancel btn btn-secondary" data-id=<?php echo e($comment->id); ?> type="button"
                            onclick="hideReplyForm(<?php echo e($comment->id); ?>)"><?php echo app('translator')->get('designs.cancel'); ?></button>
                        <button type="submit" class="replyBtn btn btn-primary" data-id=<?php echo e($comment->id); ?>

                            disabled><?php echo app('translator')->get('designs.reply'); ?></button>
                    </div>
                </div>
            </form>

            <?php echo $__env->make('components.designs.comments.reply-section', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>

    </div>

</div>
<?php /**PATH C:\Users\jesse\Herd\InspiraUMKM\resources\views/components/designs/comments/comment-section.blade.php ENDPATH**/ ?>