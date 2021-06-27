<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SocialsMedias extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'link',
        'is_active',
        'user_id',
        'color_id',
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function color() {
        return $this->belongsTo(Colors::class);
    }
}
