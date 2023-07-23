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
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Phone Number</th>
                                <th scope="col">ID Number</th>
                                <th scope="col">Province</th>
                                <th scope="col">Distric</th>
                                <th scope="col">City</th>
                                <th scope="col">Action</th>


                              </tr>
                            </thead>
                            <tbody>
                                @foreach ($members as $member)


                              <tr>
                                <th scope="row">{{$member->id}}</th>
                                <td>
                                    {{ $member->name }}
                                </td>
                                <td>{{$member->email}}</td>
                                <td>{{$member->phone1}}<br>
                                    {{ $member->phone2 }}
                                </td>
                                <td>{{$member->id_number}}</td>

                                <td>
                                    @php
                                        $province = \DB::table('provinces')->where('id',$member->province)->first();
                                    @endphp
                                    {{$province->name_en}}
                                </td>
                                <td>

                                    @php
                                    $district = \DB::table('districts')->where('id',$member->district)->first();
                                @endphp
                                {{$district->name_en}}
                                </td>
                                <td>

                                    @php
                                    $city = \DB::table('cities')->where('id',$member->city)->first();
                                @endphp
                                {{$city->name_en}}
                                </td>

                                <td>
                                    @if($member->status == 0)
                                    <a href="{{('/members/activate/'.$member->id)}}" class="btn btn-success btn-sm">Activate</a>
                                    @else
                                    <a href="{{('/members/dectivate/'.$member->id)}}" class="btn btn-danger btn-sm">Deactivate</a>
                                    @endif
                                    {{--  <a href="{{('/members/edit/'.$member->id)}}" class="btn btn-success btn-sm">Edit</a>  --}}
                                    <a href="{{('/members/edit/'.$member->id)}}" class="btn btn-success btn-sm">View</a>
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
