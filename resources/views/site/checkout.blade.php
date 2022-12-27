@extends('layouts.site')
@section('content')
<!-- Checkout Start -->
<div class="container-fluid pt-5">
    <form action="{{url('order-confirm')}}" method="POST">
        @csrf
    <div class="row px-xl-5">
        <div class="col-lg-8">
            <div class="mb-4">
                <h4 class="font-weight-semi-bold mb-4">Billing Address</h4>
                <div class="row">
                    <div class="col-md-6 form-group">
                        <label>First Name</label>
                        <input class="form-control" name="first_name" type="text" placeholder="John" required>
                    </div>
                    <div class="col-md-6 form-group">
                        <label>Last Name</label>
                        <input class="form-control"name="last_name" type="text" placeholder="Doe" required>
                    </div>
                    <div class="col-md-6 form-group">
                        <label>E-mail</label>
                        <input class="form-control" name="email" type="text" placeholder="example@email.com" required>
                    </div>
                    <div class="col-md-6 form-group">
                        <label>Mobile No</label>
                        <input class="form-control" name="phone" type="text" placeholder="+123 456 789" required>
                    </div>
                    <div class="col-md-6 form-group">
                        <label>Address Line 1</label>
                        <input class="form-control" name="address1" type="text" placeholder="123 Street" required>
                    </div>
                    <div class="col-md-6 form-group">
                        <label>Address Line 2</label>
                        <input class="form-control" name="address2" type="text" placeholder="123 Street" required>
                    </div>

                    <div class="col-md-6 form-group">
                        <label>City</label>
                        <input class="form-control" name="city" list="cities" placeholder="New York" id="cities" required>
                        <div id="city_list"></div>
                    </div>
                    <div class="col-md-6 form-group">
                        <label>State</label>
                        <input class="form-control" name="state" type="text" placeholder="New York">
                    </div>
                    <div class="col-md-6 form-group">
                        <label>ZIP Code</label>
                        <input class="form-control" name="zip" type="text" placeholder="123">
                    </div>

                </div>
            </div>

        </div>
        <div class="col-lg-4">
            <div class="card border-secondary mb-5">
                <div class="card-header bg-secondary border-0">
                    <h4 class="font-weight-semi-bold m-0">Order Total</h4>
                </div>
                <div class="card-body">
                    <h5 class="font-weight-medium mb-3">Products</h5>
                    @foreach ($items as $item)
                    @php
                    $itemTotal = \Cart::get($item->id)->getPriceSum();
                    @endphp


                    <div class="d-flex justify-content-between">
                        <p>{{$item->name}} {{$item->quantity}}</p>
                        <p>LKR {{number_format($itemTotal,2)}}</p>
                    </div>
                    @endforeach


                    <hr class="mt-0">
                    <div class="d-flex justify-content-between mb-3 pt-1">
                        <h6 class="font-weight-medium">Subtotal</h6>
                        <h6 class="font-weight-medium">LKR {{number_format($cartTotal,2)}}</h6>
                    </div>
                    <div class="d-flex justify-content-between">
                        <h6 class="font-weight-medium">Shipping</h6>
                        <input type="hidden" name="shipping" id="shipping_value">
                        <h6 class="font-weight-medium" id="shipping_total">0.00</h6>
                    </div>
                    <div class="alert alert-danger" id="date-message" style="display:none" role="alert">
                        This is a danger alert—check it out!
                      </div>
                </div>
                <div class="card-footer border-secondary bg-transparent">
                    <div class="d-flex justify-content-between mt-2">
                        <h5 class="font-weight-bold">Total</h5>
                    <input type="hidden"  id="total_value" value="{{$cartTotal}}">
                        <h5 class="font-weight-bold" id="order_total">LKR {{number_format($cartTotal,2)}}</h5>
                    </div>
                </div>
            </div>
            <div class="card border-secondary mb-5">
                <div class="card-header bg-secondary border-0">
                    <h4 class="font-weight-semi-bold m-0">Payment</h4>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <div class="custom-control custom-radio">
                            <input type="radio" class="custom-control-input" name="payment" id="paypal" value="card" checked>
                            <label class="custom-control-label" for="paypal">Credit Card</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="custom-control custom-radio">
                            <input type="radio" class="custom-control-input" name="payment" id="directcheck" value="cod">
                            <label class="custom-control-label" for="directcheck">Cash On Delivery Check</label>
                        </div>
                    </div>

                </div>
                <div class="card-footer border-secondary bg-transparent">
                    <button class="btn btn-lg btn-block btn-primary font-weight-bold my-3 py-3" type="submit">Place Order</button>
                </div>
            </div>
        </div>
    </div>
</form>
</div>

@endsection
@section('scripts')
<script>
    $(document).ready(function () {
		$('#cities').on('keyup',function() {
			var city = $(this).val();

			$.ajax({

				url:"{{url('/search-city') }}",

				type:"GET",

				data:{'city':city},

				success:function (data) {



					$('#city_list').html(data);
				}
			})
			// end of ajax call
		});
	});
	$(document).on('click', 'li', function(){
		var value = $(this).text();
        var id = $(this).attr('id');
        console.log(id);
        $.ajax({

            url:"{{url('/search-rate') }}",

            type:"GET",

            data:{'id':id},

            success:function (data) {
                console.log(data);
                if(data.found == true){
                document.getElementById("shipping_total").innerHTML='LKR '+data.rate.toFixed(2) ;
                document.getElementById("shipping_value").value=data.rate;
                var old_total =document.getElementById("total_value").value;
                var newTotal = parseFloat(old_total)+parseFloat(data.rate);
                document.getElementById("order_total").innerHTML='LKR '+newTotal.toFixed(2) ;
                document.getElementById("date-message").innerHTML='Your delivery will take '+data.min_days+'-'+data.max_days+' days' ;
                document.getElementById("date-message").style.display='block';
                }

            }
        })

		$('#cities').val(value);
		$('#city_list').html("");

	});
</script>
@endsection
