<div class="tagline bg-white">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="d-flex align-items-center justify-content-between">
                    <ul class="list-unstyled mb-0">
                        <li class="list-inline-item mb-0"><a href="mailto:<?php echo e($siteSettings->email); ?>" class="text-muted fw-normal"><i data-feather="mail" class="fea icon-sm text-primary"></i> <?php echo e($siteSettings->email); ?></a></li>
                        <li class="list-inline-item mb-0 ms-3"><span class="text-muted fw-normal"><i data-feather="map-pin" class="fea icon-sm text-primary"></i>
                            <?php if(getCurrentLocale() == 'ka'): ?>
                                <?php echo e($siteSettings->address_ka); ?>

                            <?php elseif(getCurrentLocale() == 'en'): ?>
                                <?php echo e($siteSettings->address_en); ?>

                            <?php endif; ?>
                        </span></li>
                    </ul>

                    <div class="d-flex align-items-center">
                        <ul class="list-unstyled social-icon tagline-social mb-0">
                            <?php if($siteSettings->facebook): ?>
                                <li class="list-inline-item mb-0"><a href="<?php echo e($siteSettings->facebook); ?>" target="_blank"><i class="uil uil-facebook-f h6 mb-0"></i></a></li>
                            <?php endif; ?>
                            <?php if($siteSettings->instagram): ?>
                                <li class="list-inline-item mb-0"><a href="<?php echo e($siteSettings->instagram); ?>" target="_blank"><i class="uil uil-instagram h6 mb-0"></i></a></li>
                            <?php endif; ?>
                            
                            <?php if($siteSettings->linkedin): ?>
                                <li class="list-inline-item mb-0"><a href="<?php echo e($siteSettings->linkedin); ?>" target="_blank"><i class="uil uil-linkedin h6 mb-0"></i></a></li>
                            <?php endif; ?>
                        </ul><!--end icon-->
                        <?php if(getCurrentLocale() == 'ka'): ?>
                            <a href="<?php echo e(LaravelLocalization::getLocalizedURL('en')); ?>" class="lang">
                                <img src="/assets/images/lang-en.svg" alt="" class="lang-img"> En
                            </a>
                        <?php elseif(getCurrentLocale() == 'en'): ?>
                            <a href="<?php echo e(LaravelLocalization::getLocalizedURL('ka')); ?>" class="lang">
                                <img src="/assets/images/lang-ka.svg" alt="" class="lang-img"> Ge
                            </a>
                        <?php endif; ?>
                    </div>
                </div>
            </div><!--end col-->
        </div><!--end row-->
    </div><!--end container-->
</div><!--end tagline-->
<!-- TAGLINE END-->

<!-- Navbar STart -->
<header id="topnav" class="defaultscroll sticky tagline-height">
    <div class="container">
        <!-- Logo container-->
        <a class="logo" href="<?php echo e(fullUrl()); ?>">
            <img src="/assets/images/logo.png" class="logo-light-mode" alt="">
            <img src="/assets/images/logo-light.png" class="logo-dark-mode" alt="">
        </a>
        <!-- End Logo container-->
        <div class="menu-extras">
            <div class="menu-item">
                <!-- Mobile menu toggle-->
                <a class="navbar-toggle" id="isToggle" onclick="toggleMenu()">
                    <div class="lines">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                </a>
                <!-- End mobile menu toggle-->
            </div>
        </div>

        <!-- search-->
        
        <!-- search end -->

        <div id="navigation">
            <!-- Navigation Menu-->
            <ul class="navigation-menu nav-right">
                <?php if(isset(menu()->nn_menu_items)): ?>
                    <?php $__currentLoopData = menu()->nn_menu_items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li <?php if(!$loop->last): ?>class="has-submenu parent-parent-menu-item"<?php endif; ?>>
                            <?php if($item->type == 'collection'): ?>
                                <a href="<?php echo e(fullUrl($item->slug)); ?>"><?php echo e($item->lang->name); ?></a>
                            <?php endif; ?>
                            <?php if($item->type == 'link'): ?>
                                <a href="<?php echo e($item->lang->link); ?>"><?php echo e($item->lang->name); ?></a>
                            <?php endif; ?>
                            <?php if($item->type == 'text'): ?>
                                <a href="<?php echo e(fullUrl($item->slug)); ?>"><?php echo e($item->lang->name); ?></a>
                            <?php endif; ?>
                            <?php if($item->type == 'category'): ?>
                                <a href="javascript:void(0);"><?php echo e($item->lang->name); ?></a>
                            <?php endif; ?>
                            <?php if($item->type == 'contact'): ?>
                                <a href="<?php echo e(fullUrl($item->slug)); ?>"><?php echo e($item->lang->name); ?></a>
                            <?php endif; ?>
                                <span class="menu-arrow"></span>
                            <?php if(isset($item->subMenu[0])): ?>
                                <ul class="submenu">
                                    <?php $__currentLoopData = $item->subMenu; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $menuItem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                                <?php if(isset($menuItem->subMenu[0])): ?>
                                                    <li class="has-submenu parent-menu-item"><a href="javascript:void(0)"><?php echo e($menuItem->lang->name); ?></a><span class="submenu-arrow"></span>
                                                        <ul class="submenu">
                                                            <?php $__currentLoopData = $menuItem->subMenu; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subItem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <li><a href="<?php echo e(fullUrl('list/'.$subItem->parentItem->slug.'/'.$subItem->slug)); ?>" class="sub-menu-item"

                                                                    ><?php echo e($subItem->lang->name); ?></a></li>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        </ul>
                                                    </li>

                                                <?php else: ?>
                                                    <li><a href="#" class="sub-menu-item"><?php echo e($menuItem->lang->name); ?></a></li>
                                                <?php endif; ?>
                                       
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </ul>
                            <?php endif; ?>
                        </li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>


            </ul><!--end navigation menu-->
        </div><!--end navigation-->
    </div><!--end container-->
</header><!--end header-->
<!-- Navbar End -->
<?php /**PATH C:\projects\fabra.ge\resources\views/nn_site/partials/header.blade.php ENDPATH**/ ?>