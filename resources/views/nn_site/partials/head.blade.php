<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
@if (getCurrentLocale() == 'ka')
    @include ('nn_site.partials.head_tags')
@elseif (getCurrentLocale() == 'en')
    @include ('nn_site.partials.head_tags_en')
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
    @if (getCurrentLocale() == 'ka')
        {{$siteSettings->title_ka}}
    @elseif (getCurrentLocale() == 'en')
        {{$siteSettings->title_en}}
    @endif
    &nbsp;-&nbsp;
    @if (isset($siteTitle))
        {{$siteTitle}}
    @else
        {{$lang->main}}
    @endif
</title>

<!-- favicon -->
<link href="/assets/images/favicon.png" rel="shortcut icon">
<!-- Bootstrap -->
<link href="/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<link href="/assets/css/tiny-slider.css" rel="stylesheet" type="text/css" />
<link href="/assets/css/materialdesignicons.min.css" rel="stylesheet" type="text/css" />
<link href="https://unicons.iconscout.com/release/v3.0.6/css/line.css" rel="stylesheet" />

@stack('css')
<link href="/assets/css/tobii.min.css" rel="stylesheet" type="text/css" />
<link href="/assets/css/materialdesignicons.min.css" rel="stylesheet" type="text/css" />

<!-- Main Css -->
<link href="/assets/css/style.min.css" rel="stylesheet" type="text/css" id="theme-opt" />




{!!$siteSettings->tags_head!!}

<!-- custom css -->

<link href="/assets/css/custom.css" rel="stylesheet" type="text/css"/>

@if (getCurrentLocale() == 'ka')
    <link rel="stylesheet" href="//cdn.web-fonts.ge/fonts/bpg-banner/css/bpg-banner.min.css">
    <link href="/assets/css/geo-fonts.css" rel="stylesheet" type="text/css"/>
@endif
