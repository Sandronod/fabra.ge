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

        <h3 class="page-title"> {{ trans('general.ptEditCategory') }}

        </h3>

        <!-- END PAGE TITLE-->

        <!-- END PAGE HEADER-->

        <a href="{{ url(getCurrentLocale() . '/manager/category') }}" class="btn green btn-outline sbold uppercase margin-bottom-20"><i class="fa fa-arrow-left"></i> {{ trans('general.back') }}</a>
        <a href="{{fullUrl('manager/category/create')}}" class="btn blue btn-outline sbold uppercase margin-bottom-20 " data-action="collapse-all"><i class="fa fa-plus"></i> Add new</a>

        <div class="portlet light bordered">

            <div class="portlet-body form">



                <div class="tabbable-line">



                    <?php $langs = array_keys(LaravelLocalization::getSupportedLocales()); ?>



                    <ul class="nav nav-tabs ">



                        @for($i = 0; $i < count($langs); $i++)



                            <?php $item = LaravelLocalization::getSupportedLocales()[$langs[$i]]; ?>



                            <li class="@if($langs[$i] == getCurrentLocale()) {{ 'active' }} @endif">

                                <a href="#tab_{{ $i }}" data-toggle="tab" aria-expanded="false">{{ $item['name'] }}</a>

                            </li>



                        @endfor



                    </ul>



                    <div class="tab-content">



                        @for($i = 0; $i < count($langs); $i++)



                            <div id="tab_{{ $i }}" class="tab-pane @if($langs[$i] == getCurrentLocale()) {{ 'active' }} @endif">



                                {!! Form::open(array('method' => 'PATCH' , 'url' => getCurrentLocale() . '/manager/category/' . $categoryId . '/update', 'id' => 'form_' . $langs[$i], 'class' => 'form form-horizontal form_ajax')) !!}



                                    <div class="form-body">

                                        <input type="hidden" name="lang" value="{{ $langs[$i] }}">

                                        <input type="hidden" name="id" value="{{ $category[$i]->id }}">

                                        <input type="hidden" name="lang_id" value="{{ $category[$i]->lang_id }}">

                                        <div class="form-group">

                                            <label class="col-md-2 control-label">{{ trans('general.fclbName') }}

                                                <span aria-required="true" class="required"> * </span>

                                            </label>

                                            <div class="col-md-7">

                                                <input type="text" name="name" class="form-control input-lg" value="{!! $category[$i]->name !!}">

                                            </div>

                                        </div>



                                        <div class="form-group last">

                                            <label class="col-md-2 control-label">{{ trans('general.fclbDesc') }}</label>

                                            <div class="col-md-7">

                                                <textarea type="text" name="description" class="form-control input-lg">{!! $category[$i]->description !!}</textarea>

                                            </div>

                                        </div>



                                        {{-- <div class="form-group">

                                            <label class="control-label col-md-2">{{ trans('general.fclbPhoto') }}</label>

                                            <div class="col-md-3">

                                                <div class="photo">

                                                    <button type="button" class="btn btn-primary red remove-filemanager-photo">

                                                        <i class="fa fa-close"></i>

                                                    </button>

                                                    <img src="{{ (!empty($category[$i]->imgurl)) ? $category[$i]->imgurl : url('assets/nn_cms/custom/images/default-780x450.png') }}" data-default-photo-src="{{ url('assets/nn_cms/custom/images/default-780x450.png') }}" id="showImg_{{$langs[$i]}}" class="img-responsive img-thumbnail center-block img" alt="category photo">

                                                    <input type="hidden" name="imgurl" id="imgurl_{{ $langs[$i] }}"  data-required="1" class="form-control" value="{{ $category[$i]->imgurl }}">

                                                </div>

                                                <button type="button" class="btn green-sharp btn-block sbold uppercase margin-top-10 filemanager-btn" data-lang="{{ $langs[$i] }}">{{ trans('general.fclbSetPhotoBtn') }}</button>

                                            </div>

                                        </div> --}}

                                        {{-- <div class="form-group last">

                                            <label class="col-md-2 control-label">{{ trans('general.fclbParentCategory') }}</label>

                                            <div class="col-md-7">

                                                <select name="parent_id" class="form-control input-lg common-form-select-control selectpicker" data-live-search="true">

                                                    <option selected="selected" value="0">None</option>

                                                    @if(count($parentCategory))



                                                        @foreach($parentCategory as $item)



                                                            <option value="{{ $item->id }}" {{ ($category[$i]->parent_id == $item->id) ? 'selected' : '' }}>{{ $item->name }}</option>



                                                        @endforeach



                                                    @endif

                                                </select>

                                            </div>

                                        </div> --}}

                                    </div>



                                    <div class="form-actions right">

                                        <div class="row">

                                            <div class="col-md-9">

                                                <button type="submit" class="btn green btn-outline sbold uppercase" data-action="collapse-all" data-lang="{{ $langs[$i] }}" data-update-success-text="{{ trans('general.updateSuccess') }}" data-update-error-fill-in-text="{{ trans('general.updateErrorFillIn') }}">{{ trans('general.fclbUpdate') }}</button>

                                            </div>

                                        </div>

                                    </div>



                                {!! Form::close() !!}



                            </div>



                        @endfor



                    </div>



                </div>



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

        <script src="{{ url('assets/nn_cms/custom/js/common-form-select-control.js') }}" type="text/javascript"></script>

        <!-- END COMMON FORM SELECT CONTROL -->

        <script src="{{ url('assets/nn_cms/custom/js/filemanager-image.js') }}" type="text/javascript"></script>
        <script src="{{ url('vendor/laravel-filemanager/js/stand-alone-button.js') }}"></script>
        <script src="{{ url('assets/nn_cms/custom/js/lfm.js') }}" type="text/javascript"></script>

        <!-- END SET IMAGE SCRIPTS -->

        <script src="{{ url('assets/nn_cms/global/plugins/bootstrap-toastr/toastr.min.js') }}" type="text/javascript"></script>

        <script src="{{ url('assets/nn_cms/custom/js/toastr.js') }}" type="text/javascript"></script>

        <!-- END TOASTR SCRIPTS -->

        <script src="{{ url('assets/nn_cms/custom/js/form.js') }}" type="text/javascript"></script>

        <!-- END UPDATE BY AJAX FORM.JS  -->

    @endpush



@stop