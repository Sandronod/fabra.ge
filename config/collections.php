<?php

return [

    'collection_types' =>
    [
        'products' => 'products',
        'collections' => 'collections',
        'homeCategory' => 'homeCategory',
        'FAQ' => 'FAQ',
        'bullets' => 'bullets',

//        'how it works' => 'howitworks',
//        'gallery' => 'gallery',
//        'faq '=> 'faq',
//        'tools' => 'tools',
//        'testimonials' => 'testimonials',
    ],

    'products' => ['name', 'imgurl', 'body', 'description', 'category', 'embed'],
    'collections' => ['name', 'imgurl', 'embed'],
    'homeCategory' => ['category'],
    'FAQ' => ['name','description'],
    'bullets' => ['name','description', 'embed'],
//    'aboutus' => ['name', 'imgurl', 'description', 'body','embed','videoUrl'],
//    'howitworks' => ['name', 'imgurl', 'description'],
//    'faq' => ['name', 'description'],
//    'testimonials' => ['name', 'imgurl', 'stars', 'description'],
//    'pricing' => ['name', 'price', 'sub_title', 'info_label', 'services_list', 'description', 'info_list'],

    'templates' =>
    [
        'name',
        'imgurl',
        'body',
        'description',
        'sDate',
        'category',
        'keywords',
        'videoUrl',
        'embed',
    ]

];
