@if($file=="create")
<div class="form-group">
    <label class="col-md-2 control-label">{{ trans('general.category') }}</label>
    <div class="col-md-7">
        <select name="category_id" class="form-control input-lg selectpicker" data-live-search="true">
            <option selected="selected" value="0">None</option>
            @if(count($category))
                @foreach($category as $item)
                    <option value="{{ $item->id }}" {{ (Request::old('category_id') == $item->id) ? 'selected' : '' }}>{{ $item->name }}</option>
                @endforeach
            @endif
        </select>
    </div>
</div>
@else
<div class="form-group">
    <label class="col-md-2 control-label">{{ trans('general.category') }}</label>
    <div class="col-md-7">
        <select name="category_id" class="form-control input-lg common-form-select-control selectpicker" data-live-search="true">
            <option selected="selected" value="0">None</option>
            @if(count($category))
                @foreach($category as $item)
                    <option value="{{ $item->id }}" {{ ($catalog[$i]->category_id == $item->id) ? 'selected' : '' }}>{{ $item->name }}</option>
                @endforeach
            @endif
        </select>
    </div>
</div>
@endif