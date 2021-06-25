<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SocialMedia extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'name',
        'link',
        'is_active',
    ];

    public function users() {
        return $this->belongsTo(User::class);
    }

    public function color() {
        return $this->belongsTo(Color::class);
    }
}
