





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


        <h3 class="page-title"> Translate


        </h3>


        <!-- END PAGE TITLE-->


        <!-- END PAGE HEADER-->


        <a href="<?php echo e(url(getCurrentLocale() . '/manager/collection')); ?>" class="btn green btn-outline sbold uppercase margin-bottom-20"><i class="fa fa-arrow-left"></i> <?php echo e(trans('general.back')); ?></a>


        <!-- END BACK BTN -->


        <div class="portlet light bordered">


            <div class="portlet-body">


                <a href="<?php echo e(url(getCurrentLocale() . '/manager/translate/create')); ?>" class="btn green-seagreen btn-outline sbold uppercase" data-action="collapse-all"><?php echo e(trans('general.cAddNew')); ?></a>

                <a href="<?php echo e(url(getCurrentLocale() . '/manager/translate/generate')); ?>" class="btn btn-icon-only blue sbold uppercase">Save changes&nbsp;&nbsp;<i class="fa fa-save"></i></a>
            </div>


        </div>


        <div class="portlet box green-seagreen">


            <div class="portlet-title">


                <div class="caption">


                    <i class="fa fa-cogs"></i>Translates</div>


                <div class="tools">


                    <a href="javascript:;" class="collapse" data-original-title="" title=""> </a>


                </div>


            </div>


            <div class="portlet-body">


                <div class="table-responsive">


                    <table class="data-table table table-bordered">


                        <thead>


                            <tr>


                                <th> <?php echo e(trans('general.id')); ?> </th>


                                <th> key </th>


                                <th> value </th>


                                <th> <?php echo e(trans('general.dtTools')); ?> </th>


                            </tr>


                        </thead>


                        <tbody>


                            <?php $__currentLoopData = $translate; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>


                            <tr>


                                <td> <?php echo e($item->id); ?> </td>


                                <td> <?php echo e($item->trans_key); ?> </td>


                                <td> <?php echo e($item->name); ?> </td>


                                <td>


                                    <div class="clearfix">


                                        <a href="<?php echo e(url(getCurrentLocale() . '/manager/translate/' . $item->id . '/edit')); ?>" class="btn btn-icon-only blue">


                                            <i class="fa fa-edit"></i>


                                        </a>


                                        <!-- Button trigger modal -->


                                        <a href="javascript:;" class="btn btn-primary red del" data-toggle="modal" data-target="#delete-item" data-element-id="<?php echo e($item->id); ?>" data-delete-url="translate/destroy">


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


                <div class="modal-footer">


                    <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo e(trans('general.no')); ?></button>


                    <button type="button" class="btn btn-danger confirm" data-dismiss="modal"><?php echo e(trans('general.yes')); ?></button>


                </div>


            </div>


        </div>


    </div>


    <?php $__env->startPush('body.bottom'); ?>


        <script src="<?php echo e(url('assets/nn_cms/custom/js/delete-item.js')); ?>" type="text/javascript"></script>


        <!-- END DELETE ITEM -->


    <?php $__env->stopPush(); ?>





<?php $__env->stopSection(); ?>
<?php echo $__env->make('../nn_cms/index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\projects\laravel\fabra.ge\resources\views/nn_cms/pages/nn_translate/index.blade.php ENDPATH**/ ?>