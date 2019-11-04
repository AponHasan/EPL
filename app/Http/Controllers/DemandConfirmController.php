<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Dealer_demand;
use App\Ddl_check_out;
use App\Factory;
use App\DeliveryConfirm;
use DB;

class DemandConfirmController extends Controller
{
    public function demand_check_list()
    {
        $dealer_lists = DB::select('SELECT dealer_demands.dealer_demand_no,dealers.d_s_name,dealers.d_s_code,dealer_demands.dealer_id FROM `dealer_demands` LEFT JOIN dealers ON dealers.id = dealer_demands.dealer_id GROUP BY dealers.d_s_name,dealer_demands.dealer_id,dealer_demands.dealer_demand_no order by dealer_demands.dealer_demand_no Desc');
        return view('Demand_Letter.Demand_confirm.check_out_list',compact('dealer_lists'));
    }

    public function demand_check_list_confirm(Request $request,$id)
    {
        // dd($id);

        $warehouses =  Factory::latest('id')->get();

        $dealer_ic = $id;
        $check_list = DB::select('SELECT ddl_check_outs.id,ddl_check_outs.dealer_demand_no,ddl_check_outs.demand_id,ddl_check_outs.dealer_demand_check_out_no,ddl_check_outs.dealer_id,dealers.d_s_name,ddl_check_outs.products_id,products.product_name,products.product_code,
        SUM(ddl_check_outs.approve_qty)-SUM(ddl_check_outs.delivery_qty) as approve,SUM(ddl_check_outs.delivery_qty) as delivery FROM `ddl_check_outs`
        LEFT JOIN products ON products.id=ddl_check_outs.products_id
        LEFT JOIN dealers ON dealers.id = ddl_check_outs.dealer_id
        WHERE ddl_check_outs.dealer_demand_no = "'.$id.'"  AND ddl_check_outs.approve_qty != 0
        GROUP BY ddl_check_outs.products_id,ddl_check_outs.id,ddl_check_outs.dealer_demand_check_out_no,ddl_check_outs.dealer_demand_no');

        
        return view('Demand_Letter.Demand_confirm.check_out_list_confirm',compact('check_list','warehouses'));
        // dd($check_list);
    }

    public function check_list_confirm(Request $request)
    {
        // dd($request);
        $date = date("Y-m-d");       

            // $datas= DB::table('ddl_check_outs')->whereIn('id', $request->c_status)->update(array('delivery_status' => 1,'demand_confirm_no' => $request->demand_confirm_no,'demand_confirm_date'=>$date,'track_number'=>$request->track_number)); 
            $dst = 1;
            foreach($request->c_status as $key => $value){ 

                $ddcheckout = Ddl_check_out::find($request->c_status[$key]); 
                $ddcheckout->delivery_status = $dst; 
                $ddcheckout->demand_confirm_no = $request->demand_confirm_no; 
                $ddcheckout->demand_confirm_date = $date; 
                $ddcheckout->track_number =$request->track_number; 
                $ddcheckout->painding_qty =$request->approve_qty[$key]-$request->delivery_quentity[$key]; 
                $ddcheckout->delivery_qty =$request->delivery_quentity[$key]; 
                $ddcheckout->save(); 
          }

            $date = date("Y-m-d");
        foreach ($request->products_id as $key => $deliveryconfirm) {
            $data =array('approve_date'=>$date, 
            'dealer_id'=>$request->dealer_id,
            'ddl_check_outs_id'=>$request->ddl_check_outs_id,
            'demand_id'=>$request->demand_id[$key],
            'delivery_status' => 1,
            'demand_confirm_no'=>$request->demand_confirm_no,
            'track_number'=>$request->track_number,
            'dealer_demand_no'=>$request->dealer_demand_no,
            'dealer_demand_check_out_no'=>$request->dealer_demand_check_out_no,
            'delivery_quentity'=>($request->delivery_quentity[$key])?? 0,
            'products_id'=>$request->products_id[$key]);
            DeliveryConfirm::insert($data);
        }

            return redirect()->route('delivary.challan')
                        ->with('success','Demand Checkout Successfull');

    }
    public function Delarlist(){
        $dealer_lists = DB::select('SELECT dealers.d_s_name,dealer_demands.dealer_id FROM `dealer_demands` LEFT JOIN dealers ON dealers.id = dealer_demands.dealer_id GROUP BY dealers.d_s_name,dealer_demands.dealer_id ');
        return view('Demand_Letter.Demand_confirm.dealer_list',compact('dealer_lists','dealer_list'));
    }

    public function demandconfirmNumber()
    {
       $demand_confirm_number = DB::select('SELECT MAX(ddl_check_outs.demand_confirm_no) as demand_confirm_no FROM ddl_check_outs');
       return response($demand_confirm_number);
    }

    public function demandcheckmNumber()
    {
       $demand_check_no = DB::select('SELECT MAX(ddl_check_outs.dealer_demand_check_out_no) as demand_check_no FROM ddl_check_outs');
       return response($demand_check_no);
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
