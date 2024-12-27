

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
        <h3 class="page-title"> <?php echo e(trans('general.ptMenu')); ?>
        </h3>
        <!-- END PAGE TITLE-->
        <!-- END PAGE HEADER-->
        <div class="portlet light bordered">
            <div class="portlet-body">
                <a href="<?php echo e(url(getCurrentLocale() . '/manager/menu/create')); ?>" class="btn blue btn-outline sbold uppercase"><?php echo e(trans('general.cAddNew')); ?></a>
            </div>
        </div>
        <div class="portlet box blue">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-coRgs"></i> <?php echo e(trans('general.yourMenus')); ?>  </div>
                <div class="tools">
                    <a href="javascript:;" class="collapse" data-original-title="" title=""> </a>
                </div>
            </div>
            <div class="portlet-body">
                <div class="table-responsive">
                    <table class="data-table table table-bordered">
                        <thead>
                            <tr>
                                <th style="width: 100px;"> <?php echo e(trans('general.primary')); ?> </th>
                                <th> <?php echo e(trans('general.id')); ?> </th>
                                <th> <?php echo e(trans('general.dtName')); ?> </th>
                                <th> <?php echo e(trans('general.dtTools')); ?> </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $menu; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td>
                                    <label class="mt-radio">
                                        <input type="radio" name="primary-menu" data-id="<?php echo e($item->id); ?>" <?php echo e(($item->primary) ? 'checked="checked"' : ''); ?>>
                                        <span></span>
                                    </label>
                                </td>
                                <td> <?php echo $item->id; ?> </td>
                                <td> <?php echo $item->name; ?> </td>
                                <td>
                                    <div class="clearfix">
                                        <a href="<?php echo url(getCurrentLocale() . '/manager/menu/'.$item->id.'/items'); ?>" class="btn btn-icon-only green">
                                            <i class="fa fa fa-th"></i>
                                        </a>
                                        <!-- Button trigger modal -->
                                        <a href="javascript:;" class="btn btn-primary red del" data-toggle="modal" data-target="#delete-item" data-element-id="<?php echo e($item->id); ?>" data-delete-url="menu/destroy" data-item-id="<?php echo e($item->id); ?>" data-item-type="items">
                                            <i class="fa fa-trash"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal (item delete) -->
    <div class="modal fade" id="delete-item" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title"><?php echo e(trans('general.deleteQuestion')); ?></h4>
                </div>
                <div class="modal-body">
                    <?php echo e(trans('general.deleteQuestionC')); ?>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo e(trans('general.no')); ?></button>
                    <button type="button" class="btn btn-danger confirm" data-dismiss="modal"><?php echo e(trans('general.yes')); ?></button>
                </div>
            </div>
        </div>
    </div>

    <?php $__env->startPush('body.bottom'); ?>
        <script src="<?php echo e(url('assets/nn_cms/custom/js/set-primary-menu.js')); ?>" type="text/javascript"></script>
        <!-- END DELETE ITEM -->
        <script src="<?php echo e(url('assets/nn_cms/custom/js/delete-main-item.js')); ?>" type="text/javascript"></script>
        <!-- END DELETE ITEM -->
    <?php $__env->stopPush(); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('../nn_cms/index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/nkarashvili/Documents/laravel/newproj/resources/views/nn_cms/pages/nn_menu/index.blade.php ENDPATH**/ ?>