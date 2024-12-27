<table>
    <thead>
        <tr>
            <th>Currency</th>
            <th>Quantity</th>
            <th>Exchange Rate</th>
            <th>Difference</th>
            <th>Last 7 Days</th>
        </tr>
    </thead>
    <tbody>
        @foreach($currs as $curr)
            <tr class="currency-sticky">
                <td>
                    <div class="flex gap" style="--gap: 0.5rem">
                        <div>
                            <img src="/assets/images/flags/{{strtolower($curr->code)}}.svg" width="21" height="21" alt="{{$curr->code}}" />
                        </div>
                        {{$curr->code}}
                    </div>
                </td>
                <td>{{$curr->quantity}} {{$curr->code}}</td>
                <td>{{$curr->rate}}</td>
                <td class="flex gap small-height">
                    @if($curr->diff >= 0)
                    <img src="/assets/images/green-arrow-up.svg" alt="Exchange Rate Increased">
                    @else
                    <img src="/assets/images/red-arrow-down.svg" alt="Exchange Rate Decreased">
                    @endif
                    {{$curr->diff}}
                </td>
                <td>
                    <img id="line-image-{{$curr->code}}" src="/assets/images/ezgif.com-gif-maker.gif" alt="loading" />
                </td>
            </tr>
        @endforeach
    </tbody>
</table>