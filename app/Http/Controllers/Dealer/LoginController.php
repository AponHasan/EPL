<?php

namespace App\Http\Controllers\Dealer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\Dealer;
class LoginController extends Controller
{
    public function login(Request $request){


        $credential=Dealer::where('dlr_code','=', $request->dlr_code)->where('password','=',$request->password)->first();
        if($credential){
            return $credential;
        }
        else{
                return 404;
        }
    }
}
