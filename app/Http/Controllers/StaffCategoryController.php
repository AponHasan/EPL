<?php

namespace App\Http\Controllers;

use App\StaffCategory;
use Illuminate\Http\Request;

class StaffCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $staffCategorys = StaffCategory::orderBy('id','desc')->get();
        return view('Settings.Staff_Category.create',compact('staffCategorys'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $staffCategorys = new StaffCategory;
        $staffCategorys->staff_cate_title = $request->staff_cate_title;
        $staffCategorys->staff_cate_desccription = $request->staff_cate_desccription;
        $staffCategorys->save();
        return redirect()->route('staffcateory.index')->with('success','Staff Category Create Successful');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\StaffCategory  $staffCategory
     * @return \Illuminate\Http\Response
     */
    public function show(StaffCategory $staffCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\StaffCategory  $staffCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(StaffCategory $staffCategory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\StaffCategory  $staffCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // dd($request);
        $request->validate([
            'staff_cate_title' => 'required',
        ]);
  
        StaffCategory::findOrFail($request->id)->update($request->all());
        return redirect()->route('staffcateory.index')
                        ->with('department', 'Staff Category Update  successfully .');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        StaffCategory::findOrFail($request->id)->Delete($request->all());
        return redirect()->route('staffcateory.index')
                        ->with('delete', 'Staff Category Delete  successfully .');
    }
}
