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
                    You are logged in as an administrator.

                  </br>
                </br>
                <h2>Doctors</h2>
                <a href="{{route('admin.doctors.create')}}" class="btn btn-primary display:inline-block">Create Doctor</a>
              </br>
            </br>
                <h2>Visits</h2>
                <a href="{{route('admin.visits.create')}}" class="btn btn-primary display:inline-block">Create Visit Details</a>
              </br>
            </br>
                <h2>Patients</h2>
                <a href="{{route('admin.patients.create')}}" class="btn btn-primary display:inline-block">Create Patient</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
