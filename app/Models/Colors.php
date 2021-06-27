<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Colors extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'is_active'
    ];

    public function skills(){
        return $this->hasMany(Skills::class);
    }

    public function social_media() {
        return $this->hasMany(SocialsMedias::class);
    }
}
