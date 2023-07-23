@extends('layouts.site')
@section('content')
<!-- Cart Start -->
<div class="container-fluid pt-5">
    <div class="row px-xl-5">
        <div class="col-lg-8 table-responsive mb-5">
            <table class="table table-bordered text-center mb-0">
                <thead class="bg-secondary text-dark">
                    <tr>
                        <th>Products</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Total</th>
                        <th>Remove</th>
                    </tr>
                </thead>
                <tbody class="align-middle">
                    @foreach ($items as $item)


                    <tr>
                        <td class="align-middle">{{$item->name}}</td>
                        <td class="align-middle">LKR {{number_format($item->price,2)}}</td>
                        <td class="align-middle">
                            <div class="input-group quantity mx-auto" style="width: 100px;">
                                <div class="input-group-btn">
                                    <button class="btn btn-sm btn-primary btn-minus" onclick="minusCart({{$item->id}})">
                                    <i class="fa fa-minus"></i>
                                    </button>
                                </div>
                                <input type="text" class="form-control form-control-sm bg-secondary text-center" style="height: 30px;"  id="itemCount{{$item->id}}" value="{{$item->quantity}}">
                                <div class="input-group-btn">
                                    <button class="btn btn-sm btn-primary btn-plus" onclick="addCart({{$item->id}})">
                                        <i class="fa fa-plus"></i>
                                    </button>
                                </div>
                            </div>
                        </td>
                        @php
                            $item_total = (int)$item->quantity*(int)$item->price;
                        @endphp
                        <td class="align-middle" id="itemTotal{{$item->id}}">LKR {{number_format($item_total,2)}}</td>
                        <td class="align-middle"><a class="btn btn-sm btn-primary" href="{{url('/remove-cart/'.$item->id)}}"><i class="fa fa-times"></i></a></td>
                    </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
        <div class="col-lg-4">
            {{--  <form class="mb-5" action="">
                <div class="input-group">
                    <input type="text" class="form-control p-4" placeholder="Coupon Code">
                    <div class="input-group-append">
                        <button class="btn btn-primary">Apply Coupon</button>
                    </div>
                </div>
            </form>  --}}
            @php
                $cart_total=\Cart::getTotal();
            @endphp
            <div class="card border-secondary mb-5">
                <div class="card-header bg-secondary border-0">
                    <h4 class="font-weight-semi-bold m-0">Cart Summary</h4>
                </div>
                <div class="card-body">
                    <div class="d-flex justify-content-between mb-3 pt-1">
                        <h6 class="font-weight-medium">Subtotal</h6>
                        <h6 class="font-weight-medium" id="cart_subtotal">LKR {{number_format($cart_total,2)}}</h6>
                    </div>

                </div>
                <div class="card-footer border-secondary bg-transparent">
                    <div class="d-flex justify-content-between mt-2">
                        <h5 class="font-weight-bold">Total</h5>
                        <h5 class="font-weight-bold" id="cart_total">LKR {{number_format($cart_total,2)}}</h5>
                    </div>
                    <a class="btn btn-block btn-primary my-3 py-3" href="{{url('order-checkout')}}">Proceed To Checkout</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
<script>
    function addCart(id){
        var qty= document.getElementById("itemCount"+id).value;
        var CartType = 'add';
        console.log(qty);
        $.ajax('/update-cart', {
            type: 'POST',  // http method
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: { product_id: id,quantity:qty,CartType:CartType },  // data to submit
            success: function (data, status, xhr) {
                console.log(data.cart_total);
                document.getElementById("cart_subtotal").innerHTML='LKR '+data.cart_total;
                document.getElementById("cart_total").innerHTML='LKR '+data.cart_total;
                document.getElementById("itemTotal"+id).innerHTML='LKR '+data.item_total;


            },
            error: function (jqXhr, textStatus, errorMessage) {

            }
        })
    }
    function minusCart(id){
        var qty= document.getElementById("itemCount"+id).value;
        var CartType = 'minus';
        console.log(qty);
        $.ajax('/update-cart', {
            type: 'POST',  // http method
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: { product_id: id,quantity:qty,CartType:CartType },  // data to submit
            success: function (data, status, xhr) {
                console.log(data);
                document.getElementById("cart_subtotal").innerHTML='LKR '+data.cart_total;
                document.getElementById("cart_total").innerHTML='LKR '+data.cart_total;
                document.getElementById("itemTotal"+id).innerHTML='LKR '+data.item_total;


            },
            error: function (jqXhr, textStatus, errorMessage) {

            }
        })
    }
</script>
