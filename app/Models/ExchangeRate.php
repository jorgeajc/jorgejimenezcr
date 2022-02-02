<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ExchangeRate extends Model {
    protected $fillable = [
        'purchase',
        'sale',
        'date',
        'currency_id'
    ];

    public function currency() {
        return $this->belongsTo(Currency::class);
    }
}
