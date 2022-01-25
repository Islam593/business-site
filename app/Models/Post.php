<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $guarded = [];

// post and category relationship
    public function categories()
    {
        return $this-> belongsToMany('App\Models\Category');
    }

    // post and category relationship
public function tags()
{
    return $this-> belongsToMany('App\Models\Tag');
}

}


