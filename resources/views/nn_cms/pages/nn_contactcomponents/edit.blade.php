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
        <h3 class="page-title"> {{ trans('general.ptEditHeaderComponent') }}
        </h3>
        <!-- END PAGE TITLE-->
        <!-- END PAGE HEADER-->
        <div class="portlet light bordered">
            <div class="portlet-body form">

                {!! Form::open(array('method' => 'post' , 'url' => getCurrentLocale() . '/manager/contactComponents/update', 'class' => 'form form-horizontal')) !!}

                <div class="form-body">
                    <div class="form-group">
                        <label class="col-md-2 control-label">{{ trans('general.fclbPhone') }}</label>
                        <div class="col-md-7">
                            <input type="text" name="phone" class="form-control input-lg" value="{{ $contactComponents[0]['phone'] }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label">{{ trans('general.fclbEmail') }}</label>
                        <div class="col-md-7">
                            <input type="email" name="email" class="form-control input-lg" value="{{ $contactComponents[0]['email'] }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label">{{ trans('general.fclbFacebook') }}</label>
                        <div class="col-md-7">
                            <input type="text" name="facebook" class="form-control input-lg" value="{{ $contactComponents[0]['facebook'] }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label">{{ trans('general.fclbYoutube') }}</label>
                        <div class="col-md-7">
                            <input type="text" name="youtube" class="form-control input-lg" value="{{ $contactComponents[0]['youtube'] }}">
                        </div>
                    </div>
                    <div class="form-group last">
                        <label class="col-md-2 control-label">{{ trans('general.fclbMap') }}</label>
                        <div class="col-md-7">
                            <input type="text" name="map" class="form-control input-lg" value="{{ $contactComponents[0]['map'] }}">
                        </div>
                    </div>
                </div>
                <div class="form-actions right">
                    <div class="row">
                        <div class="col-md-9">
                            <button type="submit" class="btn green btn-outline sbold uppercase" data-update-success-text="{{ trans('general.updateSuccess') }}">{{ trans('general.fclbUpdate') }}</button>
                        </div>
                    </div>
                </div>

                {!! Form::close() !!}

            </div>
        </div>
    </div>

    @push('body.bottom')
        <script src="{{ url('assets/nn_cms/global/plugins/bootstrap-toastr/toastr.min.js') }}" type="text/javascript"></script>
        <script src="{{ url('assets/nn_cms/custom/js/toastr.js') }}" type="text/javascript"></script>
        <!-- END TOASTR SCRIPTS -->
    @endpush

@stop