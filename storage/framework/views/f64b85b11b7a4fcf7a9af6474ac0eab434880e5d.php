<!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->



<!-- DOC: Change data-auto-speed="200" to adjust the sub menu slide up/down speed -->



<div class="page-sidebar navbar-collapse collapse">



    <!-- BEGIN SIDEBAR MENU -->



    <!-- DOC: Apply "page-sidebar-menu-light" class right after "page-sidebar-menu" to enable light sidebar menu style(without borders) -->



    <!-- DOC: Apply "page-sidebar-menu-hover-submenu" class right after "page-sidebar-menu" to enable hoverable(hover vs accordion) sub menu mode -->



    <!-- DOC: Apply "page-sidebar-menu-closed" class right after "page-sidebar-menu" to collapse("page-sidebar-closed" class must be applied to the body element) the sidebar sub menu mode -->



    <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->



    <!-- DOC: Set data-keep-expand="true" to keep the submenues expanded -->



    <!-- DOC: Set data-auto-speed="200" to adjust the sub menu slide up/down speed -->



    <ul class="page-sidebar-menu  page-header-fixed " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200" style="padding-top: 20px">



        <!-- DOC: To remove the sidebar toggler from the sidebar you just need to completely remove the below "sidebar-toggler-wrapper" LI element -->



        <li class="sidebar-toggler-wrapper hide">



            <!-- BEGIN SIDEBAR TOGGLER BUTTON -->



            <div class="sidebar-toggler"> </div>



            <!-- END SIDEBAR TOGGLER BUTTON -->



        </li>



        <!-- DOC: To remove the search box from the sidebar you just need to completely remove the below "sidebar-search-wrapper" LI element -->



        <li class="sidebar-search-wrapper">



            <!-- BEGIN RESPONSIVE QUICK SEARCH FORM -->



            <!-- DOC: Apply "sidebar-search-bordered" class the below search form to have bordered search box -->



            <!-- DOC: Apply "sidebar-search-bordered sidebar-search-solid" class the below search form to have bordered & solid search box -->



            <form class="sidebar-search  " action="page_general_search_3.html" method="POST">



                <a href="javascript:;" class="remove">



                    <i class="icon-close"></i>



                </a>



                <div class="input-group">



                    <input type="text" class="form-control" placeholder="Search...">



                    <span class="input-group-btn">



                        <a href="javascript:;" class="btn submit">



                            <i class="icon-magnifier"></i>



                        </a>



                    </span>



                </div>



            </form>



            <!-- END RESPONSIVE QUICK SEARCH FORM -->



        </li>



        <li class="nav-item<?php if(Request::is('*/manager')): ?> start active open<?php endif; ?>">



            <a href="<?php echo e(url(getCurrentLocale() . '/manager')); ?>" class="nav-link ">



                <i class="icon-bar-chart"></i>



                <span class="title"><?php echo e(trans('general.dashboard')); ?></span>



                <span class="selected"></span>



            </a>



        </li>



        



            



        



        <li class="nav-item<?php if(Request::is('*/user/*')): ?> start active open<?php endif; ?>">



            <a href="javascript:;" class="nav-link nav-toggle">



                <i class="icon-user"></i>



                <span class="title"><?php echo e(trans('general.user')); ?></span>



                <span class="arrow<?php if(Request::is('*/user/*')): ?> open<?php endif; ?>"></span>



                <?php if(Request::is('*/user/*')): ?><span class="selected"></span><?php endif; ?>



            </a>



            <ul class="sub-menu">



                <li class="nav-item<?php if(Request::is('*/profile')): ?> active open<?php endif; ?>">



                    <a href="<?php echo e(url(getCurrentLocale() . '/manager/user/profile')); ?>" class="nav-link ">



                        <span class="title"><?php echo e(trans('general.fclbPersonalInfoMIN')); ?></span>



                    </a>



                </li>



                <li class="nav-item<?php if(Request::is('*/profile/photo')): ?> active open<?php endif; ?>">



                    <a href="<?php echo e(url(getCurrentLocale() . '/manager/user/profile/photo')); ?>" class="nav-link ">



                        <span class="title"><?php echo e(trans('general.fclbChangePhoto')); ?></span>



                    </a>



                </li>



                <li class="nav-item<?php if(Request::is('*/profile/password')): ?> active open<?php endif; ?>">



                    <a href="<?php echo e(url(getCurrentLocale() . '/manager/user/profile/password')); ?>" class="nav-link ">



                        <span class="title"><?php echo e(trans('general.fclbChangePassword')); ?></span>



                    </a>



                </li>



            </ul>



        </li>



        <li class="nav-item<?php if(Request::is('*/menu/*') || Request::is('*/menu')): ?> start active open<?php endif; ?>">



            <a href="javascript:;" class="nav-link nav-toggle">



                <i class="icon-folder"></i>



                <span class="title"><?php echo e(trans('general.menu')); ?></span>



                <span class="arrow<?php if(Request::is('*/menu/*') || Request::is('*/menu')): ?> open<?php endif; ?>"></span>



                <?php if(Request::is('*/menu/*') || Request::is('*/menu')): ?><span class="selected"></span><?php endif; ?>



            </a>



            <ul class="sub-menu">



                <li class="nav-item<?php if(Request::is('*/menu')): ?> start active open<?php endif; ?>">



                    <a href="<?php echo e(url(getCurrentLocale() . '/manager/menu')); ?>" class="nav-link">



                    <?php echo e(trans('general.allMenus')); ?> </a>



                </li>



                <li class="nav-item<?php if(Request::is('*/menu/create') || Request::is('*/menu/*')): ?> active open<?php endif; ?>">



                    <a href="<?php echo e(url(getCurrentLocale() . '/manager/menu/create')); ?>" class="nav-link">



                    <?php echo e(trans('general.createMenu')); ?> </a>



                </li>



            </ul>



        </li>



        <li class="nav-item<?php if(Request::is('*/collection/*') || Request::is('*/collection')): ?> start active open<?php endif; ?>">



            <a href="javascript:;" class="nav-link nav-toggle">



                <i class="icon-layers"></i>



                <span class="title"><?php echo e(trans('general.collection')); ?></span>



                <span class="arrow<?php if(Request::is('*/collection/*') || Request::is('*/collection')): ?> open<?php endif; ?>"></span>



                <?php if(Request::is('*/collection/*') || Request::is('*/collection')): ?><span class="selected"></span><?php endif; ?>



            </a>



            <ul class="sub-menu">



                <li class="nav-item<?php if(Request::is('*/collection')): ?> active open<?php endif; ?>">



                    <a href="<?php echo e(url(getCurrentLocale() . '/manager/collection')); ?>" class="nav-link">



                        <?php echo e(trans('general.list')); ?> </a>



                </li>



                <li class="nav-item<?php if(Request::is('*/collection/create') || Request::is('*/collection/*')): ?> active open<?php endif; ?>">



                    <a href="<?php echo e(url(getCurrentLocale() . '/manager/collection/create')); ?>" class="nav-link">



                        <?php echo e(trans('general.addNew')); ?> </a>



                </li>



            </ul>



        </li>






        <!-- <li class="nav-item<?php if(Request::is('*/thematic_category/*') || Request::is('*/thematic_category')): ?> start active open<?php endif; ?>">



            <a href="javascript:;" class="nav-link nav-toggle">



                <i class="icon-wrench"></i>



                <span class="title"><?php echo e(trans('general.thematicCategory')); ?></span>



                <span class="arrow<?php if(Request::is('*/thematic_category/*') || Request::is('*/thematic_category')): ?> open<?php endif; ?>"></span>



                <?php if(Request::is('*/thematic_category/*') || Request::is('*/thematic_category')): ?><span class="selected"></span><?php endif; ?>



            </a>



            <ul class="sub-menu">



                <li class="nav-item<?php if(Request::is('*/thematic_category')): ?> active open<?php endif; ?>">



                    <a href="<?php echo e(url(getCurrentLocale() . '/manager/thematic_category')); ?>" class="nav-link">



                        <?php echo e(trans('general.list')); ?> </a>



                </li>



                <li class="nav-item<?php if(Request::is('*/thematic_category/create') || Request::is('*/thematic_category/*')): ?> active open<?php endif; ?>">



                    <a href="<?php echo e(url(getCurrentLocale() . '/manager/thematic_category/create')); ?>" class="nav-link">



                        <?php echo e(trans('general.addNew')); ?> </a>



                </li>



            </ul>



        </li> -->

        <!-- <li class="nav-item<?php if(Request::is('*/color/*') || Request::is('*/color')): ?> start active open<?php endif; ?>">



            <a href="javascript:;" class="nav-link nav-toggle">



                <i class="icon-wrench"></i>



                <span class="title"><?php echo e(trans('general.color')); ?></span>



                <span class="arrow<?php if(Request::is('*/color/*') || Request::is('*/color')): ?> open<?php endif; ?>"></span>



                <?php if(Request::is('*/color/*') || Request::is('*/color')): ?><span class="selected"></span><?php endif; ?>



            </a>



            <ul class="sub-menu">



                <li class="nav-item<?php if(Request::is('*/color')): ?> active open<?php endif; ?>">



                    <a href="<?php echo e(url(getCurrentLocale() . '/manager/color')); ?>" class="nav-link">



                        <?php echo e(trans('general.list')); ?> </a>



                </li>



                <li class="nav-item<?php if(Request::is('*/color/create') || Request::is('*/color/*')): ?> active open<?php endif; ?>">



                    <a href="<?php echo e(url(getCurrentLocale() . '/manager/color/create')); ?>" class="nav-link">



                        <?php echo e(trans('general.addNew')); ?> </a>



                </li>



            </ul>



        </li> -->

        <li class="nav-item<?php if(Request::is('*/slider')): ?> start active<?php endif; ?>">



            <a href="<?php echo e(url(getCurrentLocale() . '/manager/slider')); ?>" class="nav-link nav-toggle filemanager-btn-sidebar">



                <i class="icon-layers"></i>



                <span class="title"><?php echo e(trans('general.slider')); ?></span>



                <?php if(Request::is('*/slider')): ?><span class="selected"></span><?php endif; ?>



            </a>



        </li>


        


        <li class="nav-item<?php if(Request::is('*/filemanager')): ?> start active<?php endif; ?>">



            <a href="<?php echo e(url(getCurrentLocale() . '/manager/filemanager')); ?>" class="nav-link nav-toggle filemanager-btn-sidebar">



                <i class="icon-docs"></i>



                <span class="title"><?php echo e(trans('general.filemanager')); ?></span>



                <?php if(Request::is('*/filemanager')): ?><span class="selected"></span><?php endif; ?>



            </a>



        </li>

        <li class="nav-item<?php if(Request::is('*/translate')): ?> start active<?php endif; ?>">

            <a href="<?php echo e(url(getCurrentLocale() . '/manager/translate')); ?>" class="nav-link nav-toggle filemanager-btn-sidebar">

                <i class="icon-note"></i>

                <span class="title">Translates</span>

                <?php if(Request::is('*/translate')): ?><span class="selected"></span><?php endif; ?>

            </a>

        </li>

        <li class="nav-item<?php if(Request::is('*/site-settings')): ?> start active<?php endif; ?>">

            <a href="<?php echo e(url(getCurrentLocale() . '/manager/site-settings')); ?>" class="nav-link nav-toggle filemanager-btn-sidebar">

                <i class="icon-settings"></i>

                <span class="title"><?php echo e(trans('general.siteSettings')); ?></span>

                <?php if(Request::is('*/site-settings')): ?><span class="selected"></span><?php endif; ?>

            </a>

        </li>
        
        <li class="nav-item<?php if(Request::is('*/subscribers')): ?> start active<?php endif; ?>">

            <a href="<?php echo e(url(getCurrentLocale() . '/manager/subscribers')); ?>" class="nav-link nav-toggle filemanager-btn-sidebar">

                <i class="icon-user"></i>

                <span class="title">Subscribers</span>

                <?php if(Request::is('*/subscribers')): ?><span class="selected"></span><?php endif; ?>

            </a>

        </li>

        <!-- <li class="nav-item<?php if(Request::is('*/orders')): ?> start active<?php endif; ?>">



            <a href="<?php echo e(url(getCurrentLocale() . '/manager/orders')); ?>" class="nav-link nav-toggle filemanager-btn-sidebar">



                <i class="icon-docs"></i>



                <span class="title">მომხმარებლები</span>



                <?php if(Request::is('*/orders')): ?><span class="selected"></span><?php endif; ?>



            </a>



        </li> -->



    </ul>



    <!-- END SIDEBAR MENU -->



</div><?php /**PATH /Users/nkarashvili/Documents/laravel/newproj/resources/views/nn_cms/partials/sidebar.blade.php ENDPATH**/ ?>