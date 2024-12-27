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
                        <form action="{{fullUrl('manager/transactions')}}" method="get" class="margin-bottom-20" autocomplete="off">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="შეიყვანეთ მიმღების ID" name="user_id" value="{{request()->get('user_id')}}">
                                <span class="input-group-btn">
                                    <button class="btn btn-default" type="submit">ძებნა</button>
                                </span>
                            </div>
                        </form>
                    </div>
                    @if (request()->get('user_id'))
                        <div class="col-md-6">
                            <a class="btn btn-default" href="{{fullUrl('manager/transactions')}}" role="button">უკან დაბრუნება</a>
                        </div>
                    @endif
                </div>
                <ul class="nav nav-tabs">
                    <li role="presentation"><a href="{{fullUrl('manager/site-users')}}">ფრილანსერები</a></li>
                    <li role="presentation"><a href="{{fullUrl('manager/companies')}}">კომპანიები</a></li>
                    <li role="presentation" class="active"><a href="{{fullUrl('manager/transactions')}}">ტრანზაქციები</a></li>
                    <li role="presentation"><a href="{{fullUrl('manager/package_transactions')}}">პაკეტების შეძენა</a></li>
                </ul>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th style="text-align: left;">id</th>
                            <th style="text-align: left;">ჩამრიცხავი კომპანიის ID</th>
                            <th style="text-align: left;">მიმღების ID</th>
                            <th style="text-align: left;">მიმღების <span class="text-primary">IBAN</span></th>
                            <th style="text-align: left;">სრული ბიუჯეტი</th>
                            <th style="text-align: left;">ჩარიცხული თანხა</th>
                            <th style="text-align: left;">დარჩენილი თანხა</th>
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
                                        <span class="text-primary d-inline-block margin-right-10">ID: {{$item->company_id}}</span>&nbsp;
                                        <a href="{{fullUrl('companies/details/'.$item['company']->id)}}" target="_blank">
                                            <img src="{{ url($item['company']->logo ? 'assets/nn_site/uploads/company/'.$item['company']->logo : 'assets/nn_cms/layouts/layout/img/user-default-photo.png') }}" width="30" height="30" alt="{{$item['company']->firstname}}" class="img-circle margin-right-10">
                                            {{$item['company']->name}}
                                        </a>
                                    </div>
                                </td>
                                <td style="text-align: left;">
                                    <div style="display: flex;align-items: center;">
                                        @if (isset($item['receiver_user']))
                                        <span class="text-primary d-inline-block margin-right-10">ID: {{$item->user_id}}</span>&nbsp;
                                            <a href="{{fullUrl('job/maker/user/'.$item['receiver_user']->id)}}" target="_blank">
                                                <img src="{{ url($item['receiver_user']->profile_photo ? 'assets/nn_site/uploads/user/'.$item['receiver_user']->profile_photo : 'assets/nn_cms/layouts/layout/img/user-default-photo.png') }}" width="30" height="30" alt="{{$item['receiver_user']->firstname}}" class="img-circle margin-right-10">
                                                {{$item['receiver_user']->firstname}}&nbsp;{{$item['receiver_user']->lastname}}
                                            </a>
                                        @elseif (isset($item['receiver_company']))
                                            <span class="text-primary d-inline-block margin-right-10">ID: {{$item['receiver_company']->id}}</span>&nbsp;
                                            <a href="{{fullUrl('companies/details/'.$item['receiver_company']->id)}}" target="_blank">
                                                <img src="{{ url($item['receiver_company']->logo ? 'assets/nn_site/uploads/company/'.$item['receiver_company']->logo : 'assets/nn_cms/layouts/layout/img/user-default-photo.png') }}" width="30" height="30" alt="{{$item['receiver_company']->firstname}}" class="img-circle margin-right-10">
                                                {{$item['receiver_company']->name}}
                                            </a>
                                        @endif
                                    </div>
                                </td>
                                <td style="text-align: left;"><span class="text-primary">{{$item->iban}}</span></td>
                                <td style="text-align: left;">{{$item->user_offered_budget}}</td>
                                <td style="text-align: left;">{{$item->payment_budget}}</td>
                                <td style="text-align: left;">{{$item->user_offered_left_budget}}</td>
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