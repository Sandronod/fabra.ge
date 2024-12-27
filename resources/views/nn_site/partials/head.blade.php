<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

@if (getCurrentLocale() == 'ka')
    @include ('nn_site.partials.head_tags')
@elseif (getCurrentLocale() == 'en')
    @include ('nn_site.partials.head_tags_en')
@endif

@if (isset($isHomePage) || isset($isBankCurrencies))
    <meta name="format-detection" content="telephone=no">
    <style>
        a[x-apple-data-detectors], a[href^=tel] {
            color: #263e33 !important;
            text-decoration: none !important;
        }
    </style>
@endif

@if (isset ($isTextPage) || isset ($isContactPage))
    <meta name="description" content="{{$item->description}}">
@else
    @if (getCurrentLocale() == 'ka')
        <meta name="description" content="{{isset ($isBankCurrencies) ? $siteSettings->bank_currencies_description_ka : $siteSettings->description_ka}}">
    @elseif (getCurrentLocale() == 'en')
        <meta name="description" content="{{isset ($isBankCurrencies) ? $siteSettings->bank_currencies_description_en : $siteSettings->description_en}}">
    @endif
@endif

<title>
    @if (isset ($isTextPage) || isset ($isContactPage))
        {{$item->name}} - Myvaluta.ge
    @else
        @if (getCurrentLocale() == 'ka')
            {{isset ($isBankCurrencies) ? $siteSettings->bank_currencies_title_ka : $siteSettings->title_ka}}
        @elseif (getCurrentLocale() == 'en')
            {{isset ($isBankCurrencies) ? $siteSettings->bank_currencies_title_en : $siteSettings->title_en}}
        @endif
    @endif
</title>

<!-- font -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;600&display=swap" rel="stylesheet">

<link rel="icon" type="image/png" sizes="32x32" href="{{url('assets/images/dark-colored-logo.svg')}}">

<!-- css -->
<link rel="stylesheet" href="{{url('assets/css/style.css?v=12.3')}}">

@if (getCurrentLocale() == 'ka')
    <link rel="stylesheet" href="{{url('fonts/bpg-arial/css/bpg-arial.min.css')}}">
    <link rel="stylesheet" href="{{url('assets/css/style-ka.css?v=10.6')}}">
@endif

@stack('css')

{!!$siteSettings->tags_head!!}