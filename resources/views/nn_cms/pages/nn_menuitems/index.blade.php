@extends('../nn_cms/index')

@section('content')

    <div class="page-content">
        <!-- BEGIN PAGE HEADER-->
        <!-- BEGIN PAGE BAR -->
        <div class="page-bar">
            <ul class="page-breadcrumb">
                <li>
                    <a href="{{ url(getCurrentLocale() . '/manager/dashboard') }}">Home</a>
                    <i class="fa fa-circle"></i>
                </li>
                <li>
                    <span>Menu item</span>
                </li>
            </ul>
        </div>
        <!-- END PAGE BAR -->
        <!-- BEGIN PAGE TITLE-->
        <h3 class="page-title"> Menu item
        </h3>
        <!-- END PAGE TITLE-->
        <!-- END PAGE HEADER-->
        <div class="portlet light bordered">
            <div class="portlet-body">
                <a href="{{ url(getCurrentLocale() . '/manager/collection/create') }}" class="btn blue btn-outline sbold uppercase" data-action="collapse-all">{{ trans('general.cAddNew') }}</a>
            </div>
        </div>
        <div class="portlet box blue">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-cogs"></i> {{ trans('general.yourCollections') }}  </div>
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
                                <th> {{ trans('general.dtType') }}</th>
                                <th> {{ trans('general.dtDesc') }}</th>
                                <th> {{ trans('general.dtTools') }} </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($collection as $item)
                            <tr>
                                <td> {!! $item->id !!} </td>
                                <td> {!! $item->name !!} </td>
                                <td> {!! $item->type !!} </td>
                                <td> {!! $item->description !!} </td>
                                <td>
                                    <div class="clearfix">
                                        <a href="{!! url(getCurrentLocale() . '/manager/collection/'.$item->id.'/'.$item->type) !!}" class="btn btn-icon-only green">
                                            <i class="fa fa-link"></i>
                                        </a>
                                        <a href="{!! url(getCurrentLocale() . '/manager/collection/'.$item->id.'/edit') !!}" class="btn btn-icon-only blue">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <!-- Button trigger modal -->
                                        <a href="javascript:;" class="btn btn-primary red del" data-toggle="modal" data-target="#myModal">
                                            <form>
                                                <i class="fa fa-trash"></i>
                                                <input type="hidden" class="id-element" value="{!! $item->id !!}">
                                            </form>
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
    
@stop