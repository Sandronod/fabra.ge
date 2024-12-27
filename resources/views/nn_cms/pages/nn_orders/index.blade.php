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

   

        <!-- END PAGE TITLE-->

        <!-- END PAGE HEADER-->

       <!-- <a href="{{ url(getCurrentLocale() . '/manager/collection') }}" class="btn green btn-outline sbold uppercase margin-bottom-20"><i class="fa fa-arrow-left"></i> {{ trans('general.back') }}</a>-->

        <!-- END BACK BTN -->

        <div class="portlet light bordered">

            <div class="portlet-body">

                <div class="row">

                    <div class="col-xs-8">

                      

                    </div>

                    <div class="col-xs-4">

                        {!! Form::open(array('method' => 'get', 'url' => getCurrentLocale() . '/manager/collection/catalog/search', 'class' => 'form-horizontal')) !!}

                        <div class="input-group">

                            <input type="text" class="form-control" name="q">

                            <span class="input-group-btn">

                                <button class="btn green-seagreen" type="submit">

                                    <i class="fa fa-search fa-fw"></i>

                                </button>

                            </span>

                        </div>

                        {!! Form::close() !!}

                    </div>

                </div>

            </div>

        </div>

        <div class="portlet box green-seagreen">

            <div class="portlet-title">

                <div class="caption">

                    <i class="fa fa-cogs"></i> არსებული მომხმარებლები </div>

                <div class="tools">

                    <a href="javascript:;" class="collapse" data-original-title="" title=""> </a>

                </div>

            </div>

            <div class="portlet-body">

                <div class="table-responsive">

                    <table class="data-table table table-bordered">

                        <thead>

                            <tr>

                                <th> მომხმარებელი </th>

                               

                                <th> მობილური </th>

                                <th> ელ. ფოსტა </th>
								  <th>  </th>

                            </tr>

                        </thead>

                        <tbody>

                            @foreach($catalog as $item)

                            <tr>

                                <td> {{ $item->name }}  {{ $item->surname }}</td>   
                                     
                                   <td> {{ $item->mobile }}   </td>

                                <td> {{ $item->email }} </td>

                                <td>

                                  ფორუმი  

                                </td>

                            </tr>

                            @endforeach

                        </tbody>

                    </table>

                </div>

            </div>

        </div>

        <nav>

            {!! $catalog->render() !!}

        </nav>

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