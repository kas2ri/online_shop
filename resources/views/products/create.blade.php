@extends('layouts.base')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Create Product</div>

                <div class="card-body">
           <form>
                <div class="form-row">
                    <div class="form-group col-md-6">
                    <label for="inputEmail4">Title*</label>
                    <input type="text" name="title" class="form-control" id="inputEmail4" placeholder="Tile" required>
                    </div>
                    <div class="form-group col-md-6">
                    <label for="inputPassword4">Cateory*</label>
                    <select class="form-control" name="category" required>
                        @foreach ($categories as $category)
                        <option value="{{$category->id}}">{{$category->name}}</option>

                        @endforeach

                    </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputAddress">Description</label>
                   <textarea class="form-control" name="description"></textarea>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-6">
                    <label for="inputCity">Price*</label>
                    <input type="number" name="price" class="form-control" id="inputCity" required>
                    </div>

                    <div class="form-group col-md-6">
                    <label for="inputZip">Weight</label>
                    <input type="text" name="weight" class="form-control" id="inputZip">
                    </div>
                </div>
                    <div class="form-row">
                    <div class="form-group col-md-12">
                    <label for="inputCity">Hero Image*</label>
                        <div class="custom-file">
                        <input type="file" name="hero_image" class="custom-file-input" id="customFile" required>
                        <label class="custom-file-label" for="customFile">Choose file</label>
                        </div>
                    </div>


                </div>
                   <div class="form-row">
                    <div class="form-group col-md-12">
                    <label for="inputCity">Image 1</label>
                        <div class="custom-file">
                        <input type="file" name="image1" class="custom-file-input" id="customFile">
                        <label class="custom-file-label" for="customFile">Choose file</label>
                        </div>
                    </div>


                </div>
                   <div class="form-row">
                    <div class="form-group col-md-12">
                    <label for="inputCity">Image 2</label>
                        <div class="custom-file">
                        <input type="file" name="image2" class="custom-file-input" id="customFile">
                        <label class="custom-file-label" for="customFile">Choose file</label>
                        </div>
                    </div>


                </div>
                   <div class="form-row">
                    <div class="form-group col-md-12">
                    <label for="inputCity">Image 3</label>
                        <div class="custom-file">
                        <input type="file" name="image3" class="custom-file-input" id="customFile">
                        <label class="custom-file-label" for="customFile">Choose file</label>
                        </div>
                    </div>


                </div>
                   <div class="form-row">
                    <div class="form-group col-md-12">
                    <label for="inputCity">Image 4</label>
                        <div class="custom-file">
                        <input type="file" name="image4" class="custom-file-input" id="customFile">
                        <label class="custom-file-label" for="customFile">Choose file</label>
                        </div>
                    </div>


                </div>

                <button type="submit" class="btn btn-primary">Sign in</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
