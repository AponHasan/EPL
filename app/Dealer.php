<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dealer extends Model
{
    protected $fillable=[
        'id',
        'd_s_name',
        'dlr_spo_id',
        'dlr_lm_id',
        'dlr_type_id',
        'd_proprietor_name',
        'd_s_code',
        'dlr_code',
        'dlr_op_date',
        'dlr_op_month',
        'dlr_police_station',
        'dlr_address',
        'dlr_area_id',
        'dlr_mobile_no',
        'dlr_base',
        'dlr_dsm',
        'dlr_zone_id',
        'dlr_remark',
        'dlr_tred_lisence',
        'dlr_tin_number',
        'dlr_active_status',
        ];
}
