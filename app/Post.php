<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //
    protected $fillable = ['post','user_id','created_at'];

    public function user(){
        return $this->belongsTo('App\User');
    }

}
