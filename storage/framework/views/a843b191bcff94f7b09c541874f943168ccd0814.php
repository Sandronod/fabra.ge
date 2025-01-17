 <?php if($file == "create"): ?>
 <div class="form-group<?php echo e(($errors->has('body')) ? ' has-error' : ''); ?>">
    <label class="control-label col-md-2"><?php echo e(trans('general.fclbBody')); ?></label>
    <div class="col-md-7">
        <script src="<?php echo e(url('assets/nn_cms/global/plugins/ckeditor/ckeditor.js')); ?>" type="text/javascript"></script>
        <textarea id="body_editor" class="ckeditor form-control" name="body" rows="6" data-error-container="#editor2_error"><?php echo e(Request::old('body')); ?></textarea>
        <script>
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
 
     
 <?php else: ?>
     
 <div class="form-group">
    <label class="col-md-2 control-label"><?php echo e(trans('general.fclbBody')); ?></label>
    <div class="col-md-7">
        <script src="<?php echo e(url('assets/nn_cms/global/plugins/ckeditor/ckeditor.js')); ?>" type="text/javascript"></script>
        <textarea id="body_editor_<?php echo e($langs[$i]); ?>" class="ckeditor form-control" name="body" rows="6" data-error-container="#editor1_error"><?php echo e($catalog[$i]->body); ?></textarea>
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
 <?php endif; ?><?php /**PATH C:\xampp\htdocs\fabra.ge\resources\views/nn_cms/pages/nn_catalog/templates/body.blade.php ENDPATH**/ ?>