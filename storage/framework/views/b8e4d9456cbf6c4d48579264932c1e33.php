

<?php $__env->startSection('container'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('css/designs/style.css')); ?>?v=<?php echo e(time()); ?>">

    <div class="row justify-content-center mt-4">
        <div class="col-11">
            <div class="d-flex flex-row" style="height: 100px;">
                <div class="col-4 d-flex flex-row" style="height: 100%;">
                    <div class="align-items-start img-thumbnail rounded-circle overflow-hidden"
                        style="width: 100px; height: 100px;">
                        <?php if($seller->image): ?>
                            <img src="<?php echo e(asset('storage/' . $seller->image)); ?>" alt="<?php echo e($seller->name); ?>"
                                class="rounded-circle">
                        <?php else: ?>
                            <img src="<?php echo e(asset('img/' . $seller->gender . ' icon.png')); ?>" alt="<?php echo e($seller->name); ?>"
                                class="rounded-circle">
                        <?php endif; ?>
                    </div>
                    <div class="d-flex flex-column ms-3">
                        <h4><?php echo e($seller->name); ?></h4>

                        <?php if($seller->id !== auth()->user()->id): ?>
                            <a href="<?php echo e(route('chats.show', ['chats' => $chat->id])); ?>"
                                class="d-inline-flex btn btn-primary px-2 py-1 mt-auto">
                                <i class="bi bi-chat-dots me-2"></i> Chat
                            </a>
                        <?php endif; ?>

                    </div>
                </div>
                <div class="col-7 d-flex flex-column gap-1 ms-2">
                    <div class="d-inline-flex">
                        <i class="bi bi-palette me-2"></i> Designs: <?php echo e($seller->designs->count()); ?>

                    </div>
                    <div class="d-inline-flex">
                        <i class="bi bi-calendar me-2"></i> Date Joined: <?php echo e(date_format($seller->created_at, 'j F Y')); ?>

                    </div>
                    <?php if($avgSellerRating > 0.0): ?>
                        <div class="d-inline-flex">
                            <i class="bi bi-star me-2"></i> Rating: <span class="badge bg-warning text-dark shadow-sm ms-2"
                                style="font-size: 0.9rem; font-weight: bold;">
                                <?php echo e($avgSellerRating); ?>

                            </span>
                        </div>
                    <?php endif; ?>

                </div>
            </div>
        </div>
    </div>
    <div class="row justify-content-center mt-5">
        <div class="col-11">
            <?php if($designs->count() > 0): ?>
                <div class="row d-flex flex-wrap align-items-stretch">
                    <?php $__currentLoopData = $designs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $design): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-12 col-md-6 col-lg-4 col-xl-3 mb-4">
                            <?php echo $__env->make('components.designs.card', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
                <div class="d-flex align-items-center justify-content-center mt-5">
                    <?php echo e($designs->links()); ?>

                </div>
            <?php else: ?>
                <?php echo $__env->make('components.designs.noDesign', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php endif; ?>

        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\jesse\Herd\InspiraUMKM\resources\views/designs/seller.blade.php ENDPATH**/ ?>