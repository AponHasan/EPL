<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use DB;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::latest('id')->get();
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
}
