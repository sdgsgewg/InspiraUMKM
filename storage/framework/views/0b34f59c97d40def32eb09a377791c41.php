<?php $__env->startSection('container'); ?>
    <div class="row d-flex justify-content-center mt-5">
        <div class="col-10 col-sm-8 col-lg-5">

            <?php if(session()->has('success')): ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <?php echo e(session('success')); ?>

                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php endif; ?>

            <?php if(session()->has('loginError')): ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <?php echo e(session('loginError')); ?>

                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php endif; ?>

            <div class="form-signin">
                <h1 class="mb-5 fw-bold text-center"><?php echo app('translator')->get('login.title'); ?></h1>
                <form action="<?php echo e(route('login')); ?>" method="POST">
                    <?php echo csrf_field(); ?>

                    <div class="form-floating">
                        <input type="email" name="email" class="form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                            id="email" placeholder="name@example.com" autofocus required value="<?php echo e(old('email')); ?>">
                        <label for="email"><?php echo app('translator')->get('login.email'); ?></label>
                        <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <div class="invalid-feedback">
                                <?php echo e($message); ?>

                            </div>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>

                    <div class="form-floating">
                        <input type="password" name="password" class="form-control" id="password" placeholder="Password"
                            required>
                        <label for="password"><?php echo app('translator')->get('login.password'); ?></label>
                    </div>

                    <button class="btn btn-primary w-100 py-2" type="submit"><?php echo app('translator')->get('login.login'); ?></button>
                </form>

                <small class="d-block text-center mt-3">
                    <?php echo app('translator')->get('login.dont_have_account'); ?>
                    <a href="/register">
                        <?php echo app('translator')->get('login.register'); ?>
                    </a>
                </small>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\jesse\Herd\InspiraUMKM\resources\views/login/index.blade.php ENDPATH**/ ?>