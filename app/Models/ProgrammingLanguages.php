<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProgrammingLanguages extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'is_active'
    ];
    public function users() {
        return $this->belongsToMany(User::class, 'users_programming_languages')->withPivot('user_id', 'programming_languages_id', 'level_id', 'percentage', 'year_experience', 'is_active');
    }
    public function level() {
        return $this->belongsToMany(Levels::class, 'users_programming_languages', 'id',  'level_id')->withPivot('user_id', 'programming_languages_id', 'level_id', 'percentage', 'year_experience', 'is_active');
    }
}
