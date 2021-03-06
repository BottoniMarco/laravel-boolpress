<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'title',
        'subtitle',
        'author',
        'publication_date'
    ];

    public function infoPost(){
        return $this->hasOne('App\InfoPost');
    }

    public function tags(){
        return $this->belongsToMany('App\Tag');
    }

    public function images(){
        return $this->belongsToMany('App\Image', 'post_image');
    }

    
}
