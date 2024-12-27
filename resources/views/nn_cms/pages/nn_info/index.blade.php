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


        <h3 class="page-title"> {{ trans('general.ptInfo') }}


        </h3>


        <!-- END PAGE TITLE-->


        <!-- END PAGE HEADER-->


        <a href="{{ url(getCurrentLocale() . '/manager/collection') }}" class="btn green btn-outline sbold uppercase margin-bottom-20"><i class="fa fa-arrow-left"></i> {{ trans('general.back') }}</a>


        <!-- END BACK BTN -->


        <div class="portlet light bordered">


            <div class="portlet-body">


                <a href="{{ url(getCurrentLocale() . '/manager/collection/'.$collection->id.'/info/create') }}" class="btn green-seagreen btn-outline sbold uppercase" data-action="collapse-all">{{ trans('general.cAddNew') }}</a>


            </div>


        </div>


        <div class="portlet box green-seagreen">


            <div class="portlet-title">


                <div class="caption">


                    <i class="fa fa-cogs"></i> {{ trans('general.yourInfos') }} </div>


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


                                <th> {{ trans('general.dtDesc') }} </th>


                                <th> {{ trans('general.dtTools') }} </th>


                            </tr>


                        </thead>


                        <tbody>


                            @foreach($info as $item)


                            <tr>


                                <td> {{ $item->id }} </td>


                                <td> {{ $item->name }} </td>


                                <td> {{ $item->description }} </td>


                                <td>


                                    <div class="clearfix">


                                        <a href="{{ url(getCurrentLocale() . '/manager/collection/' . $collection->id . '/info/' . $item->id . '/edit') }}" class="btn btn-icon-only blue">


                                            <i class="fa fa-edit"></i>


                                        </a>


                                        <!-- Button trigger modal -->


                                        <a href="javascript:;" class="btn btn-primary red del" data-toggle="modal" data-target="#delete-item" data-element-id="{{ $item->id }}" data-delete-url="info/destroy">


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