

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
        <h3 class="page-title"> Site Settings</h3>
        <div class="portlet light bordered">
            <div class="portlet-body form">
                <div class="tab-content">
                    <?php echo Form::open(array('method' => 'PATCH', 'url' => getCurrentLocale().'/manager/site-settings/update', 'id' => 'form_site_setting', 'class' => 'form-horizontal form_ajax')); ?>

                        <div class="form-body">
                            <div class="form-group">
                                <label class="col-md-2 control-label">Email</label>
                                <div class="col-md-7">
                                    <input type="text" name="email" class="form-control input-lg" value="<?php echo e($siteSettings ? $siteSettings->email : ''); ?>">
                                </div>
                            </div>

                            
                            

                            

                            

                            

                            <div class="form-group">
                                <label class="col-md-2 control-label">Mobile</label>
                                <div class="col-md-7">
                                    <input type="text" name="mobile" class="form-control input-lg" value="<?php echo e($siteSettings ? $siteSettings->mobile : ''); ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-2 control-label">Telephone</label>
                                <div class="col-md-7">
                                    <input type="text" name="phone" class="form-control input-lg" value="<?php echo e($siteSettings ? $siteSettings->phone : ''); ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-2 control-label">Address GEO</label>
                                <div class="col-md-7">
                                    <input type="text" name="address_ka" class="form-control input-lg" value="<?php echo e($siteSettings ? $siteSettings->address_ka : ''); ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-2 control-label">Address ENG</label>
                                <div class="col-md-7">
                                    <input type="text" name="address_en" class="form-control input-lg" value="<?php echo e($siteSettings ? $siteSettings->address_en : ''); ?>">
                                </div>
                            </div>
                            
                        
                        <div class="form-group">
                            <label class="col-md-2 control-label">Facebook</label>
                            <div class="col-md-7">
                                <input type="text" name="facebook" class="form-control input-lg" value="<?php echo e($siteSettings ? $siteSettings->facebook : ''); ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2 control-label">Instagram</label>
                            <div class="col-md-7">
                                <input type="text" name="instagram" class="form-control input-lg" value="<?php echo e($siteSettings ? $siteSettings->instagram : ''); ?>">
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="col-md-2 control-label">Linkedin</label>
                            <div class="col-md-7">
                                <input type="text" name="linkedin" class="form-control input-lg" value="<?php echo e($siteSettings ? $siteSettings->linkedin : ''); ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2 control-label">Title GEO</label>
                            <div class="col-md-7">
                                <input type="text" name="title_ka" class="form-control input-lg" value="<?php echo e($siteSettings ? $siteSettings->title_ka : ''); ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2 control-label">Title ENG</label>
                            <div class="col-md-7">
                                <input type="text" name="title_en" class="form-control input-lg" value="<?php echo e($siteSettings ? $siteSettings->title_en : ''); ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2 control-label">Description GEO</label>
                            <div class="col-md-7">
                                <textarea type="text" name="description_ka" class="form-control input-lg"><?php echo e($siteSettings ? $siteSettings->description_ka : ''); ?></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2 control-label">Description ENG</label>
                            <div class="col-md-7">
                                <textarea type="text" name="description_en" class="form-control input-lg"><?php echo e($siteSettings ? $siteSettings->description_en : ''); ?></textarea>
                            </div>
                        </div>
                        <!-- Bank currencies -->
                        <div class="form-group">
                            <label class="col-md-2 control-label">Title (Bank currencies Page) GEO</label>
                            <div class="col-md-7">
                                <input type="text" name="bank_currencies_title_ka" class="form-control input-lg" value="<?php echo e($siteSettings ? $siteSettings->bank_currencies_title_ka : ''); ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2 control-label">Title (Bank currencies Page) ENG</label>
                            <div class="col-md-7">
                                <input type="text" name="bank_currencies_title_en" class="form-control input-lg" value="<?php echo e($siteSettings ? $siteSettings->bank_currencies_title_en : ''); ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2 control-label">Description (Bank currencies Page) GEO</label>
                            <div class="col-md-7">
                                <textarea type="text" name="bank_currencies_description_ka" class="form-control input-lg"><?php echo e($siteSettings ? $siteSettings->bank_currencies_description_ka : ''); ?></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2 control-label">Description (Bank currencies Page) ENG</label>
                            <div class="col-md-7">
                                <textarea type="text" name="bank_currencies_description_en" class="form-control input-lg"><?php echo e($siteSettings ? $siteSettings->bank_currencies_description_en : ''); ?></textarea>
                            </div>
                        </div>
                        <!-- End Bank currencies-->
                        
                        
                        <div class="form-group">
                            <label class="col-md-2 control-label">Tags (head)</label>
                            <div class="col-md-7">
                                <textarea type="text" name="tags_head" class="form-control input-lg"><?php echo e($siteSettings ? $siteSettings->tags_head : ''); ?></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2 control-label">Tags (body)</label>
                            <div class="col-md-7">
                                <textarea type="text" name="tags_body" class="form-control input-lg"><?php echo e($siteSettings ? $siteSettings->tags_body : ''); ?></textarea>
                            </div>
                        </div>

                        <div class="form-actions right">
                            <div class="row">
                                <div class="col-md-9">
                                    <button type="submit" class="btn green-seagreen btn-outline sbold uppercase" data-action="collapse-all" data-update-success-text="<?php echo e(trans('general.updateSuccess')); ?>"><?php echo e(trans('general.fclbUpdate')); ?></button>
                                </div>
                            </div>
                        </div>
                    <?php echo Form::close(); ?>

                </div>
            </div>
        </div>
    </div>

    <?php $__env->startPush('body.bottom'); ?>

        <script src="<?php echo e(url('assets/nn_cms/global/plugins/bootstrap-toastr/toastr.min.js')); ?>" type="text/javascript"></script>
        <script src="<?php echo e(url('assets/nn_cms/custom/js/toastr.js')); ?>" type="text/javascript"></script>

        <!-- END TOASTR SCRIPTS -->

        

        <!-- END UPDATE BY AJAX FORM.JS  -->

        <script src="<?php echo e(url('/vendor/laravel-filemanager/js/stand-alone-button.js')); ?>"></script>
        <script src="<?php echo e(url('assets/nn_cms/custom/js/lfm.js')); ?>" type="text/javascript"></script>
        <script src="<?php echo e(url('assets/nn_cms/custom/js/filemanager-image.js')); ?>" type="text/javascript"></script>

        <!-- END SET IMAGE SCRIPTS -->

    <?php $__env->stopPush(); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('../nn_cms/index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\fabra.ge\resources\views/nn_cms/pages/nn_site_settings/index.blade.php ENDPATH**/ ?>