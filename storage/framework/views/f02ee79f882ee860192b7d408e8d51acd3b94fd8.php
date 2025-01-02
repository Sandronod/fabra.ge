
<?php $__env->startSection('content'); ?>

    <?php echo $__env->make('nn_site.partials.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <section class="section bg-light">
        <div class="container">
            <div class="row mt-5 align-items-center">


                <div class="col-lg-12 col-md-12 mt-12 mt-sm-0">
                    <div class="text-md-end text-center">
                        <nav aria-label="breadcrumb" class="d-inline-block">
                            <ul class="breadcrumb mb-0 p-0">
                                <li class="breadcrumb-item"><a href="/">მთავარი</a></li>
                                <li class="breadcrumb-item"><a href="javascript:void(0)"><?php echo e($category->lang->name); ?></a></li>
                            </ul>
                        </nav>
                    </div>
                </div><!--end col-->
            </div><!--end row-->
        </div><!--end container-->
    </section>


    <section class="section">
        <div class="container">
            <div class="row align-items-center">
                <?php if($category->lang->imgurl != ''): ?>

                <div class="col-lg-5 col-md-6">
                    <img src="<?php echo e($category->lang->imgurl); ?>" style="max-height:500px; max-width:500px;"  class="img-fluid rounded shadow" alt="">
                </div><!--end col-->
                <div class="col-lg-7 col-md-6 mt-4 pt-2 mt-sm-0 pt-sm-0">
                    <div class="section-title ms-lg-5">
                        <h4 class="title mb-3"><?php echo e($category->lang->name); ?></h4>
                        <p class="text-muted"> <?php echo $category->lang->body; ?></p>
                    </div>
                </div><!--end col-->
                <?php else: ?>
                    <div class="col-lg-12">
                        <div class="section-title ms-lg-5">
                            <h4 class="title mb-3"><?php echo e($category->lang->name); ?></h4>
                            <p class="text-muted"> <?php echo $category->lang->body; ?></p>
                        </div>
                    </div><!--end col-->
                <?php endif; ?>

            </div><!--end row-->
        </div>
        <?php if(isset($clients) && $clients->count() > 0): ?>
        <div class="container mt-100 mt-60">
            <div class="row">
                <div class="col-12 px-0">
                    <div class="tns-outer" id="tns1-ow"><div class="tns-controls" aria-label="Carousel Navigation" tabindex="0"><button type="button" data-controls="prev" tabindex="-1" aria-controls="tns1"><i class="mdi mdi-chevron-left "></i></button><button type="button" data-controls="next" tabindex="-1" aria-controls="tns1"><i class="mdi mdi-chevron-right"></i></button></div><div class="tns-liveregion tns-visually-hidden" aria-live="polite" aria-atomic="true">slide <span class="current">3 to 12</span>  of 12</div><div id="tns1-mw" class="tns-ovh"><div class="tns-inner" id="tns1-iw"><div class="tiny-twelve-item  tns-slider tns-carousel tns-subpixel tns-calc tns-horizontal" id="tns1" style="transform: translate3d(-16.6667%, 0px, 0px);">
                                    <?php $__currentLoopData = $clients; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $client): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="tiny-slide tns-item" id="tns1-item0" aria-hidden="true" tabindex="-1">
                                        <div class="card portfolio portfolio-classic portfolio-primary client-testi rounded-0 overflow-hidden">
                                            <div class="card-img position-relative">
                                                <img src="<?php echo e($client->lang->imgurl); ?>" class="img-fluid" alt="">
                                                <div class="card-overlay"></div>

                                                <div class="pop-icon">
                                                    <a href="images/portfolio/rest/01.jpg" class="btn btn-pills btn-icon lightbox"><i class="uil uil-instagram"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>




                                </div></div></div></div>


                </div><!--end col-->
            </div><!--end row-->
        </div>
        <?php endif; ?>
    </section>



<?php $__env->stopSection(); ?>

<?php echo $__env->make('../nn_site/index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\projects\laravel\fabra.ge\resources\views/nn_site/pages/text.blade.php ENDPATH**/ ?>