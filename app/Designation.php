<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Designation extends Model
{
    protected $fillable =['id','designation_title',
    'designation_desccription'];
}
