<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'categories';


    /**
     * The posts that belong to the category.
     */
    public function posts()
    {
        return $this->belongsToMany('App\Post', 'category_post', 'category_id', 'post_id');
    }
}
