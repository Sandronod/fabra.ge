<?php



namespace App\Http\Controllers\nn_cms;



use DB;

use Illuminate\Routing\Router;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Http\Controllers\Controller;

use App\Models\nn_menu;

use App\Models\nn_menu_item;

use App\Models\nn_menuitem_order;

use App\Models\nn_menu_item_lang;

use App\Models\nn_file;

use LaravelLocalization;



class ManagerMenuClass extends ManagerSiteController

{

	public $buttons = '';



    // ამ კოდით ხდება მთლიანად მენიუს ამოღება და მთავარი მენიუს აითემების ამოღება //

	public function getallitems($menu_id)

    {      

        $menuitems = DB::table('nn_menu_item')->where('nn_menu_id', '=', $menu_id)->orderBy('position', 'ASC')->get();

        $it = '';

        foreach($menuitems as $items){



            if($items->parent_id == 0){

                $subs=$this->getItemsN($menuitems, $items->id, 1);

                $del = 1; 

                if($subs == '') $del = 0; 

                $it .= $this->getli($items->id) . $this->getitem($items->id, $menuitems, $del, 1)

                .$subs   

                .'</li>';  



            }

      

        }



        return '' . $it . '';

    }



    // ამ კოდით ხდება ყველა ქვე მენიუს ამოღება //

    public function getItemsN($items, $parent_id, $level)

    {

        $it = '';

        $i = 0;

        $level++;

        foreach($items as $item){ 



            if ($item->parent_id == $parent_id) {

                $i++;

                $subs = $this->getItemsN($items, $item->id, $level);

                $del = 1;

                if($subs == '') $del = 0; 

                $it .= $this->getli($item->id) . $this->getitem($item->id, $items, $del, $level)

                .$subs.'

                </li>';

            }       



        }

        if($i == 0) return '';

        $it = '<ol class="dd-list">'.$it.'</ol>';



        return $it;

    }



    // menu items update

	public function saveitemorders(Request $request)

    {

        $this->delItems($request);

        $ids = $request->menuorder;

        $arr = json_decode($ids, true);

        $i = 0;

        foreach($arr as $ar){



            $i++;

            DB::table('nn_menu_item')

            ->where('id', $ar["id"])

            ->update(['parent_id' => 0, 'position' => $i]);

            if(isset($ar["children"])){

                $this->saveForSubItems($ar["children"], $ar["id"]);

            }



        }



        return 'ok';

    }

    

    function delItems($request)

    {

        $delids = $request->deletedIds;

        if($delids != ""){

            $delid = explode(',', $delids);

            for($i = 0; $i < sizeof($delid); $i++){

                if($delid[$i] != ""){

                    nn_file::deleteFromCM("items", $delid[$i]); // Delete attached files

                    DB::table('nn_menu_item')->where('id', '=', $delid[$i])->delete();

                    DB::table('nn_menu_item_lang')->where('nn_menu_item_id', '=', $delid[$i])->delete();

                }

            }

        }

    }



    public function saveForSubItems($ids, $parent_id)

    {        

        $i = 0;

        foreach($ids as $ar){



            $i++;

            DB::table('nn_menu_item')

            ->where('id', $ar["id"])

            ->update(['parent_id' => $parent_id, 'position' => $i]);

            if(isset($ar["children"])){

                $this->saveForSubItems($ar["children"], $ar["id"]);

            }



        }



        return 'ok';

    }

    // end of menu items update

   

    function getitem($id, $arr, $del, $itemLevel)

    {

       foreach($arr as $ar){

            if($id == $ar->id){

                return $this->getdiv($ar->id, $del, $ar->collection_id, $itemLevel);

            }

        }

    }



    public function getli($id)

    {

        return '<li class="dd-item dd3-item" id="li' . $id . '" data-id="' . $id . '">';

    }



    public function getdiv($id, $del, $collection_id, $itemLevel)

    {

        $langg = getCurrentLocale();

        $langname = $ln = '';



        if($langg != ''){

            $langname = $this->getlangname($id, $langg);

        }



        $delcode = '';



        if($del != 1){

            $delcode = $this->delcode($id);

        }



        $edit = $this->editcode($id);

        $add = '';

        if($itemLevel < 4) $add = $this->addcode($id);


        $collection = ($collection_id != "" && $collection_id != 0) ? ' | ' . trans('general.collection') . ': <a href = "/' . $langg . '/manager/collection/' . $collection_id . '/edit" >' . $this->getCollection($collection_id, $langg) . '</a>' : '';


        return '<div class="dd-handle dd3-handle list-group-item">Drag</div><div class="dd3-content">' . $langname . ' ' . $collection . '<div class="nst-tools">' . $delcode . $edit . $add . ' </div></div>';

    }



    public function delcode($id)

    {

        return '<a href="#" onclick="RemoveItem(this, ' . $id . ')" class="t-item del"><i class="fa fa-trash"></i></a>';

    }



    public function editcode($id)

    {

        return '<a href="items/' . $id . '/edit" class="t-item edit"><i class="fa fa-edit"></i></a>';

    }



    public function addcode($id)

    {

        return '<a href="items/create?id=' . $id . '" class="t-item add"><i class="fa fa-plus"></i></a>';

    }



    public function getCollection($id, $langg)

    {

         $selc = DB::table('nn_collection_lang')->where('lang', '=', $langg)->where('collection_id', '=', $id)->first();

        return $selc ? $selc->name : '';
    }



    public function getlangname($id, $langg)

    {

        $selc = DB::table('nn_menu_item_lang')->where('lang', '=', $langg)->where('nn_menu_item_id', '=', $id)->first();



        return $selc->name;



        if(isset($c->name)){

            return $c->name;

        }



        return '';

    }

}