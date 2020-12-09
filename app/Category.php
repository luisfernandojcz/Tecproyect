<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'name', 'module', 'slug',
    ];
    public function subcategories(){
        return $this->hasMany(Subcategory::class);
    }

    public function tags(){
        return $this->hasMany(Tag::class);
    }

    public function posts(){
        return $this->hasMany(Post::class);
    }
    public function image()
    {
        return $this->morphOne('App\Image', 'imageable');
    }
}
