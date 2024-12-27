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

        <h3 class="page-title"> Collection / catalog / edit
        </h3>
        <a href="<?php echo e(url(getCurrentLocale() . '/manager/collection/' . $collectionId . '/catalog')); ?>" class="btn green btn-outline sbold uppercase margin-bottom-20"><i class="fa fa-arrow-left"></i> <?php echo e(trans('general.back')); ?></a>
        <a href="<?php echo e(fullUrl('manager/collection/' . $collectionId . '/catalog/create')); ?>" class="btn blue btn-outline sbold uppercase margin-bottom-20 " data-action="collapse-all"><i class="fa fa-plus"></i> Add new</a>
        <div class="portlet light bordered">
            <div class="portlet-body form">
                <div class="tabbable-line">
                    <?php 
                        $langs = array_keys(LaravelLocalization::getSupportedLocales());
                         
                    ?>
                    <div class="clearfix">
                        <ul class="nav nav-tabs pull-left">


                            <?php for($i = 0; $i < count($langs); $i++): ?>

                            <?php $item = LaravelLocalization::getSupportedLocales()[$langs[$i]]; ?>
                                <li class="<?php if($langs[$i] == getCurrentLocale()): ?> <?php echo e('active'); ?> <?php endif; ?>">
                                    <a href="#tab_<?php echo e($i); ?>" data-toggle="tab" aria-expanded="false"><?php echo e($item['name']); ?></a>
                                </li>

                            <?php endfor; ?>

                        </ul>

                        <ul class="nav nav-tabs pull-right">
                            <li>
                                <a href="<?php echo e(url(getCurrentLocale() . '/manager/collection/' . $collectionId . '/catalog/' . $catalogId . '/file')); ?>"><i class="fa fa-paperclip"></i> <?php echo e(trans('general.attachFiles')); ?></a>

                            </li>
                            <li>
                                <a href="<?php echo e(url(getCurrentLocale() . '/manager/collection/' . $collectionId . '/catalog/' . $catalogId . '/image')); ?>"><i class="fa fa-file-image-o"></i> <?php echo e(trans('general.attachImages')); ?></a>
                            </li>

                        </ul>
                    </div>
                    <div class="tab-content">
                        <?php for($i = 0; $i < count($langs); $i++): ?>

                            <div id="tab_<?php echo e($i); ?>" class="tab-pane <?php if($langs[$i] == getCurrentLocale()): ?> <?php echo e('active'); ?> <?php endif; ?>">

                                <?php echo Form::open(array('method' => 'PATCH', 'url' => getCurrentLocale().'/manager/collection/' . $catalog[$i]->id . '/catalog/update', 'id' => 'form_' . $langs[$i], 'class' => 'form-horizontal form_ajax')); ?>

                                    <div class="form-body">
                                        <input type="hidden" name="lang" value="<?php echo e($langs[$i]); ?>">
                                        <input type="hidden" name="id" value="<?php echo e($catalog[$i]->id); ?>">
                                        <input type="hidden" name="lang_id" value="<?php echo e($catalog[$i]->lang_id); ?>">
                                    <?php $__currentLoopData = $typeitems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php echo $__env->make('nn_cms.pages.nn_catalog.templates.'.$item,["file"=>"edit",
                                        "langs"=>$langs, "catalog"=>$catalog, "i"=>$i
                                        
                                        ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                   <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </div>
                                    <div class="form-actions right">
                                        <div class="row">
                                            <div class="col-md-9">
                                                <button type="submit" class="btn green-seagreen btn-outline sbold uppercase" data-action="collapse-all" data-lang="<?php echo e($langs[$i]); ?>" data-update-success-text="<?php echo e(trans('general.updateSuccess')); ?>" data-update-error-fill-in-text="<?php echo e(trans('general.updateErrorFillIn')); ?>"><?php echo e(trans('general.fclbUpdate')); ?></button>
                                            </div>
                                        </div>
                                    </div>

                                <?php echo Form::close(); ?>

                            </div>

                        <?php endfor; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php $__env->startPush('head'); ?>
        <link href="<?php echo e(url('assets/nn_cms/global/plugins/bootstrap-select-1.12.4/css/bootstrap-select.min.css')); ?>" rel="stylesheet" type="text/css" />
    <?php $__env->stopPush(); ?>

    <?php $__env->startPush('body.bottom'); ?>
        <script src="<?php echo e(url('assets/nn_cms/global/plugins/bootstrap-select-1.12.4/js/bootstrap-select.min.js')); ?>" type="text/javascript"></script>
        <script src="<?php echo e(url('assets/nn_cms/custom/js/common-form-control.js')); ?>" type="text/javascript"></script>

        <script src="<?php echo e(url('assets/nn_cms/custom/js/common-form-select-control.js')); ?>" type="text/javascript"></script>
        <script src="<?php echo e(url('assets/nn_cms/custom/js/filemanager-image.js')); ?>" type="text/javascript"></script>
        <script src="<?php echo e(url('vendor/laravel-filemanager/js/stand-alone-button.js')); ?>"></script>
        <script src="<?php echo e(url('assets/nn_cms/custom/js/lfm.js')); ?>" type="text/javascript"></script>
        <script src="<?php echo e(url('assets/nn_cms/global/plugins/bootstrap-toastr/toastr.min.js')); ?>" type="text/javascript"></script>
        <script src="<?php echo e(url('assets/nn_cms/custom/js/toastr.js')); ?>" type="text/javascript"></script>

        <script src="<?php echo e(url('assets/nn_cms/custom/js/form.js')); ?>" type="text/javascript"></script>

    <?php $__env->stopPush(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('../nn_cms/index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/nkarashvili/Documents/laravel/newproj/resources/views/nn_cms/pages/nn_catalog/edit.blade.php ENDPATH**/ ?>