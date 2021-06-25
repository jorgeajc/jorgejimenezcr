<?php

namespace App\Models;

use Jenssegers\Date\Date;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;


class Experiences extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'name',
        'place',
        'is_active',
        'start_month',
        'start_year',
        'end_month',
        'end_year',
        'user_id',
        'description'
    ];

    public function users() {
        return $this->belongsTo(User::class);
    }

    public function getStartDateAttribute() {
        return $this->parseMonth($this->attributes['start_month']) . ' ' . $this->attributes['start_year'];
    }
    public function getEndDateAttribute() {
        if($this->attributes['end_month'] && $this->attributes['end_year']) {
            return $this->parseMonth($this->attributes['end_month']) . ' ' . $this->attributes['end_year'];
        }
        return __('Present') ;
    }

    public function parseMonth($month) {
        if($month) {
            return (new Date(date("F",mktime(0,0,0,$month,1,2011))))->format('F');
        }
        return null;
    }
}