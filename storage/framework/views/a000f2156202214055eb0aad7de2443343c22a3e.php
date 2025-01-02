



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

        <h3 class="page-title"><?php echo e(trans('general.ptCreateMenuItem')); ?>


        </h3>

        <!-- END PAGE TITLE-->

        <!-- END PAGE HEADER-->

        <a href="<?php echo e(url(getCurrentLocale() . '/manager/menu/' . $id . '/items')); ?>" class="btn green btn-outline sbold uppercase margin-bottom-20"><i class="fa fa-arrow-left"></i> <?php echo e(trans('general.back')); ?></a>

        <!-- END BACK BTN -->

        <div class="portlet light bordered">

            <div class="portlet-body form">

                <?php echo Form::open(array('url' => getCurrentLocale() . '/manager/menu/' . $id . '/items/store', 'class' => 'form-horizontal menuitem-form')); ?>


                    <input type="hidden" name="menu_id" value="<?php echo e($id); ?>" class="form-control input-lg">

                    <input type="hidden" name="parent_id" value="<?php echo e(empty(Request::get('id')) ? 0 : Request::get('id')); ?>" class="form-control input-lg">

                    <div class="form-body">

                        <div class="form-group">

                            <label class="col-md-2 control-label"><?php echo e(trans('general.fclbType')); ?>


                                <span aria-required="true" class="required hide"> * </span>

                            </label>

                            <div class="col-md-4">

                                <select name="type" class="form-control input-lg">

                                    <option value="text" <?php echo e((Request::old('type') == 'text') ? 'selected' : ''); ?>><?php echo e(trans('general.textPage')); ?></option>

                                    <option value="collection"<?php echo e((Request::old('type') == 'collection') ? 'selected' : ''); ?>><?php echo e(trans('general.collection')); ?></option>

                                    <option value="contact"<?php echo e((Request::old('type') == 'contact') ? 'selected' : ''); ?>><?php echo e(trans('general.contactPage')); ?></option>

                                    <option value="link"<?php echo e((Request::old('type') == 'link') ? 'selected' : ''); ?>><?php echo e(trans('general.link')); ?></option>
                                    <option value="category"<?php echo e((Request::old('type') == 'category') ? 'selected' : ''); ?>>category</option>

                                </select>

                            </div>

                            <div class="col-md-3<?php echo e(($errors->has('collection_id')) ? ' has-error' : ''); ?>">
                                <select name="collection_id" class="form-control input-lg hide">
                                    <option selected="selected" class="hide" value="0"><?php echo e(trans('general.selectCollectionItem')); ?></option>
                                    <?php if(count($collections)): ?>
                                    <optgroup label="<?php echo e(trans('general.collectionsList')); ?>">
                                    <?php else: ?>
                                    <optgroup label="<?php echo e(trans('general.collectionsListEmpty')); ?>">
                                    <?php endif; ?>
                                    <?php $__currentLoopData = $collections; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php if($item->name != ''): ?>
                                        <option value="<?php echo e($item->collection_id); ?>" <?php echo e((Request::old('collection_id') == $item->id) ? 'selected' : ''); ?> class="cio-collection-item"><?php echo e($item->name); ?></option>

                                        <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </optgroup>

                                </select>
                                <select name="category_id" class="form-control input-lg hide">
                                    <option selected="selected" class="hide" value="0">select category</option>
                                    <?php if(count($category)): ?>
                                        <optgroup label="category">
                                    <?php else: ?>
                                        <optgroup label="category">
                                            <?php endif; ?>
                                            <?php $__currentLoopData = $category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php if($item->name != ''): ?>
                                                    <option value="<?php echo e($item->category_id); ?>" <?php echo e((Request::old('category_id') == $item->id) ? 'selected' : ''); ?> class="cio-collection-item"><?php echo e($item->name); ?></option>

                                                <?php endif; ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </optgroup>
                                </select>

                                <?php if($errors->has('category_id')): ?>

                                    <div class="error-text text-danger">

                                        <?php echo e($errors->default->get('category_id')[0]); ?>


                                    </div>

                                <?php endif; ?>

                            </div>

                        </div>

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

                        <div class="form-group show-for-tc<?php echo e(($errors->has('slug')) ? ' has-error' : ''); ?>">

                            <label class="col-md-2 control-label"><?php echo e(trans('general.fclbSlug')); ?>


                                <span aria-required="true" class="required"> * </span>

                            </label>

                            <div class="col-md-7">

                                <input type="text" name="slug" class="form-control input-lg" value="<?php echo e(Request::old('slug')); ?>">

                                <?php if($errors->has('slug')): ?>

                                    <div class="error-text text-danger">

                                        <?php echo e($errors->default->get('slug')[0]); ?>


                                    </div>

                                <?php endif; ?>

                            </div>

                        </div>

                        <div class="form-group<?php echo e(($errors->has('link')) ? ' has-error' : ''); ?> show-for-link">

                            <label class="col-md-2 control-label"><?php echo e(trans('general.fclbLink')); ?></label>

                            <div class="col-md-7">

                                <input type="text" name="link" class="form-control input-lg" value="<?php echo e(Request::old('url')); ?>">

                                <?php if($errors->has('link')): ?>

                                    <div class="error-text text-danger">

                                        <?php echo e($errors->default->get('link')[0]); ?>


                                    </div>

                                <?php endif; ?>

                            </div>

                        </div>

                        <div class="form-group show-for-tc">

                            <label class="control-label col-md-2"><?php echo e(trans('general.fclbPhoto')); ?></label>

                            <div class="col-md-3">

                                <div class="photo">

                                    <button type="button" class="btn btn-primary red remove-filemanager-photo">

                                        <i class="fa fa-close"></i>

                                    </button>

                                    <img src="<?php echo e((Request::old('imgurl')) ? Request::old('imgurl') : url('assets/nn_cms/custom/images/default-780x450.png')); ?>" data-default-photo-src="<?php echo e(url('assets/nn_cms/custom/images/default-780x450.png')); ?>" id="showImg" class="img-responsive img-thumbnail center-block img" alt="article photo">

                                    <input type="hidden" name="imgurl" id="imgurl"  data-required="1" class="form-control" value="<?php echo e(Request::old('imgurl')); ?>">

                                </div>

                                <button type="button" class="btn green-sharp btn-block sbold uppercase margin-top-10 filemanager-btn" data-lang=""><?php echo e(trans('general.fclbSetPhotoBtn')); ?></button>

                            </div>

                        </div>

                        <div class="form-group<?php echo e(($errors->has('body')) ? ' has-error' : ''); ?> show-for-tc">

                            <label class="control-label col-md-2"><?php echo e(trans('general.fclbBody')); ?></label>

                            <div class="col-md-7">

                                <script src="<?php echo e(url('assets/nn_cms/global/plugins/ckeditor/ckeditor.js')); ?>" type="text/javascript"></script>

                                <textarea id="body_editor" class="ckeditor form-control" name="body" rows="6" data-error-container="#editor2_error"><?php echo e(Request::old('body')); ?></textarea>

                                <script>

                                    publicurl = "";

                                    CKEDITOR.replace("body_editor", {



                                        filebrowserImageBrowseUrl: '<?php echo e(asset("filemanager?type=Images")); ?>',



                                        filebrowserImageUploadUrl: '<?php echo e(asset("filemanager/upload?type=Images&_token=")); ?><?php echo e(csrf_token()); ?>',



                                        filebrowserBrowseUrl: '<?php echo e(asset("filemanager?type=Files")); ?>',



                                        filebrowserUploadUrl: '<?php echo e(asset("filemanager/upload?type=Files&_token=")); ?><?php echo e(csrf_token()); ?>'



                                    });

                                </script>

                                <div id="editor2_error"></div>

                                <?php if($errors->has('body')): ?>

                                    <div class="error-text text-danger">

                                        <?php echo e($errors->default->get('body')[0]); ?>


                                    </div>

                                <?php endif; ?>

                            </div>

                        </div>

                        <div class="form-group last">

                            <label class="col-md-2 control-label"><?php echo e(trans('general.fclbDesc')); ?></label>

                            <div class="col-md-7">

                                <textarea type="text" name="description" class="form-control"><?php echo e(Request::old('description')); ?></textarea>

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

        <script src="<?php echo e(url('assets/nn_cms/custom/js/menuitem-form-controls.js')); ?>" type="text/javascript"></script>

        <!-- END MENUITEM FORM-CONTROLS -->

        <script src="<?php echo e(url('assets/nn_cms/custom/js/slugify-form-control-name.js')); ?>" type="text/javascript"></script>

        <!-- END SLUGIFY FORM-CONTROL NAME -->

        <script src="<?php echo e(url('/vendor/laravel-filemanager/js/stand-alone-button.js')); ?>"></script>
        <script src="<?php echo e(url('assets/nn_cms/custom/js/lfm.js')); ?>" type="text/javascript"></script>
        <script src="<?php echo e(url('assets/nn_cms/custom/js/filemanager-image.js')); ?>" type="text/javascript"></script>

        <!-- END SET IMAGE SCRIPTS -->

    <?php $__env->stopPush(); ?>



<?php $__env->stopSection(); ?>

<?php echo $__env->make('../nn_cms/index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\projects\laravel\fabra.ge\resources\views/nn_cms/pages/nn_menuitems/create.blade.php ENDPATH**/ ?>