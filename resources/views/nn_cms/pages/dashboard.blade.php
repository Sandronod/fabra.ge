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
                {{-- <li>
                    <span>selected</span>
                </li> --}}
            </ul>
            {{--<div class="page-toolbar">--}}
                {{--<div id="dashboard-report-range" class="pull-right tooltips btn btn-sm" data-container="body" data-placement="bottom" data-original-title="Change dashboard date range">--}}
                    {{--<i class="icon-calendar"></i>&nbsp;--}}
                    {{--<span class="thin uppercase hidden-xs"></span>&nbsp;--}}
                    {{--<i class="fa fa-angle-down"></i>--}}
                {{--</div>--}}
            {{--</div>--}}
        </div>
        <!-- END PAGE BAR -->
        <!-- BEGIN PAGE TITLE-->
        <h3 class="page-title"> {{ trans('general.dashboard') }}
        </h3>
        <!-- END PAGE TITLE-->
        <!-- END PAGE HEADER-->
        <!-- BEGIN DASHBOARD STATS 1-->
        <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                <div class="dashboard-stat blue">
                    <div class="visual">
                        <i class="fa fa-bars"></i>
                    </div>
                    <div class="details">
                        <div class="number">
                            <span data-counter="counterup" data-value="{{ $countMenus ? $countMenus : 0 }}"></span>
                        </div>
                        <div class="desc"> {{ trans('general.countMenus') }} </div>
                    </div>
                    <a class="more" href="{{ url(getCurrentLocale() . '/manager/menu') }}"> {{ trans('general.viewMore') }}
                        <i class="m-icon-swapright m-icon-white"></i>
                    </a>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                <div class="dashboard-stat green">
                    <div class="visual">
                        <i class="fa fa-square"></i>
                    </div>
                    <div class="details">
                        <div class="number">
                            <span data-counter="counterup" data-value="{{ $totalMenuItems ? $totalMenuItems : 0 }}"></span>
                        </div>
                        <div class="desc"> {{ trans('general.countPages') }} </div>
                    </div>
                    <a class="more" href="{{ $primaryMenuId ? url(getCurrentLocale() . '/manager/menu/' . $primaryMenuId . '/items') : '' }}"> {{ trans('general.viewMore') }}
                        <i class="m-icon-swapright m-icon-white"></i>
                    </a>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                <div class="dashboard-stat purple">
                    <div class="visual">
                        <i class="fa fa-cubes"></i>
                    </div>
                    <div class="details">
                        <div class="number">
                            <span data-counter="counterup" data-value="{{ $countCollections ? $countCollections : 0 }}"></span>
                        </div>
                        <div class="desc"> {{ trans('general.countCollections') }} </div>
                    </div>
                    <a class="more" href="{{ url(getCurrentLocale() . '/manager/collection') }}"> {{ trans('general.viewMore') }}
                        <i class="m-icon-swapright m-icon-white"></i>
                    </a>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
        <!-- END DASHBOARD STATS 1-->
        {{--<div class="row">--}}
            {{--<div class="col-md-12 col-sm-12">--}}
                {{--<!-- BEGIN PORTLET-->--}}
                {{--<div class="portlet light bordered">--}}
                    {{--<div class="portlet-title">--}}
                        {{--<div class="caption">--}}
                            {{--<i class="icon-bar-chart font-green"></i>--}}
                            {{--<span class="caption-subject font-green bold uppercase">Site Visits</span>--}}
                            {{--<span class="caption-helper">weekly stats...</span>--}}
                        {{--</div>--}}
                        {{--<div class="actions">--}}
                            {{--<div class="btn-group btn-group-devided" data-toggle="buttons">--}}
                                {{--<label class="btn red btn-outline btn-circle btn-sm active">--}}
                                    {{--<input type="radio" name="options" class="toggle" id="option1">New</label>--}}
                                {{--<label class="btn red btn-outline btn-circle btn-sm">--}}
                                    {{--<input type="radio" name="options" class="toggle" id="option2">Returning</label>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                    {{--<div class="portlet-body">--}}
                        {{--<div id="site_statistics_loading">--}}
                            {{--<img src="{{ url('assets/nn_cms/global/img/loading.gif') }}" alt="loading" /> </div>--}}
                        {{--<div id="site_statistics_content" class="display-none">--}}
                            {{--<div id="site_statistics" class="chart"> </div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
                {{--<!-- END PORTLET-->--}}
            {{--</div>--}}
        {{--</div>--}}
    </div>

{{--    @push('body.bottom')--}}
        {{--<script src="{{ url('assets/nn_cms/pages/scripts/dashboard.min.js') }}" type="text/javascript"></script>--}}
        <!-- END DASHBOARD SCRIPT -->
    {{--@endpush--}}

@stop