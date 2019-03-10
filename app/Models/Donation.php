<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Donation extends Model
{
    /** @var array */
    protected $guarded = [];

    /**
     * Get the amount attribute for a donation.
     *
     * @param  mixed  $value
     *
     * @return string
     */
    public function getAmountAttribute($value)
    {
        return money_format('%.2n', $value/100);
    }
}
