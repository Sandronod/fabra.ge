<?php







namespace App\Models;







use Illuminate\Database\Eloquent\Model;



use App\Models\nn_thematic_category_lang;



use DB;



use LaravelLocalization;







class nn_thematic_category extends Model



{



    protected $table = 'nn_thematic_category';







    protected $fillable = [



        'color',



        'parent_id'



    ];







    //_-_ CMS SIDE



    /*



    	Get function



    */



    public static function getThematicCategory()



    {



    	$thematicCategory = DB::table('nn_thematic_category')



                            ->where(['nn_thematic_category_lang.lang' => getCurrentLocale()])



                            ->join('nn_thematic_category_lang', 'nn_thematic_category.id', '=', 'nn_thematic_category_lang.thematic_category_id')



                            ->select('nn_thematic_category.id', 'nn_thematic_category_lang.name', 'nn_thematic_category_lang.imgurl', 'nn_thematic_category_lang.description')



                            ->orderBy('nn_thematic_category_lang.name', 'ASC')



                            ->get();







        return $thematicCategory;



    }
	
	 public static function getThematicCategoryForSite()



    {



    	$thematicCategory = DB::table('nn_thematic_category')



                            ->where(['nn_thematic_category_lang.lang' => 'ka'])
							



                            ->join('nn_thematic_category_lang', 'nn_thematic_category.id', '=', 'nn_thematic_category_lang.thematic_category_id')



                            ->select('nn_thematic_category.id', 'nn_thematic_category_lang.name', 'nn_thematic_category_lang.imgurl', 'nn_thematic_category_lang.description')



                            ->orderBy('nn_thematic_category_lang.name', 'ASC')



                            ->get();







        return $thematicCategory;



    }
		 public static function getThematicCategoryForSiteAudio()



    {



    	$thematicCategory = DB::table('nn_thematic_category')



                            ->where(['nn_thematic_category_lang.lang' => 'ka'])
							



                            ->join('nn_thematic_category_lang', 'nn_thematic_category.id', '=', 'nn_thematic_category_lang.thematic_category_id')



                            ->select('nn_thematic_category.id', 'nn_thematic_category_lang.name', 'nn_thematic_category_lang.imgurl', 'nn_thematic_category_lang.description')



                            ->orderBy('nn_thematic_category_lang.name', 'ASC')



                            ->get();







        return $thematicCategory;



    }
		 public static function getThematicCategoryForSiteSingle($id)



    {



    	$thematicCategory = DB::table('nn_thematic_category')



                            ->where(['nn_thematic_category_lang.lang' => 'ka', 'nn_thematic_category.id' => $id])
							



                            ->join('nn_thematic_category_lang', 'nn_thematic_category.id', '=', 'nn_thematic_category_lang.thematic_category_id')



                            ->select('nn_thematic_category.id', 'nn_thematic_category_lang.name', 'nn_thematic_category_lang.imgurl', 'nn_thematic_category_lang.description')



                            ->orderBy('nn_thematic_category_lang.name', 'ASC')



                            ->get();







        return $thematicCategory;



    }









	/*



    	Create function



    */



    public static function createThematicCategory($input)



    {



        $thematicCategory = self::create($input);







    	$insertedId = $thematicCategory->id;



        $input['thematic_category_id'] = $insertedId;







        foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties){







            $input['lang'] = $localeCode;







            nn_thematic_category_lang::create($input);



            



        }







        return $thematicCategory;



    }







    /*



        Edit function



    */



    public static function editThematicCategory($id)



    {



        return nn_thematic_category_lang::where('thematic_category_id', '=', $id)->get();



    }







    /*



        Update function



    */



    public static function updateThematicCategory($input)



    {



        $thematicCategoryLang = nn_thematic_category_lang::where('id', '=', $input['id'])



                                    ->where('lang', '=', $input['lang'])



                                    ->firstOrFail();



        $thematicCategoryLang->update($input);



    }



}



