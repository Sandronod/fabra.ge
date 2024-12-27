@if($file == "create")
    <div class="form-group{{ ($errors->has('services_list')) ? ' has-error' : ''}}">
        <label class="control-label col-md-2">Services list</label>
        <div class="col-md-7">
            <script src="{{ url('assets/nn_cms/global/plugins/ckeditor/ckeditor.js') }}" type="text/javascript"></script>
            <textarea id="services_list_editor" class="ckeditor form-control" name="services_list" rows="6" data-error-container="#editor2_error">{{ Request::old('services_list') }}</textarea>
            <script>
                CKEDITOR.replace("services_list_editor", {
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
        <label class="col-md-2 control-label">Services list</label>
        <div class="col-md-7">
            <script src="{{ url('assets/nn_cms/global/plugins/ckeditor/ckeditor.js') }}" type="text/javascript"></script>
            <textarea id="services_list_editor_{{ $langs[$i] }}" class="ckeditor form-control" name="services_list" rows="6" data-error-container="#editor1_error">{{ $catalog[$i]->services_list }}</textarea>
            <script>
                CKEDITOR.replace("services_list_editor_{{ $langs[$i] }}", {
                    toolbar: [
                        ['BulletedList']
                    ]
                });
            </script>
            <div id="editor1_error"></div>
        </div>
    </div>
@endif