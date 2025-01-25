





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


        <h3 class="page-title"> Create text of translate


        </h3>


        <!-- END PAGE TITLE-->


        <!-- END PAGE HEADER-->


        <a href="<?php echo e(url(getCurrentLocale() . '/manager/translate')); ?>" class="btn green btn-outline sbold uppercase margin-bottom-20"><i class="fa fa-arrow-left"></i> <?php echo e(trans('general.back')); ?></a>


        <!-- END BACK BTN -->


        <div class="portlet light bordered">


            <div class="portlet-body form">


                <?php echo Form::open(array('url' => getCurrentLocale() . '/manager/translate/store','class' => 'form-horizontal')); ?>



                    <div class="form-body">


                        <div class="form-group<?php echo e(($errors->has('trans_key')) ? ' has-error' : ''); ?>">


                            <label class="control-label col-md-2">Key


                                <span aria-required="true" class="required"> * </span>


                            </label>


                            <div class="col-md-4">


                                <input name="trans_key" data-required="1"  class="form-control input-lg" type="text" value="<?php echo e(Request::old('trans_key')); ?>">


                                <?php if($errors->has('trans_key')): ?>


                                    <div class="error-text text-danger">


                                        <?php echo e($errors->default->get('trans_key')[0]); ?>



                                    </div>


                                <?php endif; ?>


                            </div>


                        </div>


                        <div class="form-group<?php echo e(($errors->has('name')) ? ' has-error' : ''); ?>">


                            <label class="control-label col-md-2">Value


                                <span aria-required="true" class="required"> * </span>


                            </label>


                            <div class="col-md-4">


                                <textarea name="name" class="form-control input-lg"><?php echo e(Request::old('name')); ?></textarea>


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


                                <button type="submit" class="btn green-seagreen btn-outline sbold uppercase" data-action="collapse-all"><?php echo e(trans('general.fclbAdd')); ?></button>


                            </div>


                        </div>


                    </div>


                 <?php echo Form::close(); ?>



            </div>


        </div>


    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('../nn_cms/index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\fabra.ge\resources\views/nn_cms/pages/nn_translate/create.blade.php ENDPATH**/ ?>