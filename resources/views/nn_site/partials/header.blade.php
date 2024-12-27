<header class="header">
    <!-- <img class="header-bgimg-absolute" src="/assets/images/world-map.svg" alt="World map"> -->

    <div class="container">
        <div class="header__top flex space-between align-center">
            <div class="logo">
                <a href="{{url(getCurrentLocale() == 'ka' ? '' : getCurrentLocale())}}" class="fz-800">
                    <img src="/assets/images/money bag.svg" alt="Myvaluta Logo"> Myvaluta
                </a>
            </div>
            <ul class="header-navigation">
                <li><a href="{{url((getCurrentLocale() == 'ka' ? '' : getCurrentLocale() . '/') . 'erovnuli-bankis-kursi')}}" class="header-navvigation-scroll-btn">{{$lang->officialExchangeRate}}</a></li>
                <li><a href="{{isset($isBankCurrencies) ? (url((getCurrentLocale() == 'ka' ? '' : getCurrentLocale() . '/'))) : ''}}#exchange-rate-in-banks" class="header-navvigation-scroll-btn">{{$lang->exchangeRateInBanksAndKiosks}}</a></li>
                <li><a href="{{isset($isBankCurrencies) ? (url((getCurrentLocale() == 'ka' ? '' : getCurrentLocale() . '/'))) : ''}}#crypto-exchange-rate" class="header-navvigation-scroll-btn">{{$lang->cryptoExchangeRate}}</a></li>
                @foreach ($primaryMenu as $item)
                    <li><a href="{{url((getCurrentLocale() == 'ka' ? '' : getCurrentLocale() . '/') . $item->slug)}}">{{$item->name}}</a></li>
                @endforeach
            </ul>
            <ul class="languages">
                <li>
                    @if (getCurrentLocale() == 'ka')
                        <a href="{{LaravelLocalization::getLocalizedURL('en')}}">
                            <img id="en" src="/assets/images/flags/uk.svg" alt="English">
                        </a>
                    @elseif (getCurrentLocale() == 'en')
                        <a href="{{LaravelLocalization::getNonLocalizedURL('')}}">
                            <img id="ge" src="/assets/images/flags/geo.svg" alt="Georgian">
                        </a>
                    @endif
                </li>
            </ul>
            <img id="burgerbar" onclick="openpopup('.burger-bar-menu-main')" class="burger-bar" src="/assets/images/burger-bar.svg" alt="burger-bar">
        </div>
    </div>
    <div class="heading-div">
        <h1>{{isset ($isBankCurrencies) ? $lang->nationalBankCurrencies : $lang->currencyConvertor}}</h1>
        <p>{{$lang->checkLiveCurrency}}</p>
    </div>
</header>