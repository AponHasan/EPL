<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DealerType;

class DealerTypeController extends Controller
{
    public function getCreate()
    {
        $dealertype = DealerType::orderBy('id','desc')->get();
        return view('DealerSettings.DealerType.create')->with('dealertype',$dealertype);
    }

    public function postCreate(Request $request)
    {
        // dd($request);
        $dealerType = new DealerType;
        $dealerType->type_title = $request->type_title;
        $dealerType->type_description = $request->type_description;
        // dd($dealerType);
        $dealerType->save();
        return redirect()->route('dealersettings.type.create')
                        ->with('success', 'Dealer type Create  successfully .');
    }

    public function update(Request $request, $id)
    {  
        // dd($request);
        // DealerType::findOrFail($request->id)->update($request->all());
        $dealerType = DealerType::find($request->id);
        $dealerType->type_title = $request->type_title;
        $dealerType->type_description = $request->type_description;
        // dd($dealerType);
        $dealerType->save();
        return redirect()->route('dealersettings.type.create')
                        ->with('success', 'Dealer type Update  successfully .');
    }

    public function destroy(Request $request, $id)
    {
        DealerType::findOrFail($request->id)->Delete($request->all());
        return redirect()->route('dealersettings.type.create')
                        ->with('delete', 'Dealer Type Delete  Successfully .');
    }
}
