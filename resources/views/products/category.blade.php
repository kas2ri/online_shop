@extends('layouts.base')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Create Category</div>

                    <div class="card-body">
                        <form method="POST" action="{{url('products/category-save')}}">
                            @csrf

                            <div class="form-group">
                                <label for="inputAddress">Name*</label>
                                <input type="text" class="form-control" name="name" requierd>
                            </div>




                            <button type="submit" class="btn btn-primary">Save</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="row justify-content-center mt-4">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Categories</div>

                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                              <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Action</th>

                              </tr>
                            </thead>
                            <tbody>
                                @foreach ($categories as $category)


                              <tr>
                                <th scope="row">{{$category->id}}</th>
                                <td>{{$category->name}}</td>
                                <td>
                                    @if($category->status == 0)
                                    <a href="{{('/products/category-deactivate/'.$category->id)}}" class="btn btn-danger btn-sm">Deactivate</a>
                                    @else
                                    <a href="{{('/products/category-activate/'.$category->id)}}" class="btn btn-primary btn-sm">Activate</a>
                                    @endif
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
