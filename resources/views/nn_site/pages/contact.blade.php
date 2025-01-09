@extends('../nn_site/index')
@section('content')

    @include('nn_site.partials.header')
    <section class="section bg-light pb-4">
        <div class="container">
            <div class="row mt-5 align-items-center">


                <div class="col-lg-12 col-md-12 mt-12 mt-sm-0">
                    <div class="text-md-end text-center">
                        <nav aria-label="breadcrumb" class="d-inline-block">
                            <ul class="breadcrumb mb-0 p-0">
                                <li class="breadcrumb-item"><a href="/">მთავარი</a></li>
                                <li class="breadcrumb-item"><a href="javascript:void(0)">{{$category->lang->name}}</a></li>
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
                                    <h5 class="footer-head">{{$lang->mob}}</h5>
                                    <a href="tel:{{$siteSettings->mobile}}" class="text-foot">{{$siteSettings->mobile}}</a>
                                </div>
                            </div>
                        </div><!--end col-->
                        
                        <div class="col-md-4 mt-4 mt-sm-0 pt-2 pt-sm-0">
                            <div class="card border-0 text-center features feature-clean bg-transparent">
                                <div class="icons text-primary text-center mx-auto">
                                    <i class="uil uil-envelope d-block rounded h3 mb-0"></i>
                                </div>
                                <div class="content mt-3">
                                    <h5 class="footer-head">{{$lang->email}}</h5>
                                    <a href="mailto:contact@example.com" class="text-foot">{{$siteSettings->email}}</a>
                                </div>
                            </div>
                        </div><!--end col-->
                        
                        <div class="col-md-4 mt-4 mt-sm-0 pt-2 pt-sm-0">
                            <div class="card border-0 text-center features feature-clean bg-transparent">
                                <div class="icons text-primary text-center mx-auto">
                                    <i class="uil uil-map-marker d-block rounded h3 mb-0"></i>
                                </div>
                                <div class="content mt-3">
                                    <h5 class="footer-head">მისამართი</h5>
                                    <p class="text-muted">@if(getCurrentLocale() == 'ka'){{$siteSettings->address_ka}}@elseif(getCurrentLocale() == 'en'){{$siteSettings->address_en}}@endif</p>
                                    <a href="https://www.google.com/maps/place/40+Zhiuli+Shartava+St,+T'bilisi/@41.7302803,44.7670107,17z/data=!3m1!4b1!4m6!3m5!1s0x404472e79d397513:0xa743c3c5de72322d!8m2!3d41.7302763!4d44.7695856!16s%2Fg%2F11_v2prxq?entry=tts&g_ep=EgoyMDI1MDEwNi4xIPu8ASoASAFQAw%3D%3D"
                                        target="_blank">რუკაზე ნახვა</a>
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


    {{-- <section class="section">
        <div class="container">
            <div class="row align-items-center">
                @if($category->lang->imgurl != '')

                <div class="col-lg-5 col-md-6">
                    <img src="{{$category->lang->imgurl}}" style="max-height:500px; max-width:500px;"  class="img-fluid rounded shadow" alt="">
                </div><!--end col-->
                <div class="col-lg-7 col-md-6 mt-4 pt-2 mt-sm-0 pt-sm-0">
                    <div class="section-title ms-lg-5">
                        <h4 class="title mb-3">{{$category->lang->name}}</h4>
                        <p class="text-muted"> {!! $category->lang->body !!}</p>
                    </div>
                </div><!--end col-->
                @else
                    <div class="col-lg-12">
                        <div class="section-title ms-lg-5">
                            <h4 class="title mb-3">{{$category->lang->name}}</h4>
                            <p class="text-muted"> {!! $category->lang->body !!}</p>
                        </div>
                    </div><!--end col-->
                @endif

            </div><!--end row-->
        </div>
        @if(isset($clients) && $clients->count() > 0)
        <div class="container mt-100 mt-60">
            <div class="row">
                <div class="col-12 px-0">
                    <div class="tns-outer" id="tns1-ow"><div class="tns-controls" aria-label="Carousel Navigation" tabindex="0"><button type="button" data-controls="prev" tabindex="-1" aria-controls="tns1"><i class="mdi mdi-chevron-left "></i></button><button type="button" data-controls="next" tabindex="-1" aria-controls="tns1"><i class="mdi mdi-chevron-right"></i></button></div><div class="tns-liveregion tns-visually-hidden" aria-live="polite" aria-atomic="true">slide <span class="current">3 to 12</span>  of 12</div><div id="tns1-mw" class="tns-ovh"><div class="tns-inner" id="tns1-iw"><div class="tiny-twelve-item  tns-slider tns-carousel tns-subpixel tns-calc tns-horizontal" id="tns1" style="transform: translate3d(-16.6667%, 0px, 0px);">
                                    @foreach($clients as $client) 
                                    <div class="tiny-slide tns-item" id="tns1-item0" aria-hidden="true" tabindex="-1">
                                        <div class="card portfolio portfolio-classic portfolio-primary client-testi rounded-0 overflow-hidden">
                                            <div class="card-img position-relative">
                                                <img src="{{$client->lang->imgurl}}" class="img-fluid" alt="">
                                                <div class="card-overlay"></div>

                                                <div class="pop-icon">
                                                    <a href="images/portfolio/rest/01.jpg" class="btn btn-pills btn-icon lightbox"><i class="uil uil-instagram"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                        @endforeach




                                </div></div></div></div>


                </div><!--end col-->
            </div><!--end row-->
        </div>
        @endif
    </section> --}}



@endsection
