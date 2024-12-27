@if($file == "create")
    <div class="form-group{{ ($errors->has('name')) ? ' has-error' : ''}}">
        <label class="control-label col-md-2">{{ trans('general.fclbName') }}
            <span aria-required="true" class="required"> * </span>
        </label>
        <div class="col-md-7">
            <input name="name" data-required="1"  class="form-control input-lg" type="text" value="{{ Request::old('name') }}">
            @if($errors->has('name'))
                <div class="error-text text-danger">
                    {{ $errors->default->get('name')[0] }}
                </div>
            @endif
        </div>
    </div>
        <div class="form-group{{ ($errors->has('slug')) ? ' has-error' : ''}}">
            <label class="control-label col-md-2">{{ trans('general.fclbSlug') }}
            </label>
            <div class="col-md-7">
                <input type="text" name="slug" class="form-control input-lg" value="{{ Request::old('slug') }}">
                @if($errors->has('slug'))
                    <div class="error-text text-danger">
                        {{ $errors->default->get('slug')[0] }}
                    </div>
                @endif
            </div>
        </div>
@else
<div class="form-group">
    <label class="col-md-2 control-label">{{ trans('general.fclbName') }}
        <span aria-required="true" class="required"> * </span>
    </label>
    <div class="col-md-7">
        <input type="text" name="name" class="form-control input-lg" value="{{ $catalog[$i]->name }}">
    </div>
</div>

@endif

