<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Educations extends Model
{
    use HasFactory;

    protected $fillable = [
        'place_studio',
        'start_date',
        'end_date',
        'status',
        'is_active'
    ];
    public function users() {
        return $this->belongsTo(User::class);
    }
}
