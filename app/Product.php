<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    const IMAGE_WIDTH = 348;
    const IMAGE_HEIGHT = 226;

    protected $fillable = [
        'name', 'sku', 'description', 'price', 'image_url', 'active'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function bids()
    {
        return $this->hasMany(Bid::class);
    }

    /**
     * Scope a query to only include active users.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeActive($query)
    {
        return $query->where('active', 1);
    }

    public function setPriceAttribute($value)
    {
        $this->attributes['price'] = round($value, 2);
    }

    public function getPriceAttribute($value)
    {
        return round($value, 2);
    }

    public function getHighestBid()
    {
        return $this->bids()->orderBy('amount')->first();
    }

    public function getAverageBid()
    {
        return $this->bids()->average('amount')->first();
    }

    public function getBidByUserId($id)
    {
        return $this->bids()->where('user_id', $id)->first();
    }
}
