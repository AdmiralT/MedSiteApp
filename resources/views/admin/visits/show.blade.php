@extends('layouts.app')
@section('content')
  <div class="container">
    <div class="row">
      <div class="col-md-8 col-md-offset-2">
        <div class="card">
          <div class="card-header">
            Patient: {{$visit->patient->name}}
          </div>
          <div class="card-body">
            <table class="table table-hover">
              <tbody>
                <tr>
                  <td>Time</td>
                  <td>{{$visit->time}}</td>
                </tr>
                <tr>
                  <td>Date</td>
                  <td>{{$visit->date}}</td>
                </tr>
                <tr>
                  <td>Duration</td>
                  <td>{{$visit->duration}}</td>
                </tr>
                <tr>
                  <td>Doctor</td>
                  <td>{{$visit->doctor->id}}</td>
                </tr>
                <tr>
                  <td>Patient</td>
                  <td>{{$visit->patient->id}}</td>
                </tr>
                <tr>
                  <td>Cost</td>
                  <td>{{$visit->cost}}</td>
                </tr>
              </tbody>
            </table>
            <a href="{{route('admin.visits.index', $visit->id)}}" class="btn btn-default">Back</a>
            <a href="{{route('admin.visits.edit', $visit->id)}}" class="btn btn-warning">Edit</a>
            <form style="display:inline-block" method="POST" action="{{route('admin.visits.destroy', $visit->id)}}">
              <input type="hidden" name="_method" value="DELETE">
              <input type="hidden" name="_token" value="{{csrf_token()}}">
              <button type="submit" class="btn btn-danger">Delete</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  @endsection
