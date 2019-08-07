<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Factory;
use App\DealerType;
use App\Company;
use App\Division;
use DB;

class FactoryController extends Controller
{
    public function index()
    {
        $factorys = DB::select('SELECT factories.factory_name,factories.factory_contact_number,factories.factory_address,companies.company_title,dealer_types.type_title,divisions.division_title FROM `factories`
        LEFT JOIN companies on companies.id = factories.factory_company_id
        LEFT JOIN dealer_types ON dealer_types.id = factories.factory_type_id
        LEFT JOIN divisions ON divisions.id = factories.factory_division_id');
        return view('Factory.index',compact('factorys'));
        // dd($factorys);
    }
    public function getcreate()
    {
        $divisions = Division::latest('id')->get();
        $dealertypes = DealerType::latest('id')->get();
        $companys    = Company::latest('id')->get();

        return view('Factory.create',compact('divisions','dealertypes','companys'));
    }
    public function postcreate(Request $request)
    {
        // dd($request);
        $factory = new Factory;
        $factory->factory_name  =   $request->factory_name;
        $factory->factory_company_id  =   $request->factory_company_id;
        $factory->factory_type_id  =   $request->factory_type_id;
        $factory->factory_division_id  =   $request->factory_division_id;
        $factory->factory_contact_number  =   $request->factory_contact_number;
        $factory->factory_address  =   $request->factory_address;
        $factory->save();
        return redirect()->Route('factory.index')->with('success','Factory Create Successfull');
    }
}
