@extends('layouts.app')
# @Date:   2019-11-19T15:11:55+00:00
# @Last modified time: 2019-11-19T15:13:18+00:00




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

                    You are logged in as an ordinary user.
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
