<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Levels extends Model {
    use HasFactory;
    protected $fillable = [
        'name',
        'is_active'
    ];
    protected $casts = [
        'created_at'
    ];
    public function getCreatedAtAttribute($date){
        return Carbon::parse($date)->format('d/m/Y');
    }
    public function skills() {
        return $this->belongsToMany(Skills::class, 'users_skills', 'level_id', 'skills_id')->withPivot('user_id', 'skills_id', 'level_id', 'percentage', 'year_experience', 'is_active');
    }
}
