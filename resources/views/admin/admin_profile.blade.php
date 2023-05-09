@extends('admin.layouts.app')

@section('content')
    <h1 class="text-center">{{ Auth::user()->name }}
        Profile</h1>
    <hr>
    @if ($message = Session::get('message'))
        <div class="alert alert-success alert-dismissible fade show mt-2 col-md-8 mx-auto" role="alert">
            <strong>{{ $message }}</strong>
        </div>
    @endif
    <div class="container">
        <div class="col-md-12">
            <form action="{{ route('admin.change_profile', ['id' => Auth::user()->id]) }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-6">
                        <div class="mx-auto">
                            <div class="d-flex justify-content-center mt-5">
                                <img src={{ '/user_img/' . Auth::user()->profile_image }} class="img-circle elevation-4"
                                    alt="User Image"
                                    style="height: 300px; width: 300px; border-radius: 50%; padding-top:10px; padding-bottom: 10px; padding-left: 10px; padding-right: 10px;">
                            </div>
                            <p class="text-center text-dark mt-2 mb-1" style="font-weight: 500;">{{ Auth::user()->name }}
                            </p>
                        </div>
                        <div class="form-group mb-3 col-md-7 mx-auto">
                            <label for="" style="color:dimgray;"></label>
                            <input type="file" name="profile_image" class="">
                        </div>
                    </div>
                    <div class="col-md-5 mt-5">
                        <div class="input-group mb-3">
                            <label for="" style="color:dimgray;"><span
                                    class="fas fa-user input-group-text bg-secondary" style="width: 40px;"></span></label>
                            <input type="text" name="name" value="{{ Auth::user()->name }}" class="form-control"
                                required>
                        </div>
                        <div class="input-group mb-3">
                            <label for="" style="color:dimgray;"><span
                                    class="fas fa-envelope input-group-text bg-secondary"
                                    style="width: 40px;"></span></label>
                            <input type="text" name="email" value="{{ Auth::user()->email }}" class="form-control"
                                required>
                        </div>
                        <div class="d-flex justify-content-end mb-3">
                            <button class="btn btn-sm btn-success" type="submit"><span class="fas fa-save"></span>
                                Save
                                Changes</button>
                        </div>
            </form>
            <div class="mb-5">
                <a href="{{ route('admin.change_password.index', ['id' => Auth::user()->id]) }}" type="btn"
                    class="btn btn-sm btn-danger "><span class="fas fa-key"></span>
                    Change Password</a>
            </div>
        </div>
    </div>
    </div>

    <style>
        h1 {
            position: relative;
            top: 5px;
            font-size: 25px;
            color: dimgray;
            font-weight: 450;
        }
    </style>

    <script>
        setTimeout(function() {
            $(' .alert-dismissible').fadeOut('slow');
        }, 1000);
    </script>
@endsection
