
<?php $__env->startSection('content'); ?>
    <div class="page-content">
        <div class="page-bar">
            <ul class="page-breadcrumb">
                <li>
                    <a href="<?php echo e(url(getCurrentLocale() . '/manager')); ?>"><?php echo e(trans('general.bcHome')); ?></a>
                    <i class="fa fa-circle"></i>
                  </li>
            </ul>
        </div>
        <h3 class="page-title"> Collection / catalog / create
        </h3>

        <a href="<?php echo e(url(getCurrentLocale() . '/manager/collection/' . $collection->id . '/catalog')); ?>" class="btn green btn-outline sbold uppercase margin-bottom-20"><i class="fa fa-arrow-left"></i> <?php echo e(trans('general.back')); ?></a>


        <div class="portlet light bordered">

            <div class="portlet-body form">
                <?php echo Form::open(array('url' => getCurrentLocale() . '/manager/collection/catalog/store','class' => 'form-horizontal')); ?>


                    <div class="form-body">
                        <input name="collection_id" value="<?php echo e($collection->id); ?>" type="hidden">
                    
                       <?php $__currentLoopData = $typeitems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php echo $__env->make('nn_cms.pages.nn_catalog.templates.'.$item,["file"=>"create"], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                       <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                    <div class="form-actions right">
                        <div class="row">
                            <div class="col-md-9">
                                <button type="submit" class="btn green-seagreen btn-outline sbold uppercase" data-action="collapse-all"><?php echo e(trans('general.fclbAdd')); ?></button>
                            </div>
                        </div>
                    </div>
                 <?php echo Form::close(); ?>

            </div>
        </div>
    </div>
    <?php $__env->startPush('head'); ?>
        <link href="<?php echo e(url('assets/nn_cms/global/plugins/bootstrap-select-1.12.4/css/bootstrap-select.min.css')); ?>" rel="stylesheet" type="text/css" />

    <?php $__env->stopPush(); ?>
    <?php $__env->startPush('body.bottom'); ?>
        <script src="<?php echo e(url('assets/nn_cms/global/plugins/bootstrap-select-1.12.4/js/bootstrap-select.min.js')); ?>" type="text/javascript"></script>
        <script src="<?php echo e(url('assets/nn_cms/custom/js/slugify-form-control-name.js')); ?>" type="text/javascript"></script>

        <script src="<?php echo e(url('/vendor/laravel-filemanager/js/stand-alone-button.js')); ?>"></script>
        <script src="<?php echo e(url('assets/nn_cms/custom/js/lfm.js')); ?>" type="text/javascript"></script>
        <script src="<?php echo e(url('assets/nn_cms/custom/js/filemanager-image.js')); ?>" type="text/javascript"></script>
    <?php $__env->stopPush(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('../nn_cms/index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\projects\fabra.ge\resources\views/nn_cms/pages/nn_catalog/create.blade.php ENDPATH**/ ?>