@extends('../nn_site/index')
@section('content')

    @include('nn_site.partials.header')


    @push('css')
        <link href="/assets/css/swiper.min.css" rel="stylesheet" type="text/css" />
    @endpush

    {{-- <section class="bg-half-170 bg-light pb-0 d-table w-100" style="background: url('images/bg/corporate01.png') center center;">
        <div class="container">
            <div class="row mt-5 align-items-center">
                <div class="col-lg-7 col-md-6">
                    <div class="title-heading">
                        <h4 class="display-3 mb-4 fw-bold title-dark"> Insuring Your Future <br> From Today </h4>
                        <p class="para-desc text-muted">From banking to wealth management and securities distribution, we dedicated financial services the teams serve all major sectors.</p>
                        <div class="mt-4 pt-2">
                            <a href="javascript:void(0)" class="btn btn-lg btn-pills btn-primary">Work with us</a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-5 col-md-6 mt-5 mt-sm-0">
                    <img src="/assets/images/corporate01.png" class="img-fluid" alt="">
                </div>
            </div>
        </div>
    </section> --}}
    <!-- Start services -->

    <!-- Hero Start -->
    <section class="swiper-slider-hero position-relative d-block vh-100">
        <div class="swiper-container">
            <div class="swiper-wrapper">
                @if (count($slider))
                    @foreach($slider as $slide)
                        <div class="swiper-slide d-flex align-items-center overflow-hidden">
                            <div class="slide-inner slide-bg-image d-flex align-items-center" data-jarallax='{"speed": 0.5}' style="background: center center;" data-background="{{$slide->lang->imgurl}}">
                                <div class="bg-overlay bg-linear-gradient"></div>
                                <div class="container">
                                    <div class="row justify-content-center">
                                        <div class="col-12">
                                            <div class="title-heading text-center">
                                                <h1 class=" display-3 text-white title-dark mb-4">{{$slide->lang->name}}</h1>
                                                <p class="para-desc mx-auto text-white-50">{{$slide->lang->description}}</p>
                                                <div class="mt-4 pt-2">
                                                    <a href="{{$slide->lang->link_1}}" class="btn btn-primary">{{$slide->lang->link_name_1}}</a>
                                                </div>
                                            </div>
                                        </div><!--end col-->
                                    </div><!--end row-->
                                </div><!--end container-->
                            </div><!-- end slide-inner -->
                        </div> <!-- end swiper-slide -->
                    @endforeach
                @endif
            </div>
            <!-- end swiper-wrapper -->

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
                        <h4 class="title fw-semibold mb-3">{{$bullets->lang->name}}</h4>
                        <p class="text-muted para-desc mx-auto mb-0">{{$bullets->lang->description}}</p>
                    </div>
                </div><!--end col-->
            </div><!--end row-->

            <div class="row">
                @foreach($bullets->catalog as $bullet)
                    <div class="col-lg-4 col-md-6 mt-4 pt-2">
                        <div class="features feature-primary feature-bg border-0 p-4 rounded shadow">
                            <div class="fea-icon rounded text-white title-dark">
                                <i class="uil uil-eye"></i>
                            </div>

                            <div class="content mt-3">
                                <a href="{{$bullet->lang->embed}}" class="title h5 text-dark">{{$bullet->lang->name}}</a>
                                <p class="text-muted para mt-2 mb-0">{{$bullet->lang->description}}</p>
                            </div>
                        </div>
                    </div><!--end col-->
                @endforeach
            </div><!--end row-->
        </div><!--end container-->
    </section>
    <!-- Hero End -->
    <section class="section pb-2">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div id="grid" class="row">
                        <div class="col-md-6 col-12 picture-item">
                            <div class="section-title text-center text-md-start mt-md-5 mb-4 pb-2">
                                <h6 class="text-primary">{{$lang->whatWeOffer}}</h6>
                                <h4 class="title mb-3">{{$lang->forUsQuality}}</h4>
                                <p class="para-desc mx-auto text-muted mb-0">{{$lang->whatWeOfferDescr}}</p>
                            </div>
                        </div><!--end col-->
                        @foreach ($products1 as $key => $product1)
                            <div class="col-md-6 col-12 mt-4 pt-2 {{$key === 0 ? 'pt-sm-0 mt-sm-0' : ''}} picture-item">
                                <div class="card portfolio portfolio-modern portfolio-primary rounded overflow-hidden shadow rounded text-center style="min-height: 200px;">
                                <a href="{{fullUrl('list/'.$product1->parentItem->slug.'/'.$product1->slug)}}" style="min-height: 200px;">
                                    <img src="{{$product1->lang->imgurl}}" class="img-fluid" alt="" height="280" style="max-height: 280px;">
                                </a>
                                <div class="content text-center p-3">
                                    <a href="{{fullUrl('list/'.$product1->parentItem->slug.'/'.$product1->slug)}}" class="text-white h6 mb-0 d-block title">{{$product1->lang->name}}</a>
                                </div>
                            </div>
                    </div><!--end col-->
                    @endforeach
                    <div class="col-md-6 col-12 mt-4 pt-2 picture-item">
                        <div class="section-title text-center text-md-start">
                            <h4 class="mb-3">{{$lang->exploreMoreTitle}}</h4>
                            <p class="para-desc mx-auto text-muted mb-4">{{$lang->exploreMoreDescr}}</p>
                            <a href="{{fullUrl('list/industriuli-printerebi/gaoyenebis-sfero-1')}}" class="btn btn-primary">{{$lang->exploreMore}} <i class="uil uil-arrow-right align-middle"></i></a>
                        </div>
                    </div><!--end col-->
                </div><!--end row-->
            </div><!--end col-->
        </div><!--end row-->
        </div><!--end container-->
    </section><!--end section-->

    <section class="section pt-4 pb-4">

        <div class="container-fluid mt-100 mt-60">
            <div class="row align-items-center">
                <div class="col-lg-5 col-md-6 order-md-1 order-2 mt-4 mt-am-0 pt-2 pt-sm-0">
                    <div class="app-feature-shape position-relative">
                        <div class="tiny-single-item">
                            @foreach ($products2->catalog as $key => $product2)
                                <div class="tiny-slide" style="vertical-align: middle !important;text-align: center;">
                                    <img src="{{$product2->lang->imgurl}}" class="img-fluid" alt="">
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div><!--end col-->

                <div class="col-lg-7 col-md-6 order-md-2 order-1">
                    <div class="ms-lg-5">
                        <div class="section-title section-title-analitics">
                            <h6 class="text-primary">{{$lang->offer}}</h6>
                            <h4 class="title mb-4">{{$lang->offerTitle1}} <br> {{$lang->offerTitle2}}</h4>
                            <p class="text-muted para-desc mb-0">{{$lang->offerDescr}}</p>

                            <ul class="list-unstyled text-muted mt-3">
                                <li class="mb-0"><span class="text-primary h5 me-2"><i class="uil uil-check-circle align-middle"></i></span>{{$lang->exploreListItem1}}</li>
                                <li class="mb-0"><span class="text-primary h5 me-2"><i class="uil uil-check-circle align-middle"></i></span>{{$lang->exploreListItem2}}</li>
                                <li class="mb-0"><span class="text-primary h5 me-2"><i class="uil uil-check-circle align-middle"></i></span>{{$lang->exploreListItem3}}</li>
                            </ul>

                            <div class="mt-4">
                                <a href="{{fullUrl('list/fulis-mimoqtsevis-martva/khurda-fulis-mtvleli-damkhariskhebeli-manqanebi')}}" class="btn btn-soft-primary">{{$lang->readMore}} <i data-feather="arrow-right" class="fea icon-sm"></i></a>
                            </div>
                        </div>
                    </div>
                </div><!--end col-->
            </div><!--end row-->
        </div><!--end container-->
    </section>

    <section class="section pt-2">
        <div class="container">
            <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active" id="pills-buying" role="tabpanel" aria-labelledby="pills-buying-tab">
                    <div class="section-title" id="tech">
                        <h4>{{$whys->lang->name}}</h4>
                    </div>

                    <div class="accordion mt-4 pt-2" id="buyingquestion">
                        @foreach ($whys->catalog as $key=>$why )


                            <div class="accordion-item rounded border-0 shadow {{$key !== 0 ? 'mt-3' : ''}}">
                                <h2 class="accordion-header" id="headingOne{{$key}}">
                                    <button class="accordion-button border-0 bg-white {{$key !== 0 ? 'collapsed' : ''}}" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{$key}}"
                                            aria-expanded="{{$key === 0 ? 'true' : 'false'}}" aria-controls="collapse{{$key}}">
                                        {{$why->lang->name}}
                                    </button>
                                </h2>
                                <div id="collapse{{$key}}" class="accordion-collapse border-0 collapse {{$key === 0 ? 'show' : ''}}" aria-labelledby="headingOne{{$key}}">
                                    {{-- data-bs-parent="#buyingquestion"> --}}
                                    <div class="accordion-body text-muted bg-white">
                                        {{$why->lang->description}}
                                    </div>
                                </div>
                            </div>
                        @endforeach
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
                        <h4 class="title fw-semibold mb-4">{{$clients->lang->name}}</h4>
                    </div>
                </div><!--end col-->
            </div><!--end row-->
        </div><!--end container-->

        <div class="container mt-4">
            <div class="row">
                <div class="col-12">
                    <div class="tiny-five-item">
                        @foreach ($clients->catalog as $client)

                            <div class="tiny-slide">
                                <div class="card portfolio portfolio-classic portfolio-primary m-2 rounded overflow-hidden">
                                    <div class="card-img position-relative text-center">
                                        <img src="{{$client->lang->imgurl}}" class="img-fluid" alt="">
                                        <div class="card-overlay"></div>

                                        <div class="pop-icon">
                                            <a href="{{$client->lang->imgurl}}" class="btn btn-pills btn-icon lightbox"><i class="uil uil-camera"></i></a>
                                        </div>
                                    </div>
                                    {{-- <div class="content pt-3">
                                        <span class="text-dark h6 mb-0 d-block title">{{$client->lang->name}}</span>
                                    </div> --}}
                                </div>
                            </div><!--end col-->

                        @endforeach

                    </div>
                </div><!--end col-->
            </div><!--end row-->
        </div><!--end container-->
    </section><!--end section-->
    <!-- End -->
    @push('js')
        <script src="/assets/js/swiper.min.js"></script>
    @endpush

@endsection

