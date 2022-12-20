@extends('layouts.base')

@section('content')
    <div class="container">

        <div class="row justify-content-center mt-4">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Orders</div>

                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                              <tr>
                                <th scope="col">Order Name</th>
                                <th scope="col">Status</th>
                                <th scope="col">SubTotal</th>
                                <th scope="col">Total</th>
                                <th scope="col">Payment Status</th>
                                <th scope="col">Payment Gateway</th>
                                <th scope="col">Action</th>


                              </tr>
                            </thead>
                            <tbody>
                               @foreach ($orders as $order)

                               <tr>
                                <td>{{$order->order_name}}</td>
                                <td>{{$order->status}}</td>
                                <td>{{$order->subtotal}}</td>
                                <td>{{$order->total}}</td>
                                <td>{{$order->payment_status}}</td>
                                <td>{{$order->gateway}}</td>
                                <td></td>
                               </tr>

                               @endforeach
                            </tbody>
                          </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
