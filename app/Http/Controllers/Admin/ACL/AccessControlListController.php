<?php

namespace App\Http\Controllers\Admin\ACL;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AccessControlListController extends Controller
{
    function __construct()
    {
        $this->middleware(['auth','authorize.user.access:Admin']);
    } 

    /**
     * show user acl
     * @return list
     */
    public function index()
    {
        return "Admin Area";
    }
}
