@extends('layouts.site')
@section('content')
<div class="container-fluid">
    <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4"><span class="bg-secondary pr-3">My Account</span></h2>
    <div class="row mt-4 mb-4">
        <div class="col-lg-5 col-xl-3">
            <div class="card m-b-30">
                <div class="card-header">
                    <h5 class="card-box"></h5>
                </div>
                <div class="card-body">


                    <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">

                        <a class="nav-link mb-2 show active" data-toggle="pill" href="#v-pills-profile" role="tab"
                            aria-selected="true"><i class="feather icon-grid mr-2"></i>My Profile</a>


                        <a class="nav-link mb-2" id="v-pills-wishlist-account" data-toggle="pill"
                            href="#v-pills-account" role="tab" aria-controls="v-pills-account"
                            aria-selected="false"><i class="feather icon-book-open mr-2"></i>Account Info</a>

                        <a class="nav-link mb-2" id="v-pills-wallet-orders" data-toggle="pill"
                            href="#v-pills-orders" role="tab" aria-controls="v-pills-orders"
                            aria-selected="true"><i class="feather icon-credit-card mr-2"></i>My Orders</a>


                        <a class="nav-link mb-2" id="v-pills-earnings-tab" data-toggle="pill" href="#v-pills-earnings"
                            role="tab" aria-controls="v-pills-earnings" aria-selected="false"><i
                                class="feather icon-bell mr-2"></i>My Earnings</a>





                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-7 col-xl-9">
            <div class="tab-content" id="v-pills-tabContent">


                <div class="tab-pane fade show active" id="v-pills-profile" role="tabpanel">
                    <div class="row">
                        <h3>Profile</h3>



                    </div>

                </div>


                <!-- My Addresses End -->
                <!-- My Wishlist Start -->
                <div class="tab-pane fade" id="v-pills-account" role="tabpanel"
                    aria-labelledby="v-pills-account-tab">
                    <div class="row">
                        <h3>Account</h3>
                        <div class="card">
                            <div class="card-body">
                                <div class="row">



                                </div>

                            </div>

                        </div>


                    </div>
                </div>
                <!-- My Wishlist End -->
                <!-- My Wallet Start -->
                <div class="tab-pane fade" id="v-pills-orders" role="tabpanel"
                    aria-labelledby="v-pills-orders-tab">
                    <div class="row">
                        <h3>Consignee</h3>
                        <div class="card">
                            <div class="card-body">
                                <div class="row">



                                </div>

                            </div>

                        </div>


                    </div>
                </div>
                <div class="tab-pane fade" id="v-pills-earnings" role="tabpanel"
                    aria-labelledby="v-pills-earnings-tab">
                    <div class="row mt-4 mb-4">
                        <div class="col-md-12">
                            <div class="row">


                            </div>
                            <div class="row mt-2 align-items-center">

                            </div>

                        </div>
                    </div>

                </div>


            </div>
        </div>
    </div>

</div>
@endsection
