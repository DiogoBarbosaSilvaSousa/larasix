<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{

    /**
     * Get the user that owns the post.
     */
    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }


    /**
     * The categories that belong to the post.
     */
    public function categories()
    {
        return $this->belongsToMany('App\Category', 'category_post', 'post_id', 'category_id');
    }
}
