@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                  Hello {{Auth::user()->name}}.
                </br>
                    You are logged in as an ordinary user.</br>
                </br>
                    <a href="{{route('user.doctors.index')}}"> View Available Doctors </a>


                   {{-- </br>
                </br>
                <h2>
                  Visits
                </h2>
                <table class="table hover-table">
                  <tbody>
                  @if(count($visits) == 0)
                    <p>You have no documented visits. </p>

                  @else
                    @foreach ($visits as $visit)
                      <tr>
                        <td>Date</td>
                        <td>{{$visit->date}}</td>
                      </tr>
                      <tr>
                        <td>Time</td>
                        <td>{{$visit->time}}</td>
                      </tr>
                      <tr>
                        <td>Duration</td>
                        <td>{{$visit->duration}}</td>
                      </tr>
                      <tr>
                        <td>Cost</td>
                        <td>{{$visit->cost}}</td>
                      </tr>
                      <tr>
                        <td>Doctor</td>
                        <td>{{$visit->doctor->id}}</td>
                      </tr>
                    </tbody>
                    </table>
                  @endforeach
                @endif  --}}


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
