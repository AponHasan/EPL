<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DealerSpo extends Model
{
    protected $fillable = ['id','sop_name',
    'sop_nid',
    'sop_phone_number',
    'sop_address'];
}
