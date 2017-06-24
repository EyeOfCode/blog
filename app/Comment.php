<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = 'comments';

    protected $fillable = ['id','user_id','blog_id','detail','created_at','updated_at'];

    public function user(){
        return $this->belongsTo('App\User', 'user_id', 'id');
    }
}
