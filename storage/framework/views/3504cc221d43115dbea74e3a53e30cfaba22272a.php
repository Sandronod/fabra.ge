
<?php $__env->startSection('content'); ?>

    <?php echo $__env->make('nn_site.partials.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <section class="section bg-light pb-4">
        <div class="container">
            <div class="row mt-5 align-items-center">
                <div class="col-lg-12 col-md-12 mt-12 mt-sm-0">
                    <div class="text-md-end text-center">
                        <nav aria-label="breadcrumb" class="d-inline-block">
                            <ul class="breadcrumb mb-0 p-0">
                                <li class="breadcrumb-item"><a href="<?php echo e(fullUrl('')); ?>"><?php echo e($lang->main); ?></a></li>
                                <li class="breadcrumb-item"><a href="javascript:void(0)"><?php echo e($category->lang->name); ?></a></li>
                            </ul>
                        </nav>
                    </div>
                </div><!--end col-->
            </div><!--end row-->
        </div><!--end container-->
    </section>


    <section class="section pt-4 pb-5">
        <div class="container">
            <div class="row align-items-center">
                <?php if($category->lang->imgurl != ''): ?>
                <div class="col-lg-5 col-md-6">
                    <img src="<?php echo e($category->lang->imgurl); ?>" style="max-height:500px; max-width:500px;"  class="img-fluid rounded shadow" alt="">
                </div><!--end col-->
                <div class="col-lg-7 col-md-6 mt-4 pt-2 mt-sm-0 pt-sm-0">
                    <div class="section-title ms-lg-5">
                        
                        <p class="text-muted"> <?php echo $category->lang->body; ?></p>
                    </div>
                </div><!--end col-->
                <?php else: ?>
                    <div class="col-lg-12">
                        <div class="section-title">
                            
                            <p class="text-muted"> <?php echo $category->lang->body; ?></p>
                        </div>
                    </div><!--end col-->
                <?php endif; ?>

            </div><!--end row-->
        </div>
        
    </section>



<?php $__env->stopSection(); ?>

<?php echo $__env->make('../nn_site/index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\projects\fabra.ge\resources\views/nn_site/pages/text.blade.php ENDPATH**/ ?>