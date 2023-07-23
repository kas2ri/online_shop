<?php

namespace App\Http\Controllers;

use App\Models\ParentDetail;
use App\Models\Partner;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
class MemberController extends Controller
{
    //
    public function allMembers(){
        $members = Partner::all();
        return view('members.all_members',compact('members'));

    }
    public function activeMember($id){
        $partner = Partner::where('id',$id)->first();
        $user = User::where('email',$partner->email)->first();
        if($user){
            return back()->with('danger','Email alredy used!');
        }
        $url_key=base64_encode(uniqid());

        $user= User::create([
            'name' => $partner->name,
            'email' => $partner->email,
            'password' => Hash::make($partner->password),
            'role' => 1,
            'url_key'=>$url_key
        ]);
        $parent = new ParentDetail();
        $parent->user_id= $user->id;
        $parent->parent_id= $partner->parent_id;
        $parent->save();
        $partner->status=1;
        $partner->save();
        return back()->with('success','Member created');
    }
}
