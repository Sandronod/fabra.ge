
<?php $__env->startSection('content'); ?>

    <?php echo $__env->make('nn_site.partials.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


    <?php $__env->startPush('css'); ?>
        <link href="/assets/css/swiper.min.css" rel="stylesheet" type="text/css" />
    <?php $__env->stopPush(); ?>

    
    <!-- Start services -->

    <!-- Hero Start -->
    <section class="swiper-slider-hero home-main-slider position-relative d-block vh-100">
        <div class="swiper-container">
            <div class="swiper-wrapper">
                <?php if(count($slider)): ?>
                    <?php $__currentLoopData = $slider; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $slide): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="swiper-slide d-flex align-items-center overflow-hidden">
                            <div class="slide-inner slide-bg-image d-flex align-items-center" data-jarallax='{"speed": 0.5}' style="background: center center;" data-background="<?php echo e($slide->lang->imgurl); ?>">
                                <div class="bg-overlay bg-linear-gradient"></div>
                                <div class="container">
                                    <div class="row justify-content-center">
                                        <div class="col-12">
                                            <div class="title-heading text-center">
                                                <h1 class=" display-3 text-white title-dark mb-4"><?php echo e($slide->lang->name); ?></h1>
                                                <p class="para-desc mx-auto text-white-50"><?php echo e($slide->lang->description); ?></p>
                                                <?php if($slide->lang->link_1): ?>
                                                    <div class="mt-4 pt-2">
                                                        <a href="<?php echo e($slide->lang->link_1); ?>" class="btn btn-primary" target="_blank"><?php echo e($slide->lang->link_name_1); ?></a>
                                                    </div>
                                                <?php endif; ?>
                                            </div>
                                        </div><!--end col-->
                                    </div><!--end row-->
                                </div><!--end container-->
                            </div><!-- end slide-inner -->
                        </div> <!-- end swiper-slide -->
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
            </div>
            <!-- end swiper-wrapper -->

            <!-- Swiper Pagination (Bullets) -->
            <div class="swiper-pagination"></div>

            <!-- swipper controls -->
            <!-- <div class="swiper-pagination"></div> -->
            <div class="swiper-button-next border rounded-circle text-center"></div>
            <div class="swiper-button-prev border rounded-circle text-center"></div>
        </div><!--end container-->
    </section><!--end section-->
    <section class="section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12">
                    <div class="section-title text-center mb-4 pb-2">
                        <h4 class="title fw-semibold mb-3"><?php echo e($bullets->lang->name); ?></h4>
                        <p class="text-muted para-desc mx-auto mb-0"><?php echo e($bullets->lang->description); ?></p>
                    </div>
                </div><!--end col-->
            </div><!--end row-->

            <div class="row">
                <?php $__currentLoopData = $bullets->catalog; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bullet): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-lg-4 col-md-6 mt-4 pt-2">
                        <div class="features feature-primary feature-bg border-0 p-4 rounded shadow h-100">
                            <div class="fea-icon rounded text-white title-dark">
                                <i class="uil uil-setting"></i>
                            </div>
                            <div class="content mt-3">
                                <?php if($bullet->lang->embed): ?>
                                    <a href="<?php echo e($bullet->lang->embed); ?>" class="title h5 text-dark" target="_blank"><?php echo e($bullet->lang->name); ?></a>
                                <?php else: ?>
                                    <span class="title h5 text-dark"><?php echo e($bullet->lang->name); ?></span>
                                <?php endif; ?>
                                <p class="text-muted para mt-2 mb-0"><?php echo e($bullet->lang->description); ?></p>
                            </div>
                        </div>
                    </div><!--end col-->
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div><!--end row-->
        </div><!--end container-->
    </section>
    <!-- Hero End -->
    
    <?php if($products2->count()): ?>
        <section class="section pt-0 pb-0">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-12">
                        <div class="section-title text-center mb-4 pb-2">
                            <h4 class="title fw-semibold mb-3"><?php echo e($lang->products); ?></h4>
                            <p class="text-muted para-desc mx-auto mb-0"><?php echo e($lang->productsDescr); ?></p>
                        </div>
                    </div><!--end col-->
                </div><!--end row-->
            </div>
        </section>
        <?php $__currentLoopData = $products2; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $prodKey => $product2): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <section class="section pt-2 pb-5">
                <div class="container-fluid">
                    <div class="row align-items-center">
                        <div class="col-lg-5 col-md-6 <?php echo e($prodKey%2 == 0 ? ' order-md-1' : ''); ?> order-2 mt-4 mt-am-0 pt-2 pt-sm-0">
                            <div class="app-feature-shape position-relative">
                                <div class="tiny-single-item tiny-single-item--multiple">
                                    <div class="tiny-slide" style="vertical-align: middle !important;text-align: center;">
                                        <img src="<?php echo e($product2->lang->imgurl); ?>" class="img-fluid" alt="" style="max-height: 550px;">
                                    </div>
                                    <?php if($product2->images->count()): ?>
                                        <?php $__currentLoopData = $product2->images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $prod2Image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <div class="tiny-slide" style="vertical-align: middle !important;text-align: center;">
                                                <img src="<?php echo e($prod2Image->lang->imgurl); ?>" class="img-fluid" alt="" style="max-height: 550px;">
                                            </div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div><!--end col-->

                        <div class="col-lg-7 col-md-6 <?php echo e($prodKey%2 == 0 ? ' order-md-2' : ''); ?> order-1">
                            <div class="ms-lg-5">
                                <div class="section-title section-title-analitics">
                                    
                                    <h4 class="title mb-4"><?php echo e($product2->lang->name); ?></h4>
                                    <p class="text-muted para-desc mb-0"><?php echo $product2->lang->body; ?></p>
                                    
                                    <div class="mt-4">
                                        <a href="<?php echo e(fullUrl('detail/'.$product2->slug)); ?>" class="btn btn-soft-primary"><?php echo e($lang->readMore); ?> <i data-feather="arrow-right" class="fea icon-sm"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div><!--end col-->
                    </div><!--end row-->
                </div><!--end container-->
            </section>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php endif; ?>

    <section class="section<?php echo e($products2->count() ? ' pt-5' : ' pt-2'); ?>">
        <div class="container">
            <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active" id="pills-buying" role="tabpanel" aria-labelledby="pills-buying-tab">
                    <div class="section-title" id="tech">
                        <h4><?php echo e($whys->lang->name); ?></h4>
                    </div>

                    <div class="accordion mt-4 pt-2" id="buyingquestion">
                        <?php $__currentLoopData = $whys->catalog; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$why): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="accordion-item rounded border-0 shadow mb-3">
                                <h2 class="accordion-header" id="headingOne<?php echo e($key); ?>">
                                    <button class="accordion-button border-0 bg-white <?php echo e($key !== 0 ? 'collapsed' : ''); ?>" type="button" data-bs-toggle="collapse" data-bs-target="#collapse<?php echo e($key); ?>"
                                            aria-expanded="<?php echo e($key === 0 ? 'true' : 'false'); ?>" aria-controls="collapse<?php echo e($key); ?>">
                                        <?php echo e($why->lang->name); ?>

                                    </button>
                                </h2>
                                <div id="collapse<?php echo e($key); ?>" class="accordion-collapse border-0 collapse <?php echo e($key === 0 ? 'show' : ''); ?>" aria-labelledby="headingOne<?php echo e($key); ?>">
                                    
                                    <div class="accordion-body text-muted bg-white">
                                        <?php echo e($why->lang->description); ?>

                                    </div>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div><!--end teb pane-->
            </div>
        </div>
    </section>
    <section class="section bg-light pt-5 pb-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12">
                    <div class="section-title text-center mb-4 pb-2">
                        <h4 class="title fw-semibold mb-4"><?php echo e($clients->lang->name); ?></h4>
                    </div>
                </div><!--end col-->
            </div><!--end row-->
        </div><!--end container-->

        <div class="container mt-4">
            <div class="row">
                <div class="col-12">
                    <div class="tiny-five-item">
                        <?php $__currentLoopData = $clients->catalog; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $client): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                            <div class="tiny-slide">
                                <div class="card portfolio portfolio-classic portfolio-primary m-2 rounded overflow-hidden">
                                    <div class="card-img position-relative text-center">
                                        <img src="<?php echo e($client->lang->imgurl); ?>" class="img-fluid" alt="">
                                        <div class="card-overlay"></div>

                                        <div class="pop-icon">
                                            <a href="<?php echo e($client->lang->imgurl); ?>" class="btn btn-pills btn-icon lightbox"><i class="uil uil-camera"></i></a>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div><!--end col-->

                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    </div>
                </div><!--end col-->
            </div><!--end row-->
        </div><!--end container-->
    </section><!--end section-->
    <!-- End -->
    <?php $__env->startPush('js'); ?>
        <script src="/assets/js/swiper.min.js"></script>
        <script>
            document.addEventListener("DOMContentLoaded", function () {
                var sliders = document.getElementsByClassName('tiny-single-item--multiple');
                
                if (sliders.length > 0) {
                    Array.from(sliders).forEach(function (slider) {
                        tns({
                            container: slider,
                            items: 1,
                            controls: true,
                            mouseDrag: true,
                            loop: true,
                            rewind: true,
                            autoplay: true,
                            autoplayButtonOutput: false,
                            autoplayTimeout: 5000,
                            navPosition: "bottom",
                            controlsText: ['<i class="mdi mdi-chevron-left "></i>', '<i class="mdi mdi-chevron-right"></i>'],
                            nav: false,
                            speed: 500,
                            gutter: 0,
                        });
                    });
                }
            });
        </script>
    <?php $__env->stopPush(); ?>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('../nn_site/index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\fabra.ge\resources\views/nn_site/pages/home.blade.php ENDPATH**/ ?>