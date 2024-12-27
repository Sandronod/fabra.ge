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
        <h3 class="page-title"> {{ trans('general.ptEditCatalog') }}
        </h3>
        <!-- END PAGE TITLE-->
        <!-- END PAGE HEADER-->
        <a href="{{ url(getCurrentLocale() . '/manager/collection/' . $collectionId . '/catalog') }}" class="btn green btn-outline sbold uppercase margin-bottom-20"><i class="fa fa-arrow-left"></i> {{ trans('general.back') }}</a>
        <!-- END BACK BTN -->
        <div class="portlet light bordered">
            <div class="portlet-body form">

                <div class="tabbable-line">

                    <?php $langs = array_keys(LaravelLocalization::getSupportedLocales()); ?>

                    <div class="clearfix">
                        <ul class="nav nav-tabs pull-left">

                            @for($i = 0; $i < count($langs); $i++)

                                <?php $item = LaravelLocalization::getSupportedLocales()[$langs[$i]]; ?>

                                <li class="@if($langs[$i] == getCurrentLocale()) {{ 'active' }} @endif">
                                    <a href="#tab_{{ $i }}" data-toggle="tab" aria-expanded="false">{{ $item['name'] }}</a>
                                </li>

                            @endfor

                        </ul>
                        <ul class="nav nav-tabs pull-right">
                            <li>
                                <a href="{{ url(getCurrentLocale() . '/manager/collection/' . $collectionId . '/catalog/' . $catalogId . '/file') }}"><i class="fa fa-paperclip"></i> {{ trans('general.attachFiles') }}</a>
                            </li>
                            <li>
                                <a href="{{ url(getCurrentLocale() . '/manager/collection/' . $collectionId . '/catalog/' . $catalogId . '/image') }}"><i class="fa fa-file-image-o"></i> {{ trans('general.attachImages') }}</a>
                            </li>
                        </ul>
                    </div>

                    <div class="tab-content">

                        @for($i = 0; $i < count($langs); $i++)

                            <div id="tab_{{ $i }}" class="tab-pane @if($langs[$i] == getCurrentLocale()) {{ 'active' }} @endif">

                                {!! Form::open(array('method' => 'PATCH', 'url' => getCurrentLocale().'/manager/collection/' . $catalog[$i]->id . '/catalog/update', 'id' => 'form_' . $langs[$i], 'class' => 'form-horizontal form_ajax')) !!}

                                    <div class="form-body">
                                        <input type="hidden" name="lang" value="{{ $langs[$i] }}">
                                        <input type="hidden" name="id" value="{{ $catalog[$i]->id }}">
                                        <input type="hidden" name="lang_id" value="{{ $catalog[$i]->lang_id }}">
                                        <div class="form-group">
                                            <label class="col-md-2 control-label">{{ trans('general.fclbName') }}
                                                <span aria-required="true" class="required"> * </span>
                                            </label>
                                            <div class="col-md-7">
                                                <input type="text" name="name" class="form-control input-lg" value="{{ $catalog[$i]->name }}">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-2">{{ trans('general.fclbPhoto') }}</label>
                                            <div class="col-md-3">
                                                <div class="photo">
                                                    <button type="button" class="btn btn-primary red remove-filemanager-photo">
                                                        <i class="fa fa-close"></i>
                                                    </button>
                                                    <img src="{{ (!empty($catalog[$i]->imgurl)) ? $catalog[$i]->imgurl : url('assets/nn_cms/custom/images/default-780x450.png') }}" data-default-photo-src="{{ url('assets/nn_cms/custom/images/default-780x450.png') }}" id="showImg_{{$langs[$i]}}" class="img-responsive img-thumbnail center-block img" alt="catalog photo">
                                                    <input type="hidden" name="imgurl" id="imgurl_{{ $langs[$i]}}"  data-required="1" class="form-control" value="{{ $catalog[$i]->imgurl }}">
                                                </div>
                                                <button type="button" class="btn green-sharp btn-block sbold uppercase margin-top-10 filemanager-btn" data-lang="{{ $langs[$i] }}">{{ trans('general.fclbSetPhotoBtn') }}</button>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-2 control-label">{{ trans('general.fclbBody') }}</label>
                                            <div class="col-md-7">
                                                <script src="{{ url('assets/nn_cms/global/plugins/ckeditor/ckeditor.js') }}" type="text/javascript"></script>
                                                <textarea id="body_editor_{{ $langs[$i] }}" class="ckeditor form-control" name="body" rows="6" data-error-container="#editor1_error">{{ $catalog[$i]->body }}</textarea>
                                                <script>
                                                    CKEDITOR.replace("body_editor_{{ $langs[$i] }}", {
                                                        filebrowserImageBrowseUrl: '{{ asset("manager/laravel-filemanager?type=Images") }}',
                                                        filebrowserImageUploadUrl: '{{ asset("manager/laravel-filemanager/upload?type=Images&_token=") }}{{ csrf_token() }}',
                                                        filebrowserBrowseUrl: '{{ asset("manager/laravel-filemanager?type=Files") }}',
                                                        filebrowserUploadUrl: '{{ asset("manager/laravel-filemanager/upload?type=Files&_token=") }}{{ csrf_token() }}'
                                                    });
                                                </script>
                                                <div id="editor1_error"></div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-2 control-label">{{ trans('general.fclbDesc') }}</label>
                                            <div class="col-md-7">
                                                <textarea type="text" name="description" class="form-control input-lg">{{ $catalog[$i]->description }}</textarea>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-2">{{ trans('general.fclbArticleCode') }}</label>
                                            <div class="col-md-7">
                                                <input type="text" name="article_code" class="form-control input-lg common-form-control" value="{{ $catalog[$i]->article_code }}">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-2">{{ trans('general.fclbBarcode') }}</label>
                                            <div class="col-md-7">
                                                <input type="text" name="barcode" class="form-control input-lg common-form-control" value="{{ $catalog[$i]->barcode }}">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-2">{{ trans('general.fclbUniqueCode') }}</label>
                                            <div class="col-md-7">
                                                <input type="text" name="unique_code" class="form-control input-lg common-form-control" value="{{ $catalog[$i]->unique_code }}">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-2">{{ trans('general.fclbPrice') }}</label>
                                            <div class="col-md-7">
                                                <input type="text" name="price" class="form-control input-lg common-form-control" value="{{ $catalog[$i]->price }}">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-2">{{ trans('general.fclbAmount') }}</label>
                                            <div class="col-md-7">
                                                <input type="text" name="amount" class="form-control input-lg common-form-control" value="{{ $catalog[$i]->amount }}">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-2 control-label">{{ trans('general.category') }}</label>
                                            <div class="col-md-7">
                                                <select name="category_id" class="form-control input-lg common-form-select-control selectpicker" data-live-search="true">
                                                    <option selected="selected" value="0">None</option>
                                                    @if(count($category))

                                                        @foreach($category as $item)

                                                            <option value="{{ $item->id }}" {{ ($catalog[$i]->category_id == $item->id) ? 'selected' : '' }}>{{ $item->name }}</option>

                                                        @endforeach

                                                    @endif
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-2 control-label">{{ trans('general.thematicCategory') }}</label>
                                            <div class="col-md-7">
                                                <select name="thematic_category_id" class="form-control input-lg common-form-select-control selectpicker" data-live-search="true">
                                                    <option selected="selected" value="0">None</option>
                                                    @if(count($thematic_category))

                                                        @foreach($thematic_category as $item)

                                                            <option value="{{ $item->id }}" {{ ($catalog[$i]->thematic_category_id == $item->id) ? 'selected' : '' }}>{{ $item->name }}</option>

                                                        @endforeach

                                                    @endif
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-md-2">{{ trans('general.fclbColor') }}</label>
                                            <div class="col-md-7">
                                                <select name="color_ids[]" class="form-control input-lg common-form-select-control selectpicker" data-live-search="true" multiple>

                                                    @if(count($color))

                                                        @foreach($color as $item)

                                                            <option value="{{ $item->id }}" {{ in_array($item->id, (array)$catalog[0]->color_ids) ? 'selected' : '' }}>{{ $item->name }}</option>

                                                        @endforeach

                                                    @endif
                                                </select>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-actions right">
                                        <div class="row">
                                            <div class="col-md-9">
                                                <button type="submit" class="btn green-seagreen btn-outline sbold uppercase" data-action="collapse-all" data-lang="{{ $langs[$i] }}" data-update-success-text="{{ trans('general.updateSuccess') }}" data-update-error-fill-in-text="{{ trans('general.updateErrorFillIn') }}">{{ trans('general.fclbUpdate') }}</button>
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
        <script src="{{ url('assets/nn_cms/custom/js/common-form-control.js') }}" type="text/javascript"></script>
        <!-- END COMMON FORM CONTROL -->
        <script src="{{ url('assets/nn_cms/custom/js/common-form-select-control.js') }}" type="text/javascript"></script>
        <!-- END COMMON FORM SELECT CONTROL -->
        <script src="{{ url('vendor/laravel-filemanager/js/lfm.js') }}" type="text/javascript"></script>
        <script src="{{ url('assets/nn_cms/custom/js/filemanager-image.js') }}" type="text/javascript"></script>
        <!-- END SET IMAGE SCRIPTS -->
        <script src="{{ url('assets/nn_cms/global/plugins/bootstrap-toastr/toastr.min.js') }}" type="text/javascript"></script>
        <script src="{{ url('assets/nn_cms/custom/js/toastr.js') }}" type="text/javascript"></script>
        <!-- END TOASTR SCRIPTS -->
        <script src="{{ url('assets/nn_cms/custom/js/form.js') }}" type="text/javascript"></script>
        <!-- END UPDATE BY AJAX FORM.JS  -->
    @endpush

@stop