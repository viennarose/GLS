@extends('admin.layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header text-dark text-center"><span class="fas fa-users text-dark"></span> Users</div>

                    <div class="card-body">

                        @if ($message = Session::get('success_message'))
                            <div class="alert alert-success alert-dismissible fade show mt-2" role="alert">
                                <strong>{{ $message }}</strong>
                            </div>
                        @endif

                        @if ($message = Session::get('delete_message'))
                            <div class="alert alert-danger alert-dismissible fade show mt-2" role="alert">
                                <strong>{{ $message }}</strong>
                            </div>
                        @endif

                        <table class="table text-center">
                            <tr>

                                <th>Profile Image</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th class="d-none d-md-table-cell d-lg-table-cell d-xl-table-cell"
                                style="text-align: center">Trash</th>

                            </tr>
                            @forelse ($users as $user)
                                <tr>
                                    <td><img src="{{ asset('user_img/' . $user->profile_image) }}"alt="Image"
                                            style="border-radius: 50%; height: 50px; width: 50px;"></td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td class="d-none d-md-table-cell d-lg-table-cell d-xl-table-cell"
                                        style="text-align: center">
                                        <a href="#" data-toggle="modal" id="user_delete_link" class="btn"
                                            data-target="#delete_user_id{{ $user->id }}">
                                            <span class="text-danger fas fa-trash-alt"></span>
                                        </a>
                                        <div class="modal fade" id="delete_user_id{{ $user->id }}" tabindex="-1"
                                            role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <form action="{{ route('admin.delete_user', $user->id) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <div class="modal-header">
                                                            <h5 class="modal-title text-danger" id="exampleModalLabel">
                                                                Delete
                                                                Confirmation</h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p class="text-dark">Are you sure you want to delete this
                                                                user?</p>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="submit" class="btn btn-danger">Confirm</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4">No users found.</td>
                                </tr>
                            @endforelse
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        .container {
            position: relative;
            top: 30px;
        }
    </style>

    <script>
        setTimeout(function() {
            $(' .alert-dismissible').fadeOut('slow');
        }, 1000);
    </script>
@endsection
