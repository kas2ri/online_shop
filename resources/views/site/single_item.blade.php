@extends('layouts.site')
<style media="screen">


    .rating {
    display: flex;
    flex-direction: row-reverse;
    justify-content: center;
    }


    .rating > input{ display:none;}

    .rating > label {
    position: relative;
    width: 1.1em;
    font-size: 3vw;
    color: #E564AD;
    cursor: pointer;
    }

    .rating > label::before{
    content: "\2605";
    position: absolute;
    opacity: 0;
    }

    .rating > label:hover:before,
    .rating > label:hover ~ label:before {
    opacity: 1 !important;
    }

    .rating > input:checked ~ label:before{
    opacity:1;
    }

    .rating:hover > input:checked ~ label:before{ opacity: 0.4; }




      </style>
@section('content')
<!-- Shop Detail Start -->
<div class="container-fluid py-5">
    <div class="row px-xl-5">
        <div class="col-lg-5 pb-5">
            <div id="product-carousel" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner border">
                    <div class="carousel-item active">
                        <img class="w-100 h-100" src="{{url('hero_image/'.$product->hero_image)}}" alt="Image">
                    </div>
                    @if ($product->image1 != null)
                    <div class="carousel-item">
                        <img class="w-100 h-100" src="{{url('image1/'.$product->image1)}}" alt="Image">
                    </div>
                    @endif
                    @if ($product->image2 != null)
                    <div class="carousel-item">
                        <img class="w-100 h-100" src="{{url('image2/'.$product->image2)}}" alt="Image">
                    </div>
                    @endif
                    @if ($product->image3 != null)
                    <div class="carousel-item">
                        <img class="w-100 h-100" src="{{url('image3/'.$product->image3)}}" alt="Image">
                    </div>
                    @endif
                    @if ($product->image4 != null)
                    <div class="carousel-item">
                        <img class="w-100 h-100" src="{{url('image4/'.$product->image4)}}" alt="Image">
                    </div>
                    @endif

                </div>
                <a class="carousel-control-prev" href="#product-carousel" data-slide="prev">
                    <i class="fa fa-2x fa-angle-left text-dark"></i>
                </a>
                <a class="carousel-control-next" href="#product-carousel" data-slide="next">
                    <i class="fa fa-2x fa-angle-right text-dark"></i>
                </a>
            </div>
        </div>
        @php
        $reviews = App\Models\Review::where('product_id',$product->id)->where('status',1)->get();
        $total_rate= App\Models\Review::where('product_id',$product->id)->where('status',1)->sum('rate');
        if(sizeOf($reviews)>0){
        $rate_average = (int)$total_rate/sizeOf($reviews);
        }else{
            $rate_average=0;
        }
    @endphp
        <div class="col-lg-7 pb-5">
            <h3 class="font-weight-semi-bold">{{$product->title}}</h3>
            <div class="d-flex mb-3">
                <div class="text-primary mr-2">
                    <small class="{{$rate_average >= 1 ? 'fas' : 'far'}} fa-star"></small>
                    <small class="{{$rate_average >= 2 ? 'fas' : 'far'}} fa-star"></small>
                    <small class="{{$rate_average >= 3 ? 'fas' : 'far'}} fa-star"></small>
                    <small class="{{$rate_average >= 4 ? 'fas' : 'far'}} fa-star"></small>
                    <small class="{{$rate_average >= 5 ? 'fas' : 'far'}} fa-star"></small>
                </div>
                <small class="pt-1">({{sizeOf($reviews)}} Reviews)</small>
            </div>
            <h3 class="font-weight-semi-bold mb-4">LKR {{number_format($product->price,2)}}</h3>

            <p class="mb-4">{{$product->description}}</p>


            <div class="d-flex align-items-center mb-4 pt-2">
                <div class="input-group quantity mr-3" style="width: 130px;">
                    <div class="input-group-btn">
                        <button class="btn btn-primary btn-minus" >
                        <i class="fa fa-minus"></i>
                        </button>
                    </div>
                    <input type="text" class="form-control bg-secondary text-center" value="1" id="singleItemCount">
                    <div class="input-group-btn">
                        <button class="btn btn-primary btn-plus">
                            <i class="fa fa-plus"></i>
                        </button>
                    </div>
                </div>
                <button class="btn btn-primary px-3" onclick="addToCardt({{$product->id}})"><i class="fa fa-shopping-cart mr-1"></i> Add To Cart</button>
            </div>
            {{--  <div class="d-flex pt-2">
                <p class="text-dark font-weight-medium mb-0 mr-2">Share on:</p>
                <div class="d-inline-flex">
                    <a class="text-dark px-2" href="">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a class="text-dark px-2" href="">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a class="text-dark px-2" href="">
                        <i class="fab fa-linkedin-in"></i>
                    </a>
                    <a class="text-dark px-2" href="">
                        <i class="fab fa-pinterest"></i>
                    </a>
                </div>
            </div>  --}}
        </div>
    </div>

    <div class="row px-xl-5">
        <div class="col">
            <div class="nav nav-tabs justify-content-center border-secondary mb-4">
                <a class="nav-item nav-link active" data-toggle="tab" href="#tab-pane-1">Description</a>
                <a class="nav-item nav-link" data-toggle="tab" href="#tab-pane-3">Reviews ({{sizeOf($reviews)}})</a>
            </div>
            <div class="tab-content">
                <div class="tab-pane fade show active" id="tab-pane-1">
                    <h4 class="mb-3">Product Description</h4>
                    <p>{{$product->description}}</p>
                </div>


                <div class="tab-pane fade" id="tab-pane-3">
                    <div class="row">
                        <div class="col-md-6">
                            <h4 class="mb-4">{{sizeOf($reviews)}} review for {{$product->title}}</h4>
                            <div class="media mb-4">
                                <div class="media-body">
                                    @foreach ($reviews as $review)


                                    <h6><small>{{$review->name}} - <i>{{$review->created_at}}</i></small></h6>
                                    <div class="text-primary mb-2">
                                        <i class="{{$review->rate >= 1 ? 'fas' : 'far'}} fa-star"></i>
                                        <i class="{{$review->rate >= 2 ? 'fas' : 'far'}} fa-star"></i>
                                        <i class="{{$review->rate >= 3 ? 'fas' : 'far'}} fa-star"></i>
                                        <i class="{{$review->rate >= 4 ? 'fas' : 'far'}} fa-star"></i>
                                        <i class="{{$review->rate >= 5 ? 'fas' : 'far'}} fa-star"></i>
                                    </div>
                                    <p>{{$review->message}}</p>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <h4 class="mb-4">Leave a review</h4>
                            <small>Your email address will not be published. Required fields are marked *</small>
                            <form action="{{url('/add-review/'.$product->id)}}" method="post">
                                @csrf
                            <div class="d-flex my-3">
                                <p class="mb-0 mr-2">Your Rating * :</p>
                                <div class="rating">

                                    <input type="radio" name="rating" value="5" id="5"><label for="5">☆</label>
                                    <input type="radio" name="rating" value="4" id="4"><label for="4">☆</label>
                                    <input type="radio" name="rating" value="3" id="3"><label for="3">☆</label>
                                    <input type="radio" name="rating" value="2" id="2"><label for="2">☆</label>
                                    <input type="radio" name="rating" value="1" id="1"><label for="1">☆</label>
                                  </div>
                                {{--  <div class="text-primary">
                                    <i class="far fa-star"></i>
                                    <i class="far fa-star"></i>
                                    <i class="far fa-star"></i>
                                    <i class="far fa-star"></i>
                                    <i class="far fa-star"></i>
                                </div>  --}}
                            </div>

                                <div class="form-group">
                                    <label for="message">Your Review *</label>
                                    <textarea id="message" cols="30" rows="5" class="form-control" name="message" required></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="name">Your Name *</label>
                                    <input type="text" class="form-control" id="name" name="name" required>
                                </div>
                                <div class="form-group">
                                    <label for="email">Your Email *</label>
                                    <input type="email" class="form-control" id="email" name="email" required>
                                </div>
                                <div class="form-group mb-0">
                                    <input type="submit" value="Leave Your Review" class="btn btn-primary px-3">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
<script>
    function addToCardt(id){
        var qty= document.getElementById("singleItemCount").value;
        $.ajax('/add-to-cart', {
            type: 'POST',  // http method
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: { product_id: id,quantity:qty },  // data to submit
            success: function (data, status, xhr) {
                document.getElementById("cart_count").innerHTML=data;


            },
            error: function (jqXhr, textStatus, errorMessage) {

            }
        })
    }
</script>

