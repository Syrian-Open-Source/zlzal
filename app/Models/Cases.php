<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;


class Cases extends Model
{

    protected $fillable = [
        'name',
        'phone',
        'more_info',
        'city',
        'area',
        'street',
        'description',
        'type',
        'type',
        'medical_point_status',
    ];

    public function getCreatedAtAttribute($val){
        return Carbon::parse($val)->addHours(3)->format('Y-m-d H:i:s');
    }

}
