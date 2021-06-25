<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Levels extends Model {
    use HasFactory;
    protected $fillable = [
        'id',
        'name',
        'is_active'
    ];
    public function skills() {
        return $this->hasMany(Skills::class);
    }
}
