<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bid extends Model
{
    /**
     * Round off amount to decimal places
     *
     * @param $value
     * @return void
     */
    public function setAmountAttribute($value)
    {
        $this->attributes['amount'] = floatval(preg_replace('/[^\d\.]/', '', $value));
    }

    public function getAmountAttribute($value)
    {
        return number_format((float)$value, 2);
    }
}
