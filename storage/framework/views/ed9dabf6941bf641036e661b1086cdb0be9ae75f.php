
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
                                <li class="breadcrumb-item"><a href="<?php echo e(fullUrl('list/'.$menuItem->parentItem->slug.'/'.$menuItem->slug)); ?> "><?php echo e($menuItem->lang->name); ?></a></li>
                                <li class="breadcrumb-item"><a href="javascript:void(0)"><?php echo e($detail->lang->name); ?></a></li>
                            </ul>
                        </nav>
                    </div>
                </div><!--end col-->
            </div><!--end row-->
        </div><!--end container-->
    </section>

<!-- Start Description -->
<section class="section pb-0">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-5 col-md-6">

                    <div class="row">
                        <div class="col-12">
                            <div class="tiny-single-item1 product-details">
                                <div class="tiny-slide">
                                    <img src="<?php echo e($detail->lang->imgurl); ?>" class="img-fluid " alt="">
                                </div>

                                <?php if($detail->lang->embed): ?>
                                    <div class="tiny-slide">
                                        <?php echo $detail->lang->embed; ?>

                                    </div>
                                <?php endif; ?>
                            </div>
                        </div><!--end col-->
                    </div><!--end row-->


            </div><!--end col-->

            <div class="col-lg-7 col-md-6 mt-4 pt-2 mt-sm-0 pt-sm-0">
                <div class="section-title ms-lg-5">
                    <h4 class="title mb-3"><?php echo e($detail->lang->name); ?></h4>
                    <p class="text-muted">

                        <?php echo $detail->lang->body; ?>

                        <?php if($detail->files->count() > 0): ?>
                            <?php $__currentLoopData = $detail->files; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $file): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <a href="<?php echo e($file->lang->fileurl); ?>" target="_blank" class="btn btn-primary mt-2" ><?php echo e($file->lang->name); ?></a>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                    </p>
                </div>
            </div><!--end col-->
        </div><!--end row-->
    </div>
</section>
    <?php if($detail->lang->embed != ''): ?>


            <div class="container pt-2">
                <div class="row justify-content-center">
                    <div class="col-12">
                        <div class="section-title">
                            <h4 class="title mb-3"></h4>
                        </div>
                    </div><!--end col-->
                </div><!--end row-->

                <div class="row">

                    <div class="col-lg-12 col-md-6 mb-4 pb-2">
                        <?php echo $detail->lang->embed; ?>

                    </div>

                </div><!--end row-->
            </div><!--end container-->

    <?php endif; ?>
<?php if($detail->images->count() > 0): ?>
    <section class="section pt-4">
        <div class="container">
            <div class="container mt-5 mb-5">
                <div class="row">
                    <div class="col-12">
                        <span class="divider-main divider"></span>
                    </div><!--end col-->
                </div><!--end row-->
            </div><!--end container-->

            <div class="container mt-30 mt-20">
                <div class="row justify-content-center">
                    <div class="col-12">
                        <div class="section-title">
                            <h4 class="title mb-5">ფოტოები</h4>
                        </div>
                    </div><!--end col-->
                </div><!--end row-->

            <div id="grid" class="row">

                <?php $__currentLoopData = $detail->images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $img): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                    <div class="col-md-3 col-12 spacing picture-item" data-groups='["branding"]'>
                        <div class="card portfolio portfolio-classic portfolio-primary rounded overflow-hidden">
                            <div class="card-img position-relative">
                                <img src="<?php echo e($img->lang->imgurl); ?>" class="img-fluid" alt="" width="100%" style="object-fit:cover; max-height: 120px;">
                                <div class="card-overlay"></div>

                                <div class="pop-icon">
                                    <a href="<?php echo e($img->lang->imgurl); ?>" class="btn btn-pills btn-icon lightbox"><i class="uil uil-search"></i></a>
                                </div>
                            </div>
                        </div>
                    </div><!--end col-->
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            </div><!--end row-->
        </div><!--end container-->
        </div>
    </section>

<?php endif; ?>
    <?php if(isset($relatedItems) && count($relatedItems) > 0): ?>
        <section class="section pt-4">
        <div class="container mt-5 mb-5">
            <div class="row">
                <div class="col-12">
                    <span class="divider-main divider"></span>
                </div><!--end col-->
            </div><!--end row-->
        </div><!--end container-->

        <div class="container pt-2">
            <div class="row justify-content-center">
                <div class="col-12">
                    <div class="section-title">
                        <h4 class="title mb-3">მსგავსი პროდუქტები</h4>
                    </div>
                </div><!--end col-->
            </div><!--end row-->

            <div class="row">
                <?php $__currentLoopData = $relatedItems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-lg-4 col-md-6 mb-4 pb-2">
                        <div class="card blog blog-primary shadow rounded overflow-hidden">
                            <div class="image position-relative overflow-hidden">
                                <img src="<?php echo e($item->lang->imgurl); ?>" class="img-fluid" alt="">

                                <div class="blog-tag">
    
                                </div>
                            </div>

                            <div class="card-body content">
                                <a href="<?php echo e(fullUrl('detail/'.$item->slug)); ?>" class="h5 title text-dark d-block mb-0"><?php echo e($item->lang->name); ?></a>
                                <p class="text-muted mt-2 mb-2"><?php echo e($item->lang->description); ?></p>
                                <a href="<?php echo e(fullUrl('detail/'.$item->slug)); ?>" class="link text-dark">Read More <i class="uil uil-arrow-right align-middle"></i></a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div><!--end row-->
        </div><!--end container-->
    </section><!--end section-->
    <?php endif; ?>
    <?php $__env->startPush('js'); ?>
        <script type="module">
            var slider = tns({
                container: '.tiny-single-item1',
                items: 1,
                controls: true,
                mouseDrag: true,
                loop: true,
                rewind: true,
                autoplay: true,
                autoplayButtonOutput: false,
                autoplayTimeout: 3000,
                navPosition: "bottom",
                controlsText: ['<i class="mdi mdi-chevron-left "></i>', '<i class="mdi mdi-chevron-right"></i>'],
                nav: true,
                speed: 400,
                gutter: 0,
            });

        </script>
    <?php $__env->stopPush(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('../nn_site/index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\fabra.ge\resources\views/nn_site/pages/detail.blade.php ENDPATH**/ ?>