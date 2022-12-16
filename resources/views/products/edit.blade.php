@extends('layouts.base')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Update Product</div>

                    <div class="card-body">
                        <form action="{{ url('/products/update/'.$product->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="inputEmail4">Title*</label>
                                    <input type="text" name="title" class="form-control" id="inputEmail4"
                                        placeholder="Tile" value="{{$product->title}}" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputPassword4">Cateory*</label>
                                    <select class="form-control" name="category" required>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}" {{$product->category == $category->id ? 'selected' : ''}}>{{ $category->name }}</option>
                                        @endforeach

                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputAddress">Description</label>
                                <textarea class="form-control" name="description">{{$product->description}}</textarea>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="inputCity">Price*</label>
                                    <input type="number" name="price" value="{{$product->price}}" class="form-control" id="inputCity" required>
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="inputZip">Weight</label>
                                    <input type="text" name="weight" value="{{$product->weight}}" class="form-control" id="inputZip">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-8">
                                    <label for="inputCity">Hero Image*</label>
                                    <div class="custom-file">
                                        <input type="file" name="hero_image" class="custom-file-input" id="customFile"
                                            >
                                        <label class="custom-file-label" for="customFile">Choose file</label>
                                    </div>
                                </div>
                                <div class="form-group col-md-4">
                                    <img src="{{url('hero_image/'.$product->hero_image)}}" style="width:80px">
                                </div>


                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-8">
                                    <label for="inputCity">Image 1</label>
                                    <div class="custom-file">
                                        <input type="file" name="image1" class="custom-file-input" id="customFile">
                                        <label class="custom-file-label" for="customFile">Choose file</label>
                                    </div>
                                </div>
                                @if ($product->image1 != null)
                                <div class="form-group col-md-4">
                                    <img src="{{url('image1/'.$product->image1)}}" style="width:80px">
                                </div>

                                @endif



                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-8">
                                    <label for="inputCity">Image 2</label>
                                    <div class="custom-file">
                                        <input type="file" name="image2" class="custom-file-input" id="customFile">
                                        <label class="custom-file-label" for="customFile">Choose file</label>
                                    </div>
                                </div>
                                @if ($product->image2 != null)
                                <div class="form-group col-md-4">
                                    <img src="{{url('image2/'.$product->image2)}}" style="width:80px">
                                </div>

                                @endif


                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-8">
                                    <label for="inputCity">Image 3</label>
                                    <div class="custom-file">
                                        <input type="file" name="image3" class="custom-file-input" id="customFile">
                                        <label class="custom-file-label" for="customFile">Choose file</label>
                                    </div>
                                </div>

                                @if ($product->image3 != null)
                                <div class="form-group col-md-4">
                                    <img src="{{url('image3/'.$product->image3)}}" style="width:80px">
                                </div>

                                @endif
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-8">
                                    <label for="inputCity">Image 4</label>
                                    <div class="custom-file">
                                        <input type="file" name="image4" class="custom-file-input" id="customFile">
                                        <label class="custom-file-label" for="customFile">Choose file</label>
                                    </div>
                                </div>
                                @if ($product->image4 != null)
                                <div class="form-group col-md-4">
                                    <img src="{{url('image4/'.$product->image4)}}" style="width:80px">
                                </div>

                                @endif

                            </div>

                            <button type="submit" class="btn btn-primary">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection
