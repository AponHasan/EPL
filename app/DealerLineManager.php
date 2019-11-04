<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DealerLineManager extends Model
{
    protected $fillable =['id','lm_name',
    'lm_nid',
    'lm_phone_number',
    'lm_address'];
}
