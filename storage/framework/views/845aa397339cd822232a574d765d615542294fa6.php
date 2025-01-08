
<?php $__env->startSection('content'); ?>

    <?php echo $__env->make('nn_site.partials.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


<?php $__env->startPush('css'); ?>
<link href="/assets/css/swiper.min.css" rel="stylesheet" type="text/css" /> 
<?php $__env->stopPush(); ?>

    

       <!-- Hero Start -->
       <section class="swiper-slider-hero position-relative d-block vh-100">
        <div class="swiper-container">
            <div class="swiper-wrapper">
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
                                        <div class="mt-4 pt-2">
                                            <a href="<?php echo e($slide->lang->link_1); ?>" class="btn btn-primary"><?php echo e($slide->lang->link_name_1); ?></a>
                                        </div>
                                    </div>
                                </div><!--end col-->
                            </div><!--end row-->
                        </div><!--end container-->
                    </div><!-- end slide-inner --> 
                </div> <!-- end swiper-slide -->
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        
            </div>
            <!-- end swiper-wrapper -->

            <!-- swipper controls -->
            <!-- <div class="swiper-pagination"></div> -->
            <div class="swiper-button-next border rounded-circle text-center"></div>
            <div class="swiper-button-prev border rounded-circle text-center"></div>
        </div><!--end container-->
    </section><!--end section-->
    <!-- Hero End -->
    <section class="section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div id="grid" class="row">
                        <div class="col-md-6 col-12 picture-item">
                            <div class="section-title text-center text-md-start mt-md-5 mb-4 pb-2">
                                <h6 class="text-primary">Our Work</h6>
                                <h4 class="title mb-3">Inspire design for <br> the Digital Age</h4>
                                <p class="para-desc mx-auto text-muted mb-0">Our design projects are fresh and simple and will benefit your business greatly. Learn more about our work!</p>
                            </div>
                        </div><!--end col-->
                        <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            
                        
                        <div class="col-md-6 col-12 mt-4  pt-2 <?php echo e($key === 0 ? 'pt-sm-0 mt-sm-0' : ''); ?> picture-item">
                            <div class="card portfolio portfolio-modern portfolio-primary rounded overflow-hidden shadow rounded">
                                <a href="<?php echo e(fullUrl('list/'.$product->parentItem->slug.'/'.$product->slug)); ?>" >
                                    <img src="<?php echo e($product->lang->imgurl); ?>" class="img-fluid" alt="">
                                </a>
                                <div class="content text-center p-3">
                                    <a href="<?php echo e(fullUrl('list/'.$product->parentItem->slug.'/'.$product->slug)); ?>" class="text-dark h6 mb-0 d-block title"><?php echo e($product->lang->name); ?></a>
                                </div>
                            </div>
                        </div><!--end col-->
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  
    
                      
    
                        <div class="col-md-6 col-12 mt-4 pt-2 picture-item">
                            <div class="section-title text-center text-md-start">
                                <h4 class="mb-3">Check out more creative designs</h4>
                                <p class="para-desc mx-auto text-muted mb-4">Our design projects are fresh and simple and will benefit your business greatly. Learn more about our work!</p>
                            
                                <a href="javascript:void(0)" class="btn btn-primary">Explore More <i class="uil uil-arrow-right align-middle"></i></a>
                            </div>
                        </div><!--end col-->
                    </div><!--end row-->
                </div><!--end col-->
            </div><!--end row-->
        </div><!--end container-->
    </section><!--end section-->

    <section class="section">
        <div class="container">
            <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active" id="pills-buying" role="tabpanel" aria-labelledby="pills-buying-tab">
                    <div class="section-title" id="tech">
                        <h4><?php echo e($whys->lang->name); ?></h4>
                    </div>

                    <div class="accordion mt-4 pt-2" id="buyingquestion">
                        <?php $__currentLoopData = $whys->catalog; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$why): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            
                       
                        <div class="accordion-item rounded border-0 shadow <?php echo e($key !== 0 ? 'mt-3' : ''); ?>">
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
    <section class="section bg-light">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12">
                    <div class="section-title text-center mb-4 pb-2">
                        <h4 class="title fw-semibold mb-4"><?php echo e($clients->lang->name); ?></h4>
                    </div>
                </div><!--end col-->
            </div><!--end row-->
        </div><!--end container-->

        <div class="container-fluid mt-4">
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
                                <div class="content pt-3">
                                    <span class="text-dark h6 mb-0 d-block title"><?php echo e($client->lang->name); ?></span>
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
<?php $__env->stopPush(); ?>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('../nn_site/index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\fabra.ge\resources\views/nn_site/pages/home.blade.php ENDPATH**/ ?>