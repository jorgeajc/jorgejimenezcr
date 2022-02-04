<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Colors extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'is_active'
    ];

    public function social_media() {
        return $this->hasMany(SocialsMedias::class, 'color_id');
    }

    public function getCreatedAtAttribute($date){
        return Carbon::parse($date)->format('d/m/Y');
    }
}
