<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class IncentivePromo extends Model
{
    protected $fillable = ['sales_promotions_title','dealer_id','target_amount','achive_discount','fdate','tdate','status'];
}
