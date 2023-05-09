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
            <div>
                <a href="#" data-toggle="modal" id="profile_link" class="btn btn-sm btn-danger "
                    data-target="#profile_id{{ Auth::user()->id }}">
                    <span class="text-light fas fa-key"></span> Change Password
                </a>
            </div>
        </div>

        <div class="col-md-6 mt-3">
            <div class="modal-body">
                <div class="mb-5">
                    <div class="modal fade" id="profile_id{{ Auth::user()->id }}" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" style="color:dimgray; font-size: 16px;">Change
                                        Password</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>

                                <div class="modal-body">
                                    {{-- <form action="{{ route('admin.update_profile', Auth::user()->id) }}"
                                            method="POST">
                                            @csrf --}}

                                    @foreach ($errors->all() as $error)
                                        <p class="text-danger">{{ $error }}</p>
                                    @endforeach

                                    <div class="form-group d-flex justify-content-center">
                                        <label for="password"><span class="input-group-text text-light bg-danger"
                                                style="width:42px;"><span class="fas fa-lock"
                                                    style="font-size: 20px; height: 25px;"></span></span></label>

                                        <div class="col-md-7">
                                            <input id="password" type="password" class="form-control"
                                                name="current_password" autocomplete="current-password"
                                                placeholder="Current Password">
                                        </div>
                                    </div>

                                    <div class="form-group d-flex justify-content-center">
                                        <label for="password"><span class="input-group-text text-light bg-dark"
                                                style="width:42px;"><span class="fas fa-key"
                                                    style="font-size: 20px; height: 25px;"></span></span></label>

                                        <div class="col-md-7">
                                            <input id="new_password" type="password" class="form-control"
                                                name="new_password" autocomplete="current-password"
                                                placeholder="New Password">
                                        </div>
                                    </div>

                                    <div class="form-group d-flex justify-content-center">
                                        <label for="password"><span class="input-group-text text-light bg-dark"
                                                style="width:42px;"><span class="fas fa-key"
                                                    style="font-size: 20px; height: 25px;"></span></span></label>

                                        <div class="col-md-7">
                                            <input id="new_confirm_password" type="password" class="form-control"
                                                name="new_confirm_password" autocomplete="current-password"
                                                placeholder="Confirm New Password">
                                        </div>
                                    </div>

                                    <div class="form-group mb-0">
                                        <div class="col-md-8 offset-md-7">
                                            <button type="submit" class="btn btn-sm btn-success"><span
                                                    class="fas fa-save"></span>
                                                Update Password</button>
                                        </div>
                                    </div>
                                    {{-- </form> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
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
