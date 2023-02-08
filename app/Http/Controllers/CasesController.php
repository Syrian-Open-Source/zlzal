<?php

namespace App\Http\Controllers;

use App\Enums\CaseType;
use App\Http\Export\CasesExport;
use App\Models\Cases;
use Illuminate\Http\Request;

class CasesController extends Controller
{

    public function store(Request $request)
    {
        Cases::create($request->all());

        return redirect()->back()->with('success', 'تم تخزين البيانات بنجاح');
    }

    public function map()
    {

        $data = Cases::where('display_on_map', 1)->get();
        $case_types =  CaseType::asTranslatedSelectArray();

        return view('map', compact('data','case_types'));
    }

    public function export()
    {
        return (new CasesExport())->download('result.xlsx');
    }
}