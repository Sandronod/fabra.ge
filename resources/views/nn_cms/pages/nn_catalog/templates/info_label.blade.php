@if($file=="create")
    <div class="form-group">
        <label class="control-label col-md-2">Info label</label>
        <div class="col-md-7">
            <textarea name="info_label" class="form-control input-lg">{{ Request::old('info_label') }}</textarea>
        </div>
    </div>
@else
    <div class="form-group">
        <label class="col-md-2 control-label">Info label</label>
        <div class="col-md-7">
            <textarea type="text" name="info_label" class="form-control input-lg">{{ $catalog[$i]->info_label }}</textarea>
        </div>
    </div>
@endif