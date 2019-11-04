<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StaffCategory extends Model
{
    protected   $fillable = ['id','staff_cate_title',
    'staff_cate_desccription'];
}
