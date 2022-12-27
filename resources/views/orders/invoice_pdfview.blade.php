<html>

<head>
    <style type="text/css">
        * {
            font-size: 0.8rem;
        }

        table tr {
            border: 1px solid black !important;
        }

        hr {
            color: #ececec
        }

        tr {
            line-height: 12px;
            min-height: 12px;
            height: 12px;
        }

        .qr_section {
            display: inline;
            width: 100%;
            height: auto;
            padding: 5px;
        }

        .qr_text {
            display: inline-block;
            width: 200px;
            padding: 5px;
        }

        .barcode {
            display: inline-block;
            width: 100px;
            padding: 5px;
            float: right;
        }
    </style>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
</head>

<body>

    <div class="">

        <!-- <hr/> -->
        <p id="reduce-font-size" style="float: right; text-align: left; margin: 0;">

            Order No : {{ $order['order_name'] }}<br />
            Date : {{ date('Y-m-d') }}<br />
        </p>

        <div>
            <strong style="font-size: 2rem;">

            </strong><br /><br />

        </div>

        <hr />
        <h5> Item Details</h5>

        <table class="table table-bordered">
            <thead style="border:1px solid black">
                <tr>
                    <th style="width:5%;">#</th>
                    <th style="width:10%;">Quantity</th>
                    <th style="border-left:unset;">Item</th>

                        <th style="width:12%;">Unit Price</th>

                        <th style="width:12%;">Price</th>

                </tr>
            </thead>
            <tbody>
                @php
                    $count = 1;
                @endphp
                @foreach ($items as $line_item)
                    <tr>
                        <td>
                            {{ $count }}
                            @php
                                $count++;

                            @endphp
                        </td>
                        <td>{{ $line_item['quantity'] }} x</td>
                        <td>{{ $line_item['title'] }}</td>

                            <td>Rs. {{ number_format($line_item['price'], 2) }}</td>
                            <td>Rs. {{ number_format($line_item['total'], 2) }}</td>



                    </tr>
                @endforeach
            </tbody>
        </table>


        <hr />
        @if ($order['gift'] != 1)



            <table class="table" id="payment-table" style=" margin: 0 0 1.5em 0; width:100%">



                    <tr>
                        <td>Payment Type:</td>
                        <td>{{ $order['gateway'] }}</td>
                    </tr>

                <tr>
                    <td>Subtotal Price:</td>
                    <td>Rs. {{ number_format($order['subtotal'], 2) }}</td>
                </tr>


                <tr>
                    <td><strong>Shipping:</strong></td>
                    <td><strong>Rs. {{ number_format($order['shipping'], 2) }}</strong></td>
                </tr>
                <tr>
                    <td><strong>Total Price:</strong></td>
                    <td><strong>Rs. {{ number_format($order['total'], 2) }}</strong></td>
                </tr>
                <tr>
                    <td><strong>Total Paid:</strong></td>
                    @if ($order['gateway'] == 'cod')
                        <td><strong>Rs. 0.00</strong></td>
                    @else
                        <td><strong>Rs. {{ number_format($order['total'], 2) }}</strong></td>
                    @endif
                </tr>





            </table>


            <hr />
        @endif
        <h5>Shipping Details</h5>

        <div id="reduce-font-size" style="padding: 1em; border: 1px solid black;">
            {{ $order['first_name'] }} {{ $order['last_name'] }}<br />

                {{ $order['phone'] }}<br />


            {{ $order['address1'] . ' ' . $order['address2'] }}<br />
            {{ $order['city'] }} {{ $order['state'] }}
            {{ $order['zip'] }}<br />

        </div>


        <hr>
        <p id="reduce-font-size">If you have any questions, please send an email to <u>lovebox@gmail.com</u>
            or Call 0764281666</p>
    </div>
    </div>
</body>

</html>
