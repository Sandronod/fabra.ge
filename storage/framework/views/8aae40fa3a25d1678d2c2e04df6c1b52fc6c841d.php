
<?php $__env->startSection('content'); ?>

    <?php echo $__env->make('nn_site.partials.header2', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    
    <main>
        <div class="page-404">
            <?php if(isset($exception) && $exception->getStatusCode() == 404): ?>
                <h1><?php echo e($lang->page404Title); ?></h1>
                <div><?php echo e($lang->page404Descr); ?>, <a href="<?php echo e(fullUrl()); ?>"><?php echo e($lang->page404LinkTitle); ?></a></div>
            <?php endif; ?>
        </div>
    </main>

<?php $__env->stopSection(); ?>

 
<?php echo $__env->make('../nn_site/index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\projects\fabra.ge\resources\views/errors/404.blade.php ENDPATH**/ ?>