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
    fabra.ge
{{--    @if (isset ($isTextPage) || isset ($isContactPage))--}}
{{--        {{$item->name}} - Myvaluta.ge--}}
{{--    @else--}}
{{--        @if (getCurrentLocale() == 'ka')--}}
{{--            {{isset ($isBankCurrencies) ? $siteSettings->bank_currencies_title_ka : $siteSettings->title_ka}}--}}
{{--        @elseif (getCurrentLocale() == 'en')--}}
{{--            {{isset ($isBankCurrencies) ? $siteSettings->bank_currencies_title_en : $siteSettings->title_en}}--}}
{{--        @endif--}}
{{--    @endif--}}
</title>

<!-- favicon -->
<link href="/assets/images/favicon.ico" rel="shortcut icon">
<!-- Bootstrap -->
<link href="/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<link href="/assets/css/tiny-slider.css" rel="stylesheet" type="text/css" />
<link href="/assets/css/materialdesignicons.min.css" rel="stylesheet" type="text/css" />
<link href="https://unicons.iconscout.com/release/v3.0.6/css/line.css" rel="stylesheet" />


<link href="/assets/css/tobii.min.css" rel="stylesheet" type="text/css" />
<link href="/assets/css/materialdesignicons.min.css" rel="stylesheet" type="text/css" />

<!-- Main Css -->
<link href="/assets/css/style.min.css" rel="stylesheet" type="text/css" id="theme-opt" />


@stack('css')

{!!$siteSettings->tags_head!!}
