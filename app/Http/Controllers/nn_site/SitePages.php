<?php

namespace App\Http\Controllers\nn_site;

use App\Http\services\PagesService;

class SitePages extends SiteController
{

  public function index($slug, $category)
  {
      $page = new PagesService($category);
      $data = $page->getPage();
    return view('nn_site.pages.'.$page->template, $data);
  }
    public function single($slug)
    {
        $page = new PagesService($slug);
        $data = $page->getDetail();
        return view('nn_site.pages.'.$page->template, $data);
    }

    public function bySlug($slug){
        $page = new PagesService($slug);
        $data = $page->getPage();
        return view('nn_site.pages.'.$page->template, $data);

    }




}
