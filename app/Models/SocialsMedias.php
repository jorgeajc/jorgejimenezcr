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
    ];

    public function users() {
        return $this->belongsTo(User::class);
    }

    public function color() {
        return $this->belongsTo(Colors::class);
    }
}
