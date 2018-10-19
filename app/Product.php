<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    protected $fillable = ['name,brand,description,price,category','logo','image1','image2','stock'];


    public function rates()
    {
        $itemrates=$this->hasMany('App\Rate')->get();

        if($itemrates->count() == 0)
        {
            $averageRate =0;
            $count=0;
        }
        else{

            $totalRate=0;
            $count = $itemrates->count();

            foreach ($itemrates as $rates)
            {
                $totalRate = $totalRate + $rates->rate;
            }

            $averageRate=$totalRate/$count;

        }
        return compact('averageRate','count' , 'itemrates');

//        return compact('count' , 'averageRate');
    }

}
