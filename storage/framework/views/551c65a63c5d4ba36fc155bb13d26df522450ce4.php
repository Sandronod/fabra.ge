
<?php $__env->startSection('content'); ?>

    <?php echo $__env->make('nn_site.partials.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <section class="section bg-light pb-4">
        <div class="container">
            <div class="row mt-5 align-items-center">


                <div class="col-lg-12 col-md-12 mt-12 mt-sm-0">
                    <div class="text-md-end text-center">
                        <nav aria-label="breadcrumb" class="d-inline-block">
                            <ul class="breadcrumb mb-0 p-0">
                                <li class="breadcrumb-item"><a href="/">მთავარი</a></li>
                                <li class="breadcrumb-item"><a href="#"><?php echo e($category->lang->name); ?></a></li>
                            </ul>
                        </nav>
                    </div>
                </div><!--end col-->
            </div><!--end row-->
        </div><!--end container-->
    </section>
    <!-- Start -->
    <section class="section">
        <div class="container">
            <div class="row">
                <?php if($category->collection_id == 13 || $category->collection_id == 14): ?>
                    <div class="companies-tabs d-inline-flex align-items-end mb-5">
                        <h2 class="companies-tabs__title">
                            <a href="<?php echo e(fullUrl('momtsodeblebi')); ?>" class="companies-tabs__button text-uppercase<?php echo e($category->collection_id == 13 ? ' companies-tabs__button--active' : ''); ?>">მომწოდებლები</a>
                        </h2>
                        <span>
                            &nbsp;&nbsp;⏺︎&nbsp;&nbsp;
                        </span>
                        <h2 class="companies-tabs__title">
                            <a href="<?php echo e(fullUrl('klientebi')); ?>" class="companies-tabs__button text-uppercase<?php echo e($category->collection_id == 14 ? ' companies-tabs__button--active' : ''); ?>">კლიენტები</a>
                        </h2>
                    </div>
                <?php endif; ?>
                <?php if($category): ?>

                    <?php $__currentLoopData = $collectionList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                        <div class="col-lg-3 col-md-6 mb-4 pb-2 ">
                            <div class="card blog blog-primary shadow rounded overflow-hidden text-center">
                                <div class="image position-relative overflow-hidden">
                                    <img src="<?php echo e($item->lang->imgurl); ?>" class="img-fluid" alt="">
                                </div>
                            </div>
                        </div><!--end col-->
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>

            </div><!--end row-->

            <div class="row">
                <div class="col-12">
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                </div><!--end col-->
            </div><!--end row-->
        </div><!--end container-->
    </section><!--end section-->
    <!-- End -->

<?php $__env->stopSection(); ?>

<?php echo $__env->make('../nn_site/index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\fabra.ge\resources\views/nn_site/pages/collection.blade.php ENDPATH**/ ?>