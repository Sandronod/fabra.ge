
<?php
 $ogTypes = ["title", "description", "image"];
?>
<?php $__currentLoopData = $ogTypes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
   <meta name="<?php echo e($type); ?>" content="<?php echo e($metaData[$type]); ?>" />
   <meta name="og:<?php echo e($type); ?>" content="<?php echo e($metaData[$type]); ?>" />
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<meta name="author" content="orien" />
<meta name="website" content="fabra.ge" />
<meta name="url" content="<?php echo e(request()->fullUrl()); ?>" />
<meta name="og:url" content="<?php echo e(request()->fullUrl()); ?>" />
<meta name="Version" content="v1.0.0" />
<?php /**PATH C:\projects\fabra.ge\resources\views/nn_site/partials/head_tags.blade.php ENDPATH**/ ?>