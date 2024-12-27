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

        <h3 class="page-title"> ასაკობრივი კატეგორიის შექმნა

        </h3>

        <!-- END PAGE TITLE-->

        <!-- END PAGE HEADER-->

        <a href="<?php echo e(url(getCurrentLocale() . '/manager/thematic_category')); ?>" class="btn green btn-outline sbold uppercase margin-bottom-20"><i class="fa fa-arrow-left"></i> <?php echo e(trans('general.back')); ?></a>

        <!-- END BACK BTN -->

        <div class="portlet light bordered">

            <div class="portlet-body form">

                <?php echo Form::open(array('url' => getCurrentLocale() . '/manager/thematic_category/store','class' => 'form-horizontal')); ?>


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

                        <div class="form-group">

                            <label class="col-md-2 control-label"><?php echo e(trans('general.fclbDesc')); ?></label>

                            <div class="col-md-7">

                                <textarea type="text" name="description" class="form-control input-lg"><?php echo e(Request::old('description')); ?></textarea>

                            </div>

                        </div>

                        <div class="form-group last">

                            <label class="control-label col-md-2"><?php echo e(trans('general.fclbPhoto')); ?></label>

                            <div class="col-md-3">

                                <div class="photo">

                                    <button type="button" class="btn btn-primary red remove-filemanager-photo">

                                        <i class="fa fa-close"></i>

                                    </button>

                                    <img src="<?php echo e((Request::old('imgurl')) ? Request::old('imgurl') : url('assets/nn_cms/custom/images/default-780x450.png')); ?>" data-default-photo-src="<?php echo e(url('assets/nn_cms/custom/images/default-780x450.png')); ?>" id="showImg"  class="img-responsive img-thumbnail center-block img" alt="catalog photo">

                                    <input type="hidden" name="imgurl" id="imgurl"  data-required="1" class="form-control" value="<?php echo e(Request::old('imgurl')); ?>">

                                </div>

                                <button type="button" class="btn green-sharp btn-block sbold uppercase margin-top-10 filemanager-btn" data-lang=""><?php echo e(trans('general.fclbSetPhotoBtn')); ?></button>

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



    <?php $__env->startPush('body.bottom'); ?>

        <script src="<?php echo e(url('vendor/laravel-filemanager/js/lfm.js')); ?>" type="text/javascript"></script>

        <script src="<?php echo e(url('assets/nn_cms/custom/js/filemanager-image.js')); ?>" type="text/javascript"></script>

        <!-- END SET IMAGE SCRIPTS -->

    <?php $__env->stopPush(); ?>



<?php $__env->stopSection(); ?>
<?php echo $__env->make('../nn_cms/index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/nkarashvili/Documents/laravel/newproj/resources/views/nn_cms/pages/nn_thematic_category/create.blade.php ENDPATH**/ ?>