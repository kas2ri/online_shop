<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    //
    public function allOrdrs(){
        $orders = Order::all();

        return view('orders.all_order',compact('orders'));
    }
    public function orderConfime($id){
        Order::where('id',$id)->update(['status'=>'order_confirm']);
        return back();
    }
    public function orderHandover(){
        $orders = Order::where('status','order_confirm')->get();
        return view('orders.order_handover',compact('orders'));

    }
    public function orderComment($id,Request $request){
        $comment = new Comment();
        $comment->order_id = $id;
        $comment->comment = $request->comment;
        $comment->save();
        return back();
    }
}
