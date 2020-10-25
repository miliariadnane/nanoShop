<?php

namespace App;

use App\Scopes\LatestScope;
use GoldSpecDigital\LaravelEloquentUUID\Database\Eloquent\Uuid;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;

    //use Uuid;
    //protected $keyType = 'string';
    //public $incrementing = false;
    //rotected $guarded = [];
    
    protected $fillable = [
        'name',
        'description',
        'unit',
        'price',
        'sale_price',
        'product_quantity',
        'image_product',
        'status',
        'meta_title',
        'meta_description',
        'category_id',
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function category() {
        return $this->belongsTo(Category::class)->dernier(); // le nom du scope "dernier" declarer dans classe category
    }

    public function tags() {
        return $this->belongsToMany('App\Tag')->withTimestamps();
    }

    public function image() {
        return $this->morphOne('App\Image', 'imageable');
    }

    public function comments()
    {
        return $this->morphMany('App\Comment', 'commentable');
    }

    public function scopeProductWithCategoriesTags(Builder $query) {
        return $query->withCount('category')->with('category.type');
    }

    public function scopeProductWithUserCommentsTags(Builder $query) {
        return $query->withCount('comments')->with(['user', 'tags']);
    }
    
    public static function boot() {
      
        parent::boot();
        
        static::addGlobalScope(new LatestScope);

    }
    
}
