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
                                <li class="breadcrumb-item"><a href="#">{{$category->lang->name}}</a></li>
                            </ul>
                        </nav>
                    </div>
                </div><!--end col-->
            </div><!--end row-->
        </div><!--end container-->
    </section>
<!-- Start -->
<section class="section">
    <div class="container">
        <div class="row">
            @if($category)

                @foreach($categoryList as $item)

                <div class="col-lg-4 col-md-6 mb-4 pb-2">
                    <div class="card blog blog-primary shadow rounded overflow-hidden h-100">
                        <div class="image position-relative overflow-hidden">
                            <img src="{{$item->lang->imgurl}}" class="img-fluid" style="height: 305px;" alt="">

                            <div class="blog-tag">
                                <a href="javascript:void(0)" class="badge text-bg-light">{{ $category->lang->name }}</a>
                            </div>
                        </div>

                        <div class="card-body content">
                            <a href="{{fullUrl('detail/'.$item->slug)}}" class="h5 title text-dark d-block mb-0">{{$item->lang->name}}</a>
                            <p class="text-muted mt-2 mb-2">{{$item->lang->description}}</p>
                            <a href="{{fullUrl('detail/'.$item->slug)}}" class="link text-dark">Read More <i class="uil uil-arrow-right align-middle"></i></a>
                        </div>
                    </div>
                </div><!--end col-->
                @endforeach
            @endif

        </div><!--end row-->

        <div class="row">
            <div class="col-12">
{{--                <ul class="pagination justify-content-center mb-0">--}}
{{--                    <li class="page-item">--}}
{{--                        <a class="page-link" href="#" aria-label="Previous">--}}
{{--                            <span aria-hidden="true"><i class="mdi mdi-chevron-left mdi-18px"></i></span>--}}
{{--                        </a>--}}
{{--                    </li>--}}
{{--                    <li class="page-item"><a class="page-link" href="#">1</a></li>--}}
{{--                    <li class="page-item"><a class="page-link active" href="#">2</a></li>--}}
{{--                    <li class="page-item"><a class="page-link" href="#">3</a></li>--}}
{{--                    <li class="page-item">--}}
{{--                        <a class="page-link" href="#" aria-label="Next">--}}
{{--                            <span aria-hidden="true"><i class="mdi mdi-chevron-right mdi-18px"></i></span>--}}
{{--                        </a>--}}
{{--                    </li>--}}
{{--                </ul>--}}
            </div><!--end col-->
        </div><!--end row-->
    </div><!--end container-->
</section><!--end section-->
<!-- End -->

@endsection
