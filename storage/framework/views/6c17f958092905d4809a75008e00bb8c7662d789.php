

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
        <h3 class="page-title"> <?php echo e(trans('general.ptCreateMenu')); ?>
        </h3>
        <!-- END PAGE TITLE-->
        <!-- END PAGE HEADER-->
        <a href="<?php echo e(url(getCurrentLocale() . '/manager/menu')); ?>" class="btn green btn-outline sbold uppercase margin-bottom-20"><i class="fa fa-arrow-left"></i> <?php echo e(trans('general.back')); ?></a>
        <!-- END BACK BTN -->
        <div class="portlet light bordered">
            <div class="portlet-body form">
                <?php echo Form::open(array('url' => getCurrentLocale() . '/manager/menu/store','class' => 'form-horizontal')); ?>
                    <div class="form-body">
                        <div class="form-group<?php echo e(($errors->has('name')) ? ' has-error' : ''); ?> last">
                            <label class="col-md-2 control-label"><?php echo e(trans('general.fclbName')); ?>
                                <span aria-required="true" class="required"> * </span>
                            </label>
                            <div class="col-md-7">
                                <input type="text" name="name" class="form-control input-lg">
                                <?php if($errors->has('name')): ?>
                                    <div class="error-text text-danger">
                                        <?php echo e($errors->default->get('name')[0]); ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <div class="form-actions right">
                        <div class="row">
                            <div class="col-md-9">
                                <button type="submit" class="btn green btn-outline sbold uppercase" data-action="collapse-all"><?php echo e(trans('general.fclbCreate')); ?></button>
                            </div>
                        </div>
                    </div>
                 <?php echo Form::close(); ?>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('../nn_cms/index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\projects\fabra.ge\resources\views/nn_cms/pages/nn_menu/create.blade.php ENDPATH**/ ?>