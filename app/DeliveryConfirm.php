<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DeliveryConfirm extends Model
{
    protected $fillable = ['approve_date','delivery_date','delivery_quentity','delivery_status','dealer_id','products_id','dealer_demand_no','dealer_demand_check_out_no','track_number'];
}
