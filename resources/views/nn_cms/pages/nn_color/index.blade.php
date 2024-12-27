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
        <h3 class="page-title"> {{ trans('general.ptColor') }}
        </h3>
        <!-- END PAGE TITLE-->
        <!-- END PAGE HEADER-->
        <div class="portlet light bordered">
            <div class="portlet-body">
                <a href="{{ url(getCurrentLocale() . '/manager/color/create') }}" class="btn blue btn-outline sbold uppercase" data-action="collapse-all">{{ trans('general.cAddNew') }}</a>
            </div>
        </div>
        <div class="portlet box blue">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-cogs"></i> {{ trans('general.yourColors') }}  </div>
                <div class="tools">
                    <a href="javascript:;" class="collapse" data-original-title="" title=""> </a>
                </div>
            </div>
            <div class="portlet-body">
                <div class="table-responsive">
                    <table class="data-table table table-bordered">
                        <thead>
                            <tr>
                                <th> {{ trans('general.id') }} </th>
                                <th> {{ trans('general.dtName') }} </th>
                                <th> {{ trans('general.dtColorCode') }} </th>
                                <th> {{ trans('general.dtTools') }} </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($color as $item)
                            <tr>
                                <td> {{ $item->id }} </td>
                                <td> {{ $item->name }} </td>
                                <td> {{ $item->color_code }} </td>
                                <td>
                                    <div class="clearfix">
                                        <a href="{{ url(getCurrentLocale() . '/manager/color/' . $item->id . '/edit') }}" class="btn btn-icon-only blue">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <!-- Button trigger modal -->
                                        <a href="javascript:;" class="btn btn-primary red del" data-toggle="modal" data-target="#delete-item" data-element-id="{{ $item->id }}" data-delete-url="color/destroy">
                                            <i class="fa fa-trash"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal (item delete) -->
    <div class="modal fade" id="delete-item" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">{{ trans('general.deleteQuestion') }}</h4>
                </div>
                <div class="modal-body">
                    {{ trans('general.deleteQuestionC') }}
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">{{ trans('general.no') }}</button>
                    <button type="button" class="btn btn-danger confirm" data-dismiss="modal">{{ trans('general.yes') }}</button>
                </div>
            </div>
        </div>
    </div>

    @push('body.bottom')
        <script src="{{ url('assets/nn_cms/custom/js/delete-item.js') }}" type="text/javascript"></script>
        <!-- END DELETE ITEM -->
    @endpush

@stop