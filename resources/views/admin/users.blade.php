@extends('admin.layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header text-danger"><span class="fas fa-exclamation-circle text-danger"></span> Pending
                        Approval Requests</div>

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
                                <th>Trash</th>
                                <th>Email Verification Status</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Registered at</th>

                            </tr>
                            @forelse ($users as $user)
                                <tr>
                                    <td class="d-none d-md-table-cell d-lg-table-cell d-xl-table-cell"
                                        style="text-align: center">
                                        <a href="#" data-toggle="modal" id="requests_delete_link" class="btn"
                                            data-target="#delete_requests_id{{ $user->id }}">
                                            <span class="text-danger fas fa-trash-alt"></span>
                                        </a>
                                        <div class="modal fade" id="delete_requests_id{{ $user->id }}" tabindex="-1"
                                            role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <form action="{{ route('admin.delete_requests', $user->id) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Delete
                                                                Confirmation</h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p>Are you sure you want to delete this request?</p>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-dismiss="modal">Cancel</button>
                                                            <button type="submit" class="btn btn-danger">Delete</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </td>

                                    <td>
                                        @if ($user->email_verified_at)
                                            <span class="text-success"><i class="fas fa-check"></i> Verified</span>
                                        @else
                                            <span class="text-danger"><i class="fas fa-exclamation-circle"></i> Not
                                                Verified</span>
                                        @endif
                                    </td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->created_at->format('F d, Y \a\t h:i A') }}</td>
                                    <td><a href="{{ route('admin.users.approve', $user->id) }}"
                                            class="btn btn-primary btn-sm">Approve ?</a></td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4">No approval requests found.</td>
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
