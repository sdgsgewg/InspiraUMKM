

<?php $__env->startSection('container'); ?>

    <style>
        .chat-card {
            transition: background-color 0.2s;
        }

        .chat-card:hover {
            cursor: pointer;
            background-color: #ebebeb;
        }

        .chat-card .profile-img {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            object-fit: cover;
        }
    </style>

    <div class="row justify-content-center mt-5">
        <div class="col-11">
            <h1 class="pb-2 border-bottom"><?php echo e($title); ?></h1>
        </div>
    </div>

    <div class="row justify-content-center mt-2">
        <div class="col-11">

            <?php if($chats->count() > 0): ?>
                <?php $__currentLoopData = $chats; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $chat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    
                    <?php
                        $recipient = auth()->id() === $chat->seller_id ? $chat->buyer : $chat->seller;
                    ?>

                    <div class="card chat-card d-flex flex-row justify-content-between p-3 mb-3" style="height: 120px;"
                        onclick="event.stopPropagation(); window.location.href='<?php echo e(route('chats.show', ['chats' => $chat->id])); ?>'">

                        
                        <div class="col-2 col-lg-1 overflow-hidden" style="height:100%;">
                            <?php if($recipient->image): ?>
                                <img src="<?php echo e(asset('storage/' . $recipient->image)); ?>" alt="<?php echo e($recipient->name); ?>"
                                    class="rounded-circle profile-img">
                            <?php else: ?>
                                <img src="<?php echo e(asset('img/' . $recipient->gender . ' icon.png')); ?>"
                                    alt="<?php echo e($recipient->name); ?>" class="rounded-circle profile-img">
                            <?php endif; ?>
                        </div>

                        
                        <div class="col-10 col-lg-11 d-flex flex-column">
                            
                            <div class="d-flex justify-content-between">
                                <h5 class="fw-bold"><?php echo e($recipient->name); ?></h5>
                                <p>
                                    <?php echo e($chat->messages->last() ? $chat->messages->last()->created_at->diffForHumans() : 'No messages'); ?>

                                </p>
                            </div>
                            
                            <div>
                                <?php
                                    $latestMessage = $chat->messages->last();
                                ?>
                                <p class="text-start"><?php echo e($latestMessage ? $latestMessage->message_text : 'No messages'); ?>

                                </p>
                            </div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php else: ?>
                <p class="text-center">No chats yet</p>
            <?php endif; ?>

        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\jesse\Herd\InspiraUMKM\resources\views/chats/chat-list.blade.php ENDPATH**/ ?>