<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CommissionIn extends Model
{
    protected $fillable = ['title','target_amount','achive_commision','description'];
}
