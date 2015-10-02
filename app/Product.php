<?php

namespace FRD;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'category_id',
        'name',
        'description',
        'price',
        'featured',
        'recommend'
    ];

    public function images()
    {
        return $this->hasMany('FRD\ProductImage');
    }

    public function category()
    {
        return $this->belongsTo('FRD\Category');
    }

    public function tags()
    {
        return $this->belongsToMany('FRD\Tag');
    }
}
