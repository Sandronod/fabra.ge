



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

        <h3 class="page-title"><?php echo e(trans('general.ptEditMenuItem')); ?>


        </h3>

        <!-- END PAGE TITLE-->

        <!-- END PAGE HEADER-->

        <a href="<?php echo e(url(getCurrentLocale() . '/manager/menu/' . $id . '/items')); ?>" class="btn green btn-outline sbold uppercase margin-bottom-20"><i class="fa fa-arrow-left"></i> <?php echo e(trans('general.back')); ?></a>
        <a href="<?php echo e(fullUrl('manager/menu/' . $id . '/items/create')); ?>" class="btn blue btn-outline sbold uppercase margin-bottom-20" data-action="collapse-all"><i class="fa fa-plus"></i> Add new</a>

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

                        <ul class="nav nav-tabs pull-right">

                            <li>

                                <a href="<?php echo e(url(getCurrentLocale() . '/manager/menu/' . $id . '/items/' . $item_id . '/file')); ?>"><i class="fa fa-paperclip"></i> <?php echo e(trans('general.attachFiles')); ?></a>

                            </li>

                            <li>

                                <a href="<?php echo e(url(getCurrentLocale() . '/manager/menu/' . $id . '/items/' . $item_id . '/image')); ?>"><i class="fa fa-file-image-o"></i> <?php echo e(trans('general.attachImages')); ?></a>

                            </li>

                        </ul>

                    </div>



                    <div class="tab-content">



                         <?php for($i = 0; $i < count($langs); $i++): ?>



                            <div id="tab_<?php echo e($i); ?>" class="tab-pane <?php if($langs[$i] == getCurrentLocale()): ?> <?php echo e('active'); ?> <?php endif; ?>">

                                <?php echo Form::open(array('method' => 'PATCH' , 'url' => getCurrentLocale() . '/manager/menu/' . $id . '/items/' . $item_id . '/update', 'id' => 'form_' . $langs[$i], 'class' => 'form-horizontal menuitem-form form_ajax')); ?>


                                    <input type="hidden" name="menu_item_id_lang" value="<?php echo e($itemArr[$langs[$i]]->id); ?>" class="form-control input-lg">

                                    <input type="hidden" name="menu_item_id" value="<?php echo e($itemArr[$langs[$i]]->nn_menu_item_id); ?>" class="form-control input-lg">

                                    <div class="form-body">

                                        <div class="form-group">

                                            <label class="col-md-2 control-label"><?php echo e(trans('general.fclbType')); ?>


                                                <span aria-required="true" class="required hide"> * </span>

                                            </label>

                                            <div class="col-md-4">

                                                <select name="type" class="form-control input-lg">

                                                    <option value="text" <?php if($type == 'text'): ?> selected="<?php echo e('selected'); ?>" <?php endif; ?>><?php echo e(trans('general.textPage')); ?></option>

                                                    <option value="collection" <?php if($type == 'collection'): ?> selected="<?php echo e('selected'); ?>" <?php endif; ?>><?php echo e(trans('general.collection')); ?></option>

                                                     <option value="contact" <?php if($type == 'contact'): ?> selected="<?php echo e('selected'); ?>" <?php endif; ?>><?php echo e(trans('general.contactPage')); ?></option>

                                                    <option value="link" <?php if($type == 'link'): ?> selected="<?php echo e('selected'); ?>" <?php endif; ?>><?php echo e(trans('general.link')); ?></option>
                                                    <option value="category" <?php if($type == 'category'): ?> selected="<?php echo e('selected'); ?>" <?php endif; ?>>category</option>

                                                </select>

                                            </div>

                                            <div class="col-md-3">

                                                <select name="collection_id" class="form-control input-lg hide">

                                                    <option selected="selected" class="hide" value="0"><?php echo e(trans('general.selectCollectionItem')); ?></option>

                                                    <?php if(count($collections)): ?>
                                                    <optgroup label="<?php echo e(trans('general.collectionsList')); ?>">
                                                    <?php else: ?>
                                                    <optgroup label="<?php echo e(trans('general.collectionsListEmpty')); ?>">
                                                    <?php endif; ?>
                                                    <?php $__currentLoopData = $collections; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $collection): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <?php if($collection->name != ''): ?>
                                                        <option value="<?php echo e($collection->collection_id); ?>" <?php if($collection->collection_id == $collection_id): ?> selected="selected" <?php endif; ?> class="cio-collection-item" ><?php echo e($collection->name); ?></option>
                                                        <?php endif; ?>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </optgroup>

                                                </select>
                                                <select name="category_id" class="form-control input-lg hide">

                                                    <option selected="selected" class="hide" value="0">select category</option>

                                                    <?php if(count($categories)): ?>
                                                        <optgroup label="category">
                                                    <?php else: ?>
                                                        <optgroup label="category">
                                                            <?php endif; ?>
                                                            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <?php if($category->name != ''): ?>
                                                                    <option value="<?php echo e($category->category_id); ?>" <?php if($category->category_id == $category_id): ?> selected="selected" <?php endif; ?> class="cio-collection-item" ><?php echo e($category->name); ?></option>
                                                                <?php endif; ?>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        </optgroup>

                                                </select>

                                            </div>

                                        </div>

                                        <div class="form-group">

                                            <label class="col-md-2 control-label"><?php echo e(trans('general.fclbName')); ?>


                                                <span aria-required="true" class="required"> * </span>

                                            </label>

                                            <div class="col-md-7">

                                                <input type="text" name="name" class="form-control input-lg" value="<?php echo e($itemArr[$langs[$i]]->name); ?>">

                                            </div>

                                        </div>

                                        <div class="form-group show-for-link">

                                            <label class="col-md-2 control-label"><?php echo e(trans('general.fclbLink')); ?></label>

                                            <div class="col-md-7">

                                                <input type="text" name="link" class="form-control input-lg" value="<?php echo e($itemArr[$langs[$i]]->link); ?>">

                                            </div>

                                        </div>

                                        <div class="form-group show-for-tc">

                                            <label class="control-label col-md-2"><?php echo e(trans('general.fclbPhoto')); ?></label>

                                            <div class="col-md-3">

                                                <div class="photo">

                                                    <button type="button" class="btn btn-primary red remove-filemanager-photo">

                                                        <i class="fa fa-close"></i>

                                                    </button>

                                                    <img src="<?php echo e((!empty($itemArr[$langs[$i]]->imgurl)) ? $itemArr[$langs[$i]]->imgurl : url('assets/nn_cms/custom/images/default-780x450.png')); ?>" data-default-photo-src="<?php echo e(url('assets/nn_cms/custom/images/default-780x450.png')); ?>" id="showImg_<?php echo e($langs[$i]); ?>"  class="img-responsive img-thumbnail center-block img" alt="article photo">

                                                    <input type="hidden" name="imgurl" id="imgurl_<?php echo e($langs[$i]); ?>"  data-required="1" class="form-control" value="<?php echo e($itemArr[$langs[$i]]->imgurl); ?>">

                                                </div>

                                                <button type="button" class="btn green-sharp btn-block sbold uppercase margin-top-10 filemanager-btn" data-lang="<?php echo e($langs[$i]); ?>"><?php echo e(trans('general.fclbSetPhotoBtn')); ?></button>

                                            </div>

                                        </div>

                                        <div class="form-group show-for-tc">

                                            <label class="control-label col-md-2"><?php echo e(trans('general.fclbBody')); ?></label>

                                            <div class="col-md-7">

                                                <script src="<?php echo e(url('assets/nn_cms/global/plugins/ckeditor/ckeditor.js')); ?>" type="text/javascript"></script>

                                                <textarea id="body_editor_<?php echo e($langs[$i]); ?>" class="ckeditor form-control" name="body" rows="6" data-error-container="#editor1_error"><?php echo e($itemArr[$langs[$i]]->body); ?></textarea>

                                                <script>

                                                    CKEDITOR.replace("body_editor_<?php echo e($langs[$i]); ?>", {



                                                        filebrowserImageBrowseUrl: '<?php echo e(asset("filemanager?type=Images")); ?>',



                                                        filebrowserImageUploadUrl: '<?php echo e(asset("filemanager?type=Image&_token=")); ?><?php echo e(csrf_token()); ?>',



                                                        filebrowserBrowseUrl: '<?php echo e(asset("manager/laravel-filemanager?type=Files")); ?>',



                                                        filebrowserUploadUrl: '<?php echo e(asset("manager/laravel-filemanager/upload?type=Files&_token=")); ?><?php echo e(csrf_token()); ?>'



                                                    });

                                                </script>

                                                <div id="editor1_error"></div>

                                            </div>

                                        </div>

                                        <div class="form-group last">

                                            <label class="col-md-2 control-label"><?php echo e(trans('general.fclbDesc')); ?></label>

                                            <div class="col-md-7">

                                                <textarea type="text" name="description" class="form-control"><?php echo e($itemArr[$langs[$i]]->description); ?></textarea>

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



    <!-- Modal Add New Collection -->

    <div class="modal fade" id="add-new-collection" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">

        <div class="modal-dialog" role="document">

            <div class="modal-content">

                <?php echo Form::open(array('url' => getCurrentLocale() . '/manager/collection/store', 'files'=>true, 'class' => 'form')); ?>


                    <div class="modal-header">

                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

                        <h4 class="modal-title" id="myModalLabel"><?php echo e(trans('general.ptCreateCollection')); ?></h4>

                    </div>

                    <div class="modal-body">

                        <input name="gallery_id" value="" type="hidden">

                        <div class="form-group">

                            <label for="fc-name"><?php echo e(trans('general.fclbName')); ?></label>

                            <input type="text" name="name" class="form-control input-lg" value="<?php echo e(Request::old('name')); ?>">

                            <input type="hidden" name="returnUrl" class="form-control input-lg" value="<?php echo e(getCurrentLocale()); ?>/manager/menu/<?php echo e($id); ?>/items/edit/<?php echo e($item_id); ?>">

                        </div>

                        <div class="form-group">

                            <label for="fc-description"><?php echo e(trans('general.fclbType')); ?></label>

                            <select name="type" class="form-control input-lg">

                                <option disabled selected value><?php echo e(trans('general.customUrl')); ?></option>

                                <option value="article" <?php echo e((Request::old('type') == 'article') ? 'selected' : ''); ?>><?php echo e(trans('general.fcsArticle')); ?></option>

                                <option value="gallery" <?php echo e((Request::old('type') == 'gallery') ? 'selected' : ''); ?>><?php echo e(trans('general.fcsGallery')); ?></option>

                            </select>

                        </div>

                        <div class="form-group">

                            <label for="fc-description"><?php echo e(trans('general.fclbDesc')); ?></label>

                            <textarea name="description" id="fc-description" class="form-control input-lg"><?php echo e(Request::old('description')); ?></textarea>

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



    <?php $__env->startPush('body.bottom'); ?>

        <script src="<?php echo e(url('assets/nn_cms/custom/js/menuitem-form-controls.js')); ?>" type="text/javascript"></script>

        <!-- END MENUITEM FORM-CONTROLS -->

        <script src="<?php echo e(url('assets/nn_cms/global/plugins/bootstrap-toastr/toastr.min.js')); ?>" type="text/javascript"></script>

        <script src="<?php echo e(url('assets/nn_cms/custom/js/toastr.js')); ?>" type="text/javascript"></script>

        <!-- END TOASTR SCRIPTS -->

        <script src="<?php echo e(url('assets/nn_cms/custom/js/form.js')); ?>" type="text/javascript"></script>

        <!-- END UPDATE BY AJAX FORM.JS  -->

        <script src="<?php echo e(url('assets/nn_cms/custom/js/filemanager-image.js')); ?>" type="text/javascript"></script>
        <script src="<?php echo e(url('vendor/laravel-filemanager/js/stand-alone-button.js')); ?>"></script>
        <script src="<?php echo e(url('assets/nn_cms/custom/js/lfm.js')); ?>" type="text/javascript"></script>

        <!-- END SET IMAGE SCRIPTS -->

    <?php $__env->stopPush(); ?>



<?php $__env->stopSection(); ?>

<?php echo $__env->make('../nn_cms/index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\fabra.ge\resources\views/nn_cms/pages/nn_menuitems/edit.blade.php ENDPATH**/ ?>