<?php







namespace App\Models;







use Illuminate\Database\Eloquent\Model;



use App\Http\Controllers\Controller;





use App\Models\nn_catalog_lang;



use DB;



use LaravelLocalization;







class nn_catalog extends Model



{



    protected $table = 'nn_catalog';







    protected $fillable = [



        'slug',

		'position',

		'stars',

		'price',



        'collection_id',
		'views',
        'sDate',



        'category_id',

		'aqcia_id',



        'thematic_category_id',


        'color_ids'



    ];







    //_-_ CMS SIDE



    /*



    	Get function



    */

    public function lang()

    {

        return $this->hasOne('App\Models\nn_catalog_lang', 'catalog_id', 'id')
            ->where('lang', getCurrentLocale());

    }

    public function category()

    {

        return $this->hasOne('App\Models\nn_category', 'category_id', 'id')
            ->where('lang', getCurrentLocale());

    }
    public function images()

    {

        return $this->hasMany('App\Models\nn_image', 'route_id', 'id')
            ->where('route_name', 'catalog')->orderBy('position', 'asc');

    }
    public function files()

    {

        return $this->hasMany('App\Models\nn_file', 'route_id', 'id')
            ->where('route_name', 'catalog');

    }
    public static function getCatalog($id)



    {



    	$catalog = DB::table('nn_catalog')



                            ->where(['nn_catalog_lang.lang' => getCurrentLocale(), 'collection_id' => $id])



                            ->join('nn_catalog_lang', 'nn_catalog.id', '=', 'nn_catalog_lang.catalog_id')



                            ->select('nn_catalog.id',  'nn_catalog.category_id', 'nn_catalog.aqcia_id', 'nn_catalog_lang.name', 'nn_catalog_lang.body', 'nn_catalog_lang.description', 'nn_catalog_lang.imgurl')



                            ->orderBy('nn_catalog.views', 'desc')



                            ->paginate(20);







        return $catalog;



    }

    public static function getCatalogForEdit()



    {



    	$catalog = DB::table('nn_catalog')



                            ->where(['nn_catalog_lang.lang' => getCurrentLocale(), 'collection_id' => 5])



                            ->join('nn_catalog_lang', 'nn_catalog.id', '=', 'nn_catalog_lang.catalog_id')



                            ->select('nn_catalog.id', 'nn.catalog.bible', 'nn_catalog.category_id', 'nn_catalog.aqcia_id',  'nn_catalog_lang.name', 'nn_catalog_lang.body', 'nn_catalog_lang.description', 'nn_catalog_lang.imgurl', 'nn_catalog_lang.sub_title', 'nn_catalog_lang.info_label', 'nn_catalog_lang.services_list', 'nn_catalog_lang.info_list')



                            ->orderBy('nn_catalog.views', 'desc');







        return $catalog;



    }







    /*



    	Get by search function



    */

public static $qq='';

    public static function getCatalogBySearch($id, $q, $cat)



    {



		self::$qq=$q;

		$mark='=';

		$catid=$cat;



		if($cat == 'all'){

			$mark='!=';

			$catid=11111;

		}

		if($cat == ''){

			$mark='=';

			$catid=0;

		}



        $catalog = DB::table('nn_catalog')



            ->where(['nn_catalog_lang.lang' => getCurrentLocale(), 'collection_id' => $id])



			->where('nn_catalog.category_id', $mark, $catid)







           // ->orWhere('nn_catalog.article_code', 'like', '%'.$q.'%')



			->Where(function($query) {

				//dd(self::$qq);

					$query->where('nn_catalog_lang.name', 'like', '%'.self::$qq.'%');



				})



            ->join('nn_catalog_lang', 'nn_catalog.id', '=', 'nn_catalog_lang.catalog_id')



            ->select('nn_catalog.id', 'nn_catalog.category_id', 'nn_catalog.aqcia_id', 'nn_catalog_lang.name', 'nn_catalog_lang.body', 'nn_catalog_lang.description', 'nn_catalog_lang.imgurl')



            ->orderBy('nn_catalog.views', 'desc')



            ->groupBy('id')



            ->get();







        return $catalog;



    }







	/*



    	Create function



    */



    public static function createCatalog($input)



    {



        $input['color_ids'] = '';


		$currentItemPosition = nn_catalog::where('collection_id', $input['collection_id'])->max('position') + 1;

		$input['position'] = $currentItemPosition;

        $catalog = self::create($input);



    	$insertedId = $catalog->id;



        $input['catalog_id'] = $insertedId;








        foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties){







            $input['lang'] = $localeCode;







            nn_catalog_lang::create($input);







        }







        return $catalog;



    }







    /*



        Edit function



    */



    public static function editCatalog($catalogId)



    {



        $category = DB::table('nn_catalog')



            ->where('nn_catalog.id', '=', $catalogId)



            ->join('nn_catalog_lang', 'nn_catalog.id', '=', 'nn_catalog_lang.catalog_id')



            ->select('nn_catalog.id', 'nn_catalog.price', 'nn_catalog.stars', 'nn_catalog.category_id', 'nn_catalog.aqcia_id', 'nn_catalog.thematic_category_id', 'nn_catalog_lang.videoUrl', 'nn_catalog_lang.imgurl', 'nn_catalog_lang.keywords','nn_catalog_lang.embed','nn_catalog.sDate',  'nn_catalog_lang.id as lang_id', 'nn_catalog_lang.name', 'nn_catalog_lang.body', 'nn_catalog_lang.description', 'nn_catalog_lang.sub_title', 'nn_catalog_lang.info_label', 'nn_catalog_lang.services_list', 'nn_catalog_lang.info_list')
            ->orderBy('nn_catalog.views', 'desc')
            ->get();


        return $category;



    }







    /*



        Update function



    */



    public static function updateCatalog($input)



    {

	  $input['color_ids']=isset($input['color_ids'])?$input['color_ids']:"";





if($input['color_ids'])$input['color_ids'] = implode(',', $input['color_ids']);











        $catalog = nn_catalog::where('id', '=', $input['id'])



            ->firstOrFail();;





        $catalog->update($input);





        $catalogLang = nn_catalog_lang::where('id', '=', $input['lang_id'])







                                    ->firstOrFail();





        $catalogLang->update($input);



    }







    //_-_ SITE SIDE



    /*



        get catalog items



    */



    public static function getCatalogItemsForSite($id, $limit = 0, $exceptId = 0, $category_id = 0, $type = 'category', $category_ids = '')



    {



        $typeIdColumnName = '';







        if($type == 'category') {



            $typeIdColumnName = 'category_id';



        } else if ($type == 'thematic-category') {



            $typeIdColumnName = 'thematic_category_id';



        }







        $exclamationMark = ($category_id == 0) ? '!' : '';



		if($type == 'sales'){

			$query = DB::table('nn_menu_item')



						->where(['nn_menu_item.id' => $id])



						->join('nn_catalog', 'nn_menu_item.collection_id', '=', 'nn_catalog.collection_id')



						->join('nn_catalog_lang', 'nn_catalog.id', '=', 'nn_catalog_lang.catalog_id')



						->where('nn_catalog.old_price','!=' ,'')



						->where('nn_catalog.category_id','!=' ,'')



						->where(['nn_catalog_lang.lang' => getCurrentLocale()])



						->select('nn_catalog.id', 'nn_catalog.slug', 'nn_catalog.article_code', 'nn_catalog.barcode', 'nn_catalog.unique_code', 'nn_catalog.price','nn_catalog.helium_price', 'nn_catalog.old_price',  'nn_catalog.amount',  'nn_catalog.color_ids', 'nn_catalog.category_id', 'nn_catalog.aqcia_id', 'nn_catalog.thematic_category_id', 'nn_catalog_lang.id as lang_id', 'nn_catalog_lang.name', 'nn_catalog_lang.body', 'nn_catalog_lang.description', 'nn_catalog_lang.imgurl')



						->groupBy('nn_catalog_lang.catalog_id')



						->orderBy('nn_catalog.created_at', 'desc');





			}else if($category_ids != ''){



					$query = DB::table('nn_menu_item')



						->where(['nn_menu_item.id' => $id])



						->join('nn_catalog', 'nn_menu_item.collection_id', '=', 'nn_catalog.collection_id')



						->join('nn_catalog_lang', 'nn_catalog.id', '=', 'nn_catalog_lang.catalog_id')



						->whereIn('nn_catalog.category_id', explode(',', $category_ids))



						->where('nn_catalog.category_id','!=' ,'')



						->where(['nn_catalog_lang.lang' => getCurrentLocale()])



						->select('nn_catalog.id', 'nn_catalog.slug', 'nn_catalog.article_code', 'nn_catalog.barcode', 'nn_catalog.unique_code', 'nn_catalog.price','nn_catalog.helium_price','nn_catalog.old_price',  'nn_catalog.amount',  'nn_catalog.color_ids', 'nn_catalog.category_id', 'nn_catalog.aqcia_id', 'nn_catalog.thematic_category_id', 'nn_catalog_lang.id as lang_id', 'nn_catalog_lang.name', 'nn_catalog_lang.body', 'nn_catalog_lang.description', 'nn_catalog_lang.imgurl')



						->groupBy('nn_catalog_lang.catalog_id')



						->orderBy('nn_catalog.created_at', 'desc');







				} else {



					$query = DB::table('nn_menu_item')



						->where(['nn_menu_item.id' => $id])



						->join('nn_catalog', 'nn_menu_item.collection_id', '=', 'nn_catalog.collection_id')



						->join('nn_catalog_lang', 'nn_catalog.id', '=', 'nn_catalog_lang.catalog_id')



						->where('nn_catalog.'.$typeIdColumnName, $exclamationMark.'=', $category_id)



						->where(['nn_catalog_lang.lang' => getCurrentLocale()])



						->where('nn_catalog.category_id','!=' ,'')



						->select('nn_catalog.id', 'nn_catalog.slug', 'nn_catalog.article_code', 'nn_catalog.barcode', 'nn_catalog.unique_code', 'nn_catalog.price','nn_catalog.old_price', 'nn_catalog.helium_price','nn_catalog.amount',  'nn_catalog.color_ids', 'nn_catalog.category_id', 'nn_catalog.aqcia_id', 'nn_catalog.thematic_category_id', 'nn_catalog_lang.id as lang_id', 'nn_catalog_lang.name', 'nn_catalog_lang.body', 'nn_catalog_lang.description', 'nn_catalog_lang.imgurl')



						->groupBy('nn_catalog_lang.catalog_id')



						->orderBy('nn_catalog.views', 'desc');



				}







				if($limit) {



					$query->limit($limit);



					if($exceptId) {



						$query->where('nn_catalog.id', '!=', $exceptId);



					}



					$catalogItems =  $query->get();



				} else {



					$catalogItems =  $query->paginate(16);



				}







				return $catalogItems;



			}







			/*



				get catalog item



			*/



			public static function getCatalogItemForSite($slug)



			{



				$catalogItem = DB::table('nn_catalog')



									->where(['nn_catalog.slug' => $slug])



									->join('nn_catalog_lang', 'nn_catalog_lang.catalog_id', '=', 'nn_catalog.id')



									->where(['nn_catalog_lang.lang' => getCurrentLocale()])



									->where('nn_catalog.category_id','!=' ,'')



									->orderBy('nn_catalog.views', 'desc')







									->get();







				return $catalogItem;



			}







			/*



				get Related catalog items



			*/



			public static function getRelatedCatalogItemsForSite($catalogItem, $limit = 0)



			{



				$relatedCatalogItems = DB::table('nn_catalog')



					->where(['nn_catalog.category_id' => $catalogItem[0]->category_id])



					->where('nn_catalog.id', '!=', $catalogItem[0]->catalog_id)



					->where('nn_catalog.category_id','!=' ,'')



					->join('nn_catalog_lang', 'nn_catalog.id', '=', 'nn_catalog_lang.catalog_id')



					->where(['nn_catalog_lang.lang' => getCurrentLocale()])



					->groupBy('nn_catalog_lang.catalog_id')



					->orderBy('nn_catalog.views', 'desc')



					->limit($limit)



					->get();







				return $relatedCatalogItems;



			}







			/*



				Get Catalog items search function



			*/



			public static function getCatalogItemsBySearchForSite($q)



			{



				$query = DB::table('nn_catalog')



					->where(['nn_catalog_lang.lang' => getCurrentLocale()])



					->where('nn_catalog_lang.name', 'like', '%'.$q.'%')

					->where('nn_catalog.category_id','!=' ,'')







					->join('nn_catalog_lang', 'nn_catalog.id', '=', 'nn_catalog_lang.catalog_id')



					->select('nn_catalog.id', 'nn_catalog.slug', 'nn_catalog.sDate', 'nn_catalog.category_id', 'nn_catalog.aqcia_id', 'nn_catalog.thematic_category_id', 'nn_catalog_lang.id as lang_id', 'nn_catalog_lang.name', 'nn_catalog_lang.body', 'nn_catalog_lang.description', 'nn_catalog_lang.imgurl')



					->orderBy('nn_catalog.id', 'desc')



					->groupBy('nn_catalog.id');







				$catalogItems =  $query->paginate(20);







				return $catalogItems;



			}
			public static function getCatalogItemsBySearchForSiteSingle($slug)
				{


			// echo $offset;exit;
				$query = DB::table('nn_catalog')
					->join('nn_catalog_lang', 'nn_catalog.id', '=', 'nn_catalog_lang.catalog_id')

					->where('nn_catalog_lang.lang','=','ka')
					->where('nn_catalog.slug','=', $slug)
					->select('nn_catalog.id','nn_catalog.slug','nn_catalog.sDate','nn_catalog.views','nn_catalog.thematic_category_id as mqadageblis_id','nn_catalog_lang.name',
							'nn_catalog_lang.imgurl','nn_catalog_lang.description','nn_catalog_lang.videoUrl','nn_catalog_lang.embed','nn_catalog_lang.keywords')


					->get();

					return $query[0];



				}

				public static function getAboutUs()
				{


			// echo $offset;exit;
				$query = DB::table('nn_catalog')
					->join('nn_catalog_lang', 'nn_catalog.id', '=', 'nn_catalog_lang.catalog_id')

					->where('nn_catalog_lang.lang','=','ka')
					->where('collection_id','=', 13)
					->select('nn_catalog.slug','nn_catalog_lang.name',
							'nn_catalog_lang.imgurl','nn_catalog_lang.body')


					->get();

					return $query;



				}
					public static function leaders()
				{


			// echo $offset;exit;
				$query = DB::table('nn_catalog')
					->join('nn_catalog_lang', 'nn_catalog.id', '=', 'nn_catalog_lang.catalog_id')

					->where('nn_catalog_lang.lang','=','ka')
					->where('collection_id','=', 14)
					->select('nn_catalog.slug','nn_catalog_lang.name',
							'nn_catalog_lang.imgurl','nn_catalog_lang.description AS position')

					->get();

					return $query;



				}
						public static function leadersSingle($slug)
				{


			$query = DB::table('nn_catalog')
					->join('nn_catalog_lang', 'nn_catalog.id', '=', 'nn_catalog_lang.catalog_id')

					->where('nn_catalog_lang.lang','=','ka')
					->where('nn_catalog.slug','=', $slug)
					->select('nn_catalog.slug','nn_catalog_lang.name',
							'nn_catalog_lang.imgurl','nn_catalog_lang.description AS position','nn_catalog_lang.body')

					->get();

					return $query[0];







				}

			public static function getCatalogItemsBySearchForSiteAll($params)

			{
				$page = isset($params->page)?$page = intval($params->page):1;
				if($page < 1) $page = 1;
				$pageoffset = 24 * ($page-1);



				$query = DB::table('nn_catalog')
					->join('nn_catalog_lang', 'nn_catalog.id', '=', 'nn_catalog_lang.catalog_id')

					->where('nn_catalog_lang.lang','=','ka');

				if($params->page_category!=0){
					$query = $query->where('nn_catalog.collection_id','=', $params->page_category);
				}
				if($params->preacher_id!=0){
					$query = $query->where('nn_catalog.thematic_category_id','=', $params->preacher_id);
				}

				if($params->searcht!="0"){
					$query = $query->where('nn_catalog_lang.name', 'like', '%'.$params->searcht.'%');
				}
				if($params->date_start!='' && $params->date_end!=''){
						$start_raw = DB::raw("STR_TO_DATE(sDate, '%e-%m-%Y')");
		$end_raw = DB::raw("STR_TO_DATE('".$params->date_start."', '%e-%m-%Y')");

				$start_raw1 = DB::raw("STR_TO_DATE(sDate, '%e-%m-%Y')");
		$end_raw1 = DB::raw("STR_TO_DATE('".$params->date_end."', '%e-%m-%Y')");
			$query = $query->where($start_raw, '>=',  $end_raw );
			$query = $query->where($start_raw1, '<=',  $end_raw1 );
		 }

			$query = $query->select('nn_catalog.id','nn_catalog.slug','nn_catalog.sDate','nn_catalog.views','nn_catalog.thematic_category_id as mqadageblis_id','nn_catalog_lang.name',
			'nn_catalog_lang.imgurl','nn_catalog_lang.description','nn_catalog_lang.videoUrl','nn_catalog_lang.embed','nn_catalog_lang.keywords');


		 $count =   ceil($query->count() / 24);

		 $query = $query->groupBy('nn_catalog.id')->offset($pageoffset)->take(24)->orderBy('id', 'DESC')->get();
		 $catalogItems =  $query;

		 $items[0]=$catalogItems;
		 $items[1]=$count;


        return $items ;



    }


	public static function getYears($colid){
		 $query = DB::table('nn_catalog')

			->join('nn_file', 'nn_file.route_id', '=', 'nn_catalog.id')
			->join('nn_file_lang', 'nn_file.id', '=', 'nn_file_lang.file_id')
			->where('nn_file_lang.lang','=','ka');
		$query = $query->whereIn('nn_catalog.collection_id', $colid);
		$query = $query->select('nn_catalog.sDate');
		$query = $query->groupBy('nn_catalog.id')->orderBy('sDate', 'DESC')->get();
		$years = array();


		foreach ($query as $year){
			$year = explode("-", $year->sDate);
			array_push($years, $year[2]);
		}
		return $years;

	}


	public static function getLoc($colid){
		 $query = DB::table('nn_catalog')

			->join('nn_catalog_lang', 'nn_catalog.id', '=', 'nn_catalog_lang.catalog_id')
			->where('nn_catalog_lang.lang','=','ka');
		$query = $query->whereIn('nn_catalog.collection_id', $colid);
		$query = $query->select('nn_catalog_lang.keywords');
		$query = $query->groupBy('nn_catalog_lang.keywords')->orderBy('sDate', 'DESC')->get();
		$locs = $query;



		return $locs;

	}

		public static function getVideos($colid){
		 $query = DB::table('nn_file')

			->join('nn_file_lang', 'nn_file.id', '=', 'nn_file_lang.file_id')
			->where('nn_file.route_id','=',$colid)
			->where('nn_file_lang.lang','=','ka');
		$query = $query->select('nn_file_lang.name','nn_file_lang.description','nn_file_lang.fileurl')->get();
		return $query;

	}
		public static function getImages($colid){
		 $query = DB::table('nn_image')

			->join('nn_image_lang', 'nn_image.id', '=', 'nn_image_lang.image_id')
			->where('nn_image.route_id','=',$colid)
			->where('nn_image_lang.lang','=','ka');
		$query = $query->select('nn_image_lang.name','nn_image_lang.description','nn_image_lang.imgurl')->get();
		return $query;

	}
		public static function getImageFileCount($colid){
		 $image = DB::table('nn_image')->where('nn_image.route_id','=',$colid)->count();
		 $file = DB::table('nn_file')->where('nn_file.route_id','=',$colid)->count();


		return array($image,$file);

	}

	public static function getCatalogItemsBySearchForSiteAudioAll($params)

    {
		 $page = isset($params->page)?$page = intval($params->page):1;
		 if($page < 1) $page = 1;
		  $pageoffset = 24 * ($page-1);

		$years = static::getYears(9);

        $query = DB::table('nn_catalog')
			->join('nn_catalog_lang', 'nn_catalog.id', '=', 'nn_catalog_lang.catalog_id')
			->join('nn_file', 'nn_file.route_id', '=', 'nn_catalog.id')
			->join('nn_file_lang', 'nn_file.id', '=', 'nn_file_lang.file_id')

			->where('nn_catalog_lang.lang','=','ka')
			->where('nn_file_lang.lang','=','ka');


			$query = $query->where('nn_catalog.collection_id','=', array(9));
		if($params->preacher_id!=0){
			$query = $query->where('nn_catalog.thematic_category_id','=', $params->preacher_id);
		 }



		  if($params->searcht!="0"){
			$query = $query->where('nn_catalog_lang.name', 'like', '%'.$params->searcht.'%');
		 }
		  if($params->year!=0){
			$query = $query->where('nn_catalog.sDate', 'like', '%'.$params->year.'%');
		 }

			$query = $query->select('nn_catalog.id','nn_catalog.slug','nn_catalog.sDate','nn_catalog.views','nn_catalog.thematic_category_id as mqadageblis_id','nn_catalog_lang.name',
			'nn_catalog_lang.imgurl','nn_catalog_lang.description','nn_file_lang.fileurl','nn_catalog_lang.videoUrl','nn_catalog_lang.embed','nn_catalog_lang.keywords');


		 $count =   ceil($query->count() / 24);

		 $query = $query->groupBy('nn_catalog.id')->offset($pageoffset)->take(24)->orderBy('id', 'DESC')->get();
		 $catalogItems =  $query;

		 $items[0]=$catalogItems;
		 $items[1]=$count;
		 $items[2]=$years;


        return $items ;



    }
	public static function getCatalogItemsBySearchForSiteCampsAll($params)

    {
		 $page = isset($params->page)?$page = intval($params->page):1;
		 if($page < 1) $page = 1;
		  $pageoffset = 24 * ($page-1);
		 $campsIds = array(10,11,12);
		if($params->category != 0)$campsIds = array($params->category);

		$years = static::getYears($campsIds);
		$locs = static::getLoc($campsIds);

        $query = DB::table('nn_catalog')
			->join('nn_catalog_lang', 'nn_catalog.id', '=', 'nn_catalog_lang.catalog_id')


			->where('nn_catalog_lang.lang','=','ka');



			$query = $query->whereIn('nn_catalog.collection_id', $campsIds);

		 if($params->loc!=0){
			$query = $query->where('nn_catalog_lang.loc', 'like', '%'.$params->loc.'%');
		 }

		  if($params->searcht!="0"){
			$query = $query->where('nn_catalog_lang.name', 'like', '%'.$params->searcht.'%');
		 }
		  if($params->year!=0){
			$query = $query->where('nn_catalog.sDate', 'like', '%'.$params->year.'%');
		 }

			$query = $query->select('nn_catalog.id','nn_catalog.slug','nn_catalog.sDate','nn_catalog.views','nn_catalog.thematic_category_id as mqadageblis_id','nn_catalog_lang.name',
			'nn_catalog_lang.imgurl','nn_catalog_lang.description','nn_catalog_lang.videoUrl','nn_catalog_lang.embed','nn_catalog_lang.keywords');


		 $count =   ceil($query->count() / 24);

		 $query = $query->groupBy('nn_catalog.id')->offset($pageoffset)->take(24)->orderBy('id', 'DESC')->get();
		 $catalogItems =  $query;
		$allCamps = array();
		foreach($query as $q){
			$fi=static::getImageFileCount($q->id);
			$q->videocount=$fi[1];
			$q->imagecount=$fi[0];
			array_push ( $allCamps ,$q );
		}

		 $items[0]=$allCamps;
		 $items[1]=$count;
		 $items[2]=$years;
		 $items[3]=$locs;


        return $items ;



    }





}



