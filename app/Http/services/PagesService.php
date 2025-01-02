<?php

namespace App\Http\services;

use App\Models\nn_catalog;
use App\Models\nn_category;
use App\Models\nn_menu_item;

class PagesService
{
    public $slug;
    public $data = [];
    public $template= '';
    public function __construct($slug)
    {
        $this->slug = $slug;
    }

    public function getPage()
    {
        $menuItem = nn_menu_item::where('slug', $this->slug)->first();
        if($menuItem->type == 'category'){
            $this->getCategory($menuItem->category->id);
            $this->template = 'products';
        }
        if($menuItem->type == 'collection'){
            $this->getCollection($menuItem->collection->id);
            $this->template = 'collection';
        }
        if($menuItem->type == 'text'){
            $this->getClients();
            $this->template = 'text';
        }
        if($menuItem->type == 'contact'){
            $this->template = 'contact';
        }

        $this->data['category'] = $menuItem;
        return $this->data;

    }
    public function getCategory($id)
    {
        $categoryList = nn_catalog::where('category_id', $id)->get();
        $this->data['categoryList'] = $categoryList;
    }
    public function getCollection($id)
    {
        $collectionList = nn_catalog::where('collection_id', $id)->get();
        $this->data['collectionList'] = $collectionList;
    }

    public function getDetail()
    {
        $catalog = nn_catalog::where('slug', $this->slug)->first();
        $relatedItems = [];
        $menuItem = null;
        $this->template = 'detail';
        if($catalog->category_id != ''){
            $category = nn_category::where('id', $catalog->category_id)->first();
            $menuItem= nn_menu_item::where('category_id', $category->id)->first();
            $relatedItems = nn_catalog::where('category_id', $category->id)
                ->where('id', '!=',  $catalog->id)->orderByRaw('RAND()')->get()->take(3);
            $this->data['relatedItems'] = $relatedItems;

        }
        if($catalog->collection_id != '' && $catalog->category_id == ''){

            $collection = nn_category::where('id', $catalog->collection_id)->first();
            $menuItem = nn_menu_item::where('collection_id', $collection->id)->first();
        }

        $this->data['menuItem'] = $menuItem;

        $this->data['detail'] = $catalog;

        return $this->data;
    }
    public function getClients(){
        $this->data["clients"] = nn_catalog::where('collection_id', 14)->get();
    }



}
