@extends('layouts.app')
@section('content')
  <div class="container">
    <div class="row">
      <div class="col-md-8 col-md-offset-2">
        <div class="card">
          <div class="card-header">
            Add new visit
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
            <form method="POST" action="{{route('admin.visits.store')}}">
              <input type="hidden" name="_token" value="{{csrf_token()}}">
              <div class="form-group">
                <label for="date">Date</label>
                <input type="text" class="form-control" id="date" name="date" value="{{old('date')}}" />
              </div>
              <div class="form-group">
                <label for="time">Time</label>
                <input type="text" class="form-control" id="time" name="time" value="{{old('time')}}" />
              </div>
              <div class="form-group">
                <label for="duration">Duration</label>
                <input type="text" class="form-control" id="duration" name="duration" value="{{old('duration')}}" />
              </div>
              <div class="form-group">
                <label for="doctor">Doctor</label>
                <select name="doctor_id">
                  @foreach ($doctors as $doctor)
                    <option value="{{$doctor->id}}" {{(old('doctor_id') == $doctor->id) ? "selected" : ""}}>
                      {{$doctor->name}}
                    </option>
                  @endforeach
                </select>
              </div>
              <div class="form-group">
                <label for="startDate">Patient</label>
                <input type="text" class="form-control" id="startDate" name="startDate" value="{{old('startDate')}}" />
              </div>
              <div class="form-group">
                <label for="startDate">Cost</label>
                <input type="text" class="form-control" id="startDate" name="startDate" value="{{old('startDate')}}" />
              </div>
              <a href="{{route('admin.visits.index')}}" class="btn btn-danger">Cancel</a>
              <button type="submit" class="btn btn-primary float-right">Submit</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
