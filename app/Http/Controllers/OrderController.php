<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    //
    public function allOrdrs(){
        $orders = Order::all();
     
        return view('orders.all_order',compact('orders'));
    }
}
