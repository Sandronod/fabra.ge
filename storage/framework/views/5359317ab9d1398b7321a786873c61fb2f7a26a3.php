<!DOCTYPE html>
<html lang="<?php echo e(getCurrentLocale()); ?>">

    <head>
        <?php echo $__env->make('nn_site.partials.head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </head>

    <body class="en">

        <?php echo $__env->yieldContent('content'); ?>


        <?php echo $__env->make('nn_site.partials.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <?php echo $__env->make('nn_site.partials.scripts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </body>
</html>
<?php /**PATH C:\xampp\htdocs\fabra.ge\resources\views////nn_site/index.blade.php ENDPATH**/ ?>