

<?php $__env->startSection('container'); ?>
    <div class="row justify-content-center mt-5 mb-4">
        <div class="col-11 col-md-8 col-lg-7 d-flex justify-content-between pb-2 border-bottom">
            <h1><?php echo e($title); ?></h1>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-11 col-lg-12 d-flex flex-column align-items-center">

            <?php if(session()->has('success')): ?>
                <div class="alert alert-success alert-dismissible fade show col-lg-6" role="alert">
                    <?php echo e(session('success')); ?>

                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php endif; ?>

            <div class="img-thumbnail rounded-circle overflow-hidden mb-4" style="width: 200px; height: 200px;">
                <?php if($user->image): ?>
                    <img src="<?php echo e(asset('storage/' . $user->image)); ?>" alt="<?php echo e($user->name); ?>" class="rounded-circle">
                <?php else: ?>
                    <img src="<?php echo e(asset('img/' . $user->gender . ' icon.png')); ?>" alt="<?php echo e($user->name); ?>"
                        class="rounded-circle">
                <?php endif; ?>
            </div>

            <div class="col-12 col-md-6 mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" value="<?php echo e($user->name); ?>" readonly>
            </div>

            <div class="col-12 col-md-6 mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control" value="<?php echo e($user->username); ?>" readonly>
            </div>

            <div class="col-12 col-md-6 mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="text" class="form-control" value="<?php echo e($user->email); ?>" readonly>
            </div>

            <div class="col-12 col-md-6 mb-3">
                <label for="dob" class="form-label">Birth Date</label>
                <input type="text" class="form-control" value="<?php echo e(\Carbon\Carbon::parse($user->dob)->format('j F Y')); ?>"
                    readonly>
            </div>

            <div class="col-12 col-md-6 mb-3">
                <label for="gender" class="form-label">Gender</label>
                <input type="text" class="form-control" value="<?php echo e($user->gender); ?>" readonly>
            </div>

            <div class="col-12 col-md-6 mb-3">
                <label for="address" class="form-label">Address</label>
                <input type="text" class="form-control" value="<?php echo e($user->address); ?>" readonly>
            </div>

            <div class="col-12 col-md-6 mb-3">
                <label for="phoneNumber" class="form-label">Phone Number</label>
                <input type="text" class="form-control" value="<?php echo e($user->phoneNumber); ?>" readonly>
            </div>

            <a class="btn btn-primary mt-4 text-decoration-none text-white"
                href="<?php echo e(route('users.edit', ['user' => $user->username])); ?>">
                Update Profile
            </a>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\jesse\Herd\InspiraUMKM\resources\views/users/profile.blade.php ENDPATH**/ ?>