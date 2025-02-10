<?php if($file == "create"): ?>
<div class="form-group">
    <label class="control-label col-md-2">Video</label>
    <div class="col-md-7">
        <textarea name="videoUrl" class="form-control input-lg"><?php echo e(Request::old('videoUrl')); ?></textarea>
    </div>
</div>
<?php else: ?>
<div class="form-group">
    <label class="col-md-2 control-label">Video</label>
    <div class="col-md-7">
        <textarea type="text" name="videoUrl" class="form-control input-lg"><?php echo e($catalog[$i]->videoUrl); ?></textarea>
    </div>
</div>
<?php endif; ?><?php /**PATH C:\projects\fabra.ge\resources\views/nn_cms/pages/nn_catalog/templates/videoUrl.blade.php ENDPATH**/ ?>