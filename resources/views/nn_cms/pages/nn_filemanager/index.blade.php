@extends('../nn_cms/index')



@section('content')

111111111111111111111111111111111111111111

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

        </div>

        <!-- END PAGE BAR -->

        <!-- BEGIN PAGE TITLE-->

        <h3 class="page-title"> {{ trans('general.ptFileManager') }}

        </h3>

        <!-- END PAGE TITLE-->

        <!-- END PAGE HEADER-->

        <iframe src="{{url('laravel-filemanager')}}?type=image" frameborder="0" width="100%" style="height: calc(100vh - 200px);"></iframe>

    </div>



@stop