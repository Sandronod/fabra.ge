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
                                <li class="breadcrumb-item"><a href="javascript:void(0)">{{$category->lang->name}}</a></li>
                            </ul>
                        </nav>
                    </div>
                </div><!--end col-->
            </div><!--end row-->
        </div><!--end container-->
    </section>


    <section class="section pt-4 pb-5">
        <div class="container">
            <div class="row align-items-center">
                @if($category->lang->imgurl != '')
                <div class="col-lg-5 col-md-6">
                    <img src="{{$category->lang->imgurl}}" style="max-height:500px; max-width:500px;"  class="img-fluid rounded shadow" alt="">
                </div><!--end col-->
                <div class="col-lg-7 col-md-6 mt-4 pt-2 mt-sm-0 pt-sm-0">
                    <div class="section-title ms-lg-5">
                        {{-- <h4 class="title mb-3">{{$category->lang->name}}</h4> --}}
                        <p class="text-muted"> {!! $category->lang->body !!}</p>
                    </div>
                </div><!--end col-->
                @else
                    <div class="col-lg-12">
                        <div class="section-title">
                            {{-- <h4 class="title mb-3">{{$category->lang->name}}</h4> --}}
                            <p class="text-muted"> {!! $category->lang->body !!}</p>
                        </div>
                    </div><!--end col-->
                @endif

            </div><!--end row-->
        </div>
        {{-- @if(isset($clients) && $clients->count() > 0)
            <div class="container mt-100 mt-60">
                <h4 class="title mb-2">ჩვენი კლიენტები</h4>
                <div class="row">
                    <div class="col-12 px-0">
                        <div>
                            <div class="tiny-five-item">
                                    @foreach($clients as $client)
                                        <div class="tiny-slide">
                                            <div class="card portfolio portfolio-classic portfolio-primary m-2 rounded overflow-hidden">
                                                <div class="card-img position-relative text-center">
                                                    <img src="{{$client->lang->imgurl}}" class="img-fluid" alt="">
                                                    <div class="card-overlay"></div>
                    
                                                    <div class="pop-icon">
                                                        <a href="{{$client->lang->imgurl}}" class="btn btn-pills btn-icon lightbox"><i class="uil uil-camera"></i></a>
                                                    </div>
                                                </div>
                                      
                                            </div>
                                        </div><!--end col-->
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!--end col-->
                </div><!--end row-->
            </div>
        @endif --}}
    </section>



@endsection
