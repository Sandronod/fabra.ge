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

        <h3 class="page-title">{{ trans('general.ptEditMenuItem') }}

        </h3>

        <!-- END PAGE TITLE-->

        <!-- END PAGE HEADER-->

        <a href="{{ url(getCurrentLocale() . '/manager/menu/' . $id . '/items') }}" class="btn green btn-outline sbold uppercase margin-bottom-20"><i class="fa fa-arrow-left"></i> {{ trans('general.back') }}</a>
        <a href="{{fullUrl('manager/menu/' . $id . '/items/create')}}" class="btn blue btn-outline sbold uppercase margin-bottom-20" data-action="collapse-all"><i class="fa fa-plus"></i> Add new</a>

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

                                <a href="{{ url(getCurrentLocale() . '/manager/menu/' . $id . '/items/' . $item_id . '/file') }}"><i class="fa fa-paperclip"></i> {{ trans('general.attachFiles') }}</a>

                            </li>

                            <li>

                                <a href="{{ url(getCurrentLocale() . '/manager/menu/' . $id . '/items/' . $item_id . '/image') }}"><i class="fa fa-file-image-o"></i> {{ trans('general.attachImages') }}</a>

                            </li>

                        </ul>

                    </div>



                    <div class="tab-content">



                         @for($i = 0; $i < count($langs); $i++)



                            <div id="tab_{{ $i }}" class="tab-pane @if($langs[$i] == getCurrentLocale()) {{ 'active' }} @endif">

                                {!! Form::open(array('method' => 'PATCH' , 'url' => getCurrentLocale() . '/manager/menu/' . $id . '/items/' . $item_id . '/update', 'id' => 'form_' . $langs[$i], 'class' => 'form-horizontal menuitem-form form_ajax')) !!}

                                    <input type="hidden" name="menu_item_id_lang" value="{{ $itemArr[$langs[$i]]->id }}" class="form-control input-lg">

                                    <input type="hidden" name="menu_item_id" value="{{ $itemArr[$langs[$i]]->nn_menu_item_id }}" class="form-control input-lg">

                                    <div class="form-body">

                                        <div class="form-group">

                                            <label class="col-md-2 control-label">{{ trans('general.fclbType') }}

                                                <span aria-required="true" class="required hide"> * </span>

                                            </label>

                                            <div class="col-md-4">

                                                <select name="type" class="form-control input-lg">

                                                    <option value="text" @if($type == 'text') selected="{{ 'selected' }}" @endif>{{ trans('general.textPage') }}</option>

                                                    <option value="collection" @if($type == 'collection') selected="{{ 'selected' }}" @endif>{{ trans('general.collection') }}</option>

                                                     <option value="contact" @if($type == 'contact') selected="{{ 'selected' }}" @endif>{{ trans('general.contactPage') }}</option>

                                                    <option value="link" @if($type == 'link') selected="{{ 'selected' }}" @endif>{{ trans('general.link') }}</option>
                                                    <option value="category" @if($type == 'category') selected="{{ 'selected' }}" @endif>category</option>

                                                </select>

                                            </div>

                                            <div class="col-md-3">

                                                <select name="collection_id" class="form-control input-lg hide">

                                                    <option selected="selected" class="hide" value="0">{{ trans('general.selectCollectionItem') }}</option>

                                                    @if(count($collections))
                                                    <optgroup label="{{ trans('general.collectionsList') }}">
                                                    @else
                                                    <optgroup label="{{ trans('general.collectionsListEmpty') }}">
                                                    @endif
                                                    @foreach($collections as $collection)
                                                        @if($collection->name != '')
                                                        <option value="{{ $collection->collection_id }}" @if($collection->collection_id == $collection_id) selected="selected" @endif class="cio-collection-item" >{{ $collection->name }}</option>
                                                        @endif
                                                    @endforeach
                                                    </optgroup>

                                                </select>
                                                <select name="category_id" class="form-control input-lg hide">

                                                    <option selected="selected" class="hide" value="0">select category</option>

                                                    @if(count($categories))
                                                        <optgroup label="category">
                                                    @else
                                                        <optgroup label="category">
                                                            @endif
                                                            @foreach($categories as $category)
                                                                @if($category->name != '')
                                                                    <option value="{{ $category->category_id }}" @if($category->category_id == $category_id) selected="selected" @endif class="cio-collection-item" >{{ $category->name }}</option>
                                                                @endif
                                                            @endforeach
                                                        </optgroup>

                                                </select>

                                            </div>

                                        </div>

                                        <div class="form-group">

                                            <label class="col-md-2 control-label">{{ trans('general.fclbName') }}

                                                <span aria-required="true" class="required"> * </span>

                                            </label>

                                            <div class="col-md-7">

                                                <input type="text" name="name" class="form-control input-lg" value="{{ $itemArr[$langs[$i]]->name }}">

                                            </div>

                                        </div>

                                        <div class="form-group show-for-link">

                                            <label class="col-md-2 control-label">{{ trans('general.fclbLink') }}</label>

                                            <div class="col-md-7">

                                                <input type="text" name="link" class="form-control input-lg" value="{{ $itemArr[$langs[$i]]->link }}">

                                            </div>

                                        </div>

                                        <div class="form-group show-for-tc">

                                            <label class="control-label col-md-2">{{ trans('general.fclbPhoto') }}</label>

                                            <div class="col-md-3">

                                                <div class="photo">

                                                    <button type="button" class="btn btn-primary red remove-filemanager-photo">

                                                        <i class="fa fa-close"></i>

                                                    </button>

                                                    <img src="{{ (!empty($itemArr[$langs[$i]]->imgurl)) ? $itemArr[$langs[$i]]->imgurl : url('assets/nn_cms/custom/images/default-780x450.png') }}" data-default-photo-src="{{ url('assets/nn_cms/custom/images/default-780x450.png') }}" id="showImg_{{$langs[$i]}}"  class="img-responsive img-thumbnail center-block img" alt="article photo">

                                                    <input type="hidden" name="imgurl" id="imgurl_{{$langs[$i]}}"  data-required="1" class="form-control" value="{{ $itemArr[$langs[$i]]->imgurl }}">

                                                </div>

                                                <button type="button" class="btn green-sharp btn-block sbold uppercase margin-top-10 filemanager-btn" data-lang="{{ $langs[$i] }}">{{ trans('general.fclbSetPhotoBtn') }}</button>

                                            </div>

                                        </div>

                                        <div class="form-group show-for-tc">

                                            <label class="control-label col-md-2">{{ trans('general.fclbBody') }}</label>

                                            <div class="col-md-7">

                                                <script src="{{ url('assets/nn_cms/global/plugins/ckeditor/ckeditor.js') }}" type="text/javascript"></script>

                                                <textarea id="body_editor_{{ $langs[$i] }}" class="ckeditor form-control" name="body" rows="6" data-error-container="#editor1_error">{{ $itemArr[$langs[$i]]->body }}</textarea>

                                                <script>

                                                    CKEDITOR.replace("body_editor_{{ $langs[$i] }}", {



                                                        filebrowserImageBrowseUrl: '{{ asset("filemanager?type=Images") }}',



                                                        filebrowserImageUploadUrl: '{{ asset("filemanager?type=Image&_token=") }}{{ csrf_token() }}',



                                                        filebrowserBrowseUrl: '{{ asset("manager/laravel-filemanager?type=Files") }}',



                                                        filebrowserUploadUrl: '{{ asset("manager/laravel-filemanager/upload?type=Files&_token=") }}{{ csrf_token() }}'



                                                    });

                                                </script>

                                                <div id="editor1_error"></div>

                                            </div>

                                        </div>

                                        <div class="form-group last">

                                            <label class="col-md-2 control-label">{{ trans('general.fclbDesc') }}</label>

                                            <div class="col-md-7">

                                                <textarea type="text" name="description" class="form-control">{{ $itemArr[$langs[$i]]->description }}</textarea>

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



    <!-- Modal Add New Collection -->

    <div class="modal fade" id="add-new-collection" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">

        <div class="modal-dialog" role="document">

            <div class="modal-content">

                {!! Form::open(array('url' => getCurrentLocale() . '/manager/collection/store', 'files'=>true, 'class' => 'form')) !!}

                    <div class="modal-header">

                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

                        <h4 class="modal-title" id="myModalLabel">{{ trans('general.ptCreateCollection') }}</h4>

                    </div>

                    <div class="modal-body">

                        <input name="gallery_id" value="" type="hidden">

                        <div class="form-group">

                            <label for="fc-name">{{ trans('general.fclbName') }}</label>

                            <input type="text" name="name" class="form-control input-lg" value="{{ Request::old('name') }}">

                            <input type="hidden" name="returnUrl" class="form-control input-lg" value="{{getCurrentLocale()}}/manager/menu/{{$id}}/items/edit/{{ $item_id }}">

                        </div>

                        <div class="form-group">

                            <label for="fc-description">{{ trans('general.fclbType') }}</label>

                            <select name="type" class="form-control input-lg">

                                <option disabled selected value>{{ trans('general.customUrl') }}</option>

                                <option value="article" {{ (Request::old('type') == 'article') ? 'selected' : '' }}>{{ trans('general.fcsArticle') }}</option>

                                <option value="gallery" {{ (Request::old('type') == 'gallery') ? 'selected' : '' }}>{{ trans('general.fcsGallery') }}</option>

                            </select>

                        </div>

                        <div class="form-group">

                            <label for="fc-description">{{ trans('general.fclbDesc') }}</label>

                            <textarea name="description" id="fc-description" class="form-control input-lg">{{ Request::old('description') }}</textarea>

                        </div>

                    </div>

                    <div class="modal-footer">

                        <button type="button" class="btn btn-default" data-dismiss="modal">{{ trans('general.fclbClose') }}</button>

                        <button type="submit" class="btn btn-primary">{{ trans('general.fclbAdd') }}</button>

                    </div>

                {!! Form::close() !!}

            </div>

        </div>

    </div>



    @push('body.bottom')

        <script src="{{ url('assets/nn_cms/custom/js/menuitem-form-controls.js') }}" type="text/javascript"></script>

        <!-- END MENUITEM FORM-CONTROLS -->

        <script src="{{ url('assets/nn_cms/global/plugins/bootstrap-toastr/toastr.min.js') }}" type="text/javascript"></script>

        <script src="{{ url('assets/nn_cms/custom/js/toastr.js') }}" type="text/javascript"></script>

        <!-- END TOASTR SCRIPTS -->

        <script src="{{ url('assets/nn_cms/custom/js/form.js') }}" type="text/javascript"></script>

        <!-- END UPDATE BY AJAX FORM.JS  -->

        <script src="{{ url('assets/nn_cms/custom/js/filemanager-image.js') }}" type="text/javascript"></script>
        <script src="{{ url('vendor/laravel-filemanager/js/stand-alone-button.js') }}"></script>
        <script src="{{ url('assets/nn_cms/custom/js/lfm.js') }}" type="text/javascript"></script>

        <!-- END SET IMAGE SCRIPTS -->

    @endpush



@stop
