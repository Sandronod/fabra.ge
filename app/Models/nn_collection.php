<?php



namespace App\Models;



use Illuminate\Database\Eloquent\Model;

use App\Models\nn_collection_lang;

use DB;

use LaravelLocalization;



class nn_collection extends Model

{

    protected $table = 'nn_collection';



    protected $fillable = [

    	'type'

    ];

    public function lang()

    {

        return $this->hasOne('App\Models\nn_collection_lang', 'collection_id', 'id')
            ->where('lang', getCurrentLocale());

    }

    public function catalog(){
        return $this->hasMany('App\Models\nn_catalog', 'collection_id',  'id');
    }


    /*

    	Get function

    */

    public static function getCollection()

    {

    	$collection = DB::table('nn_collection')

                            ->where('nn_collection_lang.lang', '=', getCurrentLocale())

                            ->join('nn_collection_lang', 'nn_collection.id', '=', 'nn_collection_lang.collection_id')

                            ->select('nn_collection.id', 'nn_collection.type', 'nn_collection_lang.name', 'nn_collection_lang.description')

                            ->orderBy('nn_collection.created_at','desc')

                            ->get();

        

        return $collection;

    }



	/*

    	Create function

    */

    public static function createCollection($input)

    {

        $collection = self::create($input);



    	$insertedId = $collection->id;

        $input['collection_id'] = $insertedId;



        foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties){



            $input['lang'] = $localeCode;



            nn_collection_lang::create($input);

            

        }



        return $collection;

    }



    /*

    	Edit function

    */

    public static function editCollection($id)

    {

        return nn_collection_lang::where('collection_id', '=', $id)->get();

    }



    /*

    	Update function

    */

    public static function updateCollection($input)

    {

        $collectionLang = nn_collection_lang::where('id', '=', $input['id'])

            ->where('lang', '=', $input['lang'])

            ->firstOrFail();



        $collectionLang->update($input);

    }

}

