@if($file=="create")
<div class="form-group">
    <label class="control-label col-md-2">embed code</label>
    <div class="col-md-7">
        <textarea name="embed" class="form-control input-lg">{{ Request::old('embed') }}</textarea>
    </div>
</div>
@else
<div class="form-group">
    <label class="col-md-2 control-label">embed code</label>
    <div class="col-md-7">
        <textarea type="text" name="embed" class="form-control input-lg">{{ $catalog[$i]->embed }}</textarea>
    </div>
</div>
@endif