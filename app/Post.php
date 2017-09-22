<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public static function getPublishedPosts()
    {
        return self::where('published', true)->get();
    }
}
