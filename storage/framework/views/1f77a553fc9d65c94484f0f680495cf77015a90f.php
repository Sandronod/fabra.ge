
    <!-- javascript -->
    <script src="/assets/js/bootstrap.bundle.min.js"></script>
    <?php echo $__env->yieldPushContent('js'); ?>
    <script src="/assets/js/tiny-slider.js"></script>
    <script src="/assets/js/feather.min.js"></script>

    <script src="/assets/js/shuffle.min.js"></script>
    <script src="/assets/js/tobii.min.js"></script>
    <script src="/assets/js/feather.min.js"></script>
    <!-- Main Js -->
    <script src="/assets/js/plugins.init.js"></script><!--Note: All init js like tiny slider, counter, countdown, maintenance, lightbox, gallery, swiper slider, aos animation etc.-->
    <script src="/assets/js/app.js"></script><!--Note: All important javascript like page loader, menu, sticky menu, menu-toggler, one page menu etc. -->

    <script>
        if(document.getElementById("navigation")){
            var elements = document.getElementById("navigation").getElementsByTagName("a");
            for(var i = 0, len = elements.length; i < len; i++) {
                elements[i].onclick = function (elem) {
                    if(elem.target.getAttribute("href") === "javascript:;" || elem.target.getAttribute("href") === "javascript:void(0)" || elem.target.getAttribute("href") === "javascript:void(0);") {
                        var submenu = elem.target.nextElementSibling.nextElementSibling;
                        submenu.classList.toggle('open');
                    }
                }
            }
        }
    </script>


<?php /**PATH C:\xampp\htdocs\fabra.ge\resources\views/nn_site/partials/scripts.blade.php ENDPATH**/ ?>