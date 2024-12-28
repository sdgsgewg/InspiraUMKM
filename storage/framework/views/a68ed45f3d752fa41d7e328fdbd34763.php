

<?php $__env->startSection('container'); ?>
    <div class="row d-flex justify-content-center align-items-center vh-100">
        <div class="position-relative col-md-12 d-flex justify-content-center align-items-center">
            <div class="position-absolute pe-5" style="left: -100px;">
                <div class="rounded-circle" style="border: 15px solid rgb(180, 173, 173);">
                    <div class="rounded-circle overflow-hidden"
                        style="border: 15px solid rgb(203, 193, 193); max-width: 680px; height: 680px;">
                        <img src="<?php echo e(asset('img/about.png')); ?>" alt=""
                            style="width: 100%; height:100%; object-fit:cover;">
                    </div>
                </div>
            </div>
            <div class="col-md-6 pe-5 position-absolute" style="right: 0; text-align: justify; text-justify: inter-word;">
                <h1 class="fw-bold"><?php echo e($title); ?></h1>
                <p class="my-5" style="line-height: 35px">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Excepturi ab deleniti fugit praesentium eos
                    nisi adipisci blanditiis nihil porro minus velit nemo reprehenderit, iure cupiditate impedit, aperiam
                    natus obcaecati totam laborum mollitia saepe commodi aliquid ipsa esse? Iusto minima labore quod ad?
                    Corrupti a rem iusto ipsum laboriosam nisi doloribus corporis labore quos non deleniti harum soluta quas
                    sequi debitis atque, officiis animi praesentium inventore in deserunt, esse earum maiores assumenda.
                    Commodi non magni quaerat fuga beatae molestiae. Quasi ullam doloremque dignissimos, omnis cum
                    accusantium, id maiores dolor similique mollitia at impedit consequuntur quo illum doloribus, dicta sunt
                    blanditiis quidem!
                </p>
                <a class="btn btn-success rounded-4 fw-bold px-3 py-2 text-decoration-none <?php echo e(Request::is('/') ? 'active' : ''); ?>"
                    href="/">Let's get started</a>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\jesse\Herd\InspiraUMKM\resources\views/about.blade.php ENDPATH**/ ?>