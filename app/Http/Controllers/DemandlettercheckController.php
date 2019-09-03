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
        $demandcol = DB::select('SELECT dealer_demands.id,dealer_demands.date,dealer_demands.dealer_id,dealer_demands.products_id,dealer_demands.dp_price,dealer_demands.qty,dealer_demands.p_cost,dealer_demands.p_dsc,dealer_demands.dealer_demand_no,dealers.d_s_name,products.product_name,products.product_dealer_commision,dealer_demands.demand_hold_status,dealer_demands.demand_approve_status from dealer_demands LEFT JOIN dealers ON dealers.id = dealer_demands.dealer_id LEFT JOIN products ON products.id = dealer_demands.products_id WHERE dealer_demand_no="'.$id.'"');
        // dd($demandcol);
        return view('Demand_Letter.Epl_demand_check.create',compact('demandcol'));
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
        $ddl_check_out = new Ddl_check_out;
        $ddl_check_out->demand_id = $request->demand_id;
        $ddl_check_out->dealer_id = $request->dealer_id;
        $ddl_check_out->products_id = $request->products_id;
        $ddl_check_out->dealer_demand_no = $request->dealer_demand_no;
        $ddl_check_out->approve_qty = $request->approve_qty;
        $ddl_check_out->save();
        return ('ok');
        // return redirect()->route('department.index')
        //                 ->with('success','Departmemnt Create Successfull');
    }
}
