@extends('layouts.base')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Create Category</div>

                <div class="card-body">
           <form>
     
                <div class="form-group">
                    <label for="inputAddress">Name*</label>
                   <textarea class="form-control" name="category" requierd></textarea>
                </div>
             
               
                
            
                <button type="submit" class="btn btn-primary">Sign in</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection