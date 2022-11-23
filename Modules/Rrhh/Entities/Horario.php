<?php

namespace Modules\Rrhh\Entities;

use Illuminate\Database\Eloquent\Model;

class Horario extends Model
{
    protected $table="rrhh.horarios";
    protected $fillable=[
        'id','name','start_time','end_time','late_minutes',
        'early_minutes','start_input','end_input','start_output',
        'end_output','work_day','sum','color'
    ];
}
