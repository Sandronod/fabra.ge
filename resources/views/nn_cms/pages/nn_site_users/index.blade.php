@extends('../nn_cms/index')

@section('content')

    <div class="page-content">
        <!-- BEGIN PAGE HEADER-->
        <!-- BEGIN PAGE BAR -->
        <div class="page-bar">
            <ul class="page-breadcrumb">
                <li>
                    <a href="{{ url(getCurrentLocale() . '/manager') }}">{{ trans('general.bcHome') }}</a>
                    <i class="fa fa-circle"></i>
                </li>
            </ul>
        </div>
        <!-- END PAGE BAR -->
        <!-- BEGIN PAGE TITLE-->
        <h3 class="page-title">საიტის მომხმარებლები</h3>
        <!-- END PAGE TITLE-->
        <!-- END PAGE HEADER-->
        <div class="portlet light bordered">
            <div class="portlet-body clearfix">
                <div class="row">
                    <div class="col-md-6">
                        <form action="{{fullUrl('manager/site-users')}}" method="get" class="margin-bottom-20" autocomplete="off">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="შეიყვანეთ მომხმარებლის ID" name="id" value="{{request()->get('id')}}">
                                <span class="input-group-btn">
                                    <button class="btn btn-default" type="submit">ძებნა</button>
                                </span>
                            </div>
                        </form>
                    </div>
                    @if (request()->get('id'))
                        <div class="col-md-6">
                            <a class="btn btn-default" href="{{fullUrl('manager/site-users')}}" role="button">უკან დაბრუნება</a>
                        </div>
                    @endif
                </div>
                <ul class="nav nav-tabs">
                    <li role="presentation" class="active"><a href="{{fullUrl('manager/site-users')}}">ფრილანსერები</a></li>
                    <li role="presentation"><a href="{{fullUrl('manager/companies')}}">კომპანიები</a></li>
                    <li role="presentation"><a href="{{fullUrl('manager/transactions')}}">ტრანზაქციები</a></li>
                    <li role="presentation"><a href="{{fullUrl('manager/package_transactions')}}">პაკეტების შეძენა</a></li>
                </ul>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th style="text-align: left;">id</th>
                            <th style="text-align: left;">სახელი</th>
                            <th style="text-align: left;">ელ-ფოსტა</th>
                            <th style="text-align: left;">ტელეფონი</th>
                            <th style="text-align: left;">კატეგორიები</th>
                            <th style="text-align: left;">რეიტინგი</th>
                            <th style="text-align: left;">პაკეტი აქტიურია</th>
                            <th style="text-align: left;">მოთხოვნის გაგზავნის რაოდენობა</th>
                            <th style="text-align: left;">პაკეტის ვადა (მდე)</th>
                        </tr>
                    </thead>
                    <tbody class="load-wrapper">
                        @foreach ($items as $item)
                            <tr>
                                <th scope="row" style="text-align: left;">{{$item->id}}</th>
                                <td style="text-align: left;">
                                    <a href="{{fullUrl('job/maker/user/'.$item->id)}}" target="_blank">
                                        <img src="{{ url($item->profile_photo ? 'assets/nn_site/uploads/user/'.$item->profile_photo : 'assets/nn_cms/layouts/layout/img/user-default-photo.png') }}" width="30" height="30" alt="{{$item->firstname}}" class="img-circle margin-right-10">
                                        {{$item->firstname}}&nbsp;{{$item->lastname}}
                                    </a>
                                </td>
                                <td style="text-align: left;">{{$item->email}}</td>
                                <td style="text-align: left;">{{$item->phone}}</td>
                                <td style="text-align: left;">
                                    <ul>
                                        @foreach ($item->categories as $cItem)
                                            <li>{{ $cItem->name }}</li>
                                        @endforeach
                                    </ul>
                                </td>
                                <td style="text-align: left;">{{$item->rating}}</td>
                                <td style="text-align: left;">{{$item->package_valid ? 'კი' : 'არა'}}</td>
                                <td style="text-align: left;">{{$item->request_projects_count}}</td>
                                <td style="text-align: left;">{{$item->package_valid ? $item->package_end_date : '-'}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    @push('body.bottom')
        <script>
            var loadWrapper = $('.load-wrapper');
            var page = 1;
            var loaded = 0;
            var loadSpinnerWrapper = $('.load-spinner-wrapper');

            $(window).scroll(function() {
                if (loaded) return false;

                if (($(document).scrollTop() + $(window).height()) >= (loadWrapper.offset().top + loadWrapper.height())) {

                    page += 1;
                    loaded = 1;

                    loadSpinnerWrapper.removeClass('d-none');

                    $.ajax({
                        url: window.location.href,
                        type: 'get',
                        data: {page: page},
                        success: function(response) {

                            if (response.isMore) loaded = 0;
                            else loaded = 1;

                            loadWrapper.append(response.view);
                            loadSpinnerWrapper.addClass('d-none');

                        }
                    });
                }
            });
        </script>
    @endpush

@stop