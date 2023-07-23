@extends('layouts.base')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Update values</div>

                    <div class="card-body">
                        <form action="{{ url('/profit-distribution/update') }}" method="POST" enctype="multipart/form-data">
                            @csrf



                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label>Direct Selling (%)*</label>
                                    <input type="number" name="direct_selling" class="form-control" value="{{ $dist->direct_selling }}"  step="0.1" required>
                                </div>

                                <div class="form-group col-md-6">
                                    <label >Level 2 (%)</label>
                                    <input type="number" name="level_2" class="form-control"  value="{{ $dist->level_2 }}"  min="0" step="0.1" required>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label>Level 3 (%)*</label>
                                    <input type="number" name="level_3" class="form-control" min="0" value="{{ $dist->level_3 }}"  step="0.1" required>
                                </div>

                                <div class="form-group col-md-6">
                                    <label >Level 4 (%)</label>
                                    <input type="number" name="level_4" class="form-control"  min="0" value="{{ $dist->level_4 }}" step="0.1" required>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label>Level 5 (%)*</label>
                                    <input type="number" name="level_5" class="form-control" min="0" value="{{ $dist->level_5 }}"  step="0.1" required>
                                </div>

                                <div class="form-group col-md-6">
                                    <label >Level 6 (%)</label>
                                    <input type="number" name="level_6" class="form-control"   min="0" value="{{ $dist->level_6 }}" step="0.1" required>
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
