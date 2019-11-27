<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DealerArea;
use App\DealerLineManager;
use App\DealerSpo;
use App\DealerType;
use App\DealerZone;
use App\Dealer;
use App\Employee;
use DB;


class DealerController extends Controller
{
    public function index()
    {
        $dealer = DB::select('select dealers.id,dealers.d_s_name,dealers.d_proprietor_name,dealers.d_s_code,dealers.dlr_code,dealers.dlr_op_date,dealers.dlr_police_station,dealers.dlr_address,
        dealers.dlr_mobile_no, dealer_spos.sop_name ,dealer_areas.area_title 
        from dealers
        left join dealer_spos on dealers.dlr_spo_id = dealer_spos.id
        LEFT JOIN dealer_areas on dealers.dlr_area_id = dealer_areas.id');
        return view('Dealer.index',compact('dealer'));
    }
    public function getcreate()
    {
        $dealerlm = Employee::All();
        $dealerspo = Employee::All();
        $dealertype = DealerType::All();
        $dealerzone = DealerZone::All();
        $dealerarea = DealerArea::All();
        return view('Dealer.create',compact('dealerlm','dealerspo','dealertype','dealerzone','dealerarea'));
    }
    
    public function getedit($id)
    {
        $dealers = DB::select('select dealers.id,dealers.d_s_name,dealers.dlr_spo_id,dealers.dlr_lm_id,dealers.dlr_type_id,dealers.d_proprietor_name,dealers.dlr_code,dealers.dlr_op_date,dealers.dlr_op_month,dealers.dlr_mobile_no,dealers.dlr_police_station,dealers.dlr_address,dealers.dlr_area_id,dealers.dlr_base,dealers.dlr_dsm,dealers.dlr_zone_id,dealers.dlr_remark,dealers.dlr_tred_lisence,dealers.dlr_tin_number,users.email,employees.emp_name as spo_name
        FROM `dealers`
        LEFT JOIN users ON users.id = dealers.user_id
        JOIN employees ON employees.id = dealers.dlr_spo_id
        WHERE dealers.id="'.$id.'"');
        // dd($dealers);
        $linem = DB::select('select dealers.d_s_name,dealers.dlr_lm_id,employees.emp_name as lm_name
        FROM `dealers`
        JOIN employees ON employees.id = dealers.dlr_lm_id
        WHERE dealers.id="'.$id.'"');
        $dealerlm = Employee::All();
        $dealerspo = Employee::All();
        $dealertype = DealerType::All();
        $dealerzone = DealerZone::All();
        $dealerarea = DealerArea::All();
        return view('Dealer.edit',compact('dealers','linem','dealerlm','dealerspo','dealertype','dealerzone','dealerarea'));
    }

    public function postdealeredit(Request $request) 
    {
        $id=$request->id;
        $dealer = Dealer::find($id);
        // dd($id);
        $dealer->d_s_name = $request->d_s_name;
        $dealer->dlr_spo_id = $request->dlr_spo_id;
        $dealer->dlr_lm_id = $request->dlr_lm_id;
        $dealer->d_proprietor_name = $request->d_proprietor_name;
        $dealer->d_s_code = $request->d_s_code;
        $dealer->dlr_code = $request->dlr_code;
        $dealer->dlr_type_id = $request->dlr_type_id;
        $dealer->dlr_op_date = $request->dlr_op_date;
        $dealer->dlr_op_month = $request->dlr_op_month;
        $dealer->dlr_police_station = $request->dlr_police_station;
        $dealer->dlr_area_id = $request->dlr_area_id;
        $dealer->dlr_mobile_no = $request->dlr_mobile_no;
        $dealer->dlr_base = $request->dlr_base;
        $dealer->dlr_dsm = $request->dlr_dsm;
        $dealer->dlr_zone_id = $request->dlr_zone_id;
        $dealer->dlr_tred_lisence = $request->dlr_tred_lisence;
        $dealer->dlr_address = $request->dlr_address;
        $dealer->dlr_tin_number = $request->dlr_tin_number;
        $dealer->save();
        return 'ok';
    }

    public function postcreate(Request $request)
    {
        $dealer = new Dealer;
        $dealer->d_s_name = $request->d_s_name;
        $dealer->dlr_spo_id = $request->dlr_spo_id;
        $dealer->dlr_lm_id = $request->dlr_lm_id;
        $dealer->d_proprietor_name = $request->d_proprietor_name;
        $dealer->d_s_code = $request->d_s_code;
        $dealer->dlr_code = $request->dlr_code;
        $dealer->dlr_type_id = $request->dlr_type_id;
        $dealer->dlr_op_date = $request->dlr_op_date;
        $dealer->dlr_op_month = $request->dlr_op_month;
        $dealer->dlr_police_station = $request->dlr_police_station;
        $dealer->dlr_area_id = $request->dlr_area_id;
        $dealer->dlr_mobile_no = $request->dlr_mobile_no;
        $dealer->dlr_base = $request->dlr_base;
        $dealer->dlr_dsm = $request->dlr_dsm;
        $dealer->dlr_zone_id = $request->dlr_zone_id;
        $dealer->dlr_tred_lisence = $request->dlr_tred_lisence;
        $dealer->dlr_address = $request->dlr_address;
        $dealer->dlr_tin_number = $request->dlr_tin_number;
        $dealer->save();
        return "ok";
        // dd($dealer);
    }

    public function passwordset()
    {
        $dealers = Dealer::latest('id')->where('user_id','=',null)->get();
        return view('Dealer.passwordset',compact('dealers'));
    }

    public function password(Request $request)
    {
        // dd($readdir()quest);
        $password=trim($request->dealer_password);
        
        $dlid = $request->dealer_id;
        $user = new User;
            $user->name                                 = $request->dealer_name;
            $user->email                                = $request->dealer_mail;
            $user->password                             = bcrypt($password);
            $user->save();

        $userrole = new Role_user;
            $userrole->role_id      = 4;
            $userrole->user_id      = $user->id;
            $userrole->save();


           $finddlid = Dealer::find($dlid);
           $finddlid ->user_id=$user->id;
           $finddlid ->save();
           return back()->with('success','Password set Successfully');
    }
}
