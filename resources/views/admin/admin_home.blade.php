@extends('layouts.app')

@section('content')
    
<div class="text-center">
    <a href="{{route('admin.users.index')}}">Go to Pending Approval Requests</a> <br>
<a class="btn btn-primary mb-3" href="{{route('admin.files.index')}}">EDICT FILES</a>
</div>

<p class="text-center" style="font-size: 30px;">Admin Panel</p>
@endsection