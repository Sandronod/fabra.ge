



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

        <h3 class="page-title"> <?php echo e(trans('general.ptFile')); ?>


        </h3>

        <!-- END PAGE TITLE-->

        <!-- END PAGE HEADER-->

        <a href="<?php echo e(url(getCurrentLocale() . '/manager/' . $type . '/' . $main_id . '/' . $route_name . '/' . $route_id . '/edit')); ?>" class="btn green btn-outline sbold uppercase margin-bottom-20" data-action="collapse-all"><i class="fa fa-arrow-left"></i> <?php echo e(trans('general.back')); ?></a>

        <!-- END BACK BTN -->

        <div class="portlet light bordered">

            <div class="portlet-body clearfix">

                <!-- Need Here BTN !!! -->

                <ul class="list-inline pull-left">

                    <li>

                        <a href="#add-file" class="btn blue btn-outline sbold uppercase add-new-file" data-toggle="modal" data-target="#add-file"><?php echo e(trans('general.cAddNew')); ?></a>

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

        <div class="portlet light bordered">

            <div class="portlet-body form">



                <div class="tabbable-line">



                    <?php $langs = array_keys(LaravelLocalization::getSupportedLocales()); ?>



                    <div class="clearfix">

                        <ul class="nav nav-tabs pull-left">



                            <?php for($i = 0; $i < count($langs); $i++): ?>



                                <?php $item = LaravelLocalization::getSupportedLocales()[$langs[$i]]; ?>



                                <li>

                                    

                                    <a href="<?php echo e(url($langs[$i] . '/manager/' . $type . '/' . $main_id . '/' . $route_name . '/' . $route_id . '/edit')); ?>"><?php echo e($item['name']); ?></a>



                                </li>



                            <?php endfor; ?>



                        </ul>

                        <ul class="nav nav-tabs pull-right">

                            <li class="active">

                                <a nohref=""><i class="fa fa-paperclip"></i> <?php echo e(trans('general.attachFiles')); ?></a>

                            </li>

                            <li>

                                <a href="<?php echo e(url(getCurrentLocale() . '/manager/' . $type . '/' . $main_id . '/' . $route_name . '/' . $route_id . '/image')); ?>"><i class="fa fa-file-image-o"></i> <?php echo e(trans('general.attachImages')); ?></a>

                            </li>

                        </ul>

                    </div>



                    <div class="tab-content">



                        <div class="row ui-sortable" id="sortable" data-route_name="<?php echo e($route_name); ?>" data-route_id="<?php echo e($route_id); ?>">



                            <?php $__currentLoopData = $fileItem; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                            <div class="col-md-4 col-lg-5ths ui-state-default" data-id="<?php echo e($item->id); ?>">

                                <div class="draggable-box">

                                    <div class="draggable-box-title ui-sortable-handle">

                                        <div class="caption font-blue-sharp">

                                            <span class="caption-subject bold uppercase"><?php echo e($item->name); ?></span>

                                            <span class="caption-helper"><?php echo e($item->description); ?></span>

                                        </div>

                                        <div class="actions">

                                            <a href="#edit-file" class="btn blue-sharp btn-circle btn-sm edit" rel="tooltip" data-placement="top" title="<?php echo e(trans('general.edit')); ?>" data-toggle="modal" data-target="#edit-file">

                                                <i class="fa fa-pencil"></i></a>

                                            <a href="#delete-item" class="btn btn-circle btn-default btn-sm del" rel="tooltip" data-placement="top" title="<?php echo e(trans('general.delete')); ?>" data-toggle="modal">

                                                <i class="fa fa-remove"></i></a>

                                        </div>

                                    </div>

                                    <div class="draggable-box-body">

                                        <img src="<?php echo e(url('assets/nn_cms/custom/images/' . pathinfo($item->fileurl, PATHINFO_EXTENSION) . '')); ?>.png" width="128" height="128" class="img-responsive center-block" alt="<?php echo e(pathinfo($item->fileurl, PATHINFO_EXTENSION)); ?>">

                                    </div>

                                </div>

                            </div>

                            <!-- /Sortable item END -->

                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>



                        </div>



                    </div>



                </div>



            </div>

        </div>

    </div>



    <!-- Modal Add File -->

    <div class="modal fade" id="add-file" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">

        <div class="modal-dialog" role="document">

            <div class="modal-content">

                <?php echo Form::open(array('url' => getCurrentLocale() . '/manager/collectin/' . $main_id . '/' . $route_name . '/' . $route_id . '/file/store', 'files' => true, 'class' => 'form')); ?>


                    <div class="modal-header">

                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

                        <h4 class="modal-title" id="myModalLabel"><?php echo e(trans('general.galleryAddTitle')); ?></h4>

                    </div>

                    <div class="modal-body">

                        <input name="main_id" value="<?php echo e($main_id); ?>" type="hidden">

                        <input name="route_name" value="<?php echo e($route_name); ?>" type="hidden">

                        <input name="route_id" value="<?php echo e($route_id); ?>" type="hidden">

                        <div class="form-group">

                            <label for="fc-name"><?php echo e(trans('general.fclbName')); ?></label>

                            <input type="text" name="name" id="fc-name" class="form-control">

                        </div>

                        <div class="form-group">

                            <label for="fc-description"><?php echo e(trans('general.fclbDesc')); ?></label>

                            <textarea name="description" id="fc-description" class="form-control"></textarea>

                        </div>

                        <div class="form-group">

                            <label for="fileurl"><?php echo e(trans('general.fclbFile')); ?></label>

                            <input type="text" id="fileurl" name="fileurl" data-required="1" class="form-control" value="" readonly="readonly">

                            <button type="button" class="btn green-sharp btn-block sbold uppercase margin-top-10 filemanager-btn" data-lang=""><?php echo e(trans('general.fclbAddFile')); ?></button>

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



    <!-- Modal Edit File -->

    <div class="modal fade" id="edit-file" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">

        <div class="modal-dialog" role="document">

            <div class="modal-content">



                <div class="modal-header">

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

                    <h4 class="modal-title" id="myModalLabel"><?php echo e(trans('general.galleryUpdateTitle')); ?></h4>

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



                                        <?php echo Form::open(array('url' => getCurrentLocale() . '/manager/collectin/' . $main_id . '/' . $route_name . '/' . $route_id . '/file/update', 'files' => true, 'class' => 'form')); ?>


                                            <div class="modal-body">

                                                <input name="id" id="fc-id_<?php echo e($langs[$i]); ?>" type="hidden">

                                                <div class="form-group">

                                                    <label for="fc-name_<?php echo e($langs[$i]); ?>"><?php echo e(trans('general.fclbName')); ?></label>

                                                    <input type="text" name="name" id="fc-name_<?php echo e($langs[$i]); ?>" class="form-control">

                                                </div>

                                                <div class="form-group">

                                                    <label for="fc-description_<?php echo e($langs[$i]); ?>"><?php echo e(trans('general.fclbDesc')); ?></label>

                                                    <textarea name="description" id="fc-description_<?php echo e($langs[$i]); ?>" class="form-control"></textarea>

                                                </div>

                                                <div class="form-group">

                                                    <label for="fileurl_<?php echo e($langs[$i]); ?>"><?php echo e(trans('general.fclbFile')); ?></label>

                                                    <input type="text" id="fileurl_<?php echo e($langs[$i]); ?>" name="fileurl" data-required="1" class="form-control">

                                                    <button type="button" class="btn green-sharp btn-block sbold uppercase margin-top-10 filemanager-btn" data-lang="<?php echo e($langs[$i]); ?>"><?php echo e(trans('general.fclbAddFile')); ?></button>

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

                    <h4 class="modal-title" id="myModalLabel"><?php echo e(trans('general.deleteQuestion')); ?></h4>

                </div>

                <div class="modal-footer">

                    <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo e(trans('general.no')); ?></button>

                    <button type="button" class="btn btn-danger confirm" data-dismiss="modal"><?php echo e(trans('general.yes')); ?></button>

                </div>

            </div>

        </div>

    </div>



    <!-- Modal Delete All Files -->

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

    <script src="<?php echo e(url('assets/nn_cms/custom/js/filemanager-file.js')); ?>" type="text/javascript"></script>
        <script src="<?php echo e(url('vendor/laravel-filemanager/js/stand-alone-button.js')); ?>"></script>
        <script src="<?php echo e(url('assets/nn_cms/custom/js/lfm.js')); ?>" type="text/javascript"></script>
        
       

        <!-- END SET IMAGE SCRIPTS -->

        <script src="<?php echo e(url('assets/nn_cms/global/plugins/jquery-ui/jquery-ui.min.js')); ?>" type="text/javascript"></script>

        <!-- END JQUERY UI SCRIPT -->

        <script src="<?php echo e(url('assets/nn_cms/custom/js/active-tooltip.js')); ?>" type="text/javascript"></script>

        <!-- END ACTIVE TOOLTIP -->

        <script src="<?php echo e(url('assets/nn_cms/custom/js/file-edit-delete.js')); ?>" type="text/javascript"></script>

        <script src="<?php echo e(url('assets/nn_cms/custom/js/file-actions.js')); ?>" type="text/javascript"></script>

        <!-- END FILE SCRIPTS -->

        <script src="<?php echo e(url('assets/nn_cms/global/plugins/bootstrap-toastr/toastr.min.js')); ?>" type="text/javascript"></script>

        <script src="<?php echo e(url('assets/nn_cms/custom/js/toastr.js')); ?>" type="text/javascript"></script>

        <!-- END TOASTR SCRIPTS -->

    <?php $__env->stopPush(); ?>



<?php $__env->stopSection(); ?>
<?php echo $__env->make('../nn_cms/index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\fabra.ge\resources\views/nn_cms/pages/nn_file/index.blade.php ENDPATH**/ ?>