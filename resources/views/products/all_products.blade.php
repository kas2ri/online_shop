@extends('layouts.base')

@section('content')
    <div class="container">

        <div class="row justify-content-center mt-4">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Products</div>

                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                              <tr>
                                <th scope="col">#</th>
                                <th scope="col">Image</th>
                                <th scope="col">Title</th>
                                <th scope="col">Category</th>
                                <th scope="col">Price</th>
                                <th scope="col">Action</th>


                              </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $product)


                              <tr>
                                <th scope="row">{{$product->id}}</th>
                                <td>
                                    <img src="{{url('hero_image/'.$product->hero_image)}}" style="width:50px">
                                </td>
                                <td>{{$product->title}}</td>
                                <td>
                                    @php
                                        $category = App\Models\Category::where('id',$product->category)->first();
                                    @endphp
                                    {{$category->name}}
                                </td>
                                <td>{{number_format($product->price,2)}}</td>
                                <td>
                                    @if($product->status == 0)
                                    <a href="{{('/products/deactivate/'.$product->id)}}" class="btn btn-danger btn-sm">Deactivate</a>
                                    @else
                                    <a href="{{('/products/activate/'.$product->id)}}" class="btn btn-primary btn-sm">Activate</a>
                                    @endif
                                    <a href="{{('/products/edit/'.$product->id)}}" class="btn btn-success btn-sm">Edit</a>
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
