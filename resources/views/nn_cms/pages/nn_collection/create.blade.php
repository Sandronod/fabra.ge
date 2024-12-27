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

        <h3 class="page-title"> {{ trans('general.ptCreateCollection') }}

        </h3>

        <!-- END PAGE TITLE-->

        <!-- END PAGE HEADER-->

        <a href="{{ url(getCurrentLocale() . '/manager/collection') }}" class="btn green btn-outline sbold uppercase margin-bottom-20"><i class="fa fa-arrow-left"></i> {{ trans('general.back') }}</a>

        <!-- END BACK BTN -->

        <div class="portlet light bordered">

            <div class="portlet-body form">

                {!! Form::open(array('url' => getCurrentLocale() . '/manager/collection/store','class' => 'form-horizontal')) !!}

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

                        <div class="form-group{{ ($errors->has('type')) ? ' has-error' : ''}}">

                            <label class="col-md-2 control-label">{{ trans('general.fclbType') }}

                                <span aria-required="true" class="required"> * </span>

                            </label>

                            <div class="col-md-7">

                                <select name="type" class="form-control input-lg">

                                    <option disabled selected value>{{ trans('general.chooseCollection') }}</option>
                                    @foreach(Config::get('collections.collection_types') as $key => $val)
                                    <option value="{{$val}}" {{ (Request::old($key) == 'article') ? 'selected' : '' }}>{{ $key }}</option>
                                    @endforeach
                                </select>

                                @if($errors->has('type'))

                                    <div class="error-text text-danger">

                                        {{ $errors->default->get('type')[0] }}

                                    </div>

                                @endif

                            </div>

                        </div>

                        <div class="form-group last">

                            <label class="col-md-2 control-label">{{ trans('general.fclbDesc') }}</label>

                            <div class="col-md-7">

                                <textarea type="text" name="description" class="form-control input-lg">{{ Request::old('description') }}</textarea>

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