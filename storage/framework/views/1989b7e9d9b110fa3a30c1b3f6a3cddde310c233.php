
 <header class="header header--only">
    <!-- <img class="header-bgimg-absolute" src="/assets/images/world-map.svg" alt="World map"> -->

    <div class="container">
        <div class="header__top flex space-between align-center">
            <div class="logo">
                <a href="<?php echo e(url(getCurrentLocale() == 'ka' ? '' : getCurrentLocale())); ?>" class="fz-800">
                    <img src="/assets/images/money bag.svg" alt="Myvaluta Logo"> Myvaluta
                </a>
            </div>
            <ul class="header-navigation">
                <li><a href="<?php echo e(url((getCurrentLocale() == 'ka' ? '' : getCurrentLocale() . '/') . 'erovnuli-bankis-kursi')); ?>" class="header-navvigation-scroll-btn"><?php echo e($lang->officialExchangeRate); ?></a></li>
                <li><a href="<?php echo e(isset($isTextPage) || isset($isContactPage) || (isset($exception) && $exception->getStatusCode() == 404) ? (url((getCurrentLocale() == 'ka' ? '' : getCurrentLocale() . '/'))) : ''); ?>#exchange-rate-in-banks" class="header-navvigation-scroll-btn"><?php echo e($lang->exchangeRateInBanksAndKiosks); ?></a></li>
                <li><a href="<?php echo e(isset($isTextPage) || isset($isContactPage) || (isset($exception) && $exception->getStatusCode() == 404) ? (url((getCurrentLocale() == 'ka' ? '' : getCurrentLocale() . '/'))) : ''); ?>#crypto-exchange-rate" class="header-navvigation-scroll-btn"><?php echo e($lang->cryptoExchangeRate); ?></a></li>
                <?php $__currentLoopData = $primaryMenu; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><a href="<?php echo e(url((getCurrentLocale() == 'ka' ? '' : getCurrentLocale() . '/') . $item->slug)); ?>"><?php echo e($item->name); ?></a></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
            <ul class="languages">
                <li>
                    <?php if(getCurrentLocale() == 'ka'): ?>
                        <a href="<?php echo e(LaravelLocalization::getLocalizedURL('en')); ?>">
                            <img id="en" src="/assets/images/flags/uk.svg" alt="English">
                        </a>
                    <?php elseif(getCurrentLocale() == 'en'): ?>
                        <a href="<?php echo e(LaravelLocalization::getNonLocalizedURL('')); ?>">
                            <img id="ge" src="/assets/images/flags/geo.svg" alt="Georgian">
                        </a>
                    <?php endif; ?>
                </li>
            </ul>
            <img id="burgerbar" onclick="openpopup('.burger-bar-menu-main')" class="burger-bar" src="/assets/images/burger-bar.svg" alt="burger-bar">
        </div>
    </div>
</header>


<?php $__env->startPush('popup'); ?>
    <div class="bg-overlay">
        <?php echo $__env->make('nn_site.partials.burger', ['notHomePage' => 1], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>
<?php $__env->stopPush(); ?><?php /**PATH C:\xampp\htdocs\fabra.ge\resources\views/nn_site/partials/header2.blade.php ENDPATH**/ ?>