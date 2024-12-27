@if($file=="create")
<div class="form-group">
    <label class="control-label col-md-2">Keywords</label>
    <div class="col-md-7">
        <textarea name="keywords" class="form-control input-lg">{{ Request::old('keywords') }}</textarea>
    </div>
</div>
@else
<div class="form-group">
    <label class="col-md-2 control-label">Keywords</label>
    <div class="col-md-7">
        <textarea type="text" name="keywords" class="form-control input-lg">{{ $catalog[$i]->keywords }}</textarea>
    </div>
</div>
@endif