<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    //

    protected $fillable = ['user_id, product_id, review'];

    public function reviewerName()
    {

        return User::find($this->user_id)->name;
    }


}
