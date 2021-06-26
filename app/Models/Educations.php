<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Educations extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'place',
        'description',
        'start_year',
        'end_year',
        'status',
        'is_active'
    ];
    public function users() {
        return $this->belongsTo(User::class, 'user_id');
    }
}
