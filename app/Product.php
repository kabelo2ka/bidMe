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

    /**
     * Get the product creater
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get all bids
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
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

    /**
     * Set image attribute (Temporary)
     * @todo add image upload logic
     *
     * @return void
     */
    public function setImageUrlAttribute()
    {
        $this->attributes['image_url'] = 'http://lorempixel.com/620/480/technics/Product%20Image%20Placeholder';
    }

    /**
     * Set product active attribute to true (Temporary)
     * @todo remove this
     *
     * @return void
     */
    public function setActiveAttribute()
    {
        $this->attributes['active'] = true;
    }

    /**
     * Round off price to decimal places
     *
     * @param $value
     * @return void
     */
    public function setPriceAttribute($value)
    {
        $this->attributes['price'] = floatval(preg_replace('/[^\d\.]/', '', $value));
    }

    /**
     * Round off price to decimal places
     *
     * @param $value
     * @return float
     */
    public function getPriceAttribute($value)
    {
        return round($value, 2);
    }

    /**
     * Get Highest bid amount
     *
     * @return string
     */
    public function getHighestBidAmount()
    {
        if ($bid = $this->bids()->orderBy('amount')->first()) {
            return round($bid->amount, 2);
        };
        return '0.00';
    }

    /**
     * Get Average bid amount
     *
     * @return float
     */
    public function getAverageBidAmount()
    {
        if ((float)$avg_amount = $this->bids()->average('amount')) {
            return round($avg_amount, 2);
        };
        return 0.00;
    }

    /**
     * Get Bidder by ID
     *
     * @param $email
     * @return Model|\Illuminate\Database\Eloquent\Relations\HasMany|object
     */
    public function getBidByEmail($email)
    {
        return $this->bids()->where('email', $email)->first();
    }

    /**
     * Check if a bid has been placed by current user
     *
     * Currently using browser cookies
     * @todo Kabelo - Improve this by implementing a better authentication for customers
     *
     * @return bool
     */
    public function isBidPlacedByCurrentUser()
    {
        $email = static::getBidderEmail();
        return $email && $this->getBidByEmail($email);
    }

    /**
     * Get Bid by current user
     *
     * Currently using browser cookies
     * @todo Kabelo - Improve this by implementing a better authentication for customers
     *
     * @return bool|Model|\Illuminate\Database\Eloquent\Relations\HasMany|object
     */
    public function getBidByCurrentUser()
    {
        if ($email = static::getBidderEmail()) {
            return $this->getBidByEmail($email);
        }
        return false;
    }

    /**
     * Get bidder email cookie from client
     *
     * @return array|string
     */
    public static function getBidderEmail()
    {
        return request()->cookie('bidder_email');
    }
}
