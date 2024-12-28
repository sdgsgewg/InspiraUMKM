<!-- Filter Button -->
<div>
    <button type="button" class="btn btn-primary d-flex align-items-center justify-content-center" data-bs-toggle="modal"
        data-bs-target="#filterModal">
        <i class="bi bi-funnel"></i>
    </button>
</div>

<!-- Modal -->
<div class="modal fade" id="filterModal" tabindex="-1" aria-labelledby="filterModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="filterModalLabel"><?php echo app('translator')->get('filter.title'); ?></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="GET" action="<?php echo e(route('designs.filter')); ?>">
                    <?php echo csrf_field(); ?>

                    <!-- Include existing query parameters as hidden fields -->
                    <?php $__currentLoopData = request()->except(['product', 'category', 'min_price', 'max_price', 'rating', 'seller', '_token']); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if(is_array($value)): ?>
                            <?php $__currentLoopData = $value; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subValue): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <input type="hidden" name="<?php echo e($key); ?>[]" value="<?php echo e($subValue); ?>">
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php else: ?>
                            <input type="hidden" name="<?php echo e($key); ?>" value="<?php echo e($value); ?>">
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    
                    <div class="mb-3">
                        <label for="product" class="form-label"><?php echo app('translator')->get('filter.product'); ?></label>
                        <select id="product" class="form-select <?php $__errorArgs = ['product'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                            name="product">
                            <option value=""><?php echo app('translator')->get('filter.select_product'); ?></option>
                            <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($product->slug); ?>"
                                    <?php echo e(old('product', request()->product) == $product->slug ? 'selected' : ''); ?>>
                                    <?php
                                        $productName = Lang::has('designs.products.' . $product->name)
                                            ? __('designs.products.' . $product->name)
                                            : $product->name;
                                    ?>

                                    <?php echo e($productName); ?>

                                </option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>

                        <?php $__errorArgs = ['product'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <div class="invalid-feedback"><?php echo e($message); ?></div>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>

                    
                    <div class="mb-3">
                        <label for="category" class="form-label"><?php echo app('translator')->get('filter.category'); ?></label>
                        <ul id="category" class="list-group <?php $__errorArgs = ['category'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                        </ul>
                        <?php $__errorArgs = ['category'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <div class="invalid-feedback">
                                <?php echo app('translator')->get('filter.category-error-msg'); ?>
                            </div>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>

                    
                    <div class="col-12 d-column mb-3">
                        <label for="price-range" class="mb-2"><?php echo app('translator')->get('filter.price-range'); ?></label>
                        <div class="d-flex justify-content-between align-items-center" id="price-range">
                            <div>
                                <input type="number" id="min_price" name="min_price"
                                    class="form-control <?php $__errorArgs = ['min_price'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                    value="<?php echo e(old('min_price', request()->min_price)); ?>"
                                    placeholder="<?php echo app('translator')->get('filter.enter_min_price'); ?>">
                                <?php $__errorArgs = ['min_price'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div class="invalid-feedback"><?php echo e($message); ?></div>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                            <div>
                                -
                            </div>
                            <div>
                                <input type="number" id="max_price" name="max_price"
                                    class="form-control <?php $__errorArgs = ['max_price'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                    value="<?php echo e(old('max_price', request()->max_price)); ?>"
                                    placeholder="<?php echo app('translator')->get('filter.enter_max_price'); ?>">
                                <?php $__errorArgs = ['max_price'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div class="invalid-feedback"><?php echo e($message); ?></div>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                        </div>
                    </div>

                    
                    <div class="mb-3">
                        <label for="rating" class="form-label"><?php echo app('translator')->get('filter.rating'); ?></label>
                        <select id="rating" class="form-select <?php $__errorArgs = ['rating'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="rating">
                            <option value=""><?php echo app('translator')->get('filter.select_rating'); ?></option>
                            <option value="5" <?php echo e(old('rating', request()->rating) == '5' ? 'selected' : ''); ?>>
                                5 <?php echo e(__('filter.stars')); ?>

                            </option>
                            <option value="4" <?php echo e(old('rating', request()->rating) == '4' ? 'selected' : ''); ?>>
                                4 <?php echo e(__('filter.stars') . ' ' . __('filter.or_more')); ?>

                            </option>
                            <option value="3" <?php echo e(old('rating', request()->rating) == '3' ? 'selected' : ''); ?>>
                                3 <?php echo e(__('filter.stars') . ' ' . __('filter.or_more')); ?>

                            </option>
                            <option value="2" <?php echo e(old('rating', request()->rating) == '2' ? 'selected' : ''); ?>>
                                2 <?php echo e(__('filter.stars') . ' ' . __('filter.or_more')); ?>

                            </option>
                            <option value="1" <?php echo e(old('rating', request()->rating) == '1' ? 'selected' : ''); ?>>
                                1 <?php echo e(__('filter.stars') . ' ' . __('filter.or_more')); ?>

                            </option>
                        </select>
                        <?php $__errorArgs = ['rating'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <div class="invalid-feedback"><?php echo e($message); ?></div>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>

                    
                    <div class="mb-3">
                        <label for="seller" class="form-label"><?php echo app('translator')->get('filter.seller'); ?></label>
                        <select id="seller" class="form-select <?php $__errorArgs = ['seller'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="seller">
                            <option value=""><?php echo app('translator')->get('filter.select_seller'); ?></option>
                            <?php $__currentLoopData = $sellers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $seller): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($seller->username); ?>"
                                    <?php echo e(old('seller', request()->seller) == $seller->username ? 'selected' : ''); ?>>
                                    <?php echo e($seller->name); ?>

                                </option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                        <?php $__errorArgs = ['seller'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <div class="invalid-feedback"><?php echo e($message); ?></div>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>

                    <div class="d-flex flex-row-reverse gap-3">
                        <button type="submit" class="btn btn-primary"><?php echo app('translator')->get('filter.apply'); ?></button>
                        <a href="<?php echo e(route('designs.index')); ?>" class="btn btn-secondary"><?php echo app('translator')->get('filter.reset'); ?></a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    var categories = <?php echo json_encode(__('designs.categories'), 15, 512) ?>;
    var lang = {
        categoryErrorMsg: "<?php echo e(__('filter.category-error-msg')); ?>"
    };
</script>
<?php /**PATH C:\Users\jesse\Herd\InspiraUMKM\resources\views/components/filter.blade.php ENDPATH**/ ?>