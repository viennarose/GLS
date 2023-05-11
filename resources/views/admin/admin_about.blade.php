@extends('admin.layouts.app')

@section('content')
      @if ($message = Session::get('message'))
    <div class="alert alert-success alert-dismissible fade show mt-2 col-md-8 mx-auto" role="alert">
        <strong>{{ $message }}</strong>
    </div>
    @endif
    <div class="card">
        <form action="{{ url('admin/about')}}" method="POST">
            @csrf
            <div class="row">
                <div class="col-md-4 mb-3">
                    <label for="title">Title</label>
                    <input type="text" name="title" value="{{$about->title ?? 'Title'}}" class="form-control">
                </div>
                <div class="col-md-7 mb-3">
                    <label for="about">About</label>
                    <textarea type="text" cols="5" rows="4" name="about" value="{{$about->about ?? 'About'}}" class="form-control">{{$about->about ?? 'About'}}</textarea>
                </div>

            </div>

            <button type="submit">Submit</button>
        </form>
    </div>
@endsection
