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
                        <form action="{{fullUrl('manager/package_transactions')}}" method="get" class="margin-bottom-20" autocomplete="off">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="შეიყვანეთ პაკეტის ID" name="package_id" value="{{request()->get('package_id')}}">
                                <span class="input-group-btn">
                                    <button class="btn btn-default" type="submit">ძებნა</button>
                                </span>
                            </div>
                        </form>
                    </div>
                    @if (request()->get('package_id'))
                        <div class="col-md-6">
                            <a class="btn btn-default" href="{{fullUrl('manager/package_transactions')}}" role="button">უკან დაბრუნება</a>
                        </div>
                    @endif
                </div>
                <ul class="nav nav-tabs">
                    <li role="presentation"><a href="{{fullUrl('manager/site-users')}}">ფრილანსერები</a></li>
                    <li role="presentation"><a href="{{fullUrl('manager/companies')}}">კომპანიები</a></li>
                    <li role="presentation"><a href="{{fullUrl('manager/transactions')}}">ტრანზაქციები</a></li>
                    <li role="presentation" class="active"><a href="{{fullUrl('manager/package_transactions')}}">პაკეტების შეძენა</a></li>
                </ul>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th style="text-align: left;">id</th>
                            <th style="text-align: left;">ჩამრიცხავის ID</th>
                            <th style="text-align: left;">პაკეტის ID / დასახელება</th>
                            <th style="text-align: left;">სტატუსი</th>
                            <th style="text-align: left;">დრო</th>
                        </tr>
                    </thead>
                    <tbody class="load-wrapper">
                        @foreach ($items as $item)
                            <tr>
                                <th scope="row" style="text-align: left;">{{$item->id}}</th>
                                <td style="text-align: left;">
                                    <div style="display: flex;align-items: center;">
                                        @if (isset($item['sender_user']))
                                        <span class="text-primary d-inline-block margin-right-10">ID: {{$item->user_id}}</span>&nbsp;
                                            <a href="{{fullUrl('job/maker/user/'.$item['sender_user']->id)}}" target="_blank">
                                                <img src="{{ url($item['sender_user']->profile_photo ? 'assets/nn_site/uploads/user/'.$item['sender_user']->profile_photo : 'assets/nn_cms/layouts/layout/img/user-default-photo.png') }}" width="30" height="30" alt="{{$item['sender_user']->firstname}}" class="img-circle margin-right-10" style="object-fit: cover;">
                                                {{$item['sender_user']->firstname}}&nbsp;{{$item['sender_user']->lastname}}
                                            </a>
                                        @elseif (isset($item['sender_company']))
                                            <span class="text-primary d-inline-block margin-right-10">ID: {{$item['sender_company']->id}}</span>&nbsp;
                                            <a href="{{fullUrl('companies/details/'.$item['sender_company']->id)}}" target="_blank">
                                                <img src="{{ url($item['sender_company']->logo ? 'assets/nn_site/uploads/company/'.$item['sender_company']->logo : 'assets/nn_cms/layouts/layout/img/user-default-photo.png') }}" width="30" height="30" alt="{{$item['sender_company']->firstname}}" class="img-circle margin-right-10" style="object-fit: cover;">
                                                {{$item['sender_company']->name}}
                                            </a>
                                        @endif
                                    </div>
                                </td>
                                <td style="text-align: left;">
                                    {{$item->package_id}} / {{$item['package_name']}}
                                </td>
                                <td style="text-align: left;">
                                    @if ($item->status == 0)
                                        <span class="text-warning">მიმდინარე</span>
                                    @elseif ($item->status == 1)
                                        <span class="text-success">დარიცხული</span>
                                    @elseif ($item->status == 2)
                                        <span class="text-danger">მოხდა შეცდომა დარიცხვისას</span>
                                    @endif
                                </td>
                                <td style="text-align: left;">{{$item->created_at}}</td>
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