<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable =['id',
    'product_name',
    'product_code',
    'product_dimension',
    'product_dimension_unit',
    'product_weight',
    'product_weight_unit',
    'product_barcode',
    'product_dp_price',
    'product_dealer_commision',
    'product_mrp',
    'product_color',
    'product_description'];
}
