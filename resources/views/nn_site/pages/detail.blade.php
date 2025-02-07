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
                                <li class="breadcrumb-item"><a href="{{fullUrl('')}}">{{$lang->main}}</a></li>
                                <li class="breadcrumb-item"><a href="{{fullUrl('list/'.$menuItem->parentItem->slug.'/'.$menuItem->slug)}} ">{{$menuItem->lang->name}}</a></li>
                                <li class="breadcrumb-item"><a href="javascript:void(0)">{{$detail->lang->name}}</a></li>
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
                                @if ($detail->lang->imgurl)
                                    <div class="tiny-slide">
                                        <img src="{{$detail->lang->imgurl}}" class="img-fluid" style="object-fit: cover;" alt="">
                                    </div>
                                @endif

                                {{-- @if ($detail->lang->embed)
                                    <div class="tiny-slide">
                                        {!! $detail->lang->embed !!}
                                    </div>
                                @endif --}}
                            </div>
                        </div><!--end col-->
                    </div><!--end row-->

{{--                <img src="{{$detail->lang->imgurl}}" style="max-height:500px; max-width:500px;"  class="img-fluid rounded shadow" alt="">--}}
            </div><!--end col-->

            <div class="col-lg-7 col-md-6 mt-4 pt-2 mt-sm-0 pt-sm-0">
                <div class="section-title ms-lg-5">
                    <h4 class="title mb-3">{{$detail->lang->name}}</h4>
                    <p class="text-muted">
                        {!! $detail->lang->body !!}
                        @if($detail->files->count() > 0)
                            @foreach($detail->files as $file)
                                <a href="{{$file->lang->fileurl}}" target="_blank" class="d-inline-block pdf-button mt-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" height="35px" width="35px" version="1.1" viewBox="0 0 56 56" xml:space="preserve" class="me-2">
                                        <g>
                                        <path style="fill:#E9E9E0;" d="M36.985,0H7.963C7.155,0,6.5,0.655,6.5,1.926V55c0,0.345,0.655,1,1.463,1h40.074   c0.808,0,1.463-0.655,1.463-1V12.978c0-0.696-0.093-0.92-0.257-1.085L37.607,0.257C37.442,0.093,37.218,0,36.985,0z"/>
                                        <polygon style="fill:#D9D7CA;" points="37.5,0.151 37.5,12 49.349,12  "/>
                                        <path style="fill:#CC4B4C;" d="M19.514,33.324L19.514,33.324c-0.348,0-0.682-0.113-0.967-0.326   c-1.041-0.781-1.181-1.65-1.115-2.242c0.182-1.628,2.195-3.332,5.985-5.068c1.504-3.296,2.935-7.357,3.788-10.75   c-0.998-2.172-1.968-4.99-1.261-6.643c0.248-0.579,0.557-1.023,1.134-1.215c0.228-0.076,0.804-0.172,1.016-0.172   c0.504,0,0.947,0.649,1.261,1.049c0.295,0.376,0.964,1.173-0.373,6.802c1.348,2.784,3.258,5.62,5.088,7.562   c1.311-0.237,2.439-0.358,3.358-0.358c1.566,0,2.515,0.365,2.902,1.117c0.32,0.622,0.189,1.349-0.39,2.16   c-0.557,0.779-1.325,1.191-2.22,1.191c-1.216,0-2.632-0.768-4.211-2.285c-2.837,0.593-6.15,1.651-8.828,2.822   c-0.836,1.774-1.637,3.203-2.383,4.251C21.273,32.654,20.389,33.324,19.514,33.324z M22.176,28.198   c-2.137,1.201-3.008,2.188-3.071,2.744c-0.01,0.092-0.037,0.334,0.431,0.692C19.685,31.587,20.555,31.19,22.176,28.198z    M35.813,23.756c0.815,0.627,1.014,0.944,1.547,0.944c0.234,0,0.901-0.01,1.21-0.441c0.149-0.209,0.207-0.343,0.23-0.415   c-0.123-0.065-0.286-0.197-1.175-0.197C37.12,23.648,36.485,23.67,35.813,23.756z M28.343,17.174   c-0.715,2.474-1.659,5.145-2.674,7.564c2.09-0.811,4.362-1.519,6.496-2.02C30.815,21.15,29.466,19.192,28.343,17.174z    M27.736,8.712c-0.098,0.033-1.33,1.757,0.096,3.216C28.781,9.813,27.779,8.698,27.736,8.712z"/>
                                        <path style="fill:#CC4B4C;" d="M48.037,56H7.963C7.155,56,6.5,55.345,6.5,54.537V39h43v15.537C49.5,55.345,48.845,56,48.037,56z"/>
                                        <g>
                                            <path style="fill:#FFFFFF;" d="M17.385,53h-1.641V42.924h2.898c0.428,0,0.852,0.068,1.271,0.205    c0.419,0.137,0.795,0.342,1.128,0.615c0.333,0.273,0.602,0.604,0.807,0.991s0.308,0.822,0.308,1.306    c0,0.511-0.087,0.973-0.26,1.388c-0.173,0.415-0.415,0.764-0.725,1.046c-0.31,0.282-0.684,0.501-1.121,0.656    s-0.921,0.232-1.449,0.232h-1.217V53z M17.385,44.168v3.992h1.504c0.2,0,0.398-0.034,0.595-0.103    c0.196-0.068,0.376-0.18,0.54-0.335c0.164-0.155,0.296-0.371,0.396-0.649c0.1-0.278,0.15-0.622,0.15-1.032    c0-0.164-0.023-0.354-0.068-0.567c-0.046-0.214-0.139-0.419-0.28-0.615c-0.142-0.196-0.34-0.36-0.595-0.492    c-0.255-0.132-0.593-0.198-1.012-0.198H17.385z"/>
                                            <path style="fill:#FFFFFF;" d="M32.219,47.682c0,0.829-0.089,1.538-0.267,2.126s-0.403,1.08-0.677,1.477s-0.581,0.709-0.923,0.937    s-0.672,0.398-0.991,0.513c-0.319,0.114-0.611,0.187-0.875,0.219C28.222,52.984,28.026,53,27.898,53h-3.814V42.924h3.035    c0.848,0,1.593,0.135,2.235,0.403s1.176,0.627,1.6,1.073s0.74,0.955,0.95,1.524C32.114,46.494,32.219,47.08,32.219,47.682z     M27.352,51.797c1.112,0,1.914-0.355,2.406-1.066s0.738-1.741,0.738-3.09c0-0.419-0.05-0.834-0.15-1.244    c-0.101-0.41-0.294-0.781-0.581-1.114s-0.677-0.602-1.169-0.807s-1.13-0.308-1.914-0.308h-0.957v7.629H27.352z"/>
                                            <path style="fill:#FFFFFF;" d="M36.266,44.168v3.172h4.211v1.121h-4.211V53h-1.668V42.924H40.9v1.244H36.266z"/>
                                        </g>
                                    </g>
                                </svg>
                                @if ($file->lang->name)
                                 {{$file->lang->name}}
                                @else
                                    გადმოტვირთეთ ფაილი
                                @endif
                            </a>
                            @endforeach
                        @endif
                    </p>
                </div>
            </div><!--end col-->
        </div><!--end row-->
    </div>
</section>
    @if($detail->lang->embed != '')
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
                        <h4 class="title mb-5">ვიდეო</h4>
                    </div>
                </div><!--end col-->
            </div><!--end row-->
            <div class="row">
                <div class="col-lg-12 col-md-6 mb-4 pb-2">
                    {!! $detail->lang->embed !!}
                </div>
            </div><!--end row-->
        </div><!--end container-->
    @endif
@if($detail->images->count() > 0)
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
                            <h4 class="title mb-5">{{$lang->photos}}</h4>
                        </div>
                    </div><!--end col-->
                </div><!--end row-->

            <div id="grid" class="row">

                @foreach($detail->images as $img)

                    <div class="col-md-3 col-12 spacing picture-item" data-groups='["branding"]'>
                        <div class="card portfolio portfolio-classic portfolio-primary rounded overflow-hidden">
                            <div class="card-img position-relative text-center">
                                <img src="{{$img->lang->imgurl}}" class="img-fluid" alt="" style="object-fit:cover; max-height: 120px;">
                                <div class="card-overlay"></div>

                                <div class="pop-icon">
                                    <a href="{{$img->lang->imgurl}}" class="btn btn-pills btn-icon lightbox"><i class="uil uil-search"></i></a>
                                </div>
                            </div>
                        </div>
                    </div><!--end col-->
                @endforeach

            </div><!--end row-->
        </div><!--end container-->
        </div>
    </section>

@endif
    @if(isset($relatedItems) && count($relatedItems) > 0)
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
                @foreach($relatedItems as $item)
                    <div class="col-lg-4 col-md-6 mb-4 pb-2">
                        <div class="card blog blog-primary shadow rounded overflow-hidden">
                            <a href="{{fullUrl('detail/'.$item->slug)}}" class="display-block image position-relative overflow-hidden">
                                <img src="{{$item->lang->imgurl}}" class="img-fluid" alt="">

                                <div class="blog-tag">
                                </div>
                            </a>

                            <div class="card-body content">
                                <a href="{{fullUrl('detail/'.$item->slug)}}" class="h5 title text-dark d-block mb-0">{{$item->lang->name}}</a>
                                <p class="text-muted mt-2 mb-2">{{$item->lang->description}}</p>
                                <a href="{{fullUrl('detail/'.$item->slug)}}" class="link text-dark">{{$lang->readMore}} <i class="uil uil-arrow-right align-middle"></i></a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div><!--end row-->
        </div><!--end container-->
    </section><!--end section-->
    @endif
    @push('js')
        <script type="module">
            var slider = tns({
                container: '.tiny-single-item1',
                items: 1,
                controls: true,
                mouseDrag: true,
                loop: true,
                rewind: true,
                autoplay: false,
                autoplayButtonOutput: false,
                autoplayTimeout: 3000,
                navPosition: "bottom",
                controlsText: ['<i class="mdi mdi-chevron-left "></i>', '<i class="mdi mdi-chevron-right"></i>'],
                nav: true,
                speed: 400,
                gutter: 0,
            });

        </script>
    @endpush
@endsection
