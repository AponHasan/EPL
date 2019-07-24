<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\DealerZone;

class DealerZoneController extends Controller
{
    public function getCreate()
    {
        $dealerzone = DealerZone::orderBy('id','desc')->get();
        return view('DealerSettings.DealerZone.create')->with('dealerzone',$dealerzone);
    }

    public function postCreate(Request $request)
    {
        // dd($request);
        $dealerZone = new DealerZone;
        $dealerZone->zone_title = $request->zone_title;
        $dealerZone->zone_description = $request->zone_description;
        $dealerZone->save();
        return redirect()->route('dealersettings.zone.create')
                        ->with('success', 'Dealer zone Create  successfully .');
    }


    public function update(Request $request, $id)
    {  
        // dd($request);
        // DealerType::findOrFail($request->id)->update($request->all());
        $dealerZone = DealerZone::find($request->id);
        $dealerZone->zone_title = $request->zone_title;
        $dealerZone->zone_description = $request->zone_description;
        // dd($dealerType);
        $dealerZone->save();
        return redirect()->route('dealersettings.zone.create')
                        ->with('success', 'Dealer zone Update  successfully .');
    }


    public function destroy(Request $request, $id)
    {
        DealerZone::findOrFail($request->id)->Delete($request->all());
        return redirect()->route('dealersettings.zone.create')
                        ->with('delete', 'Dealer Zone Delete  Successfully .');
    }

}
