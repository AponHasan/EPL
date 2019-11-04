<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Imports\depCsvImport;
use App\Imports\DealerCsvImport;
use App\Imports\DealerTypeCsvImport;
use App\Imports\ZoneCsvImport;
use App\Imports\DivisionCsvImport;
use App\Imports\LineManagerCsvImport;
use App\Imports\SpoCsvImport;
use App\Imports\FactoryCsvImport;
use App\Imports\DesignationCsvImport;
use App\Imports\DealerAreaCsvImport;
use App\Imports\StaffCategoryCsvImport;
use App\Imports\ProductCsvImport;
use App\Imports\ProductColorCsvImport;

use Maatwebsite\Excel\Facades\Excel;

class CsvFileController extends Controller
{
    public function index()
    {
        return view('Importcsv.importcsv');
    }

    public function departmentCsvImport()
    {
        Excel::import(new depCsvImport, request()->file('file'));
        return back()->with('success','Department Csv Upload successfully.');
    }

    public function dealerCsvImport()
    {
        Excel::import(new DealerCsvImport, request()->file('file'));
        return back();
    }
    
    public function dealerzoneCsvImport()
    {
        Excel::import(new ZoneCsvImport, request()->file('file'));
        return back();
    }
    public function dealertypeCsvImport()
    {
        Excel::import(new DealerTypeCsvImport, request()->file('file'));
        return back();
    }

    public function dealerdesignationCsvImport()
    {
        Excel::import(new DesignationCsvImport, request()->file('file'));
        return back();
    }

    public function divisionCsvImport()
    {
        Excel::import(new DivisionCsvImport, request()->file('file'));
        return back();
    }

    public function lineManagerCsvImport()
    {
        Excel::import(new LineManagerCsvImport, request()->file('file'));
        return back();
    }

    public function spoCsvImport()
    {
        Excel::import(new SpoCsvImport, request()->file('file'));
        return back();
    }

    public function factoryCsvImport()
    {
        Excel::import(new FactoryCsvImport, request()->file('file'));
        return back();
    }

    public function staffcategoryCsvImport()
    {
        Excel::import(new StaffCategoryCsvImport, request()->file('file'));
        return back();
    }

    public function dealerareaCsvImport()
    {
        Excel::import(new DealerAreaCsvImport, request()->file('file'));
        return back();
    }

    public function productCsvImport()
    {
        Excel::import(new ProductCsvImport, request()->file('file'));
        return back();
    }
}
