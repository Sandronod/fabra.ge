<div class="page-header-inner">


    <!-- BEGIN LOGO -->


    <div class="page-logo">


        <a href="<?php echo e(url(getCurrentLocale() . '/manager')); ?>">


           <img src="<?php echo e(url('assets/nn_cms/layouts/layout/img/logo-orien.svg')); ?>" width="50" alt="logo" class="logo-default" /></a>


        <div class="menu-toggler sidebar-toggler"> </div>


    </div>


    <!-- END LOGO -->


    <!-- BEGIN RESPONSIVE MENU TOGGLER -->


    <a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse"> </a>


    <!-- END RESPONSIVE MENU TOGGLER -->


    <!-- BEGIN TOP NAVIGATION MENU -->


    <div class="top-menu">


        <ul class="nav navbar-nav pull-right">


            


            <!-- BEGIN USER LOGIN DROPDOWN -->


            <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->


            <li class="dropdown dropdown-user">


                <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">


                    <img alt="profile photo" class="img-circle" src="<?php if(\Auth::user()->imgurl): ?> <?php echo e(\Auth::user()->imgurl); ?> <?php else: ?> <?php echo e(url('assets/nn_cms/layouts/layout/img/user-default-photo.png')); ?> <?php endif; ?>" />


                    <span class="username username-hide-on-mobile"> <?php echo e(\Auth::user()->name); ?> </span>


                    <i class="fa fa-angle-down"></i>


                </a>


                <ul class="dropdown-menu dropdown-menu-default">


                    <li>


                        <a href="<?php echo e(url(getCurrentLocale() . '/manager/user/profile')); ?>">


                            <i class="icon-user"></i> <?php echo e(trans('general.myProfile')); ?> </a>


                    </li>


                    <li class="divider"> </li>


                    <li>


                        <a href="<?php echo e(url('!admin/logout')); ?>">


                            <i class="icon-key"></i> <?php echo e(trans('general.logOut')); ?> </a>


                    </li>


                </ul>


            </li>


            <!-- END USER LOGIN DROPDOWN -->


        </ul>


    </div>


    <!-- END TOP NAVIGATION MENU -->


</div>
<?php /**PATH /Users/nkarashvili/Documents/laravel/newproj/resources/views/nn_cms/partials/header.blade.php ENDPATH**/ ?>