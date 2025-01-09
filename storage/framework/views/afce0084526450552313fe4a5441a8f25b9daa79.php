<?php if($file=="create"): ?>
<div class="form-group">
    <label class="control-label col-md-2">embed code</label>
    <div class="col-md-7">
        <textarea name="embed" class="form-control input-lg"><?php echo e(Request::old('embed')); ?></textarea>
    </div>
</div>
<?php else: ?>
<div class="form-group">
    <label class="col-md-2 control-label">embed code</label>
    <div class="col-md-7">
        <textarea type="text" name="embed" class="form-control input-lg"><?php echo e($catalog[$i]->embed); ?></textarea>
    </div>
</div>
<?php endif; ?><?php /**PATH C:\xampp\htdocs\fabra.ge\resources\views/nn_cms/pages/nn_catalog/templates/embed.blade.php ENDPATH**/ ?>