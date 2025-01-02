


<!-- resources/views/auth/login.blade.php -->
<main>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-4 login-section-wrapper m">
                <div class="brand-wrapper">
                    <a href="mailto:contact@orien.ge" class="f" title="Orien">contact@orien.ge</a>
                </div>
                <div class="login-wrapper my-auto">
                    <h1 class="login-title">Sing in</h1>
                    <form method="POST" action="<?php echo e(url(getCurrentLocale() . '/!admin/login')); ?>" class="login-form<?php echo e(($errors->any()) ? ' animated shake' : ''); ?>">
                        <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>" />
                        <div class="form-group">

                            <!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->

                            <label class="control-label visible-ie8 visible-ie9"><?php echo e(trans('auth.eMail')); ?></label>

                            <input class="form-control form-control-solid placeholder-no-fix" type="email" autocomplete="off" placeholder="<?php echo e(trans('auth.eMail')); ?>" name="email" value="<?php echo e(old('email')); ?>" />

                        </div>



                        <div class="form-group">

                            <label class="control-label visible-ie8 visible-ie9"><?php echo e(trans('auth.password')); ?></label>

                            <input id="password" class="form-control form-control-solid placeholder-no-fix" type="password" autocomplete="off" placeholder="<?php echo e(trans('auth.password')); ?>" name="password" />

                        </div>



                        <div class="form-actions">

                            <button type="submit" class="btn green uppercase"><?php echo e(trans('auth.logIn')); ?></button>

                            <!--label class="rememberme check">

                            <input type="checkbox" name="remember" value="1" />Remember Me</label-->

                        </div>

                    </form>
                </div>
            </div>
            <div class="col-sm-8 px-0 d-none d-sm-block cov">
                <img src="" alt="login image" class="login-img">
            </div>
        </div>
    </div>







<?php if($errors->any()): ?>

    <ul class="alert alert-danger">

        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

            <li><?php echo $error; ?></li>

        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    </ul>

<?php endif; ?>



<?php /**PATH C:\projects\laravel\fabra.ge\resources\views/auth/login.blade.php ENDPATH**/ ?>