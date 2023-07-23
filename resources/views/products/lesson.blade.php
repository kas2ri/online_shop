@extends('layouts.base')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Create Lesson</div>

                    <div class="card-body">
                        <form method="POST" action="{{url('products/lesson-save')}}">
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
                    <div class="card-header">Lessons</div>

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
                                @foreach ($lessons as $lesson)


                              <tr>
                                <th scope="row">{{$lesson->id}}</th>
                                <td>{{$lesson->name}}</td>
                                <td>
                                    @if($lesson->status == 0)
                                    <a href="{{('/products/lesson-deactivate/'.$lesson->id)}}" class="btn btn-danger btn-sm">Deactivate</a>
                                    @else
                                    <a href="{{('/products/lesson-activate/'.$lesson->id)}}" class="btn btn-primary btn-sm">Activate</a>
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
