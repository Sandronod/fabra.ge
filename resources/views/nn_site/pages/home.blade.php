@extends('../nn_site/index')
@section('content')

    @include('nn_site.partials.header')
    
    <main class="container main-part">

        <div class="converter-parent container">
            <div class="convert">
                <header class="flex space-between align-center">
                    <h2 class="heading-2">{{$lang->convertCurrency}}</h2>
                    <div class="filter-n-calendar-container">
                        <div class="filter filter-by-date">
                            <button>
                                    <img src="{{url('')}}/assets/images/calendar.svg" alt="calendar" />
                                    <span id="dateexchangerate-value" class="date-value">{{$lang->today}}</span>
                                    <!-- <img src="{{url('')}}/assets/images/down-arrow 4.svg" alt="" /> -->
                                </button>
                            <div class="date-input-wrap">
                                <input type="date"  name="" id="dateexchangerate" />
                            </div>
                        </div>
                        <div class="filter-icon-container" onclick="openpopup('.popup-currency-selectors')">
                            <img src="{{url('')}}/assets/images/filter.svg" alt="Filter" height="16px" width="16px">
                        </div>
                    </div>
                </header>

                <div id="headerConverterLoader" style="display: flex;width: 100%;justify-content: center;">
                    <img src="{{url('')}}/assets/images/Loading_icon.gif" width="200" height="100%" alt="Load">
                </div>  
                <div class="converter" id="headerConverter">
                       
                </div>
        
                <div class="flex space-between margin-top">
                    <p class="text-accent hide-on-md">
                        {{$lang->lastUpdated}}:&nbsp;
                        @if (getCurrentLocale() == 'ka')
                            @php setlocale(LC_TIME, 'Georgian') @endphp
                        @endif
                        {{\Carbon\Carbon::parse(date('M d, Y'))->formatLocalized('%b %d, %Y')}}
                    </p>
        
                    <div class="convert__actions">
                        <a onclick="sharepopup('.share-popup')" id="shareA" href="javascript:void(0);">
                            <img src="{{url('')}}/assets/images/share.svg" alt="share"> {{$lang->share}}
                        </a>
                        <a href="javascript:void(0);" onclick="window.print();">
                            <img src="{{url('')}}/assets/images/printer.svg" alt="print"> {{$lang->print}}
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <section class="section main-section-all-content">
            <!-- exchange rates -->
            <div class="tab-content">
                <!-- first div of official exchanges -->
                <div class="exchange exchange1 active" data-tab-content id="official-exchange-rate">
                    <header class="exchange__header table-header flex space-between">
                        <h2 class="heading-2">{{$lang->officialExchangeRate}}</h2>
                        <input type="text" class="search-control" id="searchableRates" placeholder="{{$lang->search}}">
                    </header>
                    <div class="exchange-table">
                        <table>
                            <thead>
                                <tr>
                                    <th>{{$lang->currency}}</th>
                                    <th>{{$lang->quantity}}</th>
                                    <th>{{$lang->exchangeRate}}</th>
                                    <th>{{$lang->difference}}</th>
                                    <th>{{$lang->lastSevenDays}}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($currs as $curr)
                                    <tr class="currency-sticky searchablerate"  data-code="{{strtolower($curr->code)}}">
                                        <td>
                                            <div class="flex gap" style="--gap: 0.5rem">
                                                <div>
                                                    <img src="{{url('')}}/assets/images/flags/{{strtolower($curr->code)}}.svg" width="21" height="21" alt="{{$curr->code}}" />
                                                </div>
                                                {{$curr->code}}
                                            </div>
                                        </td>
                                        <td>{{$curr->quantity}} {{$curr->code}}</td>
                                        <td>{{$curr->rate}}</td>
                                        @php
                                            $currDiffClass = '';
                                            if ($curr->diff > 0) {
                                                $currDiffClass = ' currency-green';
                                            } elseif ($curr->diff < 0) {
                                                $currDiffClass = ' currency-red';
                                            }
                                        @endphp
                                        <td class="flex gap small-height{{$currDiffClass}}">
                                            @if ($curr->diff > 0)
                                                <img src="{{url('')}}/assets/images/green-arrow-up.svg" alt="Exchange Rate Increased">
                                                {{$curr->diff}}
                                            @elseif ($curr->diff < 0)
                                                <img src="{{url('')}}/assets/images/red-arrow-down.svg" alt="Exchange Rate Decreased">
                                                {{$curr->diff * -1}}
                                            @elseif ($curr->diff == 0)
                                                0
                                            @endif
                                        </td>
                                        <td>
                                            <img id="line-image-{{$curr->code}}" src="{{url('')}}/assets/images/ezgif.com-gif-maker.gif" alt="Rate" />
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <button class="show-more">
                        <img src="{{url('')}}/assets/images/Down_Arrow_3.svg" alt="Exchange Rate Decreased" />
                    </button>
                    <p class="text-accent2" style="margin-top: 25px;">
                        {{$lang->lastUpdated}}:&nbsp;{{\Carbon\Carbon::parse(date('M d, Y'))->formatLocalized('%b %d, %Y')}}
                    </p>
                </div>
            </div>
            <!-- second bank exchanges rate -->
            <div class="exchange active exchange-rate-parent" id="exchange-rate-in-banks">
                <header class="exchange__header flex space-betweenv bank-kiosk-header">
                    <h2 class="heading-2">{{$lang->exhangeRateInBanks}}</h2>
                </header>
                <div class="banks-table">

                    @php $banksChunkLoopIteration = 0 @endphp

                    @foreach($banks as $keyBC => $banksChunk)

                        <div class="banks-row" id="row-{{$keyBC}}"{{$keyBC > 1 ? ' style=display:none' : ''}}>

                            @php $banksChunkLoopIteration = $loop->iteration @endphp
                        
                            @foreach ($banksChunk as $keyB => $bank)
                                <div class="bank">
                                    <header class="scroll-toggle-btn{{$banksChunkLoopIteration < 2 ? ' active' : ''}}">
                                        <img class="bank-logo" src="{{url('')}}/assets/images/banks/{{$bank['bid']}}.webp" alt="banks">
                                        @if (getCurrentLocale() == 'ka')
                                            {{$bank['bank_ka']}}
                                        @else
                                            {{$bank['bank_en']}}
                                        @endif
                                        <img class="bank-arrow-down1 bank-arrow-down" src="{{url('')}}/assets/images/Down_Arrow_3.svg" alt="Scroll Down" style="display:{{$banksChunkLoopIteration >= 2 ? 'block' : 'none'}};">
                                        <img class="bank-arrow-up1 bank-arrow-up" src="{{url('')}}/assets/images/up_arrow_3.svg" alt="Scroll up" style="display:{{$banksChunkLoopIteration < 2 ? 'block' : 'none'}};">
                                    </header>
                                    <table class="currenciestable"{{$banksChunkLoopIteration < 2 ? ' style=display:table' : ''}}>
                                        <thead>
                                            <tr>
                                                <th>{{$lang->currency}}</th>
                                                <th>{{$lang->buy}}</th>
                                                <th>{{$lang->sell}}</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            @foreach(json_decode($bank['body']) as $key => $b)
                                                <tr>
                                                    <td>
                                                        <div class="flex gap" style="--gap: 0.5rem">
                                                            <div>
                                                                <img src="{{url('')}}/assets/images/flags/{{strtolower($key)}}.svg" width="21" height="21" alt="{{$curr->code}}" />
                                                            </div>
                                                            {{$key}}
                                                        </div>
                                                    </td>
                                                    <td>{{($key == 'RUB' && intval($b->buy) > 1)?$b->buy/100:$b->buy}}</td>
                                                    <td>{{($key == 'RUB' && intval($b->sell) > 1)?$b->buy/100:$b->sell}}</td>
                                                </tr>
                                            @endforeach
                                            @if (count((array) json_decode($bank['body'])) < 4)
                                                @for ($i = 0; $i < (4 - count((array) json_decode($bank['body']))); $i++)
                                                    <tr>
                                                        <td>-</td>
                                                        <td>-</td>
                                                        <td>-</td>
                                                    </tr>
                                                @endfor
                                            @endif
                                        </tbody>
                                    </table>
                                </div>
                            @endforeach

                        </div>

                    @endforeach

                    @if ($banksChunkLoopIteration > 2)
                        <a class="view-more view-more-banks">{{$lang->viewMore}}</a>
                    @endif
                </div>
            </div>
            <!-- Third Exchanges in Kiosk -->
            <div class="exchange active exchange-rate-parent" data-tab-content id="exchange-rate-in-banks">
                <header class="exchange__header flex space-between bank-kiosk-header">
                    <h2 class="heading-2">{{$lang->exchangeRateInBanksAndKiosks}}</h2>
                </header>
                <div class="banks-table">

                    @php $kiosksChunkLoopIteration = 0 @endphp

                    @foreach($kiosks as $keyBC => $kiosksChunk)

                        <div class="banks-row" id="row-{{$keyBC}}"{{$keyBC > 1 ? ' style=display:none' : ''}}>

                            @php $kiosksChunkLoopIteration = $loop->iteration @endphp
                        
                            @foreach ($kiosksChunk as $keyB => $kiosk)
                                <div class="bank">
                                    <header class="scroll-toggle-btn{{$kiosksChunkLoopIteration < 2 ? ' active' : ''}}">
                                        <img class="bank-logo" src="{{url('')}}/assets/images/kiosks/{{$kiosk['bid']}}.webp" alt="kiosks">
                                        @if (getCurrentLocale() == 'ka')
                                            {{$kiosk['bank_ka']}}
                                        @else
                                            {{$kiosk['bank_en']}}
                                        @endif
                                        <img class="bank-arrow-down1 bank-arrow-down" src="{{url('')}}/assets/images/Down_Arrow_3.svg" alt="Scroll Down" style="display:{{$kiosksChunkLoopIteration >= 2 ? 'block' : 'none'}};">
                                        <img class="bank-arrow-up1 bank-arrow-up" src="{{url('')}}/assets/images/up_arrow_3.svg" alt="Scroll up" style="display:{{$kiosksChunkLoopIteration < 2 ? 'block' : 'none'}};">
                                    </header>
                                    <table class="currenciestable"{{$kiosksChunkLoopIteration < 2 ? ' style=display:table' : ''}}>
                                        <thead>
                                            <tr>
                                                <th>{{$lang->currency}}</th>
                                                <th>{{$lang->buy}}</th>
                                                <th>{{$lang->sell}}</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            @foreach(json_decode($kiosk['body']) as $key => $k)
                                                <tr>
                                                    <td>
                                                        <div class="flex gap" style="--gap: 0.5rem">
                                                            <div>
                                                                <img src="{{url('')}}/assets/images/flags/{{strtolower($key)}}.svg" width="21" height="21" alt="{{$curr->code}}" />
                                                            </div>
                                                            {{$key}}
                                                        </div>
                                                    </td>
                                                    <td>{{($key == 'RUB' && intval($k->buy) > 1)?$k->buy/100:$k->buy}}</td>
                                                    <td>{{($key == 'RUB' && intval($k->sell) > 1)?$k->buy/100:$k->sell}}</td>
                                                </tr>
                                            @endforeach
                                            @if (count((array) json_decode($kiosk['body'])) < 4)
                                                @for ($i = 0; $i < (4 - count((array) json_decode($kiosk['body']))); $i++)
                                                    <tr>
                                                        <td>-</td>
                                                        <td>-</td>
                                                        <td>-</td>
                                                    </tr>
                                                @endfor
                                            @endif
                                        </tbody>
                                    </table>
                                </div>
                            @endforeach

                        </div>

                    @endforeach
                    
                    @if ($kiosksChunkLoopIteration > 2)
                        <a class="view-more view-more-banks">{{$lang->viewMore}}</a>
                    @endif
                </div>
            </div>
            <!-- here canvas -->
            <section class="dynamics">
                <header class="flex space-between align-center">
                    <h2 class="heading-2">{{$lang->exhangeDynamics}}</h2>

                    <div class="flex gap">
                        <div class="filter filter-dropdown">
                            <button dropdown-trigger id="filter-dropdown-main-btn">
                                <div>
                                <img src="{{url('')}}/assets/images/flags/us.svg" alt="USD" />
                                USD
                                </div>
                                <!-- <img src="{{url('')}}/assets/images/down-arrow 4.svg" alt="" /> -->
                            </button>
                            
                            <div class="filter-options">
                                @foreach($currs as $key => $curr)
                                @php if($key == 5)break; @endphp
                                    {{-- @if($curr->code != "usd") --}}
                                        <button value="{{strtolower($curr->code)}}" class="filter-options-btn">
                                            <img src="{{url('')}}/assets/images/flags/{{strtolower($curr->code)}}.svg" alt="{{$curr->code}}" />
                                            {{$curr->code}}
                                        </button>
                                    {{-- @endif --}}
                                @endforeach
                            </div>
                        </div>

                        <div class="filter filter-by-date">
                            <button>
                                <img src="{{url('')}}/assets/images/calendar.svg" alt="calendar" />
                                <span class="date-value">{{$lang->today}}</span>
                                <!-- <img src="{{url('')}}/assets/images/down-arrow 4.svg" alt="" /> -->
                            </button>
                            <div class="date-input-wrap">
                                <input type="date" name="" id="chartDate"  />
                            </div>
                        </div>
                    </div>
                </header>

                <div class="dynamics-chart-container-out">
                    <div class="dynamics-chart-container">
                        <div id="lineChartLoader">
                            <img src="{{url('')}}/assets/images/Loading_icon.gif" width="300" height="100%" alt="Load">
                        </div>
                        <canvas id="lineChart"></canvas>
                    </div>
                </div>
            </section>
            <!-- Crypto currency -->
            <div class="tab-content crypto-block">
                <!-- first div of official exchanges -->
                <div class="exchange exchange2 active" data-tab-content id="crypto-exchange-rate">
                    <header class="exchange__header table-header flex space-between">
                        <h2 class="heading-2">{{$lang->cryptoExchangeRate}}</h2>
                        <input type="text" id="searchableRates1" class="search-control" placeholder="{{$lang->search}}">
                    </header>
                    <div class="exchange-table crypto-table">
                        <table>
                            <thead>
                                <tr>
                                    <th class="flex-th">{{$lang->currency}}</th>
                                    <th class="flex-th">
                                        <p>{{$lang->price}} 
                                            {{-- <img src="{{url('')}}/assets/images/crypto-arrow-down.svg" alt="Sort"><img class="hidden-sort-arrow" src="{{url('')}}/assets/images/crypto-arrow-up.svg" alt="Sort"> --}}
                                        </p>
                                    </th>
                                    <th class="flex-th">
                                        <p>{{$lang->twentyFourHourChange}}
                                            {{-- <img src="{{url('')}}/assets/images/crypto-arrow-down.svg" alt="Sort"><img class="hidden-sort-arrow" src="{{url('')}}/assets/images/crypto-arrow-up.svg" alt="Sort"> --}}
                                        </p>
                                    </th>
                                    {{-- <th class="flex-th"> --}}
                                        {{-- <p>Market cap --}}
                                            {{-- <img src="{{url('')}}/assets/images/crypto-arrow-down.svg" alt="Sort"><img class="hidden-sort-arrow" src="{{url('')}}/assets/images/crypto-arrow-up.svg" alt="Sort"> --}}
                                        {{-- </p> --}}
                                    {{-- </th> --}}
                                    <th class="flex-th">
                                        <p>
                                            {{$lang->volumeTwentyFourHours}}                                         
                                            {{-- <img src="{{url('')}}/assets/images/crypto-arrow-down.svg" alt="Sort"><img class="hidden-sort-arrow" src="{{url('')}}/assets/images/crypto-arrow-up.svg" alt="Sort"> --}}
                                        </p>
                                    </th>
                                    {{-- <th class="flex-th">
                                        <p>1 Month</p>
                                    </th> --}}
                                    <th>{{$lang->marketCap}}</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($cryptoCurrency as $item)
                                    <tr class="searchablerate1" data-code="{{strtolower($item->symbol)}}-{{strtolower($item->name)}}">
                                        <td>
                                            <div class="flex gap" style="--gap: 0.5rem">
                                                <div class="crypto">
                                                    {{-- public_path('storage/images/' . $value) --}}
                                                    @if (file_exists(public_path('assets/images/crypto_icons/'.strtolower($item->symbol).'.svg')) && $item->symbol != 'CON')
                                                        <img src="{{url('')}}/assets/images/crypto_icons/{{strtolower($item->symbol)}}.svg" width="20" height="20" alt="{{$item->name}}">
                                                    @else
                                                        <img src="{{url('')}}/assets/images/crypto_icons/no-image.png" width="20" height="20" alt="noimage">
                                                    @endif
                                                    <div class="cryptoname">
                                                        <p class="fullname-crypto">{{$item->name}}</p>
                                                        <p class="abreviation-of-crypto">{{$item->symbol}}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="price">$ {{isset($item->priceUsd) ? number_format(round($item->priceUsd, 4), 4) : '0'}}</td>
                                        <td class="{{$item->changePercent24Hr > 0 ? 'cryptogreen' : 'cryptogreen-disabled cryptored'}}">
                                            <p>
                                                @if ($item->changePercent24Hr > 0)
                                                    <img src="{{url('')}}/assets/images/green-arrow-up.svg" alt="rised"> {{round($item->changePercent24Hr, 4)}}%
                                                @else
                                                    <img src="{{url('')}}/assets/images/red-arrow-down.svg" alt="Exchange Rate Decreased"> {{round($item->changePercent24Hr, 4) * - 1}}%
                                                @endif
                                            </p>
                                        </td>
                                        {{-- <td>$ 39.000.87</td> --}}
                                        <td>
                                            <p class="daily-view">
                                                $
                                                @if (isset($item->volumeUsd24Hr))
                                                    @if ($item->volumeUsd24Hr < 1000000)
                                                        {{number_format($item->volumeUsd24Hr)}}
                                                    @elseif ($item->volumeUsd24Hr < 1000000000)
                                                        {{number_format($item->volumeUsd24Hr / 1000000, 2) . ' ' . $lang->m}}
                                                    @else
                                                        {{number_format($item->volumeUsd24Hr / 1000000000, 2) . ' ' .  $lang->b}}
                                                    @endif
                                                @else
                                                    0 
                                                @endif
                                                {{-- <span>$ 39.0 WBTC</span> --}}
                                            </p>
                                        </td>
                                        {{-- <td>
                                            ₾ {{isset($item['volume_1mth_usd']) ? round(($currs[0]->rate * $item['volume_1mth_usd']), 2) : '0'}}
                                        </td> --}}
                                        <td>
                                            <p class="daily-view">
                                                $ 
                                                @if (isset($item->marketCapUsd))
                                                    @if ($item->marketCapUsd < 1000000)
                                                    @elseif ($item->marketCapUsd < 1000000000)
                                                        {{number_format($item->marketCapUsd / 1000000, 2) . ' ' . $lang->m}}
                                                    @else
                                                        {{number_format($item->marketCapUsd / 1000000000, 2) . ' ' . $lang->b}}
                                                    @endif
                                                @else
                                                    0 
                                                @endif
                                            </p>
                                            {{-- <div>
                                                <img src="{{url('')}}/assets/images/Vector 2.svg" alt="Exchange Rate Increased" />
                                            </div> --}}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <button class="show-more">
                        <img src="{{url('')}}/assets/images/Down_Arrow_3.svg" alt="down" />
                    </button>
                    <p class="text-accent2" style="margin-top: 25px;">{{$lang->lastUpdated}}:&nbsp;{{\Carbon\Carbon::parse(date('M d, Y'))->formatLocalized('%b %d, %Y')}}</p>
                </div>
            </div> 
        </section>
    </main>

    @push('popup')
        <div class="bg-overlay" onclick="bgoverlay_click()">
            <div class="popup-currency-selectors" style="display: none;">
                <div class="popup-header">
                    <h2>{{$lang->chooseCurrency}}</h2>
                    <img src="{{url('')}}/assets/images/close.svg" alt="Close Popup" onclick="closepopup('.popup-currency-selectors')">
                </div>
                <div class="currencies-container" id="currencies-container_box">
                    @foreach($currs as $curr)
                      
                            <label for="checkboxInput{{$curr->code}}">
                                <div class="currency-item" id="checkboxHover{{$curr->code}}">
                                    <input {{(in_array($curr->code, $defaults)) ? 'checked':''}} id="checkboxInput{{$curr->code}}" class="checkbox" name="currencyCheckBox" type="checkbox" curr-code='{{$curr->code}}'  curr-rate='{{$curr->rate}}'  onChange="myFunction('#checkboxHover{{$curr->code}}', '#hoverH{{$curr->code}}', '#hoverp{{$curr->code}}', this)">
                                    <div class="currency-main-container">
                                        <div class="flagname">
                                            <img src="{{url('')}}/assets/images/flags/{{strtolower($curr->code)}}.svg" alt="{{$curr->code}}">
                                            <h4 id="hoverH{{$curr->code}}">{{$curr->code}}</h4>
                                        </div>
                                        <p id="hoverp{{$curr->code}}">1 {{$curr->code}} = {{$curr->rate}} GEL</p>
                                    </div>
                                </div>
                            </label>
                        
                    @endforeach
                </div>
                <div class="popup-footer">
                    <button class="new-button-currency-popup" onclick="closepopup('.popup-currency-selectors')">{{$lang->save}}</button>
                </div>
            </div>
            <!-- burger bar menu -->
            @include('nn_site.partials.burger')
            <!-- share page pop up -->
            <div class="share-popup">
                <div class="share-popup-header">
                    <h3>{{$lang->share}}</h3>
                    <div class="closing-share-popup"onclick="closepopup('.share-popup')" ><img src="{{url('')}}/assets/images/closing-X.svg" alt="Close"></div>
                </div>
                <div class="share-popup-elemenets-parent">
                    <div class="share-popup-elemenet">
                        <div class="share-popup-inner-element">
                            <a class="link-share-button" data-type="whatsapp" href="whatsapp://send?text={{url($_SERVER['REQUEST_URI'])}}" data-action="share/whatsapp/share">
                                <img src="{{url('')}}/assets/images/whatsapp.svg" alt="WhatsApp">
                                <p>WhatsApp</p>
                            </a>
                        </div>
                    </div>
                    <div class="share-popup-elemenet">
                        <div class="share-popup-inner-element">
                            <a data-type="viber" class="link-share-button" href="viber://forward?text={{url($_SERVER['REQUEST_URI'])}}">
                                <img src="{{url('')}}/assets/images/viber.svg" alt="Viber">
                                <p>Viber</p>
                            </a>
                        </div>
                    </div>
                    <div class="share-popup-elemenet">
                        <div class="share-popup-inner-element">
                            <a data-type="messanger" class="link-share-button" href="fb-messenger://share/?link={{url($_SERVER['REQUEST_URI'])}}">
                                <img src="{{url('')}}/assets/images/messenger.svg" alt="Messenger">
                                <p>Messenger</p>
                            </a>
                        </div>
                    
                    </div>
                    <div class="share-popup-elemenet">
                        <div class="share-popup-inner-element">
                            <a href="#" class='copy-url-button'> 
                                <img src="{{url('')}}/assets/images/copy-link.svg" alt="Copy Link">
                                <p>{{$lang->copyLink}}</p>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endpush

@endsection

 