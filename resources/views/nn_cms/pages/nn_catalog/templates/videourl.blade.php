@if($file == "create")
<div class="form-group">
    <label class="control-label col-md-2">Video</label>
    <div class="col-md-7">
        <textarea name="videoUrl" class="form-control input-lg">{{ Request::old('videoUrl') }}</textarea>
    </div>
</div>
@else
<div class="form-group">
    <label class="col-md-2 control-label">Video</label>
    <div class="col-md-7">
        <textarea type="text" name="videoUrl" class="form-control input-lg">{{ $catalog[$i]->videoUrl }}</textarea>
    </div>
</div>
@endif