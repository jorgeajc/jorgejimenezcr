<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Currency extends Model {
    protected $fillable = [
        'country',
        'iso_code'
    ];

    public function exchangeRate() {
        return $this->hasMany(ExchangeRate::class)->orderBy('id', "desc");
    }
}
