<footer class="footer bg-footer">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="footer-py-60">
                    <div class="row">
                        <div class="col-lg-3 col-md-3 col-12 mt-4 mt-sm-0 pt-2 pt-sm-0 order-4 order-md-1">
                            <ul class="list-unstyled social-icon foot-social-icon mb-0">

                            @if ($siteSettings->facebook)
                                <li class="list-inline-item"><a href="{{$siteSettings->facebook}}" target="_blank" class="rounded"><i class="uil uil-facebook-f align-middle" title="facebook"></i></a></li>
                            @endif
                            @if ($siteSettings->instagram)
                                <li class="list-inline-item"><a href="{{$siteSettings->instagram}}" target="_blank" class="rounded"><i class="uil uil-instagram align-middle" title="instagram"></i></a></li>
                            @endif
                            {{-- <li class="list-inline-item mb-0"><a href="javascript:void(0)" target="_blank"><i class="uil uil-twitter h6 mb-0"></i></a></li> --}}
                            @if ($siteSettings->linkedin)
                                <li class="list-inline-item"><a href="{{$siteSettings->linkedin}}" target="_blank" class="rounded"><i class="uil uil-linkedin" title="Linkedin"></i></a></li>
                            @endif
                            </ul><!--end icon-->
                        </div><!--end col-->

                        <div class="col-lg-5 col-md-5 col-12 order-1 order-md-2">
                            <h6 class="footer-head">{{$lang->contactInfo}}</h6>
                            <ul class="list-unstyled footer-list mt-4">
                                <li><span class="text-foot"><i class="uil uil-circle me-1"></i>{{$lang->salesExecutive}}</span></li>
                                <li><span class="text-foot"><i class="uil uil-circle me-1"></i>{{$lang->mob}}:&nbsp;<a href="tel:{{$siteSettings->mobile}}" class="text-foot">{{$siteSettings->mobile}}</a></span></li>
                                <li><span class="text-foot"><i class="uil uil-circle me-1"></i>{{$lang->phone}}:&nbsp;<a href="tel:{{$siteSettings->phone}}" class="text-foot">{{$siteSettings->phone}}</a></span></li>
                                <li><span class="text-foot"><i class="uil uil-circle me-1"></i>{{$lang->email}}:&nbsp;<a href="mailto:{{$siteSettings->email}}" class="text-foot">{{$siteSettings->email}}</a></span></li>
                                <li><span class="text-foot"><i class="uil uil-circle me-1"></i>@if(getCurrentLocale() == 'ka'){{$siteSettings->address_ka}}@elseif(getCurrentLocale() == 'en'){{$siteSettings->address_en}}@endif</span>
                                </li>
                            </ul>
                        </div><!--end col-->
                    </div><!--end row-->
                </div>
            </div><!--end col-->
        </div><!--end row-->
    </div><!--end container-->

    <div class="footer-py-30 footer-bar bg-footer">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-sm-4">
                    <div class="text-sm-start text-center">
                        <a href="#">
                            <img src="images/logo-light.png" height="26" alt="">
                        </a>
                    </div>
                </div><!--end col-->

                <div class="col-sm-8 mt-4 mt-sm-0">
                    <div class="text-sm-end text-center">
                        <p class="mb-0 text-muted">
                            {{-- <script>document.write(new Date().getFullYear())</script> --}}
                            © 2025 Fabra Ltd.</p>
                    </div>
                </div><!--end col-->
            </div><!--end row-->
        </div><!--end container-->
    </div>
</footer><!--end footer-->
<!-- End -->


<a href="javascript:void(0)" onclick="topFunction()" id="back-to-top" class="back-to-top rounded-pill"><i class="mdi mdi-arrow-up"></i></a>
<!-- Back to top -->




