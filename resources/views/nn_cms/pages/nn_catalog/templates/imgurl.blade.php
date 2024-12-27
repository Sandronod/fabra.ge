@if($file == "create")
<div class="form-group">
    <label class="control-label col-md-2">{{ trans('general.fclbPhoto') }}</label>
    <div class="col-md-3">
        <div class="photo">
            <button type="button" class="btn btn-primary red remove-filemanager-photo">
                <i class="fa fa-close"></i>
            </button>
            <img src="{{ (Request::old('imgurl')) ? Request::old('imgurl') : url('assets/nn_cms/custom/images/default-780x450.png') }}" data-default-photo-src="{{ url('assets/nn_cms/custom/images/default-780x450.png') }}" id="showImg"  class="img-responsive img-thumbnail center-block img" alt="catalog photo">
            <input type="hidden" name="imgurl" id="imgurl"  data-required="1" class="form-control" value="{{ Request::old('imgurl') }}">
        </div>
        <button type="button" class="btn green-sharp btn-block sbold uppercase margin-top-10 filemanager-btn" data-lang="">{{ trans('general.fclbSetPhotoBtn') }}</button>
    </div>
</div>
@else
<div class="form-group">
    <label class="control-label col-md-2">{{ trans('general.fclbPhoto') }}</label>
    <div class="col-md-3">
        <div class="photo">
            <button type="button" class="btn btn-primary red remove-filemanager-photo">
                <i class="fa fa-close"></i>
            </button>
            <img src="{{ (!empty($catalog[$i]->imgurl)) ? $catalog[$i]->imgurl : url('assets/nn_cms/custom/images/default-780x450.png') }}" data-default-photo-src="{{ url('assets/nn_cms/custom/images/default-780x450.png') }}" id="showImg_{{$langs[$i]}}" class="img-responsive img-thumbnail center-block img" alt="catalog photo">
            <input type="hidden" name="imgurl" id="imgurl_{{ $langs[$i]}}"  data-required="1" class="form-control" value="{{ $catalog[$i]->imgurl }}">
        </div>
        <button type="button" class="btn green-sharp btn-block sbold uppercase margin-top-10 filemanager-btn" data-lang="{{ $langs[$i] }}">{{ trans('general.fclbSetPhotoBtn') }}</button>
    </div>
</div>  
@endif