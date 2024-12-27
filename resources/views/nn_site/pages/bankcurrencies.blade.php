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
                    <div class="exchange-table active">
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
                                                    <img src="{{url('')}}/assets/images/flags/{{strtolower($curr->code)}}.svg" width="21" height="21" alt="" />
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
                                            <img id="line-image-{{$curr->code}}" src="{{url('')}}/assets/images/ezgif.com-gif-maker.gif" alt="load" />
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <button class="show-more">
                        <img src="{{url('')}}/assets/images/Down_Arrow_3.svg" alt="Down" />
                    </button>
                    <p class="text-accent2" style="margin-top: 25px;">
                        {{$lang->lastUpdated}}:&nbsp;{{\Carbon\Carbon::parse(date('M d, Y'))->formatLocalized('%b %d, %Y')}}
                    </p>
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

 