@if($file == "create")
    <div class="form-group">
        <label class="control-label col-md-2">Price
        </label>
        <div class="col-md-7">
            <input name="price" class="form-control input-lg" type="text" value="{{ Request::old('price') }}">
        </div>
    </div>
@else
    <div class="form-group">
        <label class="col-md-2 control-label">Price
        </label>
        <div class="col-md-7">
            <input type="text" name="price" class="form-control input-lg" value="{{ $catalog[$i]->price }}">
        </div>
    </div>
@endif

