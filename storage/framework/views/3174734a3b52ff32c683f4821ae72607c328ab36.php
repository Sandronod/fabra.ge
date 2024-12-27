<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<?php if(getCurrentLocale() == 'ka'): ?>
    <?php echo $__env->make('nn_site.partials.head_tags', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php elseif(getCurrentLocale() == 'en'): ?>
    <?php echo $__env->make('nn_site.partials.head_tags_en', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php endif; ?>

<?php if(isset($isHomePage) || isset($isBankCurrencies)): ?>
    <meta name="format-detection" content="telephone=no">
    <style>
        a[x-apple-data-detectors], a[href^=tel] {
            color: #263e33 !important;
            text-decoration: none !important;
        }
    </style>
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
    <?php if(isset ($isTextPage) || isset ($isContactPage)): ?>
        <?php echo e($item->name); ?> - Myvaluta.ge
    <?php else: ?>
        <?php if(getCurrentLocale() == 'ka'): ?>
            <?php echo e(isset ($isBankCurrencies) ? $siteSettings->bank_currencies_title_ka : $siteSettings->title_ka); ?>

        <?php elseif(getCurrentLocale() == 'en'): ?>
            <?php echo e(isset ($isBankCurrencies) ? $siteSettings->bank_currencies_title_en : $siteSettings->title_en); ?>

        <?php endif; ?>
    <?php endif; ?>
</title>

<!-- font -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;600&display=swap" rel="stylesheet">

<link rel="icon" type="image/png" sizes="32x32" href="<?php echo e(url('assets/images/dark-colored-logo.svg')); ?>">

<!-- css -->
<link rel="stylesheet" href="<?php echo e(url('assets/css/style.css?v=12.3')); ?>">

<?php if(getCurrentLocale() == 'ka'): ?>
    <link rel="stylesheet" href="<?php echo e(url('fonts/bpg-arial/css/bpg-arial.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(url('assets/css/style-ka.css?v=10.6')); ?>">
<?php endif; ?>

<?php echo $__env->yieldPushContent('css'); ?>

<?php echo $siteSettings->tags_head; ?><?php /**PATH /Users/nkarashvili/Documents/laravel/newproj/resources/views/nn_site/partials/head.blade.php ENDPATH**/ ?>