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
        <h3 class="page-title"> {{ trans('general.ptEditCollection') }}
        </h3>
        <!-- END PAGE TITLE-->
        <!-- END PAGE HEADER-->
        <a href="{{ url(getCurrentLocale() . '/manager/collection') }}" class="btn green btn-outline sbold uppercase margin-bottom-20"><i class="fa fa-arrow-left"></i> {{ trans('general.back') }}</a>
        <!-- END BACK BTN -->
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

                                {!! Form::open(array('method' => 'PATCH' , 'url' => getCurrentLocale() . '/manager/collection/' . $collectionId . '/update', 'id' => 'form_' . $langs[$i], 'class' => 'form form-horizontal form_ajax')) !!}

                                    <div class="form-body">
                                        <input type="hidden" name="lang" value="{{ $langs[$i] }}">
                                        <input type="hidden" name="id" value="{{ $collection[$i]->id }}">
                                        <div class="form-group">
                                            <label class="col-md-2 control-label">{{ trans('general.fclbName') }}
                                                <span aria-required="true" class="required"> * </span>
                                            </label>
                                            <div class="col-md-7">
                                                <input type="text" name="name" class="form-control input-lg" value="{!! $collection[$i]->name !!}">
                                            </div>
                                        </div>
                                        <div class="form-group last">
                                            <label class="col-md-2 control-label">{{ trans('general.fclbDesc') }}</label>
                                            <div class="col-md-7">
                                                <textarea type="text" name="description" class="form-control input-lg">{!! $collection[$i]->description !!}</textarea>
                                            </div>
                                        </div>
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

    @push('body.bottom')
        <script src="{{ url('assets/nn_cms/global/plugins/bootstrap-toastr/toastr.min.js') }}" type="text/javascript"></script>
        <script src="{{ url('assets/nn_cms/custom/js/toastr.js') }}" type="text/javascript"></script>
        <!-- END TOASTR SCRIPTS -->
        <script src="{{ url('assets/nn_cms/custom/js/form.js') }}" type="text/javascript"></script>
        <!-- END UPDATE BY AJAX FORM.JS  -->
    @endpush

@stop