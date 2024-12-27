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

        <h3 class="page-title"> {{ trans('general.ptSlider') }}

        </h3>

        <!-- END PAGE TITLE-->

        <!-- END PAGE HEADER-->

        <div class="portlet light bordered">

            <div class="portlet-body clearfix">

                <!-- Need Here BTN !!! -->

                <ul class="list-inline pull-left">

                    <li>

                        <a href="#" class="btn blue btn-outline sbold uppercase add-new-photo" data-toggle="modal" data-target="#add-slider-item">{{ trans('general.cAddNew') }}</a>

                    </li>

                </ul>

                <ul class="list-inline pull-right">

                    <li>

                        <label for="" class="control-label">{{ trans('general.sort') }}</label>

                        <input type="checkbox" class="make-switch sort-switch-box" data-on-color="primary" data-off-color="default" data-size="small">

                    </li>

                    <li>

                        <label class="mt-checkbox mt-checkbox-outline">

                            <input type="checkbox" class="check-all"> {{ trans('general.checkAll') }}

                            <span></span>

                        </label>

                    </li>

                    <li>

                        <a href="#" class="btn red btn-outline sbold uppercase delete-all" data-toggle="modal" data-target="#delete-all"> {{ trans('general.delete') }} </a>

                    </li>

                    <li>

                        <a href="#" class="btn blue-soft btn-outline sbold uppercase save-changes" rel="tooltip" data-placement="top" title="{{ trans('general.cSave') }}" data-update-success-text="{{ trans('general.updateSuccess') }}" data-update-error-text="{{ trans('general.updateError') }}"><i class="fa fa-save fa-lg" aria-hidden="true"></i></a>

                    </li>

                </ul>

            </div>

        </div>

        <div class="row ui-sortable" id="sortable">

            @foreach($sliderItem as $item)

            <div class="col-md-4 col-lg-5ths ui-state-default" data-id="{{ $item->id }}">

                <div class="draggable-box">

                    <div class="draggable-box-title ui-sortable-handle">

                        <div class="caption font-blue-sharp">

                            <span class="caption-subject bold uppercase">{{ $item->name }}</span>

                            <span class="caption-helper">{{ $item->description }}</span>

                        </div>

                        <div class="actions">

                            <a href="#edit-slider-item" class="btn blue-sharp btn-circle btn-sm edit" rel="tooltip" data-placement="top" title="{{ trans('general.edit') }}" data-toggle="modal" data-target="#edit-slider-item">

                                <i class="fa fa-pencil"></i></a>

                            <a href="#delete-item" class="btn btn-circle btn-default btn-sm del" rel="tooltip" data-placement="top" title="{{ trans('general.delete') }}" data-toggle="modal">

                                <i class="fa fa-remove"></i></a>

                        </div>

                    </div>

                    <div class="draggable-box-body">

                        <img src="{{ $item->imgurl }}" width="600" height="600" class="img-responsive center-block">

                    </div>

                </div>

            </div>

            <!-- /Sortable item END -->

            @endforeach



        </div>

    </div>



    <!-- Modal Add slider Item -->

    <div class="modal fade" id="add-slider-item" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">

        <div class="modal-dialog" role="document">

            <div class="modal-content">

                {!! Form::open(array('url' => getCurrentLocale() . '/manager/slider/store', 'files' => true, 'class' => 'form')) !!}

                    <div class="modal-header">

                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

                        <h4 class="modal-title">{{ trans('general.galleryAddTitle') }}</h4>

                    </div>

                    <div class="modal-body">

                        <div class="form-group">

                            <label for="fc-name">{{ trans('general.fclbName') }}</label>

                            <input type="text" name="name" id="fc-name" class="form-control">

                        </div>

                        <div class="form-group">

                            <label for="fc-description">{{ trans('general.fclbDesc') }}</label>

                            <textarea name="description" id="fc-description" class="form-control"></textarea>

                        </div>

                        <div class="form-group">

                            <label for="imgurl">{{ trans('general.fclbFile') }}</label>

                            <img src="{{ url('assets/nn_cms/custom/images/default-780x450.png') }}" id="showImg"  class="img-responsive img-thumbnail center-block" alt="gallery-item photo">

                            <input type="hidden" id="imgurl" name="imgurl" data-required="1" class="form-control" value="">

                            <button type="button" class="btn green-sharp btn-block sbold uppercase margin-top-10 filemanager-btn" data-lang="">{{ trans('general.fclbSetPhotoBtn') }}</button>

                        </div>

                        <div class="row">

                            <div class="col-md-6">

                                <div class="form-group">

                                    <label for="fc-link_name">{{ trans('general.fclbLinkName') }}</label>

                                    <input type="text" name="link_name" id="fc-link_name" class="form-control">

                                </div>

                            </div>

                            <div class="col-md-6">

                                <div class="form-group">

                                    <label for="fc-link">{{ trans('general.fclbLink') }}</label>

                                    <input type="text" name="link" id="fc-link" class="form-control">

                                </div>

                            </div>

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



    <!-- Modal Edit Gallery Item -->

    <div class="modal fade" id="edit-slider-item" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">

        <div class="modal-dialog" role="document">

            <div class="modal-content">



                <div class="modal-header">

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

                    <h4 class="modal-title">{{ trans('general.galleryUpdateTitle') }}</h4>

                </div>



                <div class="portlet light">

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



                                        {!! Form::open(array('url' => getCurrentLocale() . '/manager/slider/update', 'files'=>true, 'class' => 'form')) !!}

                                            <div class="modal-body">

                                                <input name="id" id="fc-id_{{ $langs[$i] }}" value="" type="hidden">

                                                <input name="lang" value="{{ $langs[$i] }}" type="hidden">

                                                <div class="form-group">

                                                    <label for="fc-name_{{ $langs[$i] }}">{{ trans('general.fclbName') }}</label>

                                                    <input type="text" name="name" id="fc-name_{{ $langs[$i] }}" class="form-control">

                                                </div>

                                                <div class="form-group">

                                                    <label for="fc-description_{{ $langs[$i] }}">{{ trans('general.fclbDesc') }}</label>

                                                    <textarea name="description" id="fc-description_{{ $langs[$i] }}" class="form-control"></textarea>

                                                </div>

                                                <div class="form-group">

                                                    <label for="imgurl_{{ $langs[$i] }}">{{ trans('general.fclbFile') }}</label>

                                                    <img src="{{ url('assets/nn_cms/custom/images/default-780x450.png') }}" id="showImg_{{ $langs[$i] }}"  class="img-responsive img-thumbnail center-block" alt="slider photo">

                                                    <input type="hidden" id="imgurl_{{ $langs[$i] }}" name="imgurl" data-required="1" class="form-control" value="">

                                                    <button type="button" class="btn green-sharp btn-block sbold uppercase margin-top-10 filemanager-btn" data-lang="{{ $langs[$i] }}">{{ trans('general.fclbSetPhotoBtn') }}</button>

                                                </div>

                                                <div class="row">

                                                    <div class="col-md-6">

                                                        <div class="form-group">

                                                            <label for="fc-link_name_1_{{ $langs[$i] }}">{{ trans('general.fclbLinkName') }} 1</label>

                                                            <input type="text" name="link_name_1" id="fc-link_name_1_{{ $langs[$i] }}" class="form-control">

                                                        </div>

                                                    </div>

                                                    <div class="col-md-6">

                                                        <div class="form-group">

                                                            <label for="fc-link_1_{{ $langs[$i] }}">{{ trans('general.fclbLink') }} 1</label>

                                                            <input type="text" name="link_1" id="fc-link_1_{{ $langs[$i] }}" class="form-control">

                                                        </div>

                                                    </div>

                                                </div>

                                                <div class="row">

                                                    <div class="col-md-6">

                                                        <div class="form-group">

                                                            <label for="fc-link_name_2_{{ $langs[$i] }}">{{ trans('general.fclbLinkName') }} 2</label>

                                                            <input type="text" name="link_name_2" id="fc-link_name_2_{{ $langs[$i] }}" class="form-control">

                                                        </div>

                                                    </div>

                                                    <div class="col-md-6">

                                                        <div class="form-group">

                                                            <label for="fc-link_2_{{ $langs[$i] }}">{{ trans('general.fclbLink') }} 2</label>

                                                            <input type="text" name="link_2" id="fc-link_2_{{ $langs[$i] }}" class="form-control">

                                                        </div>

                                                    </div>

                                                </div>

                                            </div>

                                            <div class="modal-footer">

                                                <button type="button" class="btn btn-default" data-dismiss="modal">{{ trans('general.fclbClose') }}</button>

                                                <button type="submit" class="btn btn-primary">{{ trans('general.fclbUpdate') }}</button>

                                            </div>

                                        {!! Form::close() !!}



                                    </div>



                                @endfor



                            </div>



                        </div>



                    </div>

                </div>



            </div>

        </div>

    </div>



    <!-- Modal (item delete) -->

    <div class="modal fade" id="delete-item" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">

        <div class="modal-dialog" role="document">

            <div class="modal-content">

                <div class="modal-header">

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

                    <h4 class="modal-title">{{ trans('general.deleteQuestion') }}</h4>

                </div>

                <div class="modal-footer">

                    <button type="button" class="btn btn-default" data-dismiss="modal">{{ trans('general.no') }}</button>

                    <button type="button" class="btn btn-danger confirm" data-dismiss="modal">{{ trans('general.yes') }}</button>

                </div>

            </div>

        </div>

    </div>



    <!-- Modal Delete All Gallery Items -->

    <div class="modal fade" id="delete-all" tabindex="-1" role="dialog">

        <div class="modal-dialog" role="document">

            <div class="modal-content">

                <div class="modal-header">

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

                    <h4 class="modal-title">{{ trans('general.deleteQuestion') }}</h4>

                </div>

                <div class="modal-footer">

                    <button type="button" class="btn btn-default" data-dismiss="modal">{{ trans('general.no') }}</button>

                    <button type="button" class="btn btn-danger confirm-delete-all" data-dismiss="modal">{{ trans('general.yes') }}</button>

                </div>

            </div>

        </div>

    </div>



    @push('body.bottom')

        <script src="{{ url('/vendor/laravel-filemanager/js/stand-alone-button.js') }}"></script>
        <script src="{{ url('assets/nn_cms/custom/js/lfm.js') }}" type="text/javascript"></script>
        <script src="{{ url('assets/nn_cms/custom/js/filemanager-image.js') }}" type="text/javascript"></script>

        <!-- END SET IMAGE SCRIPTS -->

        <script src="{{ url('assets/nn_cms/global/plugins/jquery-ui/jquery-ui.min.js') }}" type="text/javascript"></script>

        <!-- END JQUERY UI SCRIPT -->

        <script src="{{ url('assets/nn_cms/custom/js/active-tooltip.js') }}" type="text/javascript"></script>

        <!-- END ACTIVE TOOLTIP -->

        <script src="{{ url('assets/nn_cms/custom/js/slider-edit-delete.js') }}" type="text/javascript"></script>

        <script src="{{ url('assets/nn_cms/custom/js/slider-actions.js') }}" type="text/javascript"></script>

        <!-- END GAlLERY SCRIPTS -->

        <script src="{{ url('assets/nn_cms/global/plugins/bootstrap-toastr/toastr.min.js') }}" type="text/javascript"></script>

        <script src="{{ url('assets/nn_cms/custom/js/toastr.js') }}" type="text/javascript"></script>

        <!-- END TOASTR SCRIPTS -->

    @endpush



@stop