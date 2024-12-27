@if($file == "create")
    <div class="form-group">
        <label class="control-label col-md-2">Stars
        </label>
        <div class="col-md-7">
            <select name="stars" class="form-control input-lg">
                <option value="1"{{ Request::old('stars') == 1 ? ' selected' : '' }}>1</option>
                <option value="2"{{ Request::old('stars') == 2 ? ' selected' : '' }}>2</option>
                <option value="3"{{ Request::old('stars') == 3 ? ' selected' : '' }}>3</option>
                <option value="4"{{ Request::old('stars') == 4 ? ' selected' : '' }}>4</option>
                <option value="5"{{ Request::old('stars') == 5 ? ' selected' : '' }}>5</option>
            </select>
        </div>
    </div>
@else
    <div class="form-group">
        <label class="col-md-2 control-label">Stars
        </label>
        <div class="col-md-7">
            <select name="stars" class="form-control input-lg">
                <option value="1"{{ $catalog[$i]->stars == 1 ? ' selected' : '' }}>1</option>
                <option value="2"{{ $catalog[$i]->stars == 2 ? ' selected' : '' }}>2</option>
                <option value="3"{{ $catalog[$i]->stars == 3 ? ' selected' : '' }}>3</option>
                <option value="4"{{ $catalog[$i]->stars == 4 ? ' selected' : '' }}>4</option>
                <option value="5"{{ $catalog[$i]->stars == 5 ? ' selected' : '' }}>5</option>
            </select>
        </div>
    </div>
@endif

