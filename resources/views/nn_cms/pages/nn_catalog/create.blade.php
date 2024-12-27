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
        <h3 class="page-title"> Collection / catalog / create
        </h3>

        <a href="{{ url(getCurrentLocale() . '/manager/collection/' . $collection->id . '/catalog') }}" class="btn green btn-outline sbold uppercase margin-bottom-20"><i class="fa fa-arrow-left"></i> {{ trans('general.back') }}</a>


        <div class="portlet light bordered">

            <div class="portlet-body form">
                {!! Form::open(array('url' => getCurrentLocale() . '/manager/collection/catalog/store','class' => 'form-horizontal')) !!}

                    <div class="form-body">
                        <input name="collection_id" value="{{ $collection->id }}" type="hidden">
                    
                       @foreach($typeitems as $item)
                            @include('nn_cms.pages.nn_catalog.templates.'.$item,["file"=>"create"])
                       @endforeach
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
    @push('head')
        <link href="{{ url('assets/nn_cms/global/plugins/bootstrap-select-1.12.4/css/bootstrap-select.min.css') }}" rel="stylesheet" type="text/css" />

    @endpush
    @push('body.bottom')
        <script src="{{ url('assets/nn_cms/global/plugins/bootstrap-select-1.12.4/js/bootstrap-select.min.js') }}" type="text/javascript"></script>
        <script src="{{ url('assets/nn_cms/custom/js/slugify-form-control-name.js') }}" type="text/javascript"></script>

        <script src="{{ url('/vendor/laravel-filemanager/js/stand-alone-button.js') }}"></script>
        <script src="{{ url('assets/nn_cms/custom/js/lfm.js') }}" type="text/javascript"></script>
        <script src="{{ url('assets/nn_cms/custom/js/filemanager-image.js') }}" type="text/javascript"></script>
    @endpush
@stop