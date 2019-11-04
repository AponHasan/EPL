<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use DB;

class ProductController extends Controller
{
    public function index()
    {
        $products = DB::select('SELECT products.id,products.product_name,products.product_code,products.product_dp_price,products.product_dealer_commision, products.product_dimension,products.product_dimension_unit,products.product_weight,products.product_weight_unit,products.product_barcode,products.product_mrp,products.product_color,products.product_description 
        ,sum(stock_ins.quantity) as stock FROM `products` 
                LEFT JOIN stock_ins on stock_ins.prouct_id = products.id
                GROUP BY products.id,products.product_name,products.product_code,products.product_dp_price,products.product_dealer_commision,products.product_dimension,products.product_dimension_unit,products.product_weight,products.product_weight_unit,products.product_barcode,products.product_mrp,products.product_color,products.product_description 
                ORDER BY `products`.`id` DESC');
        return view('Product.index',compact('products'));
    }
    public function create()
    {
        return view('Product.create');
    }

    public function store(Request $request)
    {
        $proucts = new Product;
        $proucts->product_name  = $request->product_name ;
        $proucts->product_code  = $request->product_code ;
        $proucts->product_dimension  = $request->product_dimension ;
        $proucts->product_dimension_unit  = $request->product_dimension_unit ;
        $proucts->product_weight  = $request->product_weight ;
        $proucts->product_weight_unit  = $request->product_weight_unit ;
        $proucts->product_barcode  = $request->product_barcode ;
        $proucts->product_dp_price  = $request->product_dp_price ;
        $proucts->product_dealer_commision  = $request->product_dealer_commision ;
        $proucts->product_mrp  = $request->product_mrp ;
        $proucts->product_color  = $request->product_color ;
        $proucts->product_description  = $request->product_description ;
        
        $proucts->save();
        return redirect()->Route('product.index')->with('success','Product Create Successffull');
    //    dd($request);
    }

    public function getdpprice($id)
    {
        $dpprice = DB::select('SELECT products.product_dp_price FROM `products` WHERE products.id="'.$id.'" ');
        return response($dpprice);
    }

    public function update(Request $request, $id)
    {
        // dd($request);
        $request->validate([
            'product_name' => 'required',
            'product_code' => 'required',
        ]);
  
        Product::findOrFail($request->id)->update($request->all());
        return redirect()->route('product.index')
                        ->with('success', 'Products Update  successfully .');
    }

    public function destroy(Request $request, $id)
    {
        Product::findOrFail($request->id)->Delete($request->all());
        return redirect()->route('product.index')
                        ->with('delete', 'Products Delete  successfully .');
    }
}
