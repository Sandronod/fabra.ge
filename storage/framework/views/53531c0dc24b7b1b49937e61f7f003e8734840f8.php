

<?php $__env->startSection('content'); ?>

    <div class="page-content">
        <!-- BEGIN PAGE HEADER-->
        <!-- BEGIN PAGE BAR -->
        <div class="page-bar">
            <ul class="page-breadcrumb">
                <li>
                    <a href="<?php echo e(url(getCurrentLocale() . '/manager')); ?>"><?php echo e(trans('general.bcHome')); ?></a>
                    <i class="fa fa-circle"></i>
                </li>
                
            </ul>
            
                
                    
                    
                    
                
            
        </div>
        <!-- END PAGE BAR -->
        <!-- BEGIN PAGE TITLE-->
        <h3 class="page-title"> <?php echo e(trans('general.dashboard')); ?>
        </h3>
        <!-- END PAGE TITLE-->
        <!-- END PAGE HEADER-->
        <!-- BEGIN DASHBOARD STATS 1-->
        <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                <div class="dashboard-stat blue">
                    <div class="visual">
                        <i class="fa fa-bars"></i>
                    </div>
                    <div class="details">
                        <div class="number">
                            <span data-counter="counterup" data-value="<?php echo e($countMenus ? $countMenus : 0); ?>"></span>
                        </div>
                        <div class="desc"> <?php echo e(trans('general.countMenus')); ?> </div>
                    </div>
                    <a class="more" href="<?php echo e(url(getCurrentLocale() . '/manager/menu')); ?>"> <?php echo e(trans('general.viewMore')); ?>
                        <i class="m-icon-swapright m-icon-white"></i>
                    </a>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                <div class="dashboard-stat green">
                    <div class="visual">
                        <i class="fa fa-square"></i>
                    </div>
                    <div class="details">
                        <div class="number">
                            <span data-counter="counterup" data-value="<?php echo e($totalMenuItems ? $totalMenuItems : 0); ?>"></span>
                        </div>
                        <div class="desc"> <?php echo e(trans('general.countPages')); ?> </div>
                    </div>
                    <a class="more" href="<?php echo e($primaryMenuId ? url(getCurrentLocale() . '/manager/menu/' . $primaryMenuId . '/items') : ''); ?>"> <?php echo e(trans('general.viewMore')); ?>
                        <i class="m-icon-swapright m-icon-white"></i>
                    </a>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                <div class="dashboard-stat purple">
                    <div class="visual">
                        <i class="fa fa-cubes"></i>
                    </div>
                    <div class="details">
                        <div class="number">
                            <span data-counter="counterup" data-value="<?php echo e($countCollections ? $countCollections : 0); ?>"></span>
                        </div>
                        <div class="desc"> <?php echo e(trans('general.countCollections')); ?> </div>
                    </div>
                    <a class="more" href="<?php echo e(url(getCurrentLocale() . '/manager/collection')); ?>"> <?php echo e(trans('general.viewMore')); ?>
                        <i class="m-icon-swapright m-icon-white"></i>
                    </a>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
        <!-- END DASHBOARD STATS 1-->
        
            
                
                
                    
                        
                            
                            
                            
                        
                        
                            
                                
                                    
                                
                                    
                            
                        
                    
                    
                        
                            
                        
                            
                        
                    
                
                
            
        
    </div>


        
        <!-- END DASHBOARD SCRIPT -->
    

<?php $__env->stopSection(); ?>
<?php echo $__env->make('../nn_cms/index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\fabra.ge\resources\views/nn_cms/pages/dashboard.blade.php ENDPATH**/ ?>