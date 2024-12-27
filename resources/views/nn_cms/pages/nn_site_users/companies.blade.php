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
                        <form action="{{fullUrl('manager/companies')}}" method="get" class="margin-bottom-20" autocomplete="off">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="შეიყვანეთ კომპანიის ID" name="id" value="{{request()->get('id')}}">
                                <span class="input-group-btn">
                                    <button class="btn btn-default" type="submit">ძებნა</button>
                                </span>
                            </div>
                        </form>
                    </div>
                    @if (request()->get('id'))
                        <div class="col-md-6">
                            <a class="btn btn-default" href="{{fullUrl('manager/companies')}}" role="button">უკან დაბრუნება</a>
                        </div>
                    @endif
                </div>
                <ul class="nav nav-tabs">
                    <li role="presentation"><a href="{{fullUrl('manager/site-users')}}">ფრილანსერები</a></li>
                    <li role="presentation" class="active"><a href="{{fullUrl('manager/companies')}}">კომპანიები</a></li>
                    <li role="presentation"><a href="{{fullUrl('manager/transactions')}}">ტრანზაქციები</a></li>
                    <li role="presentation"><a href="{{fullUrl('manager/package_transactions')}}">პაკეტების შეძენა</a></li>
                </ul>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th style="text-align: left;">id</th>
                            <th style="text-align: left;">დასახელება</th>
                            <th style="text-align: left;">კატეგორიები</th>
                            <th style="text-align: left;">რეიტინგი</th>
                            <th style="text-align: left;">პაკეტი აქტიურია</th>
                            <th style="text-align: left;">დასამატებელი პროექტების რაოდენობა</th>
                            <th style="text-align: left;">მოთხოვნის გაგზავნის რაოდენობა</th>
                            <th style="text-align: left;">ტასკების რაოდენობა</th>
                            <th style="text-align: left;">პაკეტის ვადა (მდე)</th>
                            <th style="text-align: left;">შემსრულებლები</th>
                        </tr>
                    </thead>
                    <tbody class="load-wrapper">
                        @foreach ($items as $item)
                            <tr>
                                <th scope="row" style="text-align: left;">{{$item->id}}</th>
                                <td style="text-align: left;">
                                    <a href="{{fullUrl('companies/details/'.$item->id)}}" target="_blank">
                                        <img src="{{ url($item->logo ? 'assets/nn_site/uploads/company/'.$item->logo : 'assets/nn_cms/layouts/layout/img/user-default-photo.png') }}" width="30" height="30" alt="{{$item->firstname}}" class="img-circle margin-right-10" style="object-fit: cover;">
                                        {{$item->name}}
                                    </a>
                                </td>
                                <td style="text-align: left;">
                                    <ul>
                                        @foreach ($item->categories as $cItem)
                                            <li>{{ $cItem->name }}</li>
                                        @endforeach
                                    </ul>
                                </td>
                                <td style="text-align: left;">{{$item->rating}}</td>
                                <td style="text-align: left;">{{$item->package_valid ? 'კი' : ''}}</td>
                                <td style="text-align: left;">{{$item->add_projects_count}}</td>
                                <td style="text-align: left;">{{$item->request_projects_count}}</td>
                                <td style="text-align: left;">{{$item->tasks_count}}</td>
                                <td style="text-align: left;">{{$item->package_end_date}}</td>
                                <td>
                                    <div class="list-group">
                                        @foreach ($item['jobs'] as $jItem)
                                            <li class="list-group-item">
                                                <h4>პროექტი</h4> 
                                                <a href="{{fullUrl('jobs/details/'.$jItem->id.'?show_job=1')}}" target="_blank">{{$jItem->name}}</a>
                                                <hr>
                                                <h4>შემსრულებელი</h4>
                                                @if (isset($jItem['user']))
                                                    <img src="{{ url($jItem['user']->profile_photo ? 'assets/nn_site/uploads/user/'.$jItem['user']->profile_photo : 'assets/nn_cms/layouts/layout/img/user-default-photo.png') }}" width="30" height="30" alt="{{$jItem['user']->firstname}}" class="img-circle">
                                                    <h5><a href="{{fullUrl('company/job/maker/user/'.$jItem['user']->id)}}" target="_blank">{{$jItem['user']->firstname}}&nbsp;{{$jItem['user']->lastname}}</a></h5>
                                                @elseif (isset($jItem['company']))
                                                    <img src="{{ url($jItem['company']->logo ? 'assets/nn_site/uploads/company/'.$jItem['company']->logo : 'assets/nn_cms/layouts/layout/img/user-default-photo.png') }}" width="30" height="30" alt="{{$jItem['company']->name}}" class="img-circle">
                                                    <h5><a href="{{fullUrl('companies/details/'.$jItem['company']->id)}}" target="_blank">{{$jItem['company']->name}}</a></h5>
                                                @endif
                                                <hr>
                                                @if ($jItem->paid)
                                                    <h4 class="text-success">თანხა სრულად გადახდილია</h4>
                                                @else
                                                    <h4 class="text-danger">დარჩენილი თანხა: {{$jItem->user_left_budget}} ₾</h4>
                                                @endif
                                            </li>
                                        @endforeach
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    @push('body.bottom')
        <style>
            .table td, .table th {
                vertical-align: top!important;
            }
        </style>
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