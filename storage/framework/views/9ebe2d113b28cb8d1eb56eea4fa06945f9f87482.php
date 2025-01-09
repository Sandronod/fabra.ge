<?php if($file == "create"): ?>
<div class="form-group">
    <label class="control-label col-md-2"><?php echo e(trans('general.fclbPhoto')); ?></label>
    <div class="col-md-3">
        <div class="photo">
            <button type="button" class="btn btn-primary red remove-filemanager-photo">
                <i class="fa fa-close"></i>
            </button>
            <img src="<?php echo e((Request::old('imgurl')) ? Request::old('imgurl') : url('assets/nn_cms/custom/images/default-780x450.png')); ?>" data-default-photo-src="<?php echo e(url('assets/nn_cms/custom/images/default-780x450.png')); ?>" id="showImg"  class="img-responsive img-thumbnail center-block img" alt="catalog photo">
            <input type="hidden" name="imgurl" id="imgurl"  data-required="1" class="form-control" value="<?php echo e(Request::old('imgurl')); ?>">
        </div>
        <button type="button" class="btn green-sharp btn-block sbold uppercase margin-top-10 filemanager-btn" data-lang=""><?php echo e(trans('general.fclbSetPhotoBtn')); ?></button>
    </div>
</div>
<?php else: ?>
<div class="form-group">
    <label class="control-label col-md-2"><?php echo e(trans('general.fclbPhoto')); ?></label>
    <div class="col-md-3">
        <div class="photo">
            <button type="button" class="btn btn-primary red remove-filemanager-photo">
                <i class="fa fa-close"></i>
            </button>
            <img src="<?php echo e((!empty($catalog[$i]->imgurl)) ? $catalog[$i]->imgurl : url('assets/nn_cms/custom/images/default-780x450.png')); ?>" data-default-photo-src="<?php echo e(url('assets/nn_cms/custom/images/default-780x450.png')); ?>" id="showImg_<?php echo e($langs[$i]); ?>" class="img-responsive img-thumbnail center-block img" alt="catalog photo">
            <input type="hidden" name="imgurl" id="imgurl_<?php echo e($langs[$i]); ?>"  data-required="1" class="form-control" value="<?php echo e($catalog[$i]->imgurl); ?>">
        </div>
        <button type="button" class="btn green-sharp btn-block sbold uppercase margin-top-10 filemanager-btn" data-lang="<?php echo e($langs[$i]); ?>"><?php echo e(trans('general.fclbSetPhotoBtn')); ?></button>
    </div>
</div>  
<?php endif; ?><?php /**PATH C:\xampp\htdocs\fabra.ge\resources\views/nn_cms/pages/nn_catalog/templates/imgurl.blade.php ENDPATH**/ ?>