<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['title', 'alias', 'intro', 'body'];
//    protected $guarded = ['title', 'alias', 'intro', 'body'];
    public function getRouteKeyName()
    {
        return 'alias';
    }
}
