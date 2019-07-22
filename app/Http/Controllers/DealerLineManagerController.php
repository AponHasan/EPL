<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DealerLineManager;

class DealerLineManagerController extends Controller
{
    public function index()
    {
        $dealerlm = DealerLineManager::orderBy('id','desc')->get();
        // dd($dealerlm);
        return view('DealerSettings.DealerLineManager.index')->with('dealerlm', $dealerlm);
    }

    public function getCreate()
    {
        // $dealerzone = DealerZone::orderBy('id','desc')->get();
        // return view('DealerSettings.DealerZone.create')->with('dealerzone',$dealerzone);
        return view('DealerSettings.DealerLineManager.create');
    }

    public function postCreate(Request $request)
    {
        // dd($request);
        $dealerlm = new DealerLineManager;
        $dealerlm->lm_name = $request->lm_name;
        $dealerlm->lm_nid = $request->lm_nid;
        $dealerlm->lm_phone_number = $request->lm_phone_number;
        $dealerlm->lm_address = $request->lm_address;
        // dd($dealerlm);
        $dealerlm->save();
        return redirect()->route('dealersettings.linemanager.index')
                        ->with('success', 'Line Manager Create  successfully .');
    }
}
