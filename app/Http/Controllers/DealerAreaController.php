<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\DealerArea;

class DealerAreaController extends Controller
{
    public function getCreate()
    {
        
        $dealerarea = DealerArea::orderBy('id','desc')->get();
        return view('DealerSettings.DealerArea.create')->with('dealerarea',$dealerarea);
    }

    public function postCreate(Request $request)
    {
        // dd($request);
        $dealerArea = new DealerArea;
        $dealerArea->area_title = $request->area_title;
        $dealerArea->area_description = $request->area_description;
        // dd($dealerType);
        $dealerArea->save();
        return redirect()->route('dealersettings.area.create')
                        ->with('success', 'Dealer Area Create  successfully .');
    }

    public function update(Request $request, $id)
    {  
        // dd($request);
        // DealerType::findOrFail($request->id)->update($request->all());
        $dealerArea = DealerArea::find($request->id);
        $dealerArea->area_title = $request->area_title;
        $dealerArea->area_description = $request->area_description;
        // dd($dealerType);
        $dealerArea->save();
        return redirect()->route('dealersettings.area.create')
                        ->with('success', 'Dealer Area Update  successfully .');
    }

    public function destroy(Request $request, $id)
    {
        DealerArea::findOrFail($request->id)->Delete($request->all());
        return redirect()->route('dealersettings.area.create')
                        ->with('delete', 'Dealer Area Delete  Successfully .');
    }
}
