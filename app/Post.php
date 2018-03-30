<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['name'];

    public function tags()
    {
        return $this->morphToMany('App\Tag', 'taggable');
    }

    public static function scopeFf($query)
    {
        return $query->findOrFail(10);
    }

}
