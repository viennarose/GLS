@extends('admin.layouts.app')

@section('content')
      @if ($message = Session::get('message'))
    <div class="alert alert-success alert-dismissible fade show mt-2 col-md-8 mx-auto" role="alert">
        <strong>{{ $message }}</strong>
    </div>
    @endif
    <div class="card">
        <form action="{{ url('admin/contact')}}" method="POST">
            @csrf
            <div class="row">
                <div class="col-md-4 mb-3">
                    <label for="name">Name</label>
                    <input type="text" name="name" value="{{$contact->name ?? 'Name'}}" class="form-control">
                </div>
                <div class="col-md-4 mb-3">
                    <label for="address">Address</label>
                    <textarea type="text" name="address" value="{{$contact->address ?? 'Address'}}" class="form-control">{{$contact->address ?? 'Address'}}</textarea>
                </div>
                <div class="col-md-4 mb-3">
                    <label for="number">Number</label>
                    <input type="number" name="number" value="{{$contact->number ?? 'Number'}}" class="form-control">
                </div>
                <div class="col-md-4 mb-3">
                    <label for="email">Email</label>
                    <input type="email" name="email" value="{{$contact->email ?? 'Email'}}" class="form-control">
                </div>
            </div>

            <button type="submit">Submit</button>
        </form>
    </div>
@endsection
