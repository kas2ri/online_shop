<?php

namespace App\Http\Controllers;

use App\Models\Distribution;
use Illuminate\Http\Request;

class ProfitDistributionController extends Controller
{
    //
    public function index(){
        $dist = Distribution::first();
        return view('profit.index',compact('dist'));
    }
    public function update(Request $request){
        $dist = Distribution::first();
        $dist->direct_selling = $request->direct_selling;
        $dist->level_2 = $request->level_2;
        $dist->level_3 = $request->level_3;
        $dist->level_4 = $request->level_4;
        $dist->level_5 = $request->level_5;
        $dist->level_6 = $request->level_6;
        $dist->save();
        return back();
    }
}
