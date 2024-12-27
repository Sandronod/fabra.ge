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


        <h3 class="page-title"> Create text of translate


        </h3>


        <!-- END PAGE TITLE-->


        <!-- END PAGE HEADER-->


        <a href="{{ url(getCurrentLocale() . '/manager/translate') }}" class="btn green btn-outline sbold uppercase margin-bottom-20"><i class="fa fa-arrow-left"></i> {{ trans('general.back') }}</a>


        <!-- END BACK BTN -->


        <div class="portlet light bordered">


            <div class="portlet-body form">


                {!! Form::open(array('url' => getCurrentLocale() . '/manager/translate/store','class' => 'form-horizontal')) !!}


                    <div class="form-body">


                        <div class="form-group{{ ($errors->has('trans_key')) ? ' has-error' : ''}}">


                            <label class="control-label col-md-2">Key


                                <span aria-required="true" class="required"> * </span>


                            </label>


                            <div class="col-md-4">


                                <input name="trans_key" data-required="1"  class="form-control input-lg" type="text" value="{{ Request::old('trans_key') }}">


                                @if($errors->has('trans_key'))


                                    <div class="error-text text-danger">


                                        {{ $errors->default->get('trans_key')[0] }}


                                    </div>


                                @endif


                            </div>


                        </div>


                        <div class="form-group{{ ($errors->has('name')) ? ' has-error' : ''}}">


                            <label class="control-label col-md-2">Value


                                <span aria-required="true" class="required"> * </span>


                            </label>


                            <div class="col-md-4">


                                <textarea name="name" class="form-control input-lg">{{ Request::old('name') }}</textarea>


                                @if($errors->has('name'))


                                    <div class="error-text text-danger">


                                        {{ $errors->default->get('name')[0] }}


                                    </div>


                                @endif


                            </div>


                        </div>

                    </div>


                    <div class="form-actions right">


                        <div class="row">


                            <div class="col-md-9">


                                <button type="submit" class="btn green-seagreen btn-outline sbold uppercase" data-action="collapse-all">{{ trans('general.fclbAdd') }}</button>


                            </div>


                        </div>


                    </div>


                 {!! Form::close() !!}


            </div>


        </div>


    </div>

@stop