@extends('admin.layouts.app')

@section('content')
    <p class="text-dark dash">Dashboard</p>

    <div class="row">
        <div class="col-sm-6 col-lg-3">
        <a href="{{route('admin.unapproved_users')}}">
            <div class="card mb-4 elevation-3">
                <div class="card-body text-center">
                    <i class="fas fa-exclamation-circle mb-2" style="font-size:24px;"></i>
                    <h5 class="card-title mb-0 text-dark">0</h5>
                    <p class="card-text text-muted">Approval Requests</p>
                </div>
            </div>
            </a>
        </div>

        <div class="col-sm-6 col-lg-3">
        <a href="{{route('admin.approved_users')}}">
            <div class="card mb-4 elevation-3">
                <div class="card-body text-center">
                    <i class="fas fa-users mb-2" style="font-size:24px;"></i>
                    <h5 class="card-title mb-0 text-dark">0</h5>
                    <p class="card-text text-muted">Total Users</p>
                </div>
            </div>
         </a>
        </div>
        <div class="col-sm-6 col-lg-3">
        <a href="{{route('admin.files.index')}}">
            <div class="card mb-4 elevation-3">
                <div class="card-body text-center">
                    <i class="fas fa-envelope mb-2" style="font-size:24px;"></i>
                    <h5 class="card-title mb-0 text-dark">0</h5>
                    <p class="card-text text-muted">Files</p>
                </div>
            </div>
         </a>
        </div>
        <div class="col-sm-6 col-lg-3">
        <a href="{{route('admin.resources')}}">
            <div class="card mb-4 elevation-3">
                <div class="card-body text-center">
                    <i class="fas fa-chart-bar mb-2" style="font-size:24px;"></i>
                    <h5 class="card-title mb-0 text-dark">0</h5>
                    <p class="card-text text-muted">Resources</p>
                </div>
            </div>
        </div>
      </a>
    </div>


    <style>
        .dash {
            font-size: 20px;
            position: relative;
            top: 10px;
            margin-bottom: 20px;
            font-weight: 500;
            text-align: start;
        }

        i {
            color: rgb(53, 53, 53)
        }
    </style>
@endsection
