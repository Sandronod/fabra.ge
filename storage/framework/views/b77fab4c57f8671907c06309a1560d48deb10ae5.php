<?php if($file=="create"): ?>
<div class="form-group">
    <label class="control-label col-md-2"><?php echo e(trans('general.fclbDesc')); ?></label>
    <div class="col-md-7">
        <textarea name="description" class="form-control input-lg"><?php echo e(Request::old('description')); ?></textarea>
    </div>
</div>
<?php else: ?>
<div class="form-group">
    <label class="col-md-2 control-label"><?php echo e(trans('general.fclbDesc')); ?></label>
    <div class="col-md-7">
        <textarea type="text" name="description" class="form-control input-lg"><?php echo e($catalog[$i]->description); ?></textarea>
  </div>
</div>
<?php endif; ?><?php /**PATH /Users/nkarashvili/Documents/laravel/newproj/resources/views/nn_cms/pages/nn_catalog/templates/description.blade.php ENDPATH**/ ?>