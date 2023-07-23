@extends('layouts.site')
@section('content')
<div class="container-fluid">
    <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4"><span class="bg-secondary pr-3">Join Now</span></h2>
    <div class="row px-xl-5">
        <div class="col-lg-12 mb-5">
            <div class="contact-form bg-light p-30">
                <div id="success"></div>
                <form name="sentMessage" action="{{ url('partner-register') }}"  novalidate="novalidate" method="POST">
                    @csrf
                    <div class="control-group">
                        <input type="text" class="form-control" id="name" placeholder="Your Name"
                            required="required" name="name" data-validation-required-message="Please enter your name" />
                        <p class="help-block text-danger"></p>
                        <input type="hidden" name="parent_id" value="{{ $user->id }}">
                    </div>
                    <div class="control-group">
                        <input type="email" class="form-control" id="email" placeholder="Your Email"
                            required="required" name="email" data-validation-required-message="Please enter your email" />
                        <p class="help-block text-danger"></p>
                    </div>
                    <div class="control-group">
                        <input type="text" class="form-control" id="phone" placeholder="Phone Number 01"
                            required="required" name="phone1" data-validation-required-message="Please enter your phone" />
                        <p class="help-block text-danger"></p>
                    </div>
                    <div class="control-group">
                        <input type="text" class="form-control" id="phone" name="phone2" placeholder="Phone Number 02" />
                        <p class="help-block text-danger"></p>
                    </div>
                    <div class="control-group">
                        <input type="text" class="form-control" id="id_number"  name="id_number" placeholder="ID Number" />
                        <p class="help-block text-danger"></p>
                    </div>
                    <div class="control-group mt-3">
                      <select class="form-control" name="province" required>
                        <option value="">Select Province</option>
                        @foreach ($provinces as $province)
                        <option value="{{ $province->id }}">{{ $province->name_en }}</option>

                        @endforeach
                      </select>
                    </div>
                    <div class="control-group mt-3">
                        <select class="form-control" name="district" required>
                          <option value="">Select Distric</option>
                          @foreach ($districts as $district)
                          <option value="{{ $district->id }}">{{ $district->name_en }}</option>

                          @endforeach
                        </select>
                      </div>
                      <div class="control-group mt-3">
                        <select class="form-control" name="city" required>
                          <option value="">Select City</option>
                          @foreach ($cities as $city)
                          <option value="{{ $city->id }}">{{ $city->name_en }}</option>

                          @endforeach
                        </select>
                      </div>
                      <div class="control-group mt-3">
                        <input type="password" class="form-control" id="password" name="password" placeholder="Password" />
                        <p class="help-block text-danger"></p>
                    </div>
                    <div>
                        <button class="btn btn-primary py-2 px-4 mt-3" type="submit" >Register Now</button>
                    </div>
                </form>
            </div>
        </div>
        {{--  <div class="col-lg-5 mb-5">
            <div class="bg-light p-30 mb-30">
                <iframe style="width: 100%; height: 250px;"
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3001156.4288297426!2d-78.01371936852176!3d42.72876761954724!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4ccc4bf0f123a5a9%3A0xddcfc6c1de189567!2sNew%20York%2C%20USA!5e0!3m2!1sen!2sbd!4v1603794290143!5m2!1sen!2sbd"
                frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
            </div>
            <div class="bg-light p-30 mb-3">
                <p class="mb-2"><i class="fa fa-map-marker-alt text-primary mr-3"></i>123 Street, New York, USA</p>
                <p class="mb-2"><i class="fa fa-envelope text-primary mr-3"></i>info@example.com</p>
                <p class="mb-2"><i class="fa fa-phone-alt text-primary mr-3"></i>+012 345 67890</p>
            </div>
        </div>  --}}
    </div>
</div>
@endsection
