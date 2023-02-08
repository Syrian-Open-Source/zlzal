<?php

namespace App\Http\Controllers;

use App\Enums\CaseType;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index(){
        $case_types =  CaseType::getInstances();
        return view('index', compact('case_types'));
    }
}
