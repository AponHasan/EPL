<?php

namespace App\Http\Controllers;

use App\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companes = Company::orderBy('id','desc')->get();
        return view('Settings.Company.create',compact('companes'));
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
        
        // dd($request);
        $companes = new Company;
        $companes->company_title = $request->company_title;
        $companes->company_desccription = $request->company_desccription;
        $companes->save();
        return redirect()->route('company.index')
                         ->with('success','Compane Create Successfull');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function show(Company $company)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function edit(Company $company)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // dd($request);
        $request->validate([
            'company_title' => 'required',
        ]);
  
        Company::findOrFail($request->id)->update($request->all());
        return redirect()->route('company.index')
                        ->with('success', 'Company Update  successfully .');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        Company::findOrFail($request->id)->Delete($request->all());
        return redirect()->route('company.index')
                        ->with('delete', 'Company Delete  successfully .');
    }
}
