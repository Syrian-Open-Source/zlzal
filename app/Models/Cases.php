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
        'medical_point_status',
    ];
}
