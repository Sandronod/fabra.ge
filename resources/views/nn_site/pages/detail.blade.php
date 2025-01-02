@extends('../nn_site/index')
@section('content')

    @include('nn_site.partials.header')
    <section class="section bg-light">
        <div class="container">
            <div class="row mt-5 align-items-center">


                <div class="col-lg-12 col-md-12 mt-12 mt-sm-0">
                    <div class="text-md-end text-center">
                        <nav aria-label="breadcrumb" class="d-inline-block">
                            <ul class="breadcrumb mb-0 p-0">
                                <li class="breadcrumb-item"><a href="/">მთავარი</a></li>
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
<section class="section">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-5 col-md-6">
                <img src="{{$detail->lang->imgurl}}" style="max-height:500px; max-width:500px;"  class="img-fluid rounded shadow" alt="">
            </div><!--end col-->

            <div class="col-lg-7 col-md-6 mt-4 pt-2 mt-sm-0 pt-sm-0">
                <div class="section-title ms-lg-5">
                    <h4 class="title mb-3">{{$detail->lang->name}}</h4>
                    <p class="text-muted"> {!! $detail->lang->body !!}</p>
                </div>
            </div><!--end col-->
        </div><!--end row-->
    </div>

@if($detail->images->count() > 0)
    <section class="section">
        <div class="container">
            <div class="container mt-30 mt-20">
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
                            <h4 class="title mb-0">ფოტოები</h4>
                        </div>
                    </div><!--end col-->
                </div><!--end row-->

            <div id="grid" class="row">

                @foreach($detail->images as $img)

                    <div class="col-md-3 col-12 spacing picture-item" data-groups='["branding"]'>
                        <div class="card portfolio portfolio-classic portfolio-primary rounded overflow-hidden">
                            <div class="card-img position-relative">
                                <img src="{{$img->lang->imgurl}}" class="img-fluid" alt="">
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

@endif
    @if(isset($relatedItems) && count($relatedItems) > 0)
    <div class="container mt-30 mt-20">
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
                    <h4 class="title mb-0">მსგავსი პროდუქტები</h4>
                </div>
            </div><!--end col-->
        </div><!--end row-->

        <div class="row">
            @foreach($relatedItems as $item)
                <div class="col-lg-4 col-md-6 mb-4 pb-2">
                    <div class="card blog blog-primary shadow rounded overflow-hidden">
                        <div class="image position-relative overflow-hidden">
                            <img src="{{$item->lang->imgurl}}" class="img-fluid" alt="">

                            <div class="blog-tag">
{{--                                <a href="javascript:void(0)" class="badge text-bg-light">{{ $category->lang->imgurl }}</a>--}}
                            </div>
                        </div>

                        <div class="card-body content">
                            <a href="{{fullUrl('detail/'.$item->slug)}}" class="h5 title text-dark d-block mb-0">{{$item->lang->name}}</a>
                            <p class="text-muted mt-2 mb-2">{{$item->lang->description}}</p>
                            <a href="{{fullUrl('detail/'.$item->slug)}}" class="link text-dark">Read More <i class="uil uil-arrow-right align-middle"></i></a>
                        </div>
                    </div>
                </div>
            @endforeach




        </div><!--end row-->
    </div><!--end container-->

</section><!--end section-->
    @endif
@endsection
