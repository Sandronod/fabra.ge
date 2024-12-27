@if($file=="create")
<div class="form-group">
    <label class="control-label col-md-2">Date</label>
    <div class="col-md-7">
        <div class="input-group input-medium date date-picker" data-date-format="yyyy-mm-dd" >
            <input type="text" name="sDate"  class="form-control" value="" readonly>
            <span class="input-group-btn">
                <button class="btn default" type="button">
                    <i class="fa fa-calendar"></i>
                </button>
            </span>
        </div>
    </div>
</div>
@else
<div class="form-group">
    <label class="col-md-2 control-label">თარიღი</label>
    <div class="col-md-7">
        <div class="input-group input-medium date date-picker" data-date-format="yyyy-mm-dd" >
            <input type="text" name="sDate"  class="form-control" value="{{ $catalog[$i]->sDate }}" readonly="">
            <span class="input-group-btn">
                <button class="btn default" type="button">
                    <i class="fa fa-calendar"></i>
                </button>
            </span>
        </div>
    </div>
</div> 
@endif