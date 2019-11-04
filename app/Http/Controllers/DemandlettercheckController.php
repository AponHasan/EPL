<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Factory;
use App\Employee;
use App\Dealer;
use App\Dealer_demand;
use App\Ddl_check_out;
use DB;

class DemandlettercheckController extends Controller
{
    public function dealer_demand_list($id)
    {
        $warehouses = Factory::latest('id')->get();
        $demandcol = DB::select('SELECT dealer_demands.id,ddl_check_outs.demand_id,dealer_demands.date,dealer_demands.dealer_id,dealers.d_s_name,
        dealer_demands.dealer_demand_no,dealer_demands.products_id,products.product_name,dealer_demands.qty,
        sum(ddl_check_outs.approve_qty) as approve_qty, ((dealer_demands.qty)-(sum(ddl_check_outs.approve_qty))) as painding
        FROM dealer_demands
        LEFT JOIN ddl_check_outs ON ddl_check_outs.demand_id = dealer_demands.id
        LEFT JOIN dealers ON dealers.id = dealer_demands.dealer_id
        LEFT JOIN products ON products.id = dealer_demands.products_id
        WHERE dealer_demands.dealer_demand_no="'.$id.'"
        GROUP BY dealer_demands.id');
        // dd($demandcol);
        return view('Demand_Letter.Epl_demand_check.create',compact('demandcol','warehouses'));
    }

    public function dealer_demand_unhold($id)
    {
        $unhold=DB::select('UPDATE dealer_demands SET dealer_demands.demand_hold_status=0 WHERE dealer_demands.id="'.$id.'"');
        return redirect()->back();
    }

    public function dealer_demand_hold($id)
    {
        $hold=DB::select('UPDATE dealer_demands SET dealer_demands.demand_hold_status=1 WHERE dealer_demands.id="'.$id.'"');
        return redirect()->back();
        // return redirect()->route('ddemandletter.index');
    }
    public function dealer_demand_approved($id)
    {
        $approve=DB::select('UPDATE dealer_demands SET dealer_demands.demand_approve_status=1 WHERE dealer_demands.id="'.$id.'"');
        return redirect()->back();
    }
    
    public function demand_check_out(Request $request)
    {

        // dd($request);
      

        $request->validate([

            'warehouse_id' => 'required',
        
        ],['warehouse_id.required'=>'Please Select The Warehouse']);


        // dd($dealer_demands);
        $date = date("Y-m-d");
        foreach ($request->products_id as $key => $demandcheck) {
            $data =array('approve_date'=>$date, 
            'dealer_id'=>$request->dealer_id,
            'demand_id'=>$request->demand_id[$key],
            'dealer_demand_no'=>$request->dealer_demand_no,
            'warehouse_id'=>$request->warehouse_id,
            'dealer_demand_check_out_no'=>$request->dealer_demand_check_out_no,
            'approve_qty'=>($request->approve_qty[$key])?? 0,
            'painding_qty'=>($request->approve_qty[$key])?? 0,
            'products_id'=>$request->products_id[$key]);
            Ddl_check_out::insert($data);
        }
        return redirect()->route('demandletter.index')
                        ->with('success','Demand Checkout Successfull');
    }

    public function test(Request $request)
    {
        dd($request);
    }
}
