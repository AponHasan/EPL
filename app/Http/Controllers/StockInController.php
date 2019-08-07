<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Stock_in;
use App\Factory; //warehouse
use DB;
class StockInController extends Controller
{
    public function index()
    {
        $stocks = DB::select('SELECT products.product_name,products.product_color,SUM(products.product_dp_price) as product_dp_price,SUM(stock_ins.quantity) as quantity ,SUM(stock_ins.total_cost) as total_cost,factories.factory_name FROM `stock_ins` LEFT JOIN products ON products.id = stock_ins.prouct_id LEFT JOIN factories ON factories.id = stock_ins.factory_id
        GROUP BY products.product_name,products.product_color,factories.factory_name');
        return view('Inventory.Stock_in.index',compact('stocks'));
    }

    public function stock_in_create()
    {
        $products = Product::latest('id')->get();
        $warehouses = Factory::latest('id')->get();
        return view('Inventory.Stock_in.create',compact('products','warehouses'));
    }

    public function stock_in_store(Request $request)
    {
        $today = date("Y-m-d");
        // dd($today);
        $pro = 0;
        if(count($request->prouct_id)>0)
        {
            foreach($request->prouct_id as $key=>$prouct_ids)
            {
                $product=Product::find($request->prouct_id[$key]);
                $stock_ins = new Stock_in;
                $stock_ins->prouct_id = $request->prouct_id[$key];
                $stock_ins->quantity = $request->quantity[$key];
                $stock_ins->factory_id = $request->factory_id[$key];
                $stock_ins->total_cost =$product->product_dp_price*$request->quantity[$key];
                $stock_ins->date = $today;
                $stock_ins->save();
            }
        }
        return redirect()->Route('product.stock.index')->with('success','Item Stock Add Successfully');
       
    }
   

}
