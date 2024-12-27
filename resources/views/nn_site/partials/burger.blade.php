<div class="burger-bar-menu-main">
    <div class="burger-bar-menu-parent">
        <div class="burger-bar-menu-header">
            <div class="burger-bar-menu-header-top">
                <a href="/" class="fz-800 burger-bar-menu-header-a">
                    <img src="{{url('')}}/assets/images/money_bag1.svg" alt="Myvaluta Logo" /> Myvaluta
                </a>
                <div class="mobile-burgerbar-header-right-side">
                    <ul class="languages-mobile">
                        {{-- <li>
                            @if (getCurrentLocale() == 'ka')
                                <a href="{{LaravelLocalization::getLocalizedURL('en')}}">
                                    <img id="en" src="{{url('')}}/assets/images/flags/uk.svg" alt="English">
                                </a>
                            @elseif (getCurrentLocale() == 'en')
                                <a href="{{LaravelLocalization::getLocalizedURL('ka')}}">
                                    <img id="ge" src="{{url('')}}/assets/images/flags/geo.svg" alt="Georgian">
                                </a>
                            @endif
                        </li> --}}
                    </ul>
                    <a href="#"><img onclick="closepopup('.burger-bar-menu-main')" src="{{url('')}}/assets/images/close1.svg" alt="close"></a>
                </div>
            </div>
            <!-- <img src="{{url('')}}/assets/images/Line 37.svg" alt="border"> -->
        </div>

        <a href="{{url((getCurrentLocale() == 'ka' ? '' : getCurrentLocale() . '/') . 'erovnuli-bankis-kursi')}}" onclick="closepopup('.share-popup')">{{$lang->officialExchangeRate}}</a>
        <a href="{{isset($notHomePage) ? fullUrl('') : ''}}#exchange-rate-in-banks" onclick="closepopup('.share-popup')">{{$lang->exchangeRateInBanksAndKiosks}}</a>
        <a href="{{isset($notHomePage) ? fullUrl('') : ''}}#crypto-exchange-rate" onclick="closepopup('.share-popup')">{{$lang->cryptoExchangeRate}}</a>
        @foreach ($footerMenu as $item)
            <a href="{{url((getCurrentLocale() == 'ka' ? '' : getCurrentLocale() . '/') . $item->slug)}}">{{$item->name}}</a>
        @endforeach
        @foreach ($primaryMenu as $item)
            <a href="{{url((getCurrentLocale() == 'ka' ? '' : getCurrentLocale() . '/') . $item->slug)}}">{{$item->name}}</a>
        @endforeach
    </div>
</div>