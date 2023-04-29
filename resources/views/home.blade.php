@extends('layouts.app')

@section('content')

<div class="text-center">
    @if(auth()->check() && (auth()->user()->admin == true))
        <a href="{{route('admin.users.index')}}">Go to Pending Approval Requests</a> <br>
        <a class="btn btn-primary mb-3" href="{{route('admin.files.index')}}">EDICT FILES</a>
        @else
        <a class="btn btn-primary" href="{{route('files.index')}}">EDICT files</a>
    @endif


</div>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
