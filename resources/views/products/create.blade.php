@extends('layouts.base')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Create Product</div>

                    <div class="card-body">
                        <form action="{{ url('/products/save') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="inputEmail4">Title*</label>
                                    <input type="text" name="title" class="form-control" id="inputEmail4"
                                        placeholder="Tile" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputPassword4">Subject*</label>
                                    <select class="form-control" name="subject" required>
                                        @foreach ($subjects as $subject)
                                            <option value="{{ $subject->id }}">{{ $subject->name }}</option>
                                        @endforeach

                                    </select>
                                </div>
                            </div>
                            <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputAddress">Description</label>
                                <textarea class="form-control" name="description"></textarea>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputPassword4">Lesson*</label>
                                <select class="form-control" name="lesson" required>
                                    @foreach ($lessons as $lesson)
                                        <option value="{{ $lesson->id }}">{{ $lesson->name }}</option>
                                    @endforeach

                                </select>
                            </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="inputCity">Price*</label>
                                    <input type="number" name="price" class="form-control" id="inputCity" required>
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="inputZip">Available QTY</label>
                                    <input type="number" name="qty" class="form-control" id="inputZip" value="0" min="0">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="inputCity">Hero Image*</label>
                                    <div class="custom-file">
                                        <input type="file" name="hero_image" class="custom-file-input" id="customFile"
                                            required>
                                        <label class="custom-file-label" for="customFile">Choose file</label>
                                    </div>
                                </div>


                            </div>



                            <button type="submit" class="btn btn-primary">Create</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection
