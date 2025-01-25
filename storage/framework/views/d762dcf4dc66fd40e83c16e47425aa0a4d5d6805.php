
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

            <!-- Start -->
            <section class="section pb-0">
                <div class="container">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="card border-0 text-center features feature-clean bg-transparent">
                                <div class="icons text-primary text-center mx-auto">
                                    <i class="uil uil-phone d-block rounded h3 mb-0"></i>
                                </div>
                                <div class="content mt-3">
                                    <h5 class="footer-head"><?php echo e($lang->mob); ?></h5>
                                    <a href="tel:<?php echo e($siteSettings->mobile); ?>" class="text-foot"><?php echo e($siteSettings->mobile); ?></a>
                                </div>
                            </div>
                        </div><!--end col-->
                        
                        <div class="col-md-4 mt-4 mt-sm-0 pt-2 pt-sm-0">
                            <div class="card border-0 text-center features feature-clean bg-transparent">
                                <div class="icons text-primary text-center mx-auto">
                                    <i class="uil uil-envelope d-block rounded h3 mb-0"></i>
                                </div>
                                <div class="content mt-3">
                                    <h5 class="footer-head"><?php echo e($lang->email); ?></h5>
                                    <a href="mailto:contact@example.com" class="text-foot"><?php echo e($siteSettings->email); ?></a>
                                </div>
                            </div>
                        </div><!--end col-->
                        
                        <div class="col-md-4 mt-4 mt-sm-0 pt-2 pt-sm-0">
                            <div class="card border-0 text-center features feature-clean bg-transparent">
                                <div class="icons text-primary text-center mx-auto">
                                    <i class="uil uil-map-marker d-block rounded h3 mb-0"></i>
                                </div>
                                <div class="content mt-3">
                                    <h5 class="footer-head"><?php echo e($lang->address); ?></h5>
                                    <p class="text-muted"><?php if(getCurrentLocale() == 'ka'): ?><?php echo e($siteSettings->address_ka); ?><?php elseif(getCurrentLocale() == 'en'): ?><?php echo e($siteSettings->address_en); ?><?php endif; ?></p>
                                    <a href="https://www.google.com/maps/place/40+Zhiuli+Shartava+St,+T'bilisi/@41.7302803,44.7670107,17z/data=!3m1!4b1!4m6!3m5!1s0x404472e79d397513:0xa743c3c5de72322d!8m2!3d41.7302763!4d44.7695856!16s%2Fg%2F11_v2prxq?entry=tts&g_ep=EgoyMDI1MDEwNi4xIPu8ASoASAFQAw%3D%3D"
                                        target="_blank"><?php echo e($lang->viewMap); ?></a>
                                </div>
                            </div>
                        </div><!--end col-->
                    </div><!--end row-->
                </div><!--end container-->
    
                <div class="container-fluid mt-100 mt-60">
                    <div class="row">
                        <div class="col-12 p-0">
                            <div class="card map border-0">
                                <div class="card-body p-0">
                                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2977.5475902860003!2d44.76701067647815!3d41.73028027465562!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x404472e79d397513%3A0xa743c3c5de72322d!2s40%20Zhiuli%20Shartava%20St%2C%20T&#39;bilisi!5e0!3m2!1sen!2sge!4v1736437759155!5m2!1sen!2sge" style="border:0" allowfullscreen></iframe>
                                </div>
                            </div>
                        </div><!--end col-->
                    </div><!--end row-->
                </div><!--end container-->
            </section><!--end section-->
            <!-- End -->


    



<?php $__env->stopSection(); ?>

<?php echo $__env->make('../nn_site/index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\fabra.ge\resources\views/nn_site/pages/contact.blade.php ENDPATH**/ ?>