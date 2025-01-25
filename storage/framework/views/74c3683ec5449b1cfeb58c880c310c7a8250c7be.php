





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


        <h3 class="page-title"> Edit text of translate


        </h3>


        <!-- END PAGE TITLE-->


        <!-- END PAGE HEADER-->


        <a href="<?php echo e(url(getCurrentLocale() . '/manager/translate')); ?>" class="btn green btn-outline sbold uppercase margin-bottom-20" data-action="collapse-all"><i class="fa fa-arrow-left"></i> <?php echo e(trans('general.back')); ?></a>
        <a href="<?php echo e(url(getCurrentLocale() . '/manager/translate/create')); ?>" class="btn blue btn-outline sbold uppercase margin-bottom-20 "  data-action="collapse-all"><i class="fa fa-plus"></i> Add new</a>


        <!-- END BACK BTN -->


        <div class="portlet light bordered">


            <div class="portlet-body form">





                <div class="tabbable-line">





                    <?php $langs = array_keys(LaravelLocalization::getSupportedLocales()); ?>


                    <div class="clearfix">


                        <ul class="nav nav-tabs pull-left">





                            <?php for($i = 0; $i < count($langs); $i++): ?>





                                <?php $item = LaravelLocalization::getSupportedLocales()[$langs[$i]]; ?>





                                <li class="<?php if($langs[$i] == getCurrentLocale()): ?> <?php echo e('active'); ?> <?php endif; ?>">


                                    <a href="#tab_<?php echo e($i); ?>" data-toggle="tab" aria-expanded="false"><?php echo e($item['name']); ?></a>


                                </li>





                            <?php endfor; ?>





                        </ul>


                    </div>





                    <div class="tab-content">





                        <?php for($i = 0; $i < count($langs); $i++): ?>

		



                            <div id="tab_<?php echo e($i); ?>" class="tab-pane <?php if($langs[$i] == getCurrentLocale()): ?> <?php echo e('active'); ?> <?php endif; ?>">





                                <?php echo Form::open(array('method' => 'PATCH', 'url' => getCurrentLocale().'/manager/translate/update', 'id' => 'form_' . $langs[$i], 'class' => 'form-horizontal form_ajax')); ?>






                                    <div class="form-body">


                                        <input type="hidden" name="lang" value="<?php echo e($langs[$i]); ?>">


                                        <input type="hidden" name="id" value="<?php echo e($translate[$i]->id); ?>">


                                        <div class="form-group">


                                            <label class="col-md-2 control-label">Key


                                                <span aria-required="true" class="required"> * </span>


                                            </label>


                                            <div class="col-md-7">


                                                <input type="text" name="name" class="form-control input-lg" value="<?php echo e($translate[$i]->trans_key); ?>" disabled>


                                            </div>


                                        </div>


                                        <div class="form-group last">


                                            <label class="col-md-2 control-label">Value


                                                <span aria-required="true" class="required"> * </span>

                                            </label>


                                            <div class="col-md-7">


                                                <textarea type="text" name="name" class="form-control input-lg"><?php echo e($translate[$i]->name); ?></textarea>


                                            </div>


                                        </div>


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





    <?php $__env->startPush('body.bottom'); ?>


        <script src="<?php echo e(url('assets/nn_cms/global/plugins/bootstrap-toastr/toastr.min.js')); ?>" type="text/javascript"></script>


        <script src="<?php echo e(url('assets/nn_cms/custom/js/toastr.js')); ?>" type="text/javascript"></script>


        <!-- END TOASTR SCRIPTS -->


        <script src="<?php echo e(url('assets/nn_cms/custom/js/form.js')); ?>" type="text/javascript"></script>


        <!-- END UPDATE BY AJAX FORM.JS  -->


    <?php $__env->stopPush(); ?>





<?php $__env->stopSection(); ?>
<?php echo $__env->make('../nn_cms/index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\fabra.ge\resources\views/nn_cms/pages/nn_translate/edit.blade.php ENDPATH**/ ?>