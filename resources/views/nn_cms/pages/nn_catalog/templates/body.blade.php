 @if($file == "create")
 <div class="form-group{{ ($errors->has('body')) ? ' has-error' : ''}}">
    <label class="control-label col-md-2">{{ trans('general.fclbBody') }}</label>
    <div class="col-md-7">
        <script src="{{ url('assets/nn_cms/global/plugins/ckeditor/ckeditor.js') }}" type="text/javascript"></script>
        <textarea id="body_editor" class="ckeditor form-control" name="body" rows="6" data-error-container="#editor2_error">{{ Request::old('body') }}</textarea>
        <script>
            CKEDITOR.replace("body_editor", {
                filebrowserImageBrowseUrl: '{{ asset("filemanager?type=Images") }}',
                filebrowserImageUploadUrl: '{{ asset("filemanager/upload?type=Images&_token=") }}{{ csrf_token() }}',
                filebrowserBrowseUrl: '{{ asset("filemanager?type=Files") }}',
                filebrowserUploadUrl: '{{ asset("filemanager/upload?type=Files&_token=") }}{{ csrf_token() }}'
            });
        </script>
        <div id="editor2_error"></div>
         @if($errors->has('body'))
            <div class="error-text text-danger">
            {{ $errors->default->get('body')[0] }}
            </div>
         @endif
    </div>
 </div>
 
     
 @else
     
 <div class="form-group">
    <label class="col-md-2 control-label">{{ trans('general.fclbBody') }}</label>
    <div class="col-md-7">
        <script src="{{ url('assets/nn_cms/global/plugins/ckeditor/ckeditor.js') }}" type="text/javascript"></script>
        <textarea id="body_editor_{{ $langs[$i] }}" class="ckeditor form-control" name="body" rows="6" data-error-container="#editor1_error">{{ $catalog[$i]->body }}</textarea>
        <script>
            CKEDITOR.replace("body_editor_{{ $langs[$i] }}", {
                filebrowserImageBrowseUrl: '{{ asset("filemanager?type=Images") }}',
                filebrowserImageUploadUrl: '{{ asset("filemanager?type=Image&_token=") }}{{ csrf_token() }}',
                filebrowserBrowseUrl: '{{ asset("manager/laravel-filemanager?type=Files") }}',
                filebrowserUploadUrl: '{{ asset("manager/laravel-filemanager/upload?type=Files&_token=") }}{{ csrf_token() }}'
         });
        </script>
        <div id="editor1_error"></div>
    </div>
</div>
 @endif