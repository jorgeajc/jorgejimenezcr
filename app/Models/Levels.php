<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Levels extends Model {
    use HasFactory;
    protected $fillable = [
        'name',
        'is_active'
    ];
    public function programmingLanguages() {
        return $this->belongsToMany(ProgrammingLanguages::class, 'users_programming_languages', 'level_id')->withPivot('user_id', 'programming_languages_id', 'level_id', 'percentage', 'year_experience', 'is_active');
    }
}
