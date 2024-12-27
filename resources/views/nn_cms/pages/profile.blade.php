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
		</div>
		<!-- END PAGE BAR -->
		<!-- BEGIN PAGE TITLE-->
		<h3 class="page-title"> {{ trans('general.ptUserProfile') }}
		</h3>
		<!-- END PAGE TITLE-->
		<!-- END PAGE HEADER-->
		<div class="row">
		    <div class="col-md-12">
		        <!-- BEGIN PROFILE SIDEBAR -->
		        <div class="profile-sidebar">
		            <!-- PORTLET MAIN -->
		            <div class="portlet light profile-sidebar-portlet">
		                <!-- SIDEBAR USERPIC -->
		                <div class="profile-userpic">
							@if(Request::is('*/profile/photo'))
								<button type="button" class="btn btn-primary red remove-filemanager-photo">
									<i class="fa fa-close"></i>
								</button>
								<img src="@if(Auth::user()->imgurl) {{ Auth::user()->imgurl }} @else {{ url('assets/nn_cms/layouts/layout/img/user-default-photo.png') }} @endif" id="showImg" class="img-responsive profile-userpic-showimg" alt="profile photo" data-default-photo-src={{ url('assets/nn_cms/layouts/layout/img/user-default-photo.png') }}>
							@else
								<img src="@if(Auth::user()->imgurl) {{ Auth::user()->imgurl }} @else {{ url('assets/nn_cms/layouts/layout/img/user-default-photo.png') }} @endif" class="img-responsive" alt="profile photo">
							@endif
						</div>
		                <!-- END SIDEBAR USERPIC -->
		                <!-- SIDEBAR USER TITLE -->
		                <div class="profile-usertitle">
		                    <div class="profile-usertitle-name text-capitalize"> {{ Auth::user()->name }} </div>
		                    <div class="profile-usertitle-job"> administrator </div>
		                </div>
		                <!-- END SIDEBAR USER TITLE -->
		            </div>
		            <!-- END PORTLET MAIN -->
		            <!-- PORTLET MAIN -->
		            {{--<div class="portlet light ">--}}
		                {{--<!-- STAT -->--}}
		                {{--<div class="row list-separated profile-stat">--}}
		                    {{--<div class="col-md-4 col-sm-4 col-xs-6">--}}
		                        {{--<div class="uppercase profile-stat-title"> 37 </div>--}}
		                        {{--<div class="uppercase profile-stat-text"> {{ trans('general.projects') }} </div>--}}
		                    {{--</div>--}}
		                    {{--<div class="col-md-4 col-sm-4 col-xs-6">--}}
		                        {{--<div class="uppercase profile-stat-title"> 51 </div>--}}
		                        {{--<div class="uppercase profile-stat-text"> {{ trans('general.tasks') }} </div>--}}
		                    {{--</div>--}}
		                    {{--<div class="col-md-4 col-sm-4 col-xs-6">--}}
		                        {{--<div class="uppercase profile-stat-title"> 61 </div>--}}
		                        {{--<div class="uppercase profile-stat-text"> {{ trans('general.uploads') }} </div>--}}
		                    {{--</div>--}}
		                {{--</div>--}}
		                {{--<!-- END STAT -->--}}
		            {{--</div>--}}
		            <!-- END PORTLET MAIN -->
		        </div>
		        <!-- END BEGIN PROFILE SIDEBAR -->
		        <!-- BEGIN PROFILE CONTENT -->
		        <div class="profile-content">
		            <div class="row">
		                <div class="col-md-12">
		                    <div class="portlet light ">
		                        <div class="portlet-title tabbable-line">
		                            <div class="caption caption-md">
		                                <i class="icon-globe theme-font hide"></i>
		                                <span class="caption-subject font-blue-madison bold uppercase">{{ trans('general.fclbProfileAccount') }}</span>
		                                @if(isset($stab))
		                                	$stab
		                                @endif
		                            </div>
		                            <ul class="nav nav-tabs">
		                                <li <?php if(Request::is(getCurrentLocale() . '/manager/user/profile')): ?>class="active"<?php endif; ?>>
		                                    <a href="{{ url(getCurrentLocale() . '/manager/user/profile') }}">{{ trans('general.fclbPersonalInfo') }}</a>
		                                </li>
		                                <li <?php if(Request::is(getCurrentLocale() . '/manager/user/profile/photo')): ?>class="active"<?php endif; ?>>
		                                    <a href="{{ url(getCurrentLocale() . '/manager/user/profile/photo') }}">{{ trans('general.fclbChangePhoto') }}</a>
		                                </li>
		                                <li <?php if(Request::is(getCurrentLocale() . '/manager/user/profile/password')): ?>class="active"<?php endif; ?>>
		                                    <a href="{{ url(getCurrentLocale() . '/manager/user/profile/password') }}">{{ trans('general.fclbChangePassword') }}</a>
		                                </li>
		                            </ul>
		                        </div>
		                        <div class="portlet-body">
		                            <div class="tab-content">
		                                @yield('tab_content')
		                            </div>
		                        </div>
		                    </div>
		                </div>
		            </div>
		        </div>
		        <!-- END PROFILE CONTENT -->
		    </div>
		</div>
	</div>

	@push('head')
		<!--.. BEGIN PROFILE STYLES -->
		<link href="{{ url('assets/nn_cms/pages/css/profile.min.css') }}" rel="stylesheet" type="text/css" />
		<!--.. END PROFILE STYLES -->
		<!-- END PROFILE CSS -->
	@endpush

	@push('body.bottom')
		<script src="{{ url('assets/nn_cms/global/plugins/bootstrap-toastr/toastr.min.js') }}" type="text/javascript"></script>
		<script src="{{ url('assets/nn_cms/custom/js/toastr.js') }}" type="text/javascript"></script>
		<script type="text/javascript">
			@if(Session::has('status'))
				var type = "{{ Session::get('status') }}";
				switch(type){
					case 'success':
						toastr.success("{{ trans('general.updateSuccess') }}");
						break;

					case 'error':
						toastr.error("{{ trans('general.updateSuccess') }}");
						break;
				}
			@endif
		</script>
		<!-- END TOASTR SCRIPTS -->
	@endpush

@stop