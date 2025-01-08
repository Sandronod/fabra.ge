





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


        <h3 class="page-title"> Subscribers


        </h3>


        <!-- END PAGE TITLE-->


        <!-- END PAGE HEADER-->



        <!-- END BACK BTN -->


        <div class="portlet box blue-seagreen">
            
            <div class="portlet-body">
                <div class="text-right margin-bottom-20">
                    <a href="<?php echo e(fullUrl('manager/subscribers/download')); ?>" class="btn btn-icon-only blue sbold uppercase">Export&nbsp;&nbsp;<i class="fa fa-download"></i></a>
                </div>
                <div class="table-responsive">
                    <table class="data-table table table-bordered">
                        <thead>
                            <tr>
                                <th> <?php echo e(trans('general.id')); ?> </th>
                                <th> email </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $subscribers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td> <?php echo e($item->id); ?> </td>
                                    <td> <?php echo e($item->email); ?> </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('../nn_cms/index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\fabra.ge\resources\views/nn_cms/pages/nn_subscribers/index.blade.php ENDPATH**/ ?>