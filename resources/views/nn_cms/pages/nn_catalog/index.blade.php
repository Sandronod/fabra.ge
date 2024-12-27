@extends('../nn_cms/index')

@section('content')

    <?php

        $dbitem = DB::table('nn_settings')->first();

        $filialebi = DB::table('nn_filialebi')->first();

    ?>

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
        <h3 class="page-title">  Collection / catalog / list
        </h3>

        <!-- END PAGE TITLE-->

        <!-- END PAGE HEADER-->

        <a href="{{ url(getCurrentLocale() . '/manager/collection') }}" class="btn green btn-outline sbold uppercase margin-bottom-20"><i class="fa fa-arrow-left"></i> {{ trans('general.back') }}</a>

        <!-- END BACK BTN -->

        <div class="portlet light bordered">
            <div class="portlet-body">
                <div class="row">
                    <div class="col-xs-8">
                        <a href="{{ url(getCurrentLocale() . '/manager/collection/'.$collection->id.'/catalog/create') }}" class="btn green-seagreen btn-outline sbold uppercase" data-action="collapse-all">{{ trans('general.cAddNew') }}</a>
                    </div>
                    {{-- <div class="col-xs-4">
                        @php
                            $cat = DB::table('nn_category_lang')->where('lang', '=', 'ka')
                                ->get();

                        @endphp
                             {!! Form::open(array('method' => 'get', 'url' => getCurrentLocale() . '/manager/collection/' . $collection->id . '/catalog/search', 'class' => 'form-horizontal')) !!}

						<div class="input-group">
							@php
                                $sel = "";
                                if (isset($_GET["cat"]))
                                {
                                    if ($_GET["cat"] == '') $sel = "selected";
                                }
                            @endphp
							<select class="form-control" name="cat" onchange>

								<option value="all">ყველა კატეგორია</option>

								<option value="" {{$sel}} >კატეგორიის გარეშე</option>

								@foreach($cat as $c)
                            @php

                                $sel = "";

                                if (isset($_GET["cat"]))
                                {

                                    if ($_GET["cat"] == $c->category_id) $sel = "selected";

                                }
                            @endphp
								<option value="{{$c->category_id}}" {{$sel}}>{{$c->name}}</option>
								@endforeach
							</select>
                        </div>
                        <div class="input-group">
                           <input type="text" class="form-control" placeholder="არქტიკული კოდი, დასახელება" name="q" value="{{ isset($_GET['q'])?$_GET['q']:'' }}">
                            <span class="input-group-btn">
                                <button class="btn green-seagreen" type="submit">
                                    <i class="fa fa-search fa-fw"></i>
                                </button>
                            </span>
                        </div>
                        {!! Form::close() !!}
                    </div> --}}
                </div>
            </div>
        </div>
        <div class="portlet box green-seagreen">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-cogs"></i> {{ trans('general.yourCatalogs') }}
                </div>
                <div class="tools">
                    <a href="javascript:;" class="collapse" data-original-title="" title=""> </a>
                </div>
            </div>
            <div class="portlet-body">
                <div class="table-responsive">
                    <table class="data-table table table-bordered">
                        <thead>
                            <tr>
                                <th width="50"> Sort </th>
                                <th> {{ trans('general.id') }} </th>
                                <th> {{ trans('general.dtName') }} </th>
                                <th> {{ trans('general.dtTools') }} </th>
                                <th> Show / Hide </th>
                            </tr>
                        </thead>
                        <tbody class="load-wrapper sortable">
                            @foreach($items as $item)
                                <tr class="ui-state-default sortable-item" data-catalog-id="{{$item->id}}">
                                    <td width="50"><i class="fa fa-bars" aria-hidden="true"></i></td>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>
                                        <div class="clearfix">
                                            <a href="{{ url(getCurrentLocale() . '/manager/collection/' . $collection->id . '/catalog/' . $item->id . '/edit') }}" class="btn btn-icon-only blue">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                            <!-- Button trigger modal -->
                                            <a href="javascript:;" class="btn btn-primary red del" data-toggle="modal" data-target="#delete-item" data-element-id="{{ $item->id }}" data-delete-url="catalog/destroy">
                                                <i class="fa fa-trash"></i>
                                            </a>
                                        </div>
                                    </td>
                                    <td>
                                        <input type="checkbox" class="make-switch show-hide-toggle" data-catalog-id="{{$item->id}}" data-on-color="primary" data-off-color="default" data-size="small" data-on-text="Show" data-off-text="Hide"{{$item->show ? ' checked' : ''}}>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        {{-- <nav>
            {!! $catalog->render() !!}
        </nav> --}}
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

    <script>
        $("#savesettings, #savefil").submit(function(e){
            e.preventDefault();
            var form = $(this);
            var data = form.serializeArray();
            var url = form.attr("action");
            var type = form.attr("method");

            $.ajax({
                url: url,
                type: type,
                data: data,
                beforeSend: function (data) {
                },
                success: function (data) {
                    alert('მონაცემები განახლდა')
                },
                error: function (data) {
                },
                complete: function (data) {
                },
            });
        });
    </script>

    @push('head')
        <style>
            .sortable .ui-state-default {
                cursor: all-scroll;
            }
            .sortable tr.ui-sortable-helper {
                display: table;
                background-color: #fff;
            }
        </style>
    @endpush

    @push('body.bottom')

        <script src="{{ url('assets/nn_cms/global/plugins/jquery-ui/jquery-ui.min.js') }}" type="text/javascript"></script>
        <!-- END JQUERY UI SCRIPT -->

        <script src="{{ url('assets/nn_cms/custom/js/delete-item.js') }}" type="text/javascript"></script>
        <!-- END DELETE ITEM -->
        
        <script>
            var csrfToken = $('meta[name="csrf-token"]').attr('content');
            var catalogId;

            var sortableHolder = $('.sortable');
            var catalogIds = [];

            $(function() {
                $(document).on('switchChange.bootstrapSwitch', '.show-hide-toggle', function(event, state) {
                    catalogId = $(this).data('catalog-id');

                    $.ajax({
                        url: '{{ route('admin.catalog.show-hide-toggle') }}',
                        headers: {
                            'X-CSRF-TOKEN': csrfToken
                        },
                        type: 'post',
                        data: {catalogId: catalogId},
                        success: function() {
                        }
                    });
                });

                function initSortable() {
                    sortableHolder.sortable({
                        update: function(event, ui) {
                            catalogIds = [];
                            sortableHolder.find('.sortable-item').each(function() {
                                catalogIds.push($(this).data('catalog-id'));
                            });

                            $.ajax({
                                url: '{{ route('admin.catalog.change-positions') }}',
                                headers: {
                                    'X-CSRF-TOKEN': csrfToken
                                },
                                type: 'post',
                                data: {catalogIds: catalogIds},
                                success: function() {
                                }
                            });
                        }
                    });
                }
                initSortable();
            });

            var loadWrapper = $('.load-wrapper');
            var page = 1;
            var loaded = 0;
            var loadSpinnerWrapper = $('.load-spinner-wrapper');

            $(window).scroll(function() {
                if (loaded) return false;

                if (($(document).scrollTop() + $(window).height()) >= (loadWrapper.offset().top + loadWrapper.height())) {

                    page += 1;
                    loaded = 1;

                    loadSpinnerWrapper.removeClass('d-none');

                    $.ajax({
                        url: window.location.href,
                        type: 'get',
                        data: {page: page},
                        success: function(response) {

                            if (response.isMore) loaded = 0;
                            else loaded = 1;

                            loadWrapper.append(response.view);
                            loadSpinnerWrapper.addClass('d-none');

                            $('.show-hide-toggle').bootstrapSwitch();

                            initSortable();

                        }
                    });

                }
            });
        </script>

    @endpush

@stop
