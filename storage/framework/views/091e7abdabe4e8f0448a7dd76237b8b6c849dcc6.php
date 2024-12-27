<!DOCTYPE html>
<html lang="<?php echo e(getCurrentLocale()); ?>">

    <head>
        <?php echo $__env->make('nn_site.partials.head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </head>
    <!-- head -->

    <body class="en">
        
        <?php echo $siteSettings->tags_body; ?>


        <?php echo $__env->yieldContent('content'); ?>
        <!-- content -->

        <?php echo $__env->make('nn_site.partials.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <!-- footer -->

        <a href="#" id="scroll-top-btn"></a>
        
        <?php echo $__env->make('nn_site.partials.scripts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        
       <script type="module" async>
            if (window.location.pathname == "/public/") {
              window.location.href = 'https://myvaluta.ge/'; 
            }
        </script>

    </body>

</html><?php /**PATH /Users/nkarashvili/Documents/laravel/newproj/resources/views////nn_site/index.blade.php ENDPATH**/ ?>