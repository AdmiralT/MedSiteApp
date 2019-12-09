@extends('layouts.app')
@section('content')
  <div class="container">
    <div class="row">
      <div class="col-md-8 col-md-offset-2">
        <div class="card">
          <div class="card-header">
            Add a new patient
          </div>
          <div class="card-body">
            @if ($errors->any())
              <div class="alert alert-danger">
                <ul>
                  @foreach ($errors->all() as $error)
                    <li>{{$error}}</li>
                  @endforeach
                </ul>
              </div>
            @endif
            <form method="POST" action="{{route('admin.patients.store')}}">
              <input type="hidden" name="_token" value="{{csrf_token()}}">
              <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{old('name')}}" />
              </div>
              <div class="form-group">
                  <label for="password">Password</label>
                  <input type="password" class="form-control" id="password" name="password" value="{{old('password')}}" />
              </div>
              <div class="form-group">
                  <label for="email">Email</label>
                  <input type="email" class="form-control" id="email" name="email" value="{{old('email')}}" />
              </div>
              <div class="form-group">
                <label for="address">Address</label>
                <input type="text" class="form-control" id="address" name="address" value="{{old('address')}}" />
              </div>
              <div class="form-group">
                <label for="phoneNo">Phone Number</label>
                <input type="text" class="form-control" id="phoneNo" name="phoneNo" value="{{old('phoneNo')}}" />
              </div>
              <label for="insurance">Insurance</label>
              <div class="radio">
                <label for="insurance" class="radio-inline"><input type="radio" id="insurance" name="insurance" value="{{old('insurance')}}">Yes</label>
                <label for="insurance" class="radio-inline"><input type="radio" id="insurance" name="insurance" value-"{{old('insurance')}}">No</label>
              </div>
              <div class="form-group">
                <label for="insuranceName">Insurance Name</label>
                <input type="text" class="form-control" id="insuranceName" name="insuranceName" value="{{old('insuranceName')}}"/>
              </div>
              <a href="{{route('admin.doctors.index')}}" class="btn btn-danger">Cancel</a>
              <button type="submit" class="btn btn-primary float-right">Submit</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
