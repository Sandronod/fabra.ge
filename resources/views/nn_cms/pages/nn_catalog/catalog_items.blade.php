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
            @if ($item->type == 'products')
                <input type="checkbox" class="make-switch show-hide-toggle-home" data-catalog-id="{{$item->id}}" data-on-color="warning"         data-off-color="default" data-size="small" data-on-text="Show" data-off-text="Hide"{{$item->show_home ? ' checked' : ''}}>
            @endif
        </td>
        <td>
            <input type="checkbox" class="make-switch show-hide-toggle" data-catalog-id="{{$item->id}}" data-on-color="primary" data-off-color="default" data-size="small" data-on-text="Show" data-off-text="Hide"{{$item->show ? ' checked' : ''}}>
        </td>
    </tr>
@endforeach