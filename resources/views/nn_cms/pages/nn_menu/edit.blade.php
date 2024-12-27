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
        <h3 class="page-title"> Edit Menu
        </h3>
        <!-- END PAGE TITLE-->
        <!-- END PAGE HEADER-->
        <div class="portlet light bordered">
            <div class="portlet-body form">
                {!! Form::open(array('method' => 'PATCH' , 'url' => getCurrentLocale() . '/manager/menu/update' , 'class' => 'form-horizontal')) !!}
                    {!! Form::token() !!}
                    <div class="form-body">
                        <input type="hidden" name="id" value="{{ $menu->id }}">
                        <div class="form-group last">
                            <label class="col-md-2 control-label">{{ trans('general.fclbName') }}
                                <span aria-required="true" class="required"> * </span>
                            </label>
                            <div class="col-md-7">
                                <input type="text" name="name" class="form-control input-lg" value="{!! $menu->name !!}">
                            </div>
                        </div>
                    </div>
                    @if($errors->any())
                        <ul class="alert alert-danger">
                            @foreach($errors->all() as $error)
                                <li>{!! $error !!}</li>
                            @endforeach
                        </ul>
                    @endif
                    <div class="form-actions right">
                        <div class="row">
                            <div class="col-md-9">
                                <button type="submit" class="btn green btn-outline sbold uppercase" data-action="collapse-all">{{ trans('general.fclbUpdate') }}</button>
                            </div>
                        </div>
                    </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>

@stop