<div class="currency-input" curr-code="GEL">
    <div class="currency-picker dropdown">
        <button>
            <div>
                <img src="/assets/images/flags/ge.svg" alt="ge" />
                gel
            </div>
        </button>
    </div>
    <input type="number" curr-code="GEL" id="header-converter-input-GEL" curr-rate = "1" data-quantity="1" class="inputeelementrates"  onkeyup="changeRates(this,1)" placeholder="0" min="0">
</div>

    @foreach($currs as $key=>$curr)
    
            <div class="currency-input" curr-code="{{$curr->code}}" {{(!in_array($curr->code, $defaults))?'style=display:none':""}} value="">
                <div class="currency-picker dropdown">
                    <button>
                        <div>
                            <img src="/assets/images/flags/{{strtolower($curr->code)}}.svg" alt="{{$curr->code}}">
                            {{$curr->code}}
                        </div>
                    </button>
                </div>
                <input type="number" onkeyup="changeRates(this,1)" curr-code="{{$curr->code}}" data-quantity="{{$curr->quantity}}" class="inputeelementrates" id="header-converter-input-{{$curr->code}}" curr-rate = "{{$curr->rate}}" placeholder="0" min="0">
            </div>
      
    @endforeach
