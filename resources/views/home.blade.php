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
        <p class="text-center" style="font-size: 30px;">Normal User Home Page</p>
@endsection
