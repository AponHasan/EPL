<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class ChallanController extends Controller
{
        public function index()
        {
            $delivary_c_n = DB::select('SELECT ddl_check_outs.demand_confirm_no FROM `ddl_check_outs`
            WHERE ddl_check_outs.demand_confirm_no != "null"
            ORDER BY ddl_check_outs.demand_confirm_no DESC LIMIT 1');
            $d_c_n_c = $delivary_c_n[0]->demand_confirm_no;

            $d_challan = DB::select('SELECT ddl_check_outs.date,ddl_check_outs.dealer_id,ddl_check_outs.products_id,ddl_check_outs.approve_date,ddl_check_outs.delivery_qty,ddl_check_outs.dealer_demand_no,ddl_check_outs.demand_confirm_no,ddl_check_outs.demand_delivery_no,ddl_check_outs.dealer_demand_check_out_no,ddl_check_outs.demand_id,ddl_check_outs.delivery_status,ddl_check_outs.warehouse_id,
            dealers.d_s_name,dealers.d_s_code,dealers.dlr_police_station,dealers.dlr_address,dealers.dlr_mobile_no,
            products.product_name,products.product_code,
            factories.factory_name,factories.factory_division_id,factories.factory_contact_number,factories.factory_address,sales_promotions.id as salespid,
            sales_promotions.s_m_i_target_qty,sales_promotions.s_m_i_qty,sales_promotions.s_m_i_d_target_qty,sales_promotions.s_m_i_discount,sales_promotions.s_m_a_status,((ddl_check_outs.delivery_qty/sales_promotions.s_m_i_target_qty)*sales_promotions.s_m_i_qty) as bonus
            
            
            FROM ddl_check_outs
            LEFT JOIN dealers ON dealers.id = ddl_check_outs.dealer_id
            LEFT JOIN products ON products.id = ddl_check_outs.products_id
            LEFT JOIN factories ON factories.id = ddl_check_outs.warehouse_id
            LEFT JOIN sales_promotions ON sales_promotions.product_id = products.id
            
            WHERE ddl_check_outs.demand_confirm_no="'.$d_c_n_c.'" AND ddl_check_outs.delivery_status=1');
            // dd($d_challan);

            $d_qty =  DB::select('SELECT sum(ddl_check_outs.delivery_qty) as total_d_qty,ddl_check_outs.demand_confirm_no,ddl_check_outs.delivery_status
             FROM ddl_check_outs
            
            WHERE ddl_check_outs.demand_confirm_no="'.$d_c_n_c.'" AND ddl_check_outs.delivery_status=1');
                // dd($d_qty[0]->total_d_qty);
            return view('Delivery.delivery_challan',compact('d_challan','d_qty'));
        }
}
