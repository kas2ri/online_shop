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
                                        <td>{{ $order->order_name }}</td>
                                        <td><span class="badge badge-success">{{ $order->status }}</span></td>
                                        <td>{{ number_format($order->subtotal, 2) }}</td>
                                        <td>{{ number_format($order->total, 2) }}</td>
                                        <td><span class="badge badge-info">{{ $order->payment_status }}</span></td>
                                        <td><span class="badge badge-warning">{{ $order->gateway }}</span></td>
                                        <td>
                                            @if ($order->status == 'pending')
                                                <!-- Button trigger modal -->
                                                <button type="button" class="btn btn-primary" data-toggle="modal"
                                                    data-target="#exampleModalCenter{{ $order->id }}">
                                                    Confirm Package
                                                </button>

                                                <!-- Modal -->
                                                <div class="modal fade" id="exampleModalCenter{{ $order->id }}"
                                                    tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
                                                    aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLongTitle">Items
                                                                </h5>
                                                                <button type="button" class="close" data-dismiss="modal"
                                                                    aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                @php
                                                                    $items = App\Models\OrderItem::where('order_id', $order->id)->get();
                                                                @endphp
                                                                <table class="table table-striped">
                                                                    <thead>
                                                                        <tr>
                                                                            <th scope="col">Name</th>
                                                                            <th scope="col">Price</th>
                                                                            <th scope="col">Quantity</th>
                                                                            <th scope="col">Total</th>



                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        @foreach ($items as $item)
                                                                            <tr>
                                                                                <td>{{ $item->title }}</td>
                                                                                <td>{{ number_format($item->price, 2) }}
                                                                                </td>
                                                                                <td>{{ $item->quantity }}</td>
                                                                                <td>{{ number_format($item->total, 2) }}
                                                                                </td>
                                                                            </tr>
                                                                        @endforeach
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-dismiss="modal">No</button>
                                                                <a type="button"
                                                                    href="{{ url('order-confirm/' . $order->id) }}"
                                                                    class="btn btn-primary">Confirm</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif


                                            <button type="button" class="btn btn-primary" data-toggle="modal"
                                                data-target="#commentModalCenter{{ $order->id }}">
                                                Add Comment
                                            </button>

                                            <!-- Modal -->
                                            <div class="modal fade" id="commentModalCenter{{ $order->id }}"
                                                tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
                                                aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLongTitle">Comment</h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <form action="{{ url('add-comment/' . $order->id) }}" method="POST">
                                                            @csrf
                                                            <div class="modal-body">
                                                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="comment"></textarea>

                                                            </div>

                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-dismiss="modal">No</button>
                                                                <button type="submit" class="btn btn-primary">Add
                                                                    Comment</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>

                                        </td>
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
