<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Dealer_demand;
use App\Ddl_check_out;
use DB;

class DemandConfirmController extends Controller
{
    public function demand_check_list()
    {
        $dealer_lists = DB::select('SELECT dealers.d_s_name,dealer_demands.dealer_id FROM `dealer_demands` LEFT JOIN dealers ON dealers.id = dealer_demands.dealer_id GROUP BY dealers.d_s_name,dealer_demands.dealer_id ');
        return view('Demand_confirm.check_out_list',compact('dealer_lists'));
    }

    public function demand_check_list_confirm(Request $request)
    {
        // dd($request);
        $dealer_ic = $request->dealer_id;

        $check_list = DB::select('SELECT dealer_demands.partial_a_s, dealer_demands.id,dealer_demands.products_id,dealer_demands.dealer_demand_no,dealer_demands.qty as demand_qty,ddl_check_outs.approve_qty, dealer_demands.demand_approve_status, dealer_demands.delivery_status,dealer_demands.confirm_status, ((dealer_demands.qty)-((dealer_demands.qty)-(ddl_check_outs.approve_qty)))as total_approve, ddl_check_outs.confirm_status as ddl_confirm_status,ddl_check_outs.delivery_status as ddl_delivery_status,
        products.product_name 

        FROM dealer_demands
        
        LEFT JOIN ddl_check_outs ON ddl_check_outs.demand_id=dealer_demands.id
LEFT JOIN products on products.id=dealer_demands.products_id 
        
        WHERE dealer_demands.dealer_id='.$dealer_ic.' AND dealer_demands.demand_hold_status=0 AND (dealer_demands.delivery_status=0 AND dealer_demands.confirm_status=0) OR (ddl_check_outs.confirm_status=0)');
        return view('Demand_confirm.check_out_list_confirm',compact('check_list'));
        // dd($check_list);
    }

    public function check_list_confirm(Request $request)
    {
            // dd($request->c_status[0]);
         $datas=$request->c_status;

        

            $datas=DB::table('dealer_demands')->whereIn('id', $request->c_status)->update(array('confirm_status' => 1));
       
          $data=DB::table('dealer_demands')->whereIn('id', $request->c_status)->update(array('confirm_status' => 1)); 



          $datas= DB::table('ddl_check_outs')->whereIn('demand_id', $request->c_status)->update(array('confirm_status' => 1)); 


      

        // 

    }
    public function Delarlist(){

    
        $dealer_lists = DB::select('SELECT dealers.d_s_name,dealer_demands.dealer_id FROM `dealer_demands` LEFT JOIN dealers ON dealers.id = dealer_demands.dealer_id GROUP BY dealers.d_s_name,dealer_demands.dealer_id ');
        return view('Demand_confirm.dealer_list',compact('dealer_lists','dealer_list'));
    }


    public function demandconfirmlist($id)
    {
        $demandlist = DB::select('SELECT dealer_demands.partial_a_s, dealer_demands.id,dealer_demands.products_id,dealer_demands.dealer_demand_no,dealer_demands.qty as demand_qty,ddl_check_outs.approve_qty, dealer_demands.demand_approve_status, dealer_demands.delivery_status,dealer_demands.confirm_status, ((dealer_demands.qty)-((dealer_demands.qty)-(ddl_check_outs.approve_qty)))as total_approve, ddl_check_outs.confirm_status as ddl_confirm_status,ddl_check_outs.delivery_status as ddl_delivery_status,
        products.product_name 

        FROM dealer_demands
        
        LEFT JOIN ddl_check_outs ON ddl_check_outs.demand_id=dealer_demands.id
LEFT JOIN products on products.id=dealer_demands.products_id 
        
        WHERE dealer_demands.dealer_id='.$id.' AND dealer_demands.demand_hold_status=0 AND (dealer_demands.delivery_status=0 AND dealer_demands.confirm_status=0) OR (ddl_check_outs.confirm_status=0)');

        return response()->json($demandlist);
    }

}
