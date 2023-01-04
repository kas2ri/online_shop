@extends('layouts.site')
@section('carousel')
<div id="header-carousel" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
        <div class="carousel-item active" style="height: 410px;">
            <img class="img-fluid" src="{{url('site/img/01.jpg')}}" alt="Image">
          
        </div>
        <div class="carousel-item" style="height: 410px;">
            <img class="img-fluid" src="{{url('site/img/02.jpg')}}" alt="Image">

        </div>
    </div>
    <a class="carousel-control-prev" href="#header-carousel" data-slide="prev">
        <div class="btn btn-dark" style="width: 45px; height: 45px;">
            <span class="carousel-control-prev-icon mb-n2"></span>
        </div>
    </a>
    <a class="carousel-control-next" href="#header-carousel" data-slide="next">
        <div class="btn btn-dark" style="width: 45px; height: 45px;">
            <span class="carousel-control-next-icon mb-n2"></span>
        </div>
    </a>
</div>
@endsection

@section('content')
<div class="container-fluid pt-5">
    <div class="text-center mb-4">
        <h2 class="section-title px-5"><span class="px-2">Trandy Products</span></h2>
    </div>
    <div class="row px-xl-5 pb-3">
        @foreach ($products as $product)


        <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
            <div class="card product-item border-0 mb-4">
                <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                    <img class="img-fluid w-100" src="{{url('hero_image/'.$product->hero_image)}}" alt="">
                </div>
                <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                    <h6 class="text-truncate mb-3">{{$product->title}}</h6>
                    <div class="d-flex justify-content-center">
                        <h6>LKR{{number_format($product->price,2)}}</h6>
                    </div>
                </div>
                <div class="card-footer d-flex justify-content-between bg-light border">
                    <a href="{{url('view-single-item/'.$product->id)}}" class="btn btn-sm text-dark p-0"><i class="fas fa-eye text-primary mr-1"></i>View Detail</a>
                    <a  class="btn btn-sm text-dark p-0" onclick="addToCardt({{$product->id}})"><i class="fas fa-shopping-cart text-primary mr-1"></i>Add To Cart</a>
                </div>
            </div>
        </div>
        @endforeach
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
