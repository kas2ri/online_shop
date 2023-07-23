@extends('layouts.base')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Update Member</div>

                    <div class="card-body">
                        <form action="{{ url('/members/update/'.$product->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="inputEmail4">Title*</label>
                                    <input type="text" name="title" class="form-control" id="inputEmail4"
                                        placeholder="Tile" value="{{$product->title}}" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputPassword4">Subject*</label>
                                    <select class="form-control" name="subject" required>
                                        @foreach ($subjects as $subject)
                                            <option value="{{ $subject->id }}" {{$product->subject == $subject->id ? 'selected' : ''}}>{{ $subject->name }}</option>
                                        @endforeach

                                    </select>

                                </div>
                            </div>
                            <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputAddress">Description</label>
                                <textarea class="form-control" name="description">{{$product->description}}</textarea>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputPassword4">Lesson*</label>
                                <select class="form-control" name="lesson" required>
                                    @foreach ($lessons as $lesson)
                                        <option value="{{ $lesson->id }}" {{$product->lesson == $lesson->id ? 'selected' : ''}}>{{ $lesson->name }}</option>
                                    @endforeach

                                </select>
                            </div>
                            </div>


                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="inputCity">Price*</label>
                                    <input type="number" name="price" value="{{$product->price}}" class="form-control" id="inputCity" required>
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="inputZip">Available QTY</label>
                                    <input type="number" name="qty" value="{{$product->qty}}" min="0" class="form-control" id="inputZip">
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


                            <button type="submit" class="btn btn-primary">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection
