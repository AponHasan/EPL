<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Factory;
use App\Employee;
use App\Dealer;
use App\Dealer_demand;
use App\Ddl_check_out;
use Auth;
use DB;

class DemandController extends Controller
{
    public function index()
    {   
        $id = Auth::id();
        $emp_id = DB::select('SELECT employees.id FROM `employees` WHERE employees.user_id="'.$id.'"');
        // dd($emp_id[0]->id);
        $authid = $id = Auth::id();
        $dealerid = DB::select('SELECT dealers.id as did FROM dealers
        WHERE dealers.user_id ="'.$authid.'" ');
        // dd($dealerid[0]->did);
        if(Auth::user()->user_role->role_id==1)
        {
            $dealerdemanlist = DB::select('SELECT dealers.d_s_name ,dealer_demands.date,dealer_demands.dealer_demand_no,SUM(dealer_demands.qty) as orderqty, SUM(dealer_demands.p_dsc) as dcommission, SUM(dealer_demands.p_cost) as dproductcost FROM dealer_demands LEFT JOIN dealers ON dealers.id = dealer_demands.dealer_id GROUP BY dealers.d_s_name, dealer_demands.date,dealer_demands.dealer_demand_no');

            return view('Demand_Letter.Dealer_demand.index',compact('dealerdemanlist'));
        }
        elseif(Auth::user()->user_role->role_id==2){

            $dealerdemanlist = DB::select('SELECT dealers.d_s_name ,dealer_demands.date,dealer_demands.dealer_demand_no,SUM(dealer_demands.qty) as orderqty, SUM(dealer_demands.p_dsc) as dcommission, SUM(dealer_demands.p_cost) as dproductcost FROM dealer_demands LEFT JOIN dealers ON dealers.id = dealer_demands.dealer_id where dealer_demands.dealer_id = "'.$dealerid[0]->did.'" GROUP BY dealers.d_s_name, dealer_demands.date,dealer_demands.dealer_demand_no');

        return view('Demand_Letter.Dealer_demand.index',compact('dealerdemanlist'));

        }else{
            $dealerdemanlist = DB::select('SELECT dealers.d_s_name,dealers.dlr_spo_id ,dealer_demands.date,dealer_demands.dealer_demand_no,SUM(dealer_demands.qty) as orderqty, SUM(dealer_demands.p_dsc) as dcommission, SUM(dealer_demands.p_cost) as dproductcost FROM dealer_demands LEFT JOIN dealers ON dealers.id = dealer_demands.dealer_id where dealers.dlr_spo_id = "'.$emp_id[0]->id.'" GROUP BY dealers.d_s_name,dealers.dlr_spo_id, dealer_demands.date,dealer_demands.dealer_demand_no');

            return view('Demand_Letter.Dealer_demand.index',compact('dealerdemanlist'));
        }
        
    }

    public function demandeNumber()
    {
        $demandnumber = DB::select('SELECT dealer_demands.dealer_demand_no FROM `dealer_demands` ORDER BY dealer_demands.id DESC LIMIT 1 ');
        return response($demandnumber);
        
    }
    public function getdlrname($id)
    {
        $dlrname = DB::select('SELECT dealers.d_s_name FROM `dealers` WHERE dealers.id="'.$id.'"');
        return($dlrname);
    }

    public function demandcreate()
    {
        
        if(Auth::user()->user_role->role_id==3)
        {
            $id = Auth::id();
            $emp_id = DB::select('SELECT employees.id FROM `employees` WHERE employees.user_id="'.$id.'"');
            // dd($emp_id[0]->id);
            $dealerlogid = Dealer::latest('id')->where('user_id','=',$id)->get();
            $products = Product::latest('id')->get();
            $dealers = Dealer::latest('id')->get();
            $d_w_spo = Dealer::latest('id')->where('dlr_spo_id','=',$emp_id[0]->id)->get();
            // dd($d_w_spo);
            $factoryes = Factory::latest('id')->get();
            return view('Demand_Letter.Dealer_demand.create',compact('d_w_spo','products','factoryes','dealers','dealerlogid'));
        }else
        {
            $id = Auth::id();
            $dealerlogid = Dealer::latest('id')->where('user_id','=',$id)->get();
            $products = Product::latest('id')->get();
            $dealers = Dealer::latest('id')->get();
            $factoryes = Factory::latest('id')->get();
            return view('Demand_Letter.Dealer_demand.create',compact('products','factoryes','dealers','dealerlogid'));
        }
       
    }

    public function getproductprice($id)
    {
        $pruductprice = DB::select('SELECT products.product_dp_price,products.product_dealer_commision FROM `products` WHERE products.id="'.$id.'"');
        return response($pruductprice);
    }


    public function demandcreatecopy(Request $request)
    {
        if($request->ajax())
        {
            $product     = Product::find($request->pro_id);
            $factories = Factory::find($request->wire_house);
            $dealers = Dealer::find($request->dealer);
            
            $output      = '<tr id="test_row_'.$request->pro_id.'">';
            $output      .= '<input type="hidden" name="products_id[]" value="'.$request->pro_id.'" />';
            $output      .= '<td> '.$product->product_name.' </td>';
            $output      .= '<td class="test-uprice">'.round($request->unit_price).'</td> <input type="hidden" name="dp_price[]" value="'.round($request->unit_price).'" /> ';
            $output      .= '<td class="test-dsc">'.round($request->u_discount).'</td> <input type="hidden" name="u_discount[]" value="'.round($request->u_discount).'" /> ';
            $output      .= '<td class="test-qty">'.$request->qty.'</td> <input type="hidden" name="qty[]" value="'.$request->qty.'" /> ';
            $output     .= '<td class="test-p-dsc">'.round($request->p_dsc).'</td> <input type="hidden" name="p_dsc[]" value="'.round($request->p_dsc).'" /> ';
            $output     .= '<td class="test-price">'.round($request->p_cost).'</td> <input type="hidden" name="p_cost[]" value="'.round($request->p_cost).'" /> ';
            
            $output      .= '<td width="10%">
            <button type ="button" class="btn-remove btn btn-sm btn-danger"  data-testid="'.$request->pro_id.'">
            Delete
            </button>                       
            </td>';
            $output      .= '</tr>';
            echo json_encode($output);
        }
    }
        public function demandgenerate(Request $request)
        {
            // dd($request);
            $dealers = new Dealer;
            $products = new Product;
            $dealer_demands = new Dealer_demand;
            $date = date("Y-m-d");
            foreach ($request->products_id as $key => $product) {

                $data =array('date'=>$date, 'dealer_id'=>$request->dealer_id,'products_id'=>$request->products_id[$key] ,'dp_price'=>round($request->dp_price[$key]),'qty'=>$request->qty[$key],'p_cost'=>round($request->p_cost[$key]),'p_dsc'=>round($request->p_dsc[$key]), 'dealer_demand_no'=>$request->dealer_demand_no,  );


                // $data_dco = array('date'=>$date,'dealer_id'=>$request->dealer_id,'products_id'=>$request->products_id[$key],'qty'=>$request->qty[$key],'dealer_demand_no'=>$request->dealer_demand_no);
                
                
                Dealer_demand::insert($data);
                // Ddl_check_out::insert($data_dco);
            }
            return redirect()->route('demandletter.index')->with('success','');
        }
}
