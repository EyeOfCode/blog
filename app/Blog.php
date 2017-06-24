<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $table = 'blogs';

    protected $fillable = ['id', 'user_id', 'title', 'detail', 'crated_at', 'updated_ad'];

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function comment(){
        return $this->hasMany('App\Comment', 'blog_id', 'id');
    }
}
