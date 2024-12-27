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


        <h3 class="page-title"> {{ trans('general.ptCreateInfo') }}


        </h3>


        <!-- END PAGE TITLE-->


        <!-- END PAGE HEADER-->


        <a href="{{ url(getCurrentLocale() . '/manager/collection/' . $collection->id . '/info') }}" class="btn green btn-outline sbold uppercase margin-bottom-20"><i class="fa fa-arrow-left"></i> {{ trans('general.back') }}</a>


        <!-- END BACK BTN -->


        <div class="portlet light bordered">


            <div class="portlet-body form">


                {!! Form::open(array('url' => getCurrentLocale() . '/manager/collection/info/store','class' => 'form-horizontal')) !!}


                    <div class="form-body">


                        <input name="collection_id" value="{{ $collection->id }}" type="hidden">


                        <div class="form-group{{ ($errors->has('name')) ? ' has-error' : ''}}">


                            <label class="control-label col-md-2">{{ trans('general.fclbName') }}


                                <span aria-required="true" class="required"> * </span>


                            </label>


                            <div class="col-md-4">


                                <input name="name" data-required="1"  class="form-control input-lg" type="text" value="{{ Request::old('name') }}">


                                @if($errors->has('name'))


                                    <div class="error-text text-danger">


                                        {{ $errors->default->get('name')[0] }}


                                    </div>


                                @endif


                            </div>


                        </div>


                        <div class="form-group{{ ($errors->has('slug')) ? ' has-error' : ''}}">


                            <label class="control-label col-md-2">{{ trans('general.fclbSlug') }}


                            </label>


                            <div class="col-md-4">


                                <input type="text" name="slug" class="form-control input-lg" value="{{ Request::old('slug') }}">


                                @if($errors->has('slug'))


                                    <div class="error-text text-danger">


                                        {{ $errors->default->get('slug')[0] }}


                                    </div>


                                @endif


                            </div>


                        </div>

                        {{-- <div class="form-group{{ ($errors->has('slug')) ? ' has-error' : ''}}">


                                <label class="control-label col-md-2">დაწყების და დამთავრების დრო


                                </label>


                                <div class="col-md-4">


                                    <div class="input-group input-medium date date-picker" data-date-format="dd-mm-yyyy" data-date-start-date="+0d">
                                                                <input type="text" name="AstartTime"  class="form-control" value="" readonly>
                                                                <span class="input-group-btn">
                                                                    <button class="btn default" type="button">
                                                                        <i class="fa fa-calendar"></i>
                                                                    </button>
                                                                </span>
                                                            </div><br>
                                        <div class="input-group input-medium date date-picker" data-date-format="dd-mm-yyyy" data-date-start-date="+0d">
                                                                <input type="text" name="AendDate" class="form-control" readonly>
                                                                <span class="input-group-btn">
                                                                    <button class="btn default" type="button">
                                                                        <i class="fa fa-calendar"></i>
                                                                    </button>
                                                                </span>
                                                            </div>


                                


                                </div>


                        </div> --}}

                        <div class="form-group">


                            <label class="control-label col-md-2">{{ trans('general.fclbPhoto') }}</label>


                            <div class="col-md-3">


                                <div class="photo">


                                    <button type="button" class="btn btn-primary red remove-filemanager-photo">


                                        <i class="fa fa-close"></i>


                                    </button>


                                    <img src="{{ (Request::old('imgurl')) ? Request::old('imgurl') : url('assets/nn_cms/custom/images/default-780x450.png') }}" data-default-photo-src="{{ url('assets/nn_cms/custom/images/default-780x450.png') }}" id="showImg" class="img-responsive img-thumbnail center-block img" alt="info photo">


                                    <input type="hidden" name="imgurl" id="imgurl" data-required="1" class="form-control" value="{{ Request::old('imgurl') }}">


                                </div>


                                <button type="button" class="btn green-sharp btn-block sbold uppercase margin-top-10 filemanager-btn" data-lang="">{{ trans('general.fclbSetPhotoBtn') }}</button>


                            </div>


                        </div>


                        <div class="form-group last">


                            <label class="control-label col-md-2">{{ trans('general.fclbDesc') }}</label>


                            <div class="col-md-7">


                                <textarea name="description" class="form-control input-lg">{{ Request::old('description') }}</textarea>


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





    @push('body.bottom')


        <script src="{{ url('assets/nn_cms/custom/js/slugify-form-control-name.js') }}" type="text/javascript"></script>


        <!-- END SLUGIFY FORM-CONTROL NAME -->


        <script src="{{ url('/vendor/laravel-filemanager/js/stand-alone-button.js') }}"></script>
        <script src="{{ url('assets/nn_cms/custom/js/lfm.js') }}" type="text/javascript"></script>
        <script src="{{ url('assets/nn_cms/custom/js/filemanager-image.js') }}" type="text/javascript"></script>


        <!-- END SET IMAGE SCRIPTS -->


    @endpush


    


@stop