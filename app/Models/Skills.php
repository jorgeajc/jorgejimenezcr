<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
class Skills extends Model
{
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
    public function users() {
        return $this->belongsToMany(User::class, 'users_skills')->withPivot('user_id', 'skills_id', 'level_id', 'percentage', 'year_experience', 'is_active');
    }
}
