@if($file == "create")
    <div class="form-group{{ ($errors->has('info_list')) ? ' has-error' : ''}}">
        <label class="control-label col-md-2">Info list</label>
        <div class="col-md-7">
            <script src="{{ url('assets/nn_cms/global/plugins/ckeditor/ckeditor.js') }}" type="text/javascript"></script>
            <textarea id="info_list_editor" class="ckeditor form-control" name="info_list" rows="6" data-error-container="#editor2_error">{{ Request::old('info_list') }}</textarea>
            <script>
                CKEDITOR.replace("info_list_editor", {
                    toolbar: [
                        ['BulletedList']
                    ]
                });
            </script>
            <div id="editor2_error"></div>
        </div>
    </div>
@else
    <div class="form-group">
        <label class="col-md-2 control-label">Info list</label>
        <div class="col-md-7">
            <script src="{{ url('assets/nn_cms/global/plugins/ckeditor/ckeditor.js') }}" type="text/javascript"></script>
            <textarea id="info_list_editor_{{ $langs[$i] }}" class="ckeditor form-control" name="info_list" rows="6" data-error-container="#editor1_error">{{ $catalog[$i]->info_list }}</textarea>
            <script>
                CKEDITOR.replace("info_list_editor_{{ $langs[$i] }}", {
                    toolbar: [
                        ['BulletedList']
                    ]
                });
            </script>
            <div id="editor1_error"></div>
        </div>
    </div>
@endif