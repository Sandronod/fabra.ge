<div class="currency-input" curr-code="GEL">
    <div class="currency-picker dropdown">
        <button>
            <div>
                <img src="/assets/images/flags/ge.svg" alt="ge" />
                gel
            </div>
        </button>
    </div>
    <input type="number" curr-code="GEL" id="header-converter-input-GEL" curr-rate = "1" data-quantity="1" class="inputeelementrates"  onkeyup="changeRates(this,1)" placeholder="0" min="0">
</div>

    <?php $__currentLoopData = $currs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$curr): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    
            <div class="currency-input" curr-code="<?php echo e($curr->code); ?>" <?php echo e((!in_array($curr->code, $defaults))?'style=display:none':""); ?> value="">
                <div class="currency-picker dropdown">
                    <button>
                        <div>
                            <img src="/assets/images/flags/<?php echo e(strtolower($curr->code)); ?>.svg" alt="<?php echo e($curr->code); ?>">
                            <?php echo e($curr->code); ?>

                        </div>
                    </button>
                </div>
                <input type="number" onkeyup="changeRates(this,1)" curr-code="<?php echo e($curr->code); ?>" data-quantity="<?php echo e($curr->quantity); ?>" class="inputeelementrates" id="header-converter-input-<?php echo e($curr->code); ?>" curr-rate = "<?php echo e($curr->rate); ?>" placeholder="0" min="0">
            </div>
      
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php /**PATH /Users/nkarashvili/Documents/laravel/newproj/resources/views/nn_site/partials/headerconverter.blade.php ENDPATH**/ ?>