<?php

namespace App\Http\services;

use App\Models\nn_catalog;
use App\Models\nn_category;
use App\Models\nn_menu_item;
use App\Models\nn_collection;

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
            $this->data["siteTitle"] = $menuItem->lang->name;
            $this->template = 'products';
        }
        if($menuItem->type == 'collection'){
            $collection = nn_collection::find($menuItem->collection->id);
            $this->data["siteTitle"] = $menuItem->lang->name;

            $this->getCollection($menuItem->collection->id, $collection->type);
            if($collection->type === 'products'){
                $this->template = 'products';
            }else{
                $this->template = 'collection';
            }


        }
        if($menuItem->type == 'text'){
            $this->getClients();
            $this->template = 'text';
            $this->data["siteTitle"] = $menuItem->lang->name;
            $this->data["metaData"]['title'] = $menuItem->lang->name;
            $this->data["metaData"]['description'] = $menuItem->lang->description;
            $this->data["metaData"]['image'] = fullUrl($menuItem->lang->imgurl);
        }
        if($menuItem->type == 'contact'){
            $this->data["siteTitle"] = $menuItem->lang->name;
            $this->template = 'contact';
        }

        $this->data['category'] = $menuItem;
        return $this->data;

    }

    public function getCategory($id)
    {
        $categoryList = nn_catalog::where('category_id', $id)->where('show', 1)->orderByDesc('position')->get();
        $this->data['categoryList'] = $categoryList;
    }

    public function getCollection($id, $collectionType)
    {

        $collectionList = nn_catalog::where('collection_id', $id)->where('show', 1)->orderByDesc('position')->get();
        if($collectionType === 'products'){
            $this->data['categoryList'] = $collectionList;

        }else{
            $this->data['collectionList'] = $collectionList;
        }

    }

    public function getDetail()
    {
        $catalog = nn_catalog::where('slug', $this->slug)->first();
        $this->template = 'text';
        $this->data["siteTitle"] = $catalog->lang->name;
        $this->data["metaData"]['title'] = $catalog->lang->name;
        $this->data["metaData"]['description'] = $catalog->lang->description;
        $this->data["metaData"]['image'] = fullUrl($catalog->lang->imgurl);
        $relatedItems = [];
        $menuItem = null;
        $this->template = 'detail';

        if($catalog->category_id != '' && $catalog->category_id != 0) {

            $category = nn_category::where('id', $catalog->category_id)->first();
            $menuItem= nn_menu_item::where('category_id', $category->id)->first();
            $relatedItems = nn_catalog
            ::where('category_id', $category->id)
            ->where('id', '!=',  $catalog->id)
            ->where('show', 1)
            ->orderByRaw('RAND()')
            ->get()
            ->take(3);
            $this->data['relatedItems'] = $relatedItems;

        }else{
            $menuItem= nn_menu_item::where('collection_id',  $catalog->collection_id)->first();
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
        $this->data["clients"] = nn_catalog::where('collection_id', 14)->where('show', 1)->orderByDesc('position')->get();
    }



}
