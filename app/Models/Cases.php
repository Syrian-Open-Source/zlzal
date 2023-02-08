<?php

namespace App\Models;

use App\Enums\CaseType;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
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

    public function scopeTypeFilter(Builder $query,$type = null){
        if(!is_null($type)){
            $query->where('type', $type);
        }
    }

}
