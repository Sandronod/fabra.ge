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

        <h3 class="page-title">{{ trans('general.ptCreateMenuItem') }}

        </h3>

        <!-- END PAGE TITLE-->

        <!-- END PAGE HEADER-->

        <a href="{{ url(getCurrentLocale() . '/manager/menu/' . $id . '/items') }}" class="btn green btn-outline sbold uppercase margin-bottom-20"><i class="fa fa-arrow-left"></i> {{ trans('general.back') }}</a>

        <!-- END BACK BTN -->

        <div class="portlet light bordered">

            <div class="portlet-body form">

                {!! Form::open(array('url' => getCurrentLocale() . '/manager/menu/' . $id . '/items/store', 'class' => 'form-horizontal menuitem-form')) !!}

                    <input type="hidden" name="menu_id" value="{{ $id }}" class="form-control input-lg">

                    <input type="hidden" name="parent_id" value="{{ empty(Request::get('id')) ? 0 : Request::get('id') }}" class="form-control input-lg">

                    <div class="form-body">

                        <div class="form-group">

                            <label class="col-md-2 control-label">{{ trans('general.fclbType') }}

                                <span aria-required="true" class="required hide"> * </span>

                            </label>

                            <div class="col-md-4">

                                <select name="type" class="form-control input-lg">

                                    <option value="text" {{ (Request::old('type') == 'text') ? 'selected' : '' }}>{{ trans('general.textPage') }}</option>

                                    <option value="collection"{{ (Request::old('type') == 'collection') ? 'selected' : '' }}>{{ trans('general.collection') }}</option>

                                    <option value="contact"{{ (Request::old('type') == 'contact') ? 'selected' : '' }}>{{ trans('general.contactPage') }}</option>

                                    <option value="link"{{ (Request::old('type') == 'link') ? 'selected' : '' }}>{{ trans('general.link') }}</option>
                                    <option value="category"{{ (Request::old('type') == 'category') ? 'selected' : '' }}>category</option>

                                </select>

                            </div>

                            <div class="col-md-3{{ ($errors->has('collection_id')) ? ' has-error' : ''}}">
                                <select name="collection_id" class="form-control input-lg hide">
                                    <option selected="selected" class="hide" value="0">{{ trans('general.selectCollectionItem') }}</option>
                                    @if(count($collections))
                                    <optgroup label="{{ trans('general.collectionsList') }}">
                                    @else
                                    <optgroup label="{{ trans('general.collectionsListEmpty') }}">
                                    @endif
                                    @foreach($collections as $item)
                                        @if($item->name != '')
                                        <option value="{{ $item->collection_id }}" {{ (Request::old('collection_id') == $item->id) ? 'selected' : '' }} class="cio-collection-item">{{ $item->name }}</option>

                                        @endif
                                    @endforeach
                                    </optgroup>

                                </select>
                                <select name="category_id" class="form-control input-lg hide">
                                    <option selected="selected" class="hide" value="0">select category</option>
                                    @if(count($category))
                                        <optgroup label="category">
                                    @else
                                        <optgroup label="category">
                                            @endif
                                            @foreach($category as $item)
                                                @if($item->name != '')
                                                    <option value="{{ $item->category_id }}" {{ (Request::old('category_id') == $item->id) ? 'selected' : '' }} class="cio-collection-item">{{ $item->name }}</option>

                                                @endif
                                            @endforeach
                                        </optgroup>
                                </select>

                                @if($errors->has('category_id'))

                                    <div class="error-text text-danger">

                                        {{ $errors->default->get('category_id')[0] }}

                                    </div>

                                @endif

                            </div>

                        </div>

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

                        <div class="form-group show-for-tc{{ ($errors->has('slug')) ? ' has-error' : ''}}">

                            <label class="col-md-2 control-label">{{ trans('general.fclbSlug') }}

                                <span aria-required="true" class="required"> * </span>

                            </label>

                            <div class="col-md-7">

                                <input type="text" name="slug" class="form-control input-lg" value="{{ Request::old('slug') }}">

                                @if($errors->has('slug'))

                                    <div class="error-text text-danger">

                                        {{ $errors->default->get('slug')[0] }}

                                    </div>

                                @endif

                            </div>

                        </div>

                        <div class="form-group{{ ($errors->has('link')) ? ' has-error' : ''}} show-for-link">

                            <label class="col-md-2 control-label">{{ trans('general.fclbLink') }}</label>

                            <div class="col-md-7">

                                <input type="text" name="link" class="form-control input-lg" value="{{ Request::old('url') }}">

                                @if($errors->has('link'))

                                    <div class="error-text text-danger">

                                        {{ $errors->default->get('link')[0] }}

                                    </div>

                                @endif

                            </div>

                        </div>

                        <div class="form-group show-for-tc">

                            <label class="control-label col-md-2">{{ trans('general.fclbPhoto') }}</label>

                            <div class="col-md-3">

                                <div class="photo">

                                    <button type="button" class="btn btn-primary red remove-filemanager-photo">

                                        <i class="fa fa-close"></i>

                                    </button>

                                    <img src="{{ (Request::old('imgurl')) ? Request::old('imgurl') : url('assets/nn_cms/custom/images/default-780x450.png') }}" data-default-photo-src="{{ url('assets/nn_cms/custom/images/default-780x450.png') }}" id="showImg" class="img-responsive img-thumbnail center-block img" alt="article photo">

                                    <input type="hidden" name="imgurl" id="imgurl"  data-required="1" class="form-control" value="{{ Request::old('imgurl') }}">

                                </div>

                                <button type="button" class="btn green-sharp btn-block sbold uppercase margin-top-10 filemanager-btn" data-lang="">{{ trans('general.fclbSetPhotoBtn') }}</button>

                            </div>

                        </div>

                        <div class="form-group{{ ($errors->has('body')) ? ' has-error' : ''}} show-for-tc">

                            <label class="control-label col-md-2">{{ trans('general.fclbBody') }}</label>

                            <div class="col-md-7">

                                <script src="{{ url('assets/nn_cms/global/plugins/ckeditor/ckeditor.js') }}" type="text/javascript"></script>

                                <textarea id="body_editor" class="ckeditor form-control" name="body" rows="6" data-error-container="#editor2_error">{{ Request::old('body') }}</textarea>

                                <script>

                                    publicurl = "";

                                    CKEDITOR.replace("body_editor", {



                                        filebrowserImageBrowseUrl: '{{ asset("filemanager?type=Images") }}',



                                        filebrowserImageUploadUrl: '{{ asset("filemanager/upload?type=Images&_token=") }}{{ csrf_token() }}',



                                        filebrowserBrowseUrl: '{{ asset("filemanager?type=Files") }}',



                                        filebrowserUploadUrl: '{{ asset("filemanager/upload?type=Files&_token=") }}{{ csrf_token() }}'



                                    });

                                </script>

                                <div id="editor2_error"></div>

                                @if($errors->has('body'))

                                    <div class="error-text text-danger">

                                        {{ $errors->default->get('body')[0] }}

                                    </div>

                                @endif

                            </div>

                        </div>

                        <div class="form-group last">

                            <label class="col-md-2 control-label">{{ trans('general.fclbDesc') }}</label>

                            <div class="col-md-7">

                                <textarea type="text" name="description" class="form-control">{{ Request::old('description') }}</textarea>

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



    @push('body.bottom')

        <script src="{{ url('assets/nn_cms/custom/js/menuitem-form-controls.js') }}" type="text/javascript"></script>

        <!-- END MENUITEM FORM-CONTROLS -->

        <script src="{{ url('assets/nn_cms/custom/js/slugify-form-control-name.js') }}" type="text/javascript"></script>

        <!-- END SLUGIFY FORM-CONTROL NAME -->

        <script src="{{ url('/vendor/laravel-filemanager/js/stand-alone-button.js') }}"></script>
        <script src="{{ url('assets/nn_cms/custom/js/lfm.js') }}" type="text/javascript"></script>
        <script src="{{ url('assets/nn_cms/custom/js/filemanager-image.js') }}" type="text/javascript"></script>

        <!-- END SET IMAGE SCRIPTS -->

    @endpush



@stop
