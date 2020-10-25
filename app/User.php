<?php

namespace App;

use App\Scopes\LatestScope;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;


class User extends Authenticatable
{
    use Notifiable, hasRoles; 
    protected $table = "users";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'email',
        'password',
        'firstName',
        'lastName',
        'username',
        'birthDate',
        'sexe',
        'phoneNumber',
        'address',
        'avatar',
        'status',
        'roles',
    ];

    public function products() {
        return $this->hasMany(Product::class);
    }

    public function getFullName(){
        return ucfirst($this->lastName)." ".($this->firstName);
    }

    public function comments()
    {
        return $this->morphMany('App\Comment', 'commentable');
    }

    public function scopeDernier(Builder $query)
    {
        return $query->orderBy(static::CREATED_AT, 'desc');
    }

    public static function boot() {
      
        parent::boot();
        
        static::addGlobalScope(new LatestScope);

    }

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
