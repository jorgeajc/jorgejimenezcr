<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExperienceDetails extends Model {
    use HasFactory;
    protected $fillable = [
        'experiences_id',
        'description'
    ];

    public function experience() {
        return $this->belongsTo(Experiences::class);
    }
}
