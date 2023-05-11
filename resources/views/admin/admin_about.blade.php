@extends('admin.layouts.app')

@section('content')
    @if ($message = Session::get('message'))
        <div class="alert alert-success alert-dismissible fade show mt-2 col-md-8 mx-auto" role="alert">
            <strong>{{ $message }}</strong>
        </div>
    @endif
    <div class="container" style="position: relative; top: 50px;">
        <div class="card">
            <div class="card-body elevation-2 rounded">
                <form action="{{ url('admin/about') }}" method="POST">
                    @csrf

                    <div class="col-md-8 mb-3">
                        <label for="title">Title:</label>
                        <input type="text" name="title" value="{{ $about->title ?? 'Title' }}" class="form-control">
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="about">About Us:</label>
                        <textarea type="text" style="text-indent: 50px;" rows="8" name="about" value="{{ $about->about ?? 'About' }}"
                            class="form-control">{{ $about->about ?? 'About' }}</textarea>
                    </div>
                    <div>
                        <button class="btn btn-sm btn-success" type="submit"><span class="fas fa-save"></span> Save
                            Changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        setTimeout(function() {
            $(' .alert-dismissible').fadeOut('slow');
        }, 1000);
    </script>
@endsection
