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

        <h3 class="page-title"> {{ trans('general.ptCreateCategory') }}

        </h3>

        <!-- END PAGE TITLE-->

        <!-- END PAGE HEADER-->

        <a href="{{ url(getCurrentLocale() . '/manager/category') }}" class="btn green btn-outline sbold uppercase margin-bottom-20"><i class="fa fa-arrow-left"></i> {{ trans('general.back') }}</a>

        <!-- END BACK BTN -->

        <div class="portlet light bordered">

            <div class="portlet-body form">

                {!! Form::open(array('url' => getCurrentLocale() . '/manager/category/store','class' => 'form-horizontal')) !!}

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

                        <div class="form-group last">

                            <label class="col-md-2 control-label">{{ trans('general.fclbDesc') }}</label>

                            <div class="col-md-7">

                                <textarea type="text" name="description" class="form-control input-lg">{{ Request::old('description') }}</textarea>

                            </div>

                        </div>

                        {{-- <div class="form-group">

                            <label class="control-label col-md-2">{{ trans('general.fclbPhoto') }}</label>

                            <div class="col-md-3">

                                <div class="photo">

                                    <button type="button" class="btn btn-primary red remove-filemanager-photo">

                                        <i class="fa fa-close"></i>

                                    </button>

                                    <img src="{{ (Request::old('imgurl')) ? Request::old('imgurl') : url('assets/nn_cms/custom/images/default-780x450.png') }}" data-default-photo-src="{{ url('assets/nn_cms/custom/images/default-780x450.png') }}" id="showImg"  class="img-responsive img-thumbnail center-block img" alt="catalog photo">

                                    <input type="hidden" name="imgurl" id="imgurl"  data-required="1" class="form-control" value="{{ Request::old('imgurl') }}">

                                </div>

                                <button type="button" class="btn green-sharp btn-block sbold uppercase margin-top-10 filemanager-btn" data-lang="">{{ trans('general.fclbSetPhotoBtn') }}</button>

                            </div>

                        </div> --}}

                        {{-- <div class="form-group last">

                            <label class="col-md-2 control-label">{{ trans('general.fclbParentCategory') }}</label>

                            <div class="col-md-7">

                                <select name="parent_id" class="form-control input-lg selectpicker" data-live-search="true">

                                    <option selected="selected" value="0">None</option>

                                    @if(count($category))



                                        @foreach($category as $item)



                                            <option value="{{ $item->id }}" {{ (Request::old('parent_id') == $item->id) ? 'selected' : '' }}>{{ $item->name }}</option>



                                        @endforeach



                                    @endif

                                </select>

                            </div>

                        </div> --}}

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



    @push('head')

        <link href="{{ url('assets/nn_cms/global/plugins/bootstrap-select-1.12.4/css/bootstrap-select.min.css') }}" rel="stylesheet" type="text/css" />

        <!-- END BOOTSTRAP-SELECT -->

    @endpush



    @push('body.bottom')

        <script src="{{ url('assets/nn_cms/global/plugins/bootstrap-select-1.12.4/js/bootstrap-select.min.js') }}" type="text/javascript"></script>

        <!-- END BOOTSTRAP-SELECT -->

        <script src="{{ url('/vendor/laravel-filemanager/js/stand-alone-button.js') }}"></script>
        <script src="{{ url('assets/nn_cms/custom/js/lfm.js') }}" type="text/javascript"></script>
        <script src="{{ url('assets/nn_cms/custom/js/filemanager-image.js') }}" type="text/javascript"></script>

        <!-- END SET IMAGE SCRIPTS -->

    @endpush



@stop