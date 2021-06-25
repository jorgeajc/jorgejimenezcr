<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Skills extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'name',
        'levels_id',
        'is_active',
        'percentage',
        'user_id',
        'color_id'
    ];
    public function color() {
        return $this->belongsTo(Color::class);
    }
    public function users() {
        return $this->belongsToMany(User::class, 'users_skills')->withPivot('user_id', 'percentage', 'color_id', 'levels_id');
    }
    public function level() {
        return $this->belongsTo(Levels::class, 'levels_id');
    }
}
