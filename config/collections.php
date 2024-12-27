<?php

return [

    'collection_types' =>
    [
        'pricing' => 'pricing',
        'why choose us' => 'why',
        'how it works' => 'howitworks',
        'gallery' => 'gallery',
        'faq '=> 'faq',
        'tools' => 'tools',
        'testimonials' => 'testimonials',
    ],

    'tools' => ['name', 'imgurl', 'description', 'category'],
    'why' => ['name', 'imgurl', 'description'],
    'howitworks' => ['name', 'imgurl', 'description'],
    'faq' => ['name', 'description'],
    'testimonials' => ['name', 'imgurl', 'stars', 'description'],
    'pricing' => ['name', 'price', 'sub_title', 'info_label', 'services_list', 'description', 'info_list'],

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