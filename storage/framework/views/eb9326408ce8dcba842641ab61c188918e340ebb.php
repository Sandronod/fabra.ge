<div class="burger-bar-menu-main">
    <div class="burger-bar-menu-parent">
        <div class="burger-bar-menu-header">
            <div class="burger-bar-menu-header-top">
                <a href="/" class="fz-800 burger-bar-menu-header-a">
                    <img src="<?php echo e(url('')); ?>/assets/images/money_bag1.svg" alt="Myvaluta Logo" /> Myvaluta
                </a>
                <div class="mobile-burgerbar-header-right-side">
                    <ul class="languages-mobile">
                        
                    </ul>
                    <a href="#"><img onclick="closepopup('.burger-bar-menu-main')" src="<?php echo e(url('')); ?>/assets/images/close1.svg" alt="close"></a>
                </div>
            </div>
            <!-- <img src="<?php echo e(url('')); ?>/assets/images/Line 37.svg" alt="border"> -->
        </div>

        <a href="<?php echo e(url((getCurrentLocale() == 'ka' ? '' : getCurrentLocale() . '/') . 'erovnuli-bankis-kursi')); ?>" onclick="closepopup('.share-popup')"><?php echo e($lang->officialExchangeRate); ?></a>
        <a href="<?php echo e(isset($notHomePage) ? fullUrl('') : ''); ?>#exchange-rate-in-banks" onclick="closepopup('.share-popup')"><?php echo e($lang->exchangeRateInBanksAndKiosks); ?></a>
        <a href="<?php echo e(isset($notHomePage) ? fullUrl('') : ''); ?>#crypto-exchange-rate" onclick="closepopup('.share-popup')"><?php echo e($lang->cryptoExchangeRate); ?></a>
        <?php $__currentLoopData = $footerMenu; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <a href="<?php echo e(url((getCurrentLocale() == 'ka' ? '' : getCurrentLocale() . '/') . $item->slug)); ?>"><?php echo e($item->name); ?></a>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php $__currentLoopData = $primaryMenu; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <a href="<?php echo e(url((getCurrentLocale() == 'ka' ? '' : getCurrentLocale() . '/') . $item->slug)); ?>"><?php echo e($item->name); ?></a>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
</div><?php /**PATH /Users/nkarashvili/Documents/laravel/newproj/resources/views/nn_site/partials/burger.blade.php ENDPATH**/ ?>