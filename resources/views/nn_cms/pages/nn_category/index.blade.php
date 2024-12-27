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

        <h3 class="page-title"> {{ trans('general.ptCategory') }}

        </h3>

        <!-- END PAGE TITLE-->

        <!-- END PAGE HEADER-->

        <div class="portlet light bordered">

            <div class="portlet-body">

                <a href="{{ url(getCurrentLocale() . '/manager/category/create') }}" class="btn blue btn-outline sbold uppercase" data-action="collapse-all">{{ trans('general.cAddNew') }}</a>

            </div>

        </div>

        <div class="portlet box blue">

            <div class="portlet-title">

                <div class="caption">

                    <i class="fa fa-cogs"></i> {{ trans('general.yourCategories') }}  </div>

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

                                {{-- <th> {{ trans('general.dtParentId') }} </th> --}}

                                <th> {{ trans('general.dtTools') }} </th>

                                <th> Show / Hide </th>

                            </tr>

                        </thead>

                        <tbody class="load-wrapper sortable">

                            @foreach($items as $item)

                                <tr class="ui-state-default sortable-item" data-category-id="{{$item->id}}">

                                    <td width="50"><i class="fa fa-bars" aria-hidden="true"></i></td>

                                    <td> {{ $item->id }} </td>

                                    <td> {{ $item->name }} </td>

                                    {{-- <td> {{ $item->parent_id }} </td> --}}

                                    <td>

                                        <div class="clearfix">

                                            <a href="{{ url(getCurrentLocale() . '/manager/category/' . $item->id . '/edit') }}" class="btn btn-icon-only blue">

                                                <i class="fa fa-edit"></i>

                                            </a>

                                            <!-- Button trigger modal -->

                                            <a href="javascript:;" class="btn btn-primary red del" data-toggle="modal" data-target="#delete-item" data-element-id="{{ $item->id }}" data-delete-url="category/destroy">

                                                <i class="fa fa-trash"></i>

                                            </a>

                                        </div>

                                    </td>

                                    <td>
                                        <input type="checkbox" class="make-switch show-hide-toggle" data-category-id="{{$item->id}}" data-on-color="primary" data-off-color="default" data-size="small" data-on-text="Show" data-off-text="Hide"{{$item->show ? ' checked' : ''}}>
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
            var categoryId;

            var sortableHolder = $('.sortable');
            var categoryIds = [];

            $(function() {
                $(document).on('switchChange.bootstrapSwitch', '.show-hide-toggle', function(event, state) {
                    categoryId = $(this).data('category-id');

                    $.ajax({
                        url: '{{ route('admin.category.show-hide-toggle') }}',
                        headers: {
                            'X-CSRF-TOKEN': csrfToken
                        },
                        type: 'post',
                        data: {categoryId: categoryId},
                        success: function() {
                        }
                    });
                });

                function initSortable() {
                    sortableHolder.sortable({
                        update: function(event, ui) {
                            categoryIds = [];
                            sortableHolder.find('.sortable-item').each(function() {
                                categoryIds.push($(this).data('category-id'));
                            });

                            $.ajax({
                                url: '{{ route('admin.category.change-positions') }}',
                                headers: {
                                    'X-CSRF-TOKEN': csrfToken
                                },
                                type: 'post',
                                data: {categoryIds: categoryIds},
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