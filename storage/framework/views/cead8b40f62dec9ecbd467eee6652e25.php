

<?php $__env->startSection('css'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('css/chat/style.css')); ?>?v=<?php echo e(time()); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('container'); ?>
    <div class="row justify-content-center mt-5">
        <div class="col-11 col-lg-8">
            <div class="chat-box">
                <div class="d-flex flex-row align-items-center mb-3">
                    <div class="col-1">
                        <a href="<?php echo e(route('chats.index')); ?>" class="color-inherit">
                            <i class="bi bi-arrow-left fs-3"></i>
                        </a>
                    </div>
                    <div class="col-1 overflow-hidden" style="width: 50px; height:50px;">
                        <img src="<?php echo e($recipient->image ? asset('storage/' . $recipient->image) : asset('img/' . $recipient->gender . ' icon.png')); ?>"
                            alt="<?php echo e($recipient->name); ?>" class="rounded-circle">
                    </div>
                    <div class="col-10 ps-3">
                        <h3 class="fw-bold m-0"><?php echo e($recipient->name); ?></h3>
                    </div>
                </div>

                <div class="chat-content" id="chat-messages">
                    <?php $__empty_1 = true; $__currentLoopData = $chat->messages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <p class="text-center text-muted">No messages yet. Be the first to send a message!</p>
                    <?php endif; ?>
                </div>

                
                <form id="chat-form" method="POST" action="<?php echo e(route('chats.store')); ?>" class="chat-form">
                    <?php echo csrf_field(); ?>
                    <input type="hidden" name="chat" id="chat" value="<?php echo e($chat->id); ?>">
                    <div class="input-group">
                        <input type="text" name="message" class="form-control" placeholder="Type a message..." required>
                        <button type="submit" class="btn btn-primary send-btn">Send</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script>
        const chatId = <?php echo json_encode($chat->id, 15, 512) ?>;
        const userId = <?php echo json_encode(auth()->user()->id, 15, 512) ?>;
        const chatStoreUrl = "<?php echo e(route('chats.store')); ?>";
    </script>
    <script src="<?php echo e(asset('js/chat.js')); ?>?v=<?php echo e(time()); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\jesse\Herd\InspiraUMKM\resources\views/chats/chat.blade.php ENDPATH**/ ?>