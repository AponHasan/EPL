<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Dealer_demand;
use App\Ddl_check_out;
use App\Factory;
use DB;

class DemandConfirmController extends Controller
{
    public function demand_check_list()
    {
        $dealer_lists = DB::select('SELECT dealers.d_s_name,dealer_demands.dealer_id FROM `dealer_demands` LEFT JOIN dealers ON dealers.id = dealer_demands.dealer_id GROUP BY dealers.d_s_name,dealer_demands.dealer_id ');
        return view('Demand_Letter.Demand_confirm.check_out_list',compact('dealer_lists'));
    }

    public function demand_check_list_confirm(Request $request)
    {
        // dd($request);

        $warehouses =  Factory::latest('id')->get();

        $dealer_ic = $request->dealer_id;
        $check_list = DB::select('SELECT dealer_demands.partial_a_s, dealer_demands.id,dealer_demands.products_id,dealer_demands.dealer_demand_no,dealer_demands.qty as demand_qty,ddl_check_outs.approve_qty, dealer_demands.demand_approve_status, dealer_demands.delivery_status,dealer_demands.confirm_status, ((dealer_demands.qty)-((dealer_demands.qty)-(ddl_check_outs.approve_qty)))as total_approve, ddl_check_outs.confirm_status as ddl_confirm_status,ddl_check_outs.delivery_status as ddl_delivery_status,
        products.product_name 

        FROM dealer_demands
        
        LEFT JOIN ddl_check_outs ON ddl_check_outs.demand_id=dealer_demands.id
LEFT JOIN products on products.id=dealer_demands.products_id 
        
        WHERE dealer_demands.dealer_id='.$dealer_ic.' AND dealer_demands.demand_hold_status=0 AND (dealer_demands.delivery_status=0 AND dealer_demands.confirm_status=0) OR (ddl_check_outs.confirm_status=0)');
        return view('Demand_Letter.Demand_confirm.check_out_list_confirm',compact('check_list','warehouses'));
        // dd($check_list);
    }

    public function check_list_confirm(Request $request)
    {
        $date = date("Y-m-d");       
       
            $data=DB::table('dealer_demands')->whereIn('id', $request->c_status)->update(array('confirm_status' => 1,'demand_confirm_no' => $request->demand_confirm_no,'demand_confirm_date'=>$date,'warehouse_id'=>$request->warehouse_id)); 

            $datas= DB::table('ddl_check_outs')->whereIn('demand_id', $request->c_status)->update(array('confirm_status' => 1,'demand_confirm_no' => $request->demand_confirm_no,'demand_confirm_date'=>$date,'warehouse_id'=>$request->warehouse_id)); 

    }
    public function Delarlist(){
        $dealer_lists = DB::select('SELECT dealers.d_s_name,dealer_demands.dealer_id FROM `dealer_demands` LEFT JOIN dealers ON dealers.id = dealer_demands.dealer_id GROUP BY dealers.d_s_name,dealer_demands.dealer_id ');
        return view('Demand_Letter.Demand_confirm.dealer_list',compact('dealer_lists','dealer_list'));
    }

    public function demandconfirmNumber()
    {
       $demand_confirm_number = DB::select('SELECT MAX(dealer_demands.demand_confirm_no) as demand_confirm_no FROM `dealer_demands`');
       return response($demand_confirm_number);
    }

    public function confirmlist()
    {
        $confirm_dealer_list = DB::select('SELECT dealers.d_s_name,dealers.dlr_code,dealer_demands.dealer_id FROM `dealer_demands`

        LEFT JOIN dealers ON dealers.id = dealer_demands.dealer_id
        LEFT JOIN ddl_check_outs ON ddl_check_outs.dealer_id = dealer_demands.dealer_id
        
        WHERE dealer_demands.confirm_status=1 OR ddl_check_outs.confirm_status=1
        
        GROUP BY dealers.d_s_name,dealer_demands.dealer_id');
        return view('Demand_Letter.Demand_confirm.confirm_list',compact('confirm_dealer_list'));
    }

    public function confirmno($id)
    {
        $confirm_demand_no = DB::select('SELECT dealer_demands.demand_confirm_no FROM `dealer_demands` WHERE dealer_demands.dealer_id='.$id.' GROUP BY dealer_demands.demand_confirm_no');
        return response($confirm_demand_no);
    }

    public function confirmlistget(Request $request)
    {
        // dd($request);
        $did = $request->dealer_id;
        $dno = $request->demand_no;
        $confirm_list_get = DB::select('SELECT dealer_demands.partial_a_s, dealer_demands.id,dealer_demands.products_id,dealer_demands.dealer_demand_no,dealer_demands.qty as demand_qty,ddl_check_outs.approve_qty, dealer_demands.demand_approve_status, dealer_demands.delivery_status,dealer_demands.confirm_status, ((dealer_demands.qty)-((dealer_demands.qty)-(ddl_check_outs.approve_qty)))as total_approve, ddl_check_outs.confirm_status as ddl_confirm_status,ddl_check_outs.delivery_status as ddl_delivery_status,
        products.product_name 

        FROM dealer_demands
        
        LEFT JOIN ddl_check_outs ON ddl_check_outs.demand_id=dealer_demands.id
LEFT JOIN products on products.id=dealer_demands.products_id 
        
        WHERE (dealer_demands.dealer_id='.$did.' AND dealer_demands.demand_confirm_no='.$dno.') AND (dealer_demands.confirm_status=1 AND dealer_demands.delivery_status=0)');
        return view('Demand_Letter.Demand_confirm.check_out_confirm_list',compact('confirm_list_get'));
        // dd($confirm_list_get);
    }

}
