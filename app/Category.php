<?php

namespace App;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'name',
        'category_slug',
        'type_id',
        'category_image',
        'status'
    ];

    public function products() {
        return $this->hasMany(Product::class);
    }

    public function type() {
        return $this->belongsTo(Type::class)->dernier();
    }

    public function image() {
        return $this->morphOne('App\Image', 'imageable');
    }

    public function scopeDernier(Builder $query)
    {
        return $query->orderBy(static::UPDATED_AT, 'desc');
    }

}
