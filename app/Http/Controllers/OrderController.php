<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Laravel\Ui\Presets\React;

class OrderController extends Controller
{
    //
    public function allOrdrs()
    {
        $orders = Order::all();

        return view('orders.all_order', compact('orders'));
    }
    public function orderConfime($id)
    {
        Order::where('id', $id)->update(['status' => 'order_confirm']);
        return back();
    }
    public function orderHandover()
    {
        $orders = Order::where('status', 'order_confirm')->get();
        return view('orders.order_handover', compact('orders'));
    }
    public function orderComment($id, Request $request)
    {
        $comment = new Comment();
        $comment->order_id = $id;
        $comment->comment = $request->comment;
        $comment->save();
        return back();
    }
    public function orderInvoice($id)
    {

        $order = Order::where('id', $id)->first();
        $items = OrderItem::where('order_id', $id)->get();

        $pdf = PDF::loadView('orders.invoice_pdfview', compact('order', 'items'));
        return $pdf->stream();
    }
    public function orderHandoverConfirm($id)
    {
        Order::where('id', $id)->update(['status' => 'order_handover']);
        return back();
    }
    public  function orderStatus()
    {
        $orders = Order::where('status', 'order_handover')->get();
        return view('orders.order_status', compact('orders'));
    }
    public  function orderStatusMark($id, Request $request)
    {
        $order = Order::where('id')->first();
        $order->status = $request->status;
        if ($request->status == 'delivered') {
            $order->payment_status = 'paid';
        }else{
            $order->return_reason = $request->reason;
        }
        $order->save();
        return back();
    }
}
