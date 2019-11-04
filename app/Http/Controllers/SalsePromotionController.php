<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\SalesPromotion;
use App\Dealer;
use App\IncentivePromo;
use DB;

class SalsePromotionController extends Controller
{
    public function index()
    {
        $freequerys = DB::select('SELECT sales_promotions.id,sales_promotions.sales_promotions_title,sales_promotions.sales_promotions_category,sales_promotions.product_id,sales_promotions.s_m_i_target_qty,sales_promotions.s_m_i_qty,sales_promotions.s_m_a_status,products.product_name 
        FROM `sales_promotions`
        LEFT JOIN products ON products.id = sales_promotions.product_id
        WHERE sales_promotions_category ="free"');

        $discquerys = DB::select('SELECT sales_promotions.id,sales_promotions.sales_promotions_title,sales_promotions.sales_promotions_category,sales_promotions.product_id,sales_promotions.s_m_i_d_target_qty,sales_promotions.s_m_i_discount,sales_promotions.s_m_a_status,products.product_name 
        FROM `sales_promotions`
        LEFT JOIN products ON products.id = sales_promotions.product_id
        WHERE sales_promotions_category ="discount"');

        
        return view('Sales_promotion.index',compact('freequerys','discquerys'));
    }
    
    public function statusactive(Request $request)
    {
        // dd($request);
        DB::select('UPDATE sales_promotions
        SET s_m_a_status = 1
        WHERE id="'.$request->s_p_id.'"');
        return back()->with('success','Promotion active now');
    }

    public function statusdeactive(Request $request)
    {
        // dd($request);
        DB::select('UPDATE sales_promotions
        SET s_m_a_status = 0
        WHERE id="'.$request->s_p_id.'"');
        return back()->with('success','Promotion deactive now');
    }

    public function setpromotion()
    {
        $products = Product::latest('id')->get();
        // dd($products);
        $dealers = Dealer::latest('id')->get();
        // dd($dealers);
           return view('Sales_promotion.setpromotion',compact('products','dealers'));
    }

    public function storesetpromotion(Request $request)
    {
        // dd($request);

        $salespromotions = new SalesPromotion;
        $salespromotions->sales_promotions_title    =$request->sales_promotions_title; 
        $salespromotions->sales_promotions_category =$request->sales_promotions_category; 
        $salespromotions->product_id                =$request->product_id; 
        $salespromotions->s_m_i_target_qty          =$request->s_m_i_target_qty; 
        $salespromotions->s_m_i_qty                 =$request->s_m_i_qty; 
        $salespromotions->s_m_i_d_target_qty        =$request->s_m_i_d_target_qty; 
        $salespromotions->s_m_i_discount            =$request->s_m_i_discount; 
        $salespromotions->s_m_tc_target_amount      =$request->s_m_tc_target_amount; 
        $salespromotions->s_m_tc_discount           =$request->s_m_tc_discount; 
        $salespromotions->save();
        return redirect()->Route('promotion.index')->with('success','Sales Promotion Set Successfully');
    }

    public function setincentive()
    {
        // dd($products);
        $dealers = Dealer::latest('id')->get();
        return view ('Sales_promotion.setincentivepromo',compact('products','dealers'));
    }

    public function storesetincentive(Request $request)
    {
        // dd($request);
        $incentivepromo = new IncentivePromo;
        $incentivepromo->sales_promotions_title       =$request->sales_promotions_title;
        $incentivepromo->dealer_id       =$request->dealer_id;
        $incentivepromo->target_amount       =$request->target_amount;
        $incentivepromo->achive_discount       =$request->achive_discount;
        $incentivepromo->fdate       =$request->fdate;
        $incentivepromo->tdate       =$request->tdate;
        $incentivepromo->save();
        return redirect()->Route('index.promotion.incentive')->with('success','Incentive Promotional discount target set successfully');
    }

    public function indexincentive()
    {
        $incentives = DB::select('SELECT incentive_promos.id,incentive_promos.sales_promotions_title,incentive_promos.dealer_id,incentive_promos.target_amount,incentive_promos.achive_discount,incentive_promos.fdate,incentive_promos.tdate,incentive_promos.status,dealers.d_s_name as dealerid
        FROM `incentive_promos`
        LEFT JOIN dealers ON dealers.id = incentive_promos.dealer_id
        ORDER BY id DESC');
        return view('Sales_promotion.incentiveindex',compact('incentives'));
    }
}








