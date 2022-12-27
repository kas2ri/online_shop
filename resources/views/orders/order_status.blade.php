@extends('layouts.base')

@section('content')
<style>
    .container{max-width:1170px; margin:auto;}
img{ max-width:100%;}
.inbox_people {
  background: #f8f8f8 none repeat scroll 0 0;
  float: left;
  overflow: hidden;
  width: 40%; border-right:1px solid #c4c4c4;
}
.inbox_msg {
  border: 1px solid #c4c4c4;
  clear: both;
  overflow: hidden;
}
.top_spac{ margin: 20px 0 0;}


.recent_heading {float: left; width:40%;}
.srch_bar {
  display: inline-block;
  text-align: right;
  width: 60%;
}
.headind_srch{ padding:10px 29px 10px 20px; overflow:hidden; border-bottom:1px solid #c4c4c4;}

.recent_heading h4 {
  color: #05728f;
  font-size: 21px;
  margin: auto;
}
.srch_bar input{ border:1px solid #cdcdcd; border-width:0 0 1px 0; width:80%; padding:2px 0 4px 6px; background:none;}
.srch_bar .input-group-addon button {
  background: rgba(0, 0, 0, 0) none repeat scroll 0 0;
  border: medium none;
  padding: 0;
  color: #707070;
  font-size: 18px;
}
.srch_bar .input-group-addon { margin: 0 0 0 -27px;}

.chat_ib h5{ font-size:15px; color:#464646; margin:0 0 8px 0;}
.chat_ib h5 span{ font-size:13px; float:right;}
.chat_ib p{ font-size:14px; color:#989898; margin:auto}
.chat_img {
  float: left;
  width: 11%;
}
.chat_ib {
  float: left;
  padding: 0 0 0 15px;
  width: 88%;
}

.chat_people{ overflow:hidden; clear:both;}
.chat_list {
  border-bottom: 1px solid #c4c4c4;
  margin: 0;
  padding: 18px 16px 10px;
}
.inbox_chat { height: 550px; overflow-y: scroll;}

.active_chat{ background:#ebebeb;}

.incoming_msg_img {
  display: inline-block;
  width: 6%;
}
.received_msg {
  display: inline-block;
  padding: 0 0 0 10px;
  vertical-align: top;
  width: 92%;
 }
 .received_withd_msg p {
  background: #ebebeb none repeat scroll 0 0;
  border-radius: 3px;
  color: #646464;
  font-size: 14px;
  margin: 0;
  padding: 5px 10px 5px 12px;
  width: 100%;
}
.time_date {
  color: #747474;
  display: block;
  font-size: 12px;
  margin: 8px 0 0;
}
.received_withd_msg { width: 100%;}
.mesgs {
  float: left;
  padding: 30px 15px 0 25px;
  width: 100%;
}

 .sent_msg p {
  background: #05728f none repeat scroll 0 0;
  border-radius: 3px;
  font-size: 14px;
  margin: 0; color:#fff;
  padding: 5px 10px 5px 12px;
  width:100%;
}
.outgoing_msg{ overflow:hidden; margin:0px 0 26px;}
.sent_msg {
  /* float: right; */
  width: 100%;
}
.input_msg_write input {
  background: rgba(0, 0, 0, 0) none repeat scroll 0 0;
  border: medium none;
  color: #4c4c4c;
  font-size: 15px;
  min-height: 48px;
  width: 100%;
}

.type_msg {border-top: 1px solid #c4c4c4;position: relative;}
.msg_send_btn {
  background: #05728f none repeat scroll 0 0;
  border: medium none;
  border-radius: 50%;
  color: #fff;
  cursor: pointer;
  font-size: 17px;
  height: 33px;
  position: absolute;
  right: 0;
  top: 11px;
  width: 33px;
}
.messaging { padding: 0 0 50px 0;}
.msg_history {
  height: 516px;
  overflow-y: auto;
}
</style>
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


                                            <button type="button" class="btn btn-primary" data-toggle="modal"
                                                data-target="#exampleModalCenter{{ $order->id }}">
                                                Mark as Delivered
                                            </button>

                                            <!-- Modal -->
                                            <div class="modal fade" id="exampleModalCenter{{ $order->id }}"
                                                tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
                                                aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLongTitle">Mark As Delivered</h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <form action="{{url('orders-status-mark')}}">
                                                        <div class="modal-body">
                                                          @if($order->payment_status == 'pending')
                                                          <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" value="" required>
                                                            <label class="form-check-label" for="defaultCheck1" >
                                                              Payment  Recieved
                                                            </label>
                                                          </div>
                                                          @endif
                                                          Do you want to mark this  order as delivered?
                                                          <input type="hidden" name="status" value="delivered">
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-dismiss="modal">No</button>
                                                            <button type="submit"
                                                                class="btn btn-primary">Yes</button>
                                                        </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            <button type="button" class="btn btn-danger" data-toggle="modal"
                                            data-target="#exampleModalCenter2{{ $order->id }}">
                                            Return
                                        </button>

                                        <!-- Modal -->
                                        <div class="modal fade" id="exampleModalCenter2{{ $order->id }}"
                                            tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
                                            aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLongTitle">Mark As Returned</h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <form action="{{url('orders-status-mark/'.$order->id)}}">
                                                    <div class="modal-body">
                                                      @if($order->payment_status == 'paid')
                                                      <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="" required>
                                                        <label class="form-check-label" for="defaultCheck1" >
                                                          Payment  Returned
                                                        </label>
                                                      </div>
                                                      @endif
                                                      <div class="form-group">
                                                        <label for="exampleFormControlTextarea1">Reason</label>
                                                        <textarea class="form-control" id="exampleFormControlTextarea1" name="reason" rows="3" required></textarea>
                                                      </div>
                                                      Do you want to mark this  order as returned?
                                                      <input type="hidden" name="status" value="returned">
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">No</button>
                                                        <button type="submit"
                                                            class="btn btn-primary">Yes</button>
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
