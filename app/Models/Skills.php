<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Skills extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'is_active'
    ];
    public function color() {
        return $this->belongsTo(Colors::class);
    }
    public function users() {
        return $this->belongsToMany(User::class, 'users_skills')->withPivot('user_id', 'skills_id');
    }
    public function level() {
        return $this->belongsTo(Levels::class, 'levels_id');
    }
}
