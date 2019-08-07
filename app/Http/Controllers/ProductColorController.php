<?php

namespace App\Http\Controllers;

use App\Product_color;
use Illuminate\Http\Request;

class ProductColorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product_colors = Product_color::latest('id')->get();
        return view('Product_Settings.Product_Color.create',compact('product_colors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $product_colors = Product_color::latest('id')->get();
        return view('Product_Settings.Product_Color.create',compact('product_colors'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        $product_colors = new Product_color;
        $product_colors->color_title   =$request->color_title ;
        $product_colors->color_description   =$request->color_description ;
        $product_colors->save();
        return redirect()->Route('productcolors.create')->with('success','Color Set Successffull');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product_color  $product_color
     * @return \Illuminate\Http\Response
     */
    public function show(Product_color $product_color)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product_color  $product_color
     * @return \Illuminate\Http\Response
     */
    public function edit(Product_color $product_color)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product_color  $product_color
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product_color $product_color)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product_color  $product_color
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product_color $product_color)
    {
        //
    }
}
