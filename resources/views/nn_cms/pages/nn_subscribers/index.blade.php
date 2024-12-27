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


        <h3 class="page-title"> Subscribers


        </h3>


        <!-- END PAGE TITLE-->


        <!-- END PAGE HEADER-->



        <!-- END BACK BTN -->


        <div class="portlet box blue-seagreen">
            {{-- <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-cogs"></i> გამომწერების სია
                </div>
                <div class="tools">
                    <a href="javascript:;" class="collapse" data-original-title="" title=""> </a>
                </div>
            </div> --}}
            <div class="portlet-body">
                <div class="text-right margin-bottom-20">
                    <a href="{{fullUrl('manager/subscribers/download')}}" class="btn btn-icon-only blue sbold uppercase">Export&nbsp;&nbsp;<i class="fa fa-download"></i></a>
                </div>
                <div class="table-responsive">
                    <table class="data-table table table-bordered">
                        <thead>
                            <tr>
                                <th> {{ trans('general.id') }} </th>
                                <th> email </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($subscribers as $item)
                                <tr>
                                    <td> {{ $item->id }} </td>
                                    <td> {{ $item->email }} </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@stop