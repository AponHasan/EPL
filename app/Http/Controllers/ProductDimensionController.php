<?php

namespace App\Http\Controllers;

use App\Product_dimension;
use Illuminate\Http\Request;

class ProductDimensionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $product_dimensions = Product_dimension::latest('id')->get();
        return view('Product_Settings.Product_dimension.create',compact('product_dimensions'));
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
        $product_dimensions = new Product_dimension;
        $product_dimensions->dimensions_title = $request->dimensions_title;
        $product_dimensions->dimensions_description = $request->dimensions_description;
        $product_dimensions-> save();
        return redirect()->Route('productdimensions.create')->with('success','Products Dimention Set Successfull');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product_dimension  $product_dimension
     * @return \Illuminate\Http\Response
     */
    public function show(Product_dimension $product_dimension)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product_dimension  $product_dimension
     * @return \Illuminate\Http\Response
     */
    public function edit(Product_dimension $product_dimension)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product_dimension  $product_dimension
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product_dimension $product_dimension)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product_dimension  $product_dimension
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product_dimension $product_dimension)
    {
        //
    }
}
