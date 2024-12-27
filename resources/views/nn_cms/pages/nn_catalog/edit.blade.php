@extends('../nn_cms/index')


@section('content')
    <div class="page-content">
        <div class="page-bar">
            <ul class="page-breadcrumb">
                <li>
                    <a href="{{ url(getCurrentLocale() . '/manager') }}">{{ trans('general.bcHome') }}</a>
                    <i class="fa fa-circle"></i>
                </li>
            </ul>
        </div>

        <h3 class="page-title"> Collection / catalog / edit
        </h3>
        <a href="{{ url(getCurrentLocale() . '/manager/collection/' . $collectionId . '/catalog') }}" class="btn green btn-outline sbold uppercase margin-bottom-20"><i class="fa fa-arrow-left"></i> {{ trans('general.back') }}</a>
        <a href="{{fullUrl('manager/collection/' . $collectionId . '/catalog/create')}}" class="btn blue btn-outline sbold uppercase margin-bottom-20 " data-action="collapse-all"><i class="fa fa-plus"></i> Add new</a>
        <div class="portlet light bordered">
            <div class="portlet-body form">
                <div class="tabbable-line">
                    @php 
                        $langs = array_keys(LaravelLocalization::getSupportedLocales());
                         
                    @endphp
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
                                    @foreach($typeitems as $item)
                                        @include('nn_cms.pages.nn_catalog.templates.'.$item,["file"=>"edit",
                                        "langs"=>$langs, "catalog"=>$catalog, "i"=>$i
                                        
                                        ])
                                   @endforeach
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
    @endpush

    @push('body.bottom')
        <script src="{{ url('assets/nn_cms/global/plugins/bootstrap-select-1.12.4/js/bootstrap-select.min.js') }}" type="text/javascript"></script>
        <script src="{{ url('assets/nn_cms/custom/js/common-form-control.js') }}" type="text/javascript"></script>

        <script src="{{ url('assets/nn_cms/custom/js/common-form-select-control.js') }}" type="text/javascript"></script>
        <script src="{{ url('assets/nn_cms/custom/js/filemanager-image.js') }}" type="text/javascript"></script>
        <script src="{{ url('vendor/laravel-filemanager/js/stand-alone-button.js') }}"></script>
        <script src="{{ url('assets/nn_cms/custom/js/lfm.js') }}" type="text/javascript"></script>
        <script src="{{ url('assets/nn_cms/global/plugins/bootstrap-toastr/toastr.min.js') }}" type="text/javascript"></script>
        <script src="{{ url('assets/nn_cms/custom/js/toastr.js') }}" type="text/javascript"></script>

        <script src="{{ url('assets/nn_cms/custom/js/form.js') }}" type="text/javascript"></script>

    @endpush
@stop