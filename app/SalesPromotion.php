<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SalesPromotion extends Model
{
    protected $fillable = ['sales_promotions_title','sales_promotions_category','product_id','s_m_i_target_qty','s_m_i_qty','s_m_i_d_target_qty','s_m_i_discount','s_m_tc_target_amount','s_m_tc_discount','s_m_a_status'];
}
