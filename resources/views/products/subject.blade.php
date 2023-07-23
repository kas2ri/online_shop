@extends('layouts.base')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Create Subject</div>

                    <div class="card-body">
                        <form method="POST" action="{{url('products/subject-save')}}">
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
                    <div class="card-header">Subjects</div>

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
                                @foreach ($subjects as $subject)


                              <tr>
                                <th scope="row">{{$subject->id}}</th>
                                <td>{{$subject->name}}</td>
                                <td>
                                    @if($subject->status == 0)
                                    <a href="{{('/products/subject-deactivate/'.$subject->id)}}" class="btn btn-danger btn-sm">Deactivate</a>
                                    @else
                                    <a href="{{('/products/subject-activate/'.$subject->id)}}" class="btn btn-primary btn-sm">Activate</a>
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
