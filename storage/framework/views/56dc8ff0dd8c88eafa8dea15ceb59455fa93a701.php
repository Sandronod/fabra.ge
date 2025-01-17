<?php if($file=="create"): ?>
<div class="form-group">
    <label class="col-md-2 control-label"><?php echo e(trans('general.category')); ?></label>
    <div class="col-md-7">
        <select name="category_id" class="form-control input-lg selectpicker" data-live-search="true">
            <option selected="selected" value="0">None</option>
            <?php if(count($category)): ?>
                <?php $__currentLoopData = $category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($item->id); ?>" <?php echo e((Request::old('category_id') == $item->id) ? 'selected' : ''); ?>><?php echo e($item->name); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>
        </select>
    </div>
</div>
<?php else: ?>
<div class="form-group">
    <label class="col-md-2 control-label"><?php echo e(trans('general.category')); ?></label>
    <div class="col-md-7">
        <select name="category_id" class="form-control input-lg common-form-select-control selectpicker" data-live-search="true">
            <option selected="selected" value="0">None</option>
            <?php if(count($category)): ?>
                <?php $__currentLoopData = $category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($item->id); ?>" <?php echo e(($catalog[$i]->category_id == $item->id) ? 'selected' : ''); ?>><?php echo e($item->name); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>
        </select>
    </div>
</div>
<?php endif; ?><?php /**PATH C:\xampp\htdocs\fabra.ge\resources\views/nn_cms/pages/nn_catalog/templates/category.blade.php ENDPATH**/ ?>