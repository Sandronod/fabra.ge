<div class="tagline bg-white">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="d-flex align-items-center justify-content-between">
                    <ul class="list-unstyled mb-0">
                        <li class="list-inline-item mb-0"><a href="mailto:<?php echo e($siteSettings->email); ?>" class="text-muted fw-normal"><i data-feather="mail" class="fea icon-sm text-primary"></i> <?php echo e($siteSettings->email); ?></a></li>
                        <li class="list-inline-item mb-0 ms-3"><a href="javascript:void(0)" class="text-muted fw-normal"><i data-feather="map-pin" class="fea icon-sm text-primary"></i>
                            <?php if(getCurrentLocale() == 'ka'): ?>
                                <?php echo e($siteSettings->address_ka); ?>

                            <?php elseif(getCurrentLocale() == 'en'): ?>
                            <?php echo e($siteSettings->address_en); ?>

                            <?php endif; ?>
                        </a></li>
                    </ul>

                    <ul class="list-unstyled social-icon tagline-social mb-0">
                        <li class="list-inline-item mb-0"><a href="javascript:void(0)"><i class="uil uil-facebook-f h6 mb-0"></i></a></li>
                        <li class="list-inline-item mb-0"><a href="javascript:void(0)"><i class="uil uil-instagram h6 mb-0"></i></a></li>
                        <li class="list-inline-item mb-0"><a href="javascript:void(0)"><i class="uil uil-twitter h6 mb-0"></i></a></li>
                        <li class="list-inline-item mb-0"><a href="javascript:void(0)"><i class="uil uil-linkedin h6 mb-0"></i></a></li>
                    </ul><!--end icon-->
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

        <ul class="buy-button list-inline mb-0">
            <li class="list-inline-item search-icon mb-0">
                <div class="dropdown">
                    <button type="button" class="btn btn-link text-decoration-none dropdown-toggle mb-0 p-0" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="uil uil-search h5 text-white mb-0"></i>
                    </button>
                    <div class="dropdown-menu dd-menu dropdown-menu-end bg-white shadow rounded border-0 mt-4 py-0" style="width: 300px;">
                        <form class="p-4">
                            <input type="text" id="text" name="name" class="form-control border bg-white" placeholder="Search...">
                        </form>
                    </div>
                </div>
            </li>
        </ul>

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
                                <ul class="submenu megamenu">
                                    <?php $__currentLoopData = $item->subMenu; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $menuItem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li>
                                            <ul>
                                                <li class="megamenu-head"><?php echo e($menuItem->lang->name); ?></li>
                                                <?php if(isset($menuItem->subMenu[0])): ?>
                                                    <?php $__currentLoopData = $menuItem->subMenu; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subItem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <li><a href="<?php echo e(fullUrl('list/'.$subItem->parentItem->slug.'/'.$subItem->slug)); ?>" class="sub-menu-item" 

                                                            <?php if(mb_strlen($subItem->lang->name) > 22): ?> 
                                                                data-bs-toggle="tooltip" 
                                                                data-bs-placement="top" 
                                                                data-bs-title="<?php echo e($subItem->lang->name); ?>"
                                                            <?php endif; ?>
                                                            
                                                            ><?php echo e($subItem->lang->name); ?></a></li>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                <?php endif; ?>
                                            </ul>
                                        </li>
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
<?php /**PATH C:\xampp\htdocs\fabra.ge\resources\views/nn_site/partials/header.blade.php ENDPATH**/ ?>