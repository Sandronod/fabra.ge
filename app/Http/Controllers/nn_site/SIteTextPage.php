<?php

namespace App\Http\Controllers\nn_site;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\nn_catalog;

class SitePdfToolsPage extends SiteController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $data['items'] = nn_catalog::join('nn_catalog_lang', 'nn_catalog_lang.catalog_id', '=', 'nn_catalog.id')
            ->where([
                ['nn_catalog.collection_id', 4],
                ['nn_catalog.show', 1],
                ['nn_catalog_lang.lang', getCurrentLocale()]
            ])
            ->select('nn_catalog.slug', 'nn_catalog_lang.imgurl', 'nn_catalog_lang.name', 'nn_catalog_lang.description')
            ->orderBy('nn_catalog.position', 'desc')
            ->orderBy('nn_catalog.created_at', 'desc')
            ->get();

        return view('nn_site.pages.pdf_tools', $data);
    }
}