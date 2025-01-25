<?php if($file == "create"): ?>
    <div class="form-group<?php echo e(($errors->has('name')) ? ' has-error' : ''); ?>">
        <label class="control-label col-md-2"><?php echo e(trans('general.fclbName')); ?>

            <span aria-required="true" class="required"> * </span>
        </label>
        <div class="col-md-7">
            <input name="name" data-required="1"  class="form-control input-lg" type="text" value="<?php echo e(Request::old('name')); ?>">
            <?php if($errors->has('name')): ?>
                <div class="error-text text-danger">
                    <?php echo e($errors->default->get('name')[0]); ?>

                </div>
            <?php endif; ?>
        </div>
    </div>
        <div class="form-group<?php echo e(($errors->has('slug')) ? ' has-error' : ''); ?>">
            <label class="control-label col-md-2"><?php echo e(trans('general.fclbSlug')); ?>

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
<?php else: ?>
<div class="form-group">
    <label class="col-md-2 control-label"><?php echo e(trans('general.fclbName')); ?>

        <span aria-required="true" class="required"> * </span>
    </label>
    <div class="col-md-7">
        <input type="text" name="name" class="form-control input-lg" value="<?php echo e($catalog[$i]->name); ?>">
    </div>
</div>

<?php endif; ?>

<?php /**PATH C:\projects\fabra.ge\resources\views/nn_cms/pages/nn_catalog/templates/name.blade.php ENDPATH**/ ?>