



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

        <h3 class="page-title"> <?php echo e(trans('general.ptCreateCollection')); ?>


        </h3>

        <!-- END PAGE TITLE-->

        <!-- END PAGE HEADER-->

        <a href="<?php echo e(url(getCurrentLocale() . '/manager/collection')); ?>" class="btn green btn-outline sbold uppercase margin-bottom-20"><i class="fa fa-arrow-left"></i> <?php echo e(trans('general.back')); ?></a>

        <!-- END BACK BTN -->

        <div class="portlet light bordered">

            <div class="portlet-body form">

                <?php echo Form::open(array('url' => getCurrentLocale() . '/manager/collection/store','class' => 'form-horizontal')); ?>


                    <div class="form-body">

                        <div class="form-group<?php echo e(($errors->has('name')) ? ' has-error' : ''); ?>">

                            <label class="col-md-2 control-label"><?php echo e(trans('general.fclbName')); ?>


                                <span aria-required="true" class="required"> * </span>

                            </label>

                            <div class="col-md-7">

                                <input type="text" name="name" class="form-control input-lg" value="<?php echo e(Request::old('name')); ?>">

                                <?php if($errors->has('name')): ?>

                                    <div class="error-text text-danger">

                                        <?php echo e($errors->default->get('name')[0]); ?>


                                    </div>

                                <?php endif; ?>

                            </div>

                        </div>

                        <div class="form-group<?php echo e(($errors->has('type')) ? ' has-error' : ''); ?>">

                            <label class="col-md-2 control-label"><?php echo e(trans('general.fclbType')); ?>


                                <span aria-required="true" class="required"> * </span>

                            </label>

                            <div class="col-md-7">

                                <select name="type" class="form-control input-lg">

                                    <option disabled selected value><?php echo e(trans('general.chooseCollection')); ?></option>
                                    <?php $__currentLoopData = Config::get('collections.collection_types'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($val); ?>" <?php echo e((Request::old($key) == 'article') ? 'selected' : ''); ?>><?php echo e($key); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>

                                <?php if($errors->has('type')): ?>

                                    <div class="error-text text-danger">

                                        <?php echo e($errors->default->get('type')[0]); ?>


                                    </div>

                                <?php endif; ?>

                            </div>

                        </div>

                        <div class="form-group last">

                            <label class="col-md-2 control-label"><?php echo e(trans('general.fclbDesc')); ?></label>

                            <div class="col-md-7">

                                <textarea type="text" name="description" class="form-control input-lg"><?php echo e(Request::old('description')); ?></textarea>

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
<?php echo $__env->make('../nn_cms/index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\fabra.ge\resources\views/nn_cms/pages/nn_collection/create.blade.php ENDPATH**/ ?>