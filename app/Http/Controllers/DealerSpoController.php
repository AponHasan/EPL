<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\DealerSpo;

class DealerSpoController extends Controller
{
    public function index()
    {
        $dealerspo = DealerSpo::orderBy('id','desc')->get();
        return view('DealerSettings.DealerSpo.index')->with('dealerspo', $dealerspo);
    }
    public function getCreate()
    {
        // $dealerzone = DealerZone::orderBy('id','desc')->get();
        // return view('DealerSettings.DealerZone.create')->with('dealerzone',$dealerzone);
        return view('DealerSettings.DealerSpo.create');
    }

    public function postCreate(Request $request)
    {
        // dd($re quest);
        $dealerSpo = new DealerSpo;
        $dealerSpo->sop_name = $request->sop_name;
        $dealerSpo->sop_nid = $request->sop_nid;
        $dealerSpo->sop_phone_number = $request->sop_phone_number;
        $dealerSpo->sop_address = $request->sop_address;
        $dealerSpo->save();
        return redirect()->route('dealersettings.spo.index')
                        ->with('success', 'SPO Create  successfully .');
    }
}
