@foreach($currs as $curr)
    @if(in_array(strtolower($curr->code), $defaults))
        <label for="checkboxInput{{$curr->code}}">
            <div class="currency-item" id="checkboxHover{{$curr->code}}">
                <input {{(in_array(strtolower($curr->code), $defaults)) ? 'checked':''}} id="checkboxInput{{$curr->code}}" class="checkbox currencyCheckBox" name="currencyCheckBox" type="checkbox" curr-code='{{$curr->code}}' onChange="myFunction('#checkboxHover{{$curr->code}}', '#hoverH{{$curr->code}}', '#hoverp{{$curr->code}}', this)">
                <div class="currency-main-container">
                    <div class="flagname">
                        <img src="./assets/images/flags/us.svg" alt="{{$curr->code}}">
                        <h4 id="hoverH{{$curr->code}}">{{$curr->code}}</h4>
                    </div>
                    <p id="hoverp{{$curr->code}}">1 {{$curr->code}} = {{$curr->rate}} GEL</p>
                </div>
            </div>
        </label>
    @endif
@endforeach