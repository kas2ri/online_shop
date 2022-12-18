@extends('layouts.site')
@section('content')
<!-- Shop Start -->
<div class="container-fluid pt-5">
    <div class="row px-xl-5">
        <!-- Shop Sidebar Start -->

        <!-- Shop Sidebar End -->


        <!-- Shop Product Start -->
        <div class="col-lg-12 col-md-12">
            <div class="row pb-3">
                <div class="col-12 pb-1">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <form action="{{url('items-all')}}" method="GET">
                            <div class="input-group">
                                <input type="text" class="form-control" name="title" value="{{$title}}" placeholder="Search by name">
                                <button type="submit">
                                <div class="input-group-append">
                                    <span class="input-group-text bg-transparent text-primary">
                                        <i class="fa fa-search"></i>
                                    </span>
                                </div>
                                </button>
                            </div>
                        </form>
                        <div class="dropdown ml-4">
                            <button class="btn border dropdown-toggle" type="button" id="triggerId" data-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false">
                                        Sort by
                                    </button>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="triggerId">
                                <a class="dropdown-item" href="#">Latest</a>
                                <a class="dropdown-item" href="#">Popularity</a>
                                <a class="dropdown-item" href="#">Best Rating</a>
                            </div>
                        </div>
                    </div>
                </div>
                @foreach ($products as $product)


                <div class="col-lg-4 col-md-6 col-sm-12 pb-1">
                    <div class="card product-item border-0 mb-4">
                        <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                            <img class="img-fluid w-100" src="{{url('hero_image/'.$product->hero_image)}}" alt="">
                        </div>
                        <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                            <h6 class="text-truncate mb-3">{{$product->title}}</h6>
                            <div class="d-flex justify-content-center">
                                <h6>LKR {{number_format($product->price,2)}}</h6></h6>
                            </div>
                        </div>
                        <div class="card-footer d-flex justify-content-between bg-light border">
                            <a href="" class="btn btn-sm text-dark p-0"><i class="fas fa-eye text-primary mr-1"></i>View Detail</a>
                            <a  class="btn btn-sm text-dark p-0" onclick="addToCardt({{$product->id}})"><i class="fas fa-shopping-cart text-primary mr-1"></i>Add To Cart</a>
                        </div>
                    </div>
                </div>
                @endforeach

                <div class="col-12 pb-1">
                    <nav aria-label="Page navigation" class="pagination justify-content-center mb-3">
                        {{ $products->links("pagination::bootstrap-4") }}
                    </nav>
                </div>
            </div>
        </div>
        <!-- Shop Product End -->
    </div>
</div>
@endsection
<script>
    function addToCardt(id){
        $.ajax('/add-to-cart', {
            type: 'POST',  // http method
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: { product_id: id,quantity:1 },  // data to submit
            success: function (data, status, xhr) {
                document.getElementById("cart_count").innerHTML=data;


            },
            error: function (jqXhr, textStatus, errorMessage) {

            }
        })
    }
</script>
