<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Get products that belongs to the user
     */
    public function products()
    {
        return $this->hasMany(Product::class);
    }

    /**
     * Scope a query to only include admin users.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @param bool $is_admin
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeAdmin($query, $is_admin = true)
    {
        return $query->where('admin', $is_admin);
    }
}
