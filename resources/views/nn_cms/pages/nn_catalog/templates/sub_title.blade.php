@if($file == "create")
    <div class="form-group">
        <label class="control-label col-md-2">Sub title
        </label>
        <div class="col-md-7">
            <input name="sub_title" class="form-control input-lg" type="text" value="{{ Request::old('sub_title') }}">
        </div>
    </div>
@else
    <div class="form-group">
        <label class="col-md-2 control-label">Sub title
        </label>
        <div class="col-md-7">
            <input type="text" name="sub_title" class="form-control input-lg" value="{{ $catalog[$i]->sub_title }}">
        </div>
    </div>
@endif

