@if($file == "create")
    <div class="form-groups">
        <div class="form-groups-list">
            <div class="form-group">
                <label class="control-label col-md-2">Service list item
                </label>
                <div class="col-md-7">
                    <input name="services_list_items[]" class="form-control input-lg" type="text" value="{{ Request::old('services_list_items[]') }}">
                </div>
            </div>
        </div>
        <div class="form-groups-btn-container">
            <div class="row">
                <div class="col-md-9">
                    <button type="button" class="btn blue btn-outline sbold uppercase btn-append-form-group"><i class="fa fa-plus"></i> add service</button>
                </div>
            </div>
        </div>
    </div>
@else
    <div class="form-groups">
        <div class="form-group">
            <label class="col-md-2 control-label">Service list item
            </label>
            <div class="col-md-7">
                <input type="text" name="sub_title" class="form-control input-lg" value="{{ $catalog[$i]->sub_title }}">
            </div>
        </div>
    </div>
@endif

@push('head')
    <style>
        .form-groups-btn-container {
            text-align: right;
            margin-bottom: 20px;
        }
    </style>
@endpush
@push('scripts')
    <script>
        var btnAppendFormGroup = $('.btn-append-form-group');

        btnAppendFormGroup.click(function() {

        });
    </script>
@endpush
