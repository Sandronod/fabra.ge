<?php
use App\Models\nn_catalog;
use App\Models\nn_menu;

/* full url */

function fullUrl($passedUrl = null)
{

    if (!$passedUrl)
    {

        return url(getCurrentLocale());

    }
    else
    {
        if(getCurrentLocale() == 'ka') {
            return url($passedUrl);
        }
        return url(getCurrentLocale() . '/' . $passedUrl);

    }

}

/* laravelLocalization custom functions */

function getCurrentLocale()

{

    return LaravelLocalization::getCurrentLocale();

}

function getCurrentLocaleName()

{

    return LaravelLocalization::getCurrentLocaleName();

}


function getCurrentLocaleNative()

{

    return LaravelLocalization::getCurrentLocaleNative();

}

function getSupportedLocalesCodes()

{

    $localeCodes = [];

    foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
    {

        $localeCodes[] = $localeCode;

    }

    return $localeCodes;

}

function getSupportedLocales()

{

    $locales = [];

    $i = 0;

    foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
    {

        $locales[$i]['localeCode'] = $localeCode;

        $locales[$i]['properties'] = $properties;

        $i++;

    }

    return $locales;

}

function getSupportedLocalesExceptSelected()

{

    $locales = [];

    $i = 0;

    foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
    {

        if ($localeCode !== getCurrentLocale())
        {

            $locales[$i]['localeCode'] = $localeCode;

            $locales[$i]['properties'] = $properties;

            $i++;

        }

    }

    return $locales;

}

/* build site menu */

//function buildMenu($menu, $parent_id = 0, $child = false)
//{
//    $urlLastSegment = collect(request()->segments())->last();
//    static $firstCall = 1;
//    $result = null;
//
//    if($firstCall) {
//        if(!$urlLastSegment || $urlLastSegment == getCurrentLocale()) {
//            $result .= '<li class="active"><a href="' . url(getCurrentLocale()) . '">' . trans('general.sitePrimaryMenuHome') . '</a></li>';
//        } else {
//            $result .= '<li><a href="' . url(getCurrentLocale()) . '">' . trans('general.sitePrimaryMenuHome') . '</a></li>';
//        }
//        $firstCall = 0;
//    }
//
//    foreach($menu as $item){
//        if($item->parent_id == $parent_id) {
//            if($item->type == 'link') {
//                $link = $item->link != '' ? $item->link : 'javascript: void(0);';
//            } else {
//                $link = url(getCurrentLocale() . '/' . $item->slug);
//            }
//
//            if(Request::segment(1) == getCurrentLocale() && Request::segment(2) == $item->slug) {
//                $result .= '<li class="active"><a href="' . $link . '">' . $item->name . '</a>' . buildMenu($menu, $item->id, true) . '</li>';
//            } else if(Request::segment(1) == $item->slug) {
//                $result .= '<li class="active"><a href="' . $link . '">' . $item->name . '</a>' . buildMenu($menu, $item->id, true) . '</li>';
//            } else {
//                $result .= '<li><a href="' . $link . '">' . $item->name . '</a>' . buildMenu($menu, $item->id, true) . '</li>';
//            }
//        }
//    }
//
//    if(! $child) {
//        return $result ? '<ul>' . $result . '</ul>' : null;
//    } else {
//        return $result ? '<ul>' . $result . '</ul>' : null;
//    }
//}
function menu()
{
    $menu = nn_menu::where('primary', 1)->first();

//    $sitemenu = '';
//    $i = 0;
//    foreach ($menu as $m)
//    {
//
//        if ($m->parent_id == 0)
//        {
//            $selected = "";
//            if (request()->route('slug') == $m->slug)
//            {
//                $selected = 'class="selected"';
//            }
//            $sitemenu .= '
//             <li ><a href="' . fullUrl($m->slug) . '"  ' . $selected . '>' . $m->name . '</a></li>';
//            $i++;
//        }
//    }
    // '.$this->menuItem($menu,$m->slug,$actual_link,$m->id).'
    return $menu;
}

function menuItem($menu, $slug, $actual_link, $id)
{

    $menuI = '';

    foreach ($menu as $mm)
    {
        if ($mm->parent_id == $id)
        {
            $slug = "" . $mm->slug;

            if ($mm->type == "text")
            {
                $slug = "page/" . $mm->slug;

            }
            if ($mm->type == "collection")
            {
                $slug = "category/" . $mm->id . "/" . $mm->parent_id . "/" . $mm->collection_id;

            }

            $menuI .= ' <li class="menu__item-children-item">
                  <a href="' . $actual_link . "/" . $slug . '" class="menu__item-children-item-link">' . $mm->name . '</a>
                  ' . $this->menuItem($menu, $mm->slug, $actual_link, $mm->id) . '
                </li>';
        }
    }
    if ($menuI == '') return;
    $menuitems = '
              <ul class="menu__item-children">
              ' . $menuI . '
                  </ul>
                 ';
    return $menuitems;

}

/* build site menu (dl-menu) */

function buildDlMenu($menu, $parent_id = 0, $child = false)

{

    $urlLastSegment = collect(request()->segments())
        ->last();

    static $firstCall = 1;

    $result = null;

    if ($firstCall)
    {

        $result .= '<li><a href="' . url(getCurrentLocale()) . '">' . trans('general.sitePrimaryMenuHome') . '</a></li>';

        $firstCall = 0;

    }

    foreach ($menu as $item)
    {

        if ($item->parent_id == $parent_id)
        {

            $link = $item->type == 'link' ? $item->link : url(getCurrentLocale() . '/' . $item->slug);

            $result .= '<li><a href="' . $link . '">' . $item->name . '</a>' . buildDlMenu($menu, $item->id, true) . '</li>';

        }

    }

    if (!$child)
    {

        return $result ? '<ul class="dl-menu">' . $result . '</ul>' : null;

    }
    else
    {

        return $result ? '<ul class="dl-submenu"><li class="dl-back"><a href="#">' . trans('general.sitePrimaryDlMenuBack') . '</a></li>' . $result . '</ul>' : null;

    }

}

/* glide */

function glideImage($imgPath, $settings)

{

    $parsedUrl = parse_url($imgPath);

    $parsedUrl['path'] = '/img' . $parsedUrl['path'];

    $url = (url($parsedUrl['path']) . '?' . $settings);

    return $url;

}

function htmlUlLiToArray($ul)
{
    if (is_string($ul))
    {
        // encode ampersand appropiately to avoid parsing warnings
        $ul = preg_replace('/&(?!#?[a-z0-9]+;)/', '&amp;', $ul);
        if (!$ul = simplexml_load_string($ul))
        {
            trigger_error("Syntax error in UL/LI structure");
            return false;
        }
        return htmlUlLiToArray($ul);
    }
    else if (is_object($ul))
    {
        $output = array();
        foreach ($ul->li as $li)
        {
            $output[] = (isset($li->ul)) ? htmlUlLiToArray($li->ul) : (string)$li;
        }
        return $output;
    }
    else return false;
}

function reverseArrayKeys($arr)
{
    $a = $arr;

    $k = array_keys($a);

    $v = array_values($a);

    $rv = array_reverse($v);

    $b = array_combine($k, $rv);

    return $b;
}
