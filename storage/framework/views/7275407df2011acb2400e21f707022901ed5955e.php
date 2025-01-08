<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<?php if(getCurrentLocale() == 'ka'): ?>
    <?php echo $__env->make('nn_site.partials.head_tags', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php elseif(getCurrentLocale() == 'en'): ?>
    <?php echo $__env->make('nn_site.partials.head_tags_en', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php endif; ?>

<?php if(isset ($isTextPage) || isset ($isContactPage)): ?>
    <meta name="description" content="<?php echo e($item->description); ?>">
<?php else: ?>
    <?php if(getCurrentLocale() == 'ka'): ?>
        <meta name="description" content="<?php echo e(isset ($isBankCurrencies) ? $siteSettings->bank_currencies_description_ka : $siteSettings->description_ka); ?>">
    <?php elseif(getCurrentLocale() == 'en'): ?>
        <meta name="description" content="<?php echo e(isset ($isBankCurrencies) ? $siteSettings->bank_currencies_description_en : $siteSettings->description_en); ?>">
    <?php endif; ?>
<?php endif; ?>

<title>
    fabra.ge









</title>

<!-- favicon -->
<link href="/assets/images/favicon.png" rel="shortcut icon">
<!-- Bootstrap -->
<link href="/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<link href="/assets/css/tiny-slider.css" rel="stylesheet" type="text/css" />
<link href="/assets/css/materialdesignicons.min.css" rel="stylesheet" type="text/css" />
<link href="https://unicons.iconscout.com/release/v3.0.6/css/line.css" rel="stylesheet" />

<?php echo $__env->yieldPushContent('css'); ?>
<link href="/assets/css/tobii.min.css" rel="stylesheet" type="text/css" />
<link href="/assets/css/materialdesignicons.min.css" rel="stylesheet" type="text/css" />

<!-- Main Css -->
<link href="/assets/css/style.min.css" rel="stylesheet" type="text/css" id="theme-opt" />




<?php echo $siteSettings->tags_head; ?>


<!-- custom css -->

<link href="/assets/css/custom.css" rel="stylesheet" type="text/css"/>

<?php if(getCurrentLocale() == 'ka'): ?>
    <link rel="stylesheet" href="//cdn.web-fonts.ge/fonts/bpg-banner/css/bpg-banner.min.css">
    <link href="/assets/css/geo-fonts.css" rel="stylesheet" type="text/css"/>
<?php endif; ?><?php /**PATH C:\xampp\htdocs\fabra.ge\resources\views/nn_site/partials/head.blade.php ENDPATH**/ ?>