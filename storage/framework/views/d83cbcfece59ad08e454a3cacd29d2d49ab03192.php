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

        <h3 class="page-title"> <?php echo e(trans('general.ptSlider')); ?>


        </h3>

        <!-- END PAGE TITLE-->

        <!-- END PAGE HEADER-->

        <div class="portlet light bordered">

            <div class="portlet-body clearfix">

                <!-- Need Here BTN !!! -->

                <ul class="list-inline pull-left">

                    <li>

                        <a href="#" class="btn blue btn-outline sbold uppercase add-new-photo" data-toggle="modal" data-target="#add-slider-item"><?php echo e(trans('general.cAddNew')); ?></a>

                    </li>

                </ul>

                <ul class="list-inline pull-right">

                    <li>

                        <label for="" class="control-label"><?php echo e(trans('general.sort')); ?></label>

                        <input type="checkbox" class="make-switch sort-switch-box" data-on-color="primary" data-off-color="default" data-size="small">

                    </li>

                    <li>

                        <label class="mt-checkbox mt-checkbox-outline">

                            <input type="checkbox" class="check-all"> <?php echo e(trans('general.checkAll')); ?>


                            <span></span>

                        </label>

                    </li>

                    <li>

                        <a href="#" class="btn red btn-outline sbold uppercase delete-all" data-toggle="modal" data-target="#delete-all"> <?php echo e(trans('general.delete')); ?> </a>

                    </li>

                    <li>

                        <a href="#" class="btn blue-soft btn-outline sbold uppercase save-changes" rel="tooltip" data-placement="top" title="<?php echo e(trans('general.cSave')); ?>" data-update-success-text="<?php echo e(trans('general.updateSuccess')); ?>" data-update-error-text="<?php echo e(trans('general.updateError')); ?>"><i class="fa fa-save fa-lg" aria-hidden="true"></i></a>

                    </li>

                </ul>

            </div>

        </div>

        <div class="row ui-sortable" id="sortable">

            <?php $__currentLoopData = $sliderItem; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

            <div class="col-md-4 col-lg-5ths ui-state-default" data-id="<?php echo e($item->id); ?>">

                <div class="draggable-box">

                    <div class="draggable-box-title ui-sortable-handle">

                        <div class="caption font-blue-sharp">

                            <span class="caption-subject bold uppercase"><?php echo e($item->name); ?></span>

                            <span class="caption-helper"><?php echo e($item->description); ?></span>

                        </div>

                        <div class="actions">

                            <a href="#edit-slider-item" class="btn blue-sharp btn-circle btn-sm edit" rel="tooltip" data-placement="top" title="<?php echo e(trans('general.edit')); ?>" data-toggle="modal" data-target="#edit-slider-item">

                                <i class="fa fa-pencil"></i></a>

                            <a href="#delete-item" class="btn btn-circle btn-default btn-sm del" rel="tooltip" data-placement="top" title="<?php echo e(trans('general.delete')); ?>" data-toggle="modal">

                                <i class="fa fa-remove"></i></a>

                        </div>

                    </div>

                    <div class="draggable-box-body">

                        <img src="<?php echo e($item->imgurl); ?>" width="600" height="600" class="img-responsive center-block">

                    </div>

                </div>

            </div>

            <!-- /Sortable item END -->

            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>



        </div>

    </div>



    <!-- Modal Add slider Item -->

    <div class="modal fade" id="add-slider-item" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">

        <div class="modal-dialog" role="document">

            <div class="modal-content">

                <?php echo Form::open(array('url' => getCurrentLocale() . '/manager/slider/store', 'files' => true, 'class' => 'form')); ?>


                    <div class="modal-header">

                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

                        <h4 class="modal-title"><?php echo e(trans('general.galleryAddTitle')); ?></h4>

                    </div>

                    <div class="modal-body">

                        <div class="form-group">

                            <label for="fc-name"><?php echo e(trans('general.fclbName')); ?></label>

                            <input type="text" name="name" id="fc-name" class="form-control">

                        </div>

                        <div class="form-group">

                            <label for="fc-description"><?php echo e(trans('general.fclbDesc')); ?></label>

                            <textarea name="description" id="fc-description" class="form-control"></textarea>

                        </div>

                        <div class="form-group">

                            <label for="imgurl"><?php echo e(trans('general.fclbFile')); ?></label>

                            <img src="<?php echo e(url('assets/nn_cms/custom/images/default-780x450.png')); ?>" id="showImg"  class="img-responsive img-thumbnail center-block" alt="gallery-item photo">

                            <input type="hidden" id="imgurl" name="imgurl" data-required="1" class="form-control" value="">

                            <button type="button" class="btn green-sharp btn-block sbold uppercase margin-top-10 filemanager-btn" data-lang=""><?php echo e(trans('general.fclbSetPhotoBtn')); ?></button>

                        </div>

                        <div class="row">

                            <div class="col-md-6">

                                <div class="form-group">

                                    <label for="fc-link_name"><?php echo e(trans('general.fclbLinkName')); ?></label>

                                    <input type="text" name="link_name" id="fc-link_name" class="form-control">

                                </div>

                            </div>

                            <div class="col-md-6">

                                <div class="form-group">

                                    <label for="fc-link"><?php echo e(trans('general.fclbLink')); ?></label>

                                    <input type="text" name="link" id="fc-link" class="form-control">

                                </div>

                            </div>

                        </div>

                    </div>

                    <div class="modal-footer">

                        <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo e(trans('general.fclbClose')); ?></button>

                        <button type="submit" class="btn btn-primary"><?php echo e(trans('general.fclbAdd')); ?></button>

                    </div>

                <?php echo Form::close(); ?>


            </div>

        </div>

    </div>



    <!-- Modal Edit Gallery Item -->

    <div class="modal fade" id="edit-slider-item" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">

        <div class="modal-dialog" role="document">

            <div class="modal-content">



                <div class="modal-header">

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

                    <h4 class="modal-title"><?php echo e(trans('general.galleryUpdateTitle')); ?></h4>

                </div>



                <div class="portlet light">

                    <div class="portlet-body form">



                        <div class="tabbable-line">



                            <?php $langs = array_keys(LaravelLocalization::getSupportedLocales()); ?>



                            <ul class="nav nav-tabs ">



                                <?php for($i = 0; $i < count($langs); $i++): ?>



                                    <?php $item = LaravelLocalization::getSupportedLocales()[$langs[$i]]; ?>



                                    <li class="<?php if($langs[$i] == getCurrentLocale()): ?> <?php echo e('active'); ?> <?php endif; ?>">

                                        <a href="#tab_<?php echo e($i); ?>" data-toggle="tab" aria-expanded="false"><?php echo e($item['name']); ?></a>

                                    </li>



                                <?php endfor; ?>



                            </ul>



                            <div class="tab-content">



                                <?php for($i = 0; $i < count($langs); $i++): ?>



                                    <div id="tab_<?php echo e($i); ?>" class="tab-pane <?php if($langs[$i] == getCurrentLocale()): ?> <?php echo e('active'); ?> <?php endif; ?>">



                                        <?php echo Form::open(array('url' => getCurrentLocale() . '/manager/slider/update', 'files'=>true, 'class' => 'form')); ?>


                                            <div class="modal-body">

                                                <input name="id" id="fc-id_<?php echo e($langs[$i]); ?>" value="" type="hidden">

                                                <input name="lang" value="<?php echo e($langs[$i]); ?>" type="hidden">

                                                <div class="form-group">

                                                    <label for="fc-name_<?php echo e($langs[$i]); ?>"><?php echo e(trans('general.fclbName')); ?></label>

                                                    <input type="text" name="name" id="fc-name_<?php echo e($langs[$i]); ?>" class="form-control">

                                                </div>

                                                <div class="form-group">

                                                    <label for="fc-description_<?php echo e($langs[$i]); ?>"><?php echo e(trans('general.fclbDesc')); ?></label>

                                                    <textarea name="description" id="fc-description_<?php echo e($langs[$i]); ?>" class="form-control"></textarea>

                                                </div>

                                                <div class="form-group">

                                                    <label for="imgurl_<?php echo e($langs[$i]); ?>"><?php echo e(trans('general.fclbFile')); ?></label>

                                                    <img src="<?php echo e(url('assets/nn_cms/custom/images/default-780x450.png')); ?>" id="showImg_<?php echo e($langs[$i]); ?>"  class="img-responsive img-thumbnail center-block" alt="slider photo">

                                                    <input type="hidden" id="imgurl_<?php echo e($langs[$i]); ?>" name="imgurl" data-required="1" class="form-control" value="">

                                                    <button type="button" class="btn green-sharp btn-block sbold uppercase margin-top-10 filemanager-btn" data-lang="<?php echo e($langs[$i]); ?>"><?php echo e(trans('general.fclbSetPhotoBtn')); ?></button>

                                                </div>

                                                <div class="row">

                                                    <div class="col-md-6">

                                                        <div class="form-group">

                                                            <label for="fc-link_name_1_<?php echo e($langs[$i]); ?>"><?php echo e(trans('general.fclbLinkName')); ?> 1</label>

                                                            <input type="text" name="link_name_1" id="fc-link_name_1_<?php echo e($langs[$i]); ?>" class="form-control">

                                                        </div>

                                                    </div>

                                                    <div class="col-md-6">

                                                        <div class="form-group">

                                                            <label for="fc-link_1_<?php echo e($langs[$i]); ?>"><?php echo e(trans('general.fclbLink')); ?> 1</label>

                                                            <input type="text" name="link_1" id="fc-link_1_<?php echo e($langs[$i]); ?>" class="form-control">

                                                        </div>

                                                    </div>

                                                </div>

                                                <div class="row">

                                                    <div class="col-md-6">

                                                        <div class="form-group">

                                                            <label for="fc-link_name_2_<?php echo e($langs[$i]); ?>"><?php echo e(trans('general.fclbLinkName')); ?> 2</label>

                                                            <input type="text" name="link_name_2" id="fc-link_name_2_<?php echo e($langs[$i]); ?>" class="form-control">

                                                        </div>

                                                    </div>

                                                    <div class="col-md-6">

                                                        <div class="form-group">

                                                            <label for="fc-link_2_<?php echo e($langs[$i]); ?>"><?php echo e(trans('general.fclbLink')); ?> 2</label>

                                                            <input type="text" name="link_2" id="fc-link_2_<?php echo e($langs[$i]); ?>" class="form-control">

                                                        </div>

                                                    </div>

                                                </div>

                                            </div>

                                            <div class="modal-footer">

                                                <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo e(trans('general.fclbClose')); ?></button>

                                                <button type="submit" class="btn btn-primary"><?php echo e(trans('general.fclbUpdate')); ?></button>

                                            </div>

                                        <?php echo Form::close(); ?>




                                    </div>



                                <?php endfor; ?>



                            </div>



                        </div>



                    </div>

                </div>



            </div>

        </div>

    </div>



    <!-- Modal (item delete) -->

    <div class="modal fade" id="delete-item" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">

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



    <!-- Modal Delete All Gallery Items -->

    <div class="modal fade" id="delete-all" tabindex="-1" role="dialog">

        <div class="modal-dialog" role="document">

            <div class="modal-content">

                <div class="modal-header">

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

                    <h4 class="modal-title"><?php echo e(trans('general.deleteQuestion')); ?></h4>

                </div>

                <div class="modal-footer">

                    <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo e(trans('general.no')); ?></button>

                    <button type="button" class="btn btn-danger confirm-delete-all" data-dismiss="modal"><?php echo e(trans('general.yes')); ?></button>

                </div>

            </div>

        </div>

    </div>



    <?php $__env->startPush('body.bottom'); ?>

        <script src="<?php echo e(url('/vendor/laravel-filemanager/js/stand-alone-button.js')); ?>"></script>
        <script src="<?php echo e(url('assets/nn_cms/custom/js/lfm.js')); ?>" type="text/javascript"></script>
        <script src="<?php echo e(url('assets/nn_cms/custom/js/filemanager-image.js')); ?>" type="text/javascript"></script>

        <!-- END SET IMAGE SCRIPTS -->

        <script src="<?php echo e(url('assets/nn_cms/global/plugins/jquery-ui/jquery-ui.min.js')); ?>" type="text/javascript"></script>

        <!-- END JQUERY UI SCRIPT -->

        <script src="<?php echo e(url('assets/nn_cms/custom/js/active-tooltip.js')); ?>" type="text/javascript"></script>

        <!-- END ACTIVE TOOLTIP -->

        <script src="<?php echo e(url('assets/nn_cms/custom/js/slider-edit-delete.js')); ?>" type="text/javascript"></script>

        <script src="<?php echo e(url('assets/nn_cms/custom/js/slider-actions.js')); ?>" type="text/javascript"></script>

        <!-- END GAlLERY SCRIPTS -->

        <script src="<?php echo e(url('assets/nn_cms/global/plugins/bootstrap-toastr/toastr.min.js')); ?>" type="text/javascript"></script>

        <script src="<?php echo e(url('assets/nn_cms/custom/js/toastr.js')); ?>" type="text/javascript"></script>

        <!-- END TOASTR SCRIPTS -->

    <?php $__env->stopPush(); ?>



<?php $__env->stopSection(); ?>
<?php echo $__env->make('../nn_cms/index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/nkarashvili/Documents/laravel/newproj/resources/views/nn_cms/pages/nn_slider/index.blade.php ENDPATH**/ ?>