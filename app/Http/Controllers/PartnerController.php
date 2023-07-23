<?php

namespace App\Http\Controllers;

use App\Models\Partner;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PartnerController extends Controller
{
    //

    public function joinShop($id){
        $user = User::where('url_key',$id)->first();
        if($user){
            $provinces = DB::table('provinces')->get();
            $districts = DB::table('districts')->get();
            $cities = DB::table('cities')->get();
            return view('site.partner.register',compact('user','provinces','districts','cities'));

        }else{
            return back()->with('error','Invalid URL');

        }
    }
    public function myAccount(){
        $user = Auth::user();
        $partner = Partner::where('email',$user->email)->first();
        $provinces = DB::table('provinces')->get();
        $districts = DB::table('districts')->get();
        $cities = DB::table('cities')->get();
        return view('site.partner.my_account',compact('user','provinces','districts','cities','partner'));

    }
    public function storePartner(Request $request){
        $partner = new Partner();
        $partner->name = $request->name;
        $partner->parent_id = $request->parent_id;
        $partner->email = $request->email;
        $partner->phone1 = $request->phone1;
        $partner->phone2 = $request->phone2;
        $partner->id_number = $request->id_number;
        $partner->province = $request->province;
        $partner->district = $request->district;
        $partner->city = $request->city;
        $partner->password = $request->password;
        $partner->save();
        return back()->with('success','Join Requested, Admin will review the request');
    }
}
