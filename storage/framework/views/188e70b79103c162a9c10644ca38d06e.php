<?php
    $replyAmount = $comment->replies->count();
?>
<?php if($replyAmount > 0): ?>
    
    <div>
        <button class="toggleReplyBtn btn btn-dark rounded-pill text-primary-emphasis d-inline-flex gap-1"
            data-id="<?php echo e($comment->id); ?>" data-reply-amount="<?php echo e($replyAmount); ?>"
            onclick="toggleReply(<?php echo e($comment->id); ?>)">
            <i class="bi bi-caret-down"></i> <?php echo e($replyAmount); ?>

            <?php echo e($replyAmount > 1 ? __('designs.replies') : __('designs.reply')); ?>

        </button>
    </div>
    <?php $__currentLoopData = $comment->replies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $reply): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="mt-1">
            
            <div class="reply-section my-0" data-id=<?php echo e($comment->id); ?> style="display: none;">
                <div class="d-flex">
                    <div class="align-items-start rounded-circle overflow-hidden" style="width: 40px; height: 40px;">
                        <?php if($reply->user->image): ?>
                            <img src="<?php echo e(secure_asset('storage/' . $reply->user->image)); ?>" alt="<?php echo e($reply->user->name); ?>"
                                style="width: 100%; height: 100%; object-fit: cover;">
                        <?php else: ?>
                            <img src="<?php echo e(secure_asset('img/' . $reply->user->gender . ' icon.png')); ?>"
                                alt="<?php echo e($reply->user->name); ?>" style="width: 100%; height: 100%; object-fit: cover;">
                        <?php endif; ?>
                    </div>
                    <div class="col-11 d-flex flex-column ms-2">
                        <div class="d-flex align-items-center">
                            <a href="<?php echo e(route('books.seller', ['seller' => $reply->user->username])); ?>"
                                class="text-decoration-none color-inherit m-0 me-2">
                                <small class="m-0"><?php echo e('@' . $reply->user->username); ?></small>
                            </a>
                            <small><?php echo e($reply->created_at->diffForHumans()); ?></small>
                        </div>
                        <div class="d-flex">
                            <?php if($reply->parent_id != null): ?>
                                <a href="<?php echo e(route('books.seller', ['seller' => $reply->parentReply->user->username])); ?>"
                                    class="text-decoration-none m-0 me-1"><?php echo e('@' . $reply->parentReply->user->username); ?>

                                </a>
                                <p class="m-0 ms-1">
                                    <?php echo e($reply->reply_text); ?>

                                </p>
                            <?php else: ?>
                                <p class="m-0">
                                    <?php echo e($reply->reply_text); ?>

                                </p>
                            <?php endif; ?>

                        </div>

                        
                        <div class="d-flex flex-row my-0 align-items-center">
                            <div class="cursor-pointer">
                                <button class="btn btn-dark rounded-circle p-0 px-1 me-2">
                                    <i class="bi bi-hand-thumbs-up"></i>
                                </button>
                            </div>
                            <div class="cursor-pointer">
                                <button class="btn btn-dark rounded-circle p-0 px-1">
                                    <i class="bi bi-hand-thumbs-down"></i>
                                </button>
                            </div>
                            
                            <div class="cursor-pointer">
                                <button onclick="showReplyToReplyForm(<?php echo e($reply->id); ?>)"
                                    class="toggleButton btn btn-dark rounded-pill my-0"
                                    data-id=<?php echo e($reply->id); ?>><?php echo app('translator')->get('designs.reply'); ?>
                                </button>
                            </div>
                        </div>

                        
                        <form action="<?php echo e(route('replies.store')); ?>" method="POST">
                            <?php echo csrf_field(); ?>
                            <div class="replyToReplyForm col-12" style="display: none;" data-id=<?php echo e($reply->id); ?>>
                                <div class="mb-3">
                                    <input type="hidden" name="comment_id" value="<?php echo e($comment->id); ?>">
                                    <input type="hidden" name="reply_id" value="<?php echo e($reply->id); ?>">
                                    <textarea name="reply" class="replyToReply form-control" data-id=<?php echo e($reply->id); ?> placeholder="<?php echo app('translator')->get('designs.write_reply'); ?>"
                                        rows="1" required oninput="handleReplyToReplyBtn(<?php echo e($reply->id); ?>)"></textarea>
                                </div>
                                <div class="justify-content-end gap-3">
                                    <button class="cancel btn btn-secondary" data-id=<?php echo e($reply->id); ?> type="button"
                                        onclick="hideReplyToReplyForm(<?php echo e($reply->id); ?>)"><?php echo app('translator')->get('designs.cancel'); ?></button>
                                    <button type="submit" class="replyToReplyBtn btn btn-primary"
                                        data-id=<?php echo e($reply->id); ?> disabled><?php echo app('translator')->get('designs.reply'); ?></button>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>

            </div>

        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endif; ?>
<?php /**PATH C:\Users\jesse\Herd\InspiraUMKM\resources\views/components/designs/comments/reply-section.blade.php ENDPATH**/ ?>