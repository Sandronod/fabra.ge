<?php



namespace App\Models;



use Illuminate\Database\Eloquent\Model;

use App\Models\nn_category_lang;

use DB;

use LaravelLocalization;



class nn_category extends Model

{

    protected $table = 'nn_category';



    protected $fillable = [

        'parent_id',

		'position',

    ];



    //_-_ CMS SIDE

    /*

    	Get function

    */

    public static function getCategory()
    {

    	$category = DB::table('nn_category')

                            ->where(['nn_category_lang.lang' => getCurrentLocale()])

                            ->join('nn_category_lang', 'nn_category.id', '=', 'nn_category_lang.category_id')

                            ->select('nn_category.id', 'nn_category.position', 'nn_category.show', 'nn_category.parent_id', 'nn_category_lang.name', 'nn_category_lang.imgurl', 'nn_category_lang.description')

                            ->orderBy('nn_category.created_at', 'desc')

                            ->get();



        return $category;

    }



    /*

    	Get Parent Category function

    */

    public static function getParentCategory($categoryId)

    {

        $category = DB::table('nn_category')

            ->where('nn_category_lang.lang', '=', getCurrentLocale())

            ->where('nn_category.id', '!=', $categoryId)

            ->join('nn_category_lang', 'nn_category.id', '=', 'nn_category_lang.category_id')

            ->select('nn_category.id', 'nn_category.parent_id', 'nn_category_lang.name', 'nn_category_lang.imgurl', 'nn_category_lang.description')

            ->orderBy('nn_category.created_at', 'desc')

            ->get();



        return $category;

    }



	/*

    	Create function

    */

    public static function createCategory($input)
    {

        $currentItemPosition = nn_category::max('position') + 1;

		$input['position'] = $currentItemPosition;

        $category = self::create($input);

    	$insertedId = $category->id;

        $input['category_id'] = $insertedId;



        foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties){



            $input['lang'] = $localeCode;



            nn_category_lang::create($input);

            

        }



        return $category;

    }



    /*

        Edit function

    */

    public static function editCategory($categoryId)
    {

        $category = DB::table('nn_category')

            ->where('nn_category.id', '=', $categoryId)

            ->join('nn_category_lang', 'nn_category.id', '=', 'nn_category_lang.category_id')

            ->select('nn_category.id', 'nn_category.parent_id', 'nn_category_lang.id as lang_id', 'nn_category_lang.name', 'nn_category_lang.imgurl', 'nn_category_lang.description')

            ->orderBy('nn_category.created_at', 'desc')

            ->get();



       return $category;

    }



    /*

        Update function

    */

    public static function updateCategory($input)
    {

        $category = nn_category::where('id', '=', $input['id'])

                            ->firstOrFail();;

        $category->update($input);



        $categoryLang = nn_category_lang::where('id', '=', $input['lang_id'])

                                    ->where('lang', '=', $input['lang'])

                                    ->firstOrFail();

        $categoryLang->update($input);

    }



    //_-_ SITE SIDE

    /*

    	Get function

    */

    public static function getCategoryItemsForSite($parent_id)

    {

        $category = DB::table('nn_category')

            ->where(['nn_category_lang.lang' => getCurrentLocale()])

            ->where(['nn_category.parent_id' => $parent_id])

            ->join('nn_category_lang', 'nn_category.id', '=', 'nn_category_lang.category_id')

            ->select('nn_category.id', 'nn_category.parent_id', 'nn_category_lang.name', 'nn_category_lang.imgurl', 'nn_category_lang.description')

            ->orderBy('nn_category_lang.name', 'ASC')

            ->get();



        return $category;

    }



    /*

    	Get Category Items ids

    */

    public static function getCategoryItemsIdsForSite($parent_id)

    {

        $category = DB::table('nn_category')

            ->where(['parent_id' => $parent_id])

            ->select('id')

            ->get();



        return $category;

    }

    public static function getCategoryItemsIdsForSite1($parent_id)

    {

        $category = DB::table('nn_category')

            ->where(['id' => $parent_id])

            ->select('*')



            ->get();



        return $category;

    }

}

