<?php

namespace App;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    protected $fillable = [
        'libelle',
    ];

    public function category(){
        return $this->hasOne(Category::class);
    }

    public function scopeDernier(Builder $query)
    {
        return $query->orderBy(static::UPDATED_AT, 'desc');
    }
}
