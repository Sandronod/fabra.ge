@if($file=="create")
<div class="form-group">
    <label class="control-label col-md-2">{{ trans('general.fclbDesc') }}</label>
    <div class="col-md-7">
        <textarea name="description" class="form-control input-lg">{{ Request::old('description') }}</textarea>
    </div>
</div>
@else
<div class="form-group">
    <label class="col-md-2 control-label">{{ trans('general.fclbDesc') }}</label>
    <div class="col-md-7">
        <textarea type="text" name="description" class="form-control input-lg">{{ $catalog[$i]->description }}</textarea>
  </div>
</div>
@endif