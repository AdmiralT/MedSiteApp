@extends('layouts.app')
@section('content')
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            Doctors
          </div>
        <div class="card-body">
        @if(count($doctors) === 0)
          <h2>There are no doctors </h2>
          @else
            <table id="table-doctors" class="table table-hover">
              <thead>
                <th>Name</th>
                <th>Email</th>
                <th>Address</th>
                <th>Phone Number</th>
                <th>Start Date</th>
                <th></th>
              </thead>
              <tbody>
                @foreach($doctors as $doctor)
                  <tr data-id="{{$doctor->id}}">
                    <td>{{$doctor->user->name}}</td>
                    <td>{{$doctor->user->email}}</td>
                    <td>{{$doctor->user->address}}</td>
                    <td>{{$doctor->user->phoneNo}}</td>
                    <td>{{$doctor->startDate}}</td>
                    <td>
                      <a href="{{route('user.doctors.show', $doctor->id)}}" class="btn btn-default">View</a>
                @endforeach
              </tbody>
          @endif
      </div>
    </div>
  </div>
@endsection
