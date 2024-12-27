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
        <h3 class="page-title"> {{ trans('general.ptCreateColor') }}
        </h3>
        <!-- END PAGE TITLE-->
        <!-- END PAGE HEADER-->
        <a href="{{ url(getCurrentLocale() . '/manager/color') }}" class="btn green btn-outline sbold uppercase margin-bottom-20"><i class="fa fa-arrow-left"></i> {{ trans('general.back') }}</a>
        <!-- END BACK BTN -->
        <div class="portlet light bordered">
            <div class="portlet-body form">
                {!! Form::open(array('url' => getCurrentLocale() . '/manager/color/store','class' => 'form-horizontal')) !!}
                    <div class="form-body">
                        <div class="form-group{{ ($errors->has('name')) ? ' has-error' : ''}}">
                            <label class="col-md-2 control-label">{{ trans('general.fclbName') }}
                                <span aria-required="true" class="required"> * </span>
                            </label>
                            <div class="col-md-7">
                                <input type="text" name="name" class="form-control input-lg" value="{{ Request::old('name') }}">
                                @if($errors->has('name'))
                                    <div class="error-text text-danger">
                                        {{ $errors->default->get('name')[0] }}
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="form-group last{{ ($errors->has('name')) ? ' has-error' : ''}}">
                            <label class="col-md-2 control-label">{{ trans('general.fclbColorCode') }}
                                <span aria-required="true" class="required"> * </span>
                            </label>
                            <div class="col-md-7">
                                <input type="text" name="color_code" class="form-control input-lg" value="{{ Request::old('color_code') }}">
                                @if($errors->has('color_code'))
                                    <div class="error-text text-danger">
                                        {{ $errors->default->get('color_code')[0] }}
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="form-actions right">
                        <div class="row">
                            <div class="col-md-9">
                                <button type="submit" class="btn green btn-outline sbold uppercase" data-action="collapse-all">{{ trans('general.fclbCreate') }}</button>
                            </div>
                        </div>
                    </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>

@stop