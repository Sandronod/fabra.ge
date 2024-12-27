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


        <h3 class="page-title"> {{ trans('general.ptEditArticle') }}


        </h3>


        <!-- END PAGE TITLE-->


        <!-- END PAGE HEADER-->


        <a href="{{ url(getCurrentLocale() . '/manager/collection/' . $collectionId . '/article') }}" class="btn green btn-outline sbold uppercase margin-bottom-20" data-action="collapse-all"><i class="fa fa-arrow-left"></i> {{ trans('general.back') }}</a>


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


                                <a href="{{ url(getCurrentLocale() . '/manager/collection/' . $collectionId . '/article/' . $articleId . '/file') }}"><i class="fa fa-paperclip"></i> {{ trans('general.attachFiles') }}</a>


                            </li>


                            <li>


                                <a href="{{ url(getCurrentLocale() . '/manager/collection/' . $collectionId . '/article/' . $articleId . '/image') }}"><i class="fa fa-file-image-o"></i> {{ trans('general.attachImages') }}</a>


                            </li>


                        </ul>


                    </div>





                    <div class="tab-content">





                        @for($i = 0; $i < count($langs); $i++)

		



                            <div id="tab_{{ $i }}" class="tab-pane @if($langs[$i] == getCurrentLocale()) {{ 'active' }} @endif">





                                {!! Form::open(array('method' => 'PATCH', 'url' => getCurrentLocale().'/manager/collection/' . $article[$i]->id . '/article/update', 'id' => 'form_' . $langs[$i], 'class' => 'form-horizontal form_ajax')) !!}





                                    <div class="form-body">


                                        <input type="hidden" name="lang" value="{{ $langs[$i] }}">


                                        <input type="hidden" name="id" value="{{ $article[$i]->id }}">


                                        <div class="form-group">


                                            <label class="col-md-2 control-label">{{ trans('general.fclbName') }}


                                                <span aria-required="true" class="required"> * </span>


                                            </label>


                                            <div class="col-md-7">


                                                <input type="text" name="name" class="form-control input-lg" value="{{ $article[$i]->name }}">


                                            </div>


                                        </div>
                                        
                                        {{-- <div class="form-group">


                                            <label class="col-md-2 control-label">დაწყების და დამთავრების დრო


                                                <span aria-required="true" class="required"> * </span>


                                            </label>


                                            <div class="col-md-7">
                                          


                                              <div class="input-group input-medium date date-picker" data-date-format="dd-mm-yyyy" data-date-start-date="+0d">
                                                            <input type="text" name="AstartDate"  class="form-control" value="{{ $articleDates[0]->AstartDate }}" readonly="">
                                                            <span class="input-group-btn">
                                                                <button class="btn default" type="button">
                                                                    <i class="fa fa-calendar"></i>
                                                                </button>
                                                            </span>
                                                        </div><br>
                                                <div class="input-group input-medium date date-picker" data-date-format="dd-mm-yyyy" data-date-start-date="+0d">
                                                            <input type="text" name="AendDate" class="form-control" value="{{ $articleDates[0]->AendDate }}" readonly="">
                                                            <span class="input-group-btn">
                                                                <button class="btn default" type="button">
                                                                    <i class="fa fa-calendar"></i>
                                                                </button>
                                                            </span>
                                                        </div>
                                                         <br>
                                                        <div class="input-group">
                                                        <input name="AstartTime" type="text" value="{{ $articleDates[0]->AstartTime }}"  class="form-control timepicker timepicker-24">
                                                        <span class="input-group-btn">
                                                            <button class="btn default" type="button">
                                                                <i class="fa fa-clock-o"></i>
                                                            </button>
                                                        </span>
                                                    </div><br>
                                                    <div class="input-group">
                                                        <input name="AendTime" type="text" value="{{ $articleDates[0]->AendTime }}" class="form-control timepicker timepicker-24">
                                                        <span class="input-group-btn">
                                                            <button class="btn default" type="button">
                                                                <i class="fa fa-clock-o"></i>
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


                                                    <img src="{{ (!empty($article[$i]->imgurl)) ? $article[$i]->imgurl : url('assets/nn_cms/custom/images/default-780x450.png') }}" data-default-photo-src="{{ url('assets/nn_cms/custom/images/default-780x450.png') }}" id="showImg_{{$langs[$i]}}" class="img-responsive img-thumbnail center-block img" alt="article photo">


                                                    <input type="hidden" name="imgurl" id="imgurl_{{ $langs[$i]}}"  data-required="1" class="form-control" value="{{ $article[$i]->imgurl }}">


                                                </div>


                                                <button type="button" class="btn green-sharp btn-block sbold uppercase margin-top-10 filemanager-btn" data-lang="{{ $langs[$i] }}">{{ trans('general.fclbSetPhotoBtn') }}</button>


                                            </div>


                                        </div>


                                        <div class="form-group">


                                            <label class="col-md-2 control-label">{{ trans('general.fclbBody') }}</label>


                                            <div class="col-md-7">


                                                <script src="{{ url('assets/nn_cms/global/plugins/ckeditor/ckeditor.js') }}" type="text/javascript"></script>


                                                <textarea id="body_editor_{{ $langs[$i] }}" class="ckeditor form-control" name="body" rows="6" data-error-container="#editor1_error">{{ $article[$i]->body }}</textarea>


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


                                                <textarea type="text" name="description" class="form-control input-lg">{{ $article[$i]->description }}</textarea>


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





    @push('body.bottom')


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