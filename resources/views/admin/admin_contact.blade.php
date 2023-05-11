@extends('admin.layouts.app')

@section('content')
    @if ($message = Session::get('message'))
        <div class="alert alert-success alert-dismissible fade show mt-2 col-md-8 mx-auto" role="alert">
            <strong>{{ $message }}</strong>
        </div>
    @endif
    <div class="container" style="position: relative; top: 50px;">
        <div class="card">
            <form action="{{ url('admin/contact') }}" method="POST">
                @csrf
                <div class="card-body elevation-2 rounded">
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <div class="form-group">
                                <label for="name">Name:</label>
                                <input type="text" name="name" value="{{ $contact->name ?? 'Name' }}"
                                    class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="email">Email Address:</label>
                                <input type="email" name="email" value="{{ $contact->email ?? 'Email' }}"
                                    class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="number">Phone Number:</label>
                                <input type="number" name="number" value="{{ $contact->number ?? 'Number' }}"
                                    class="form-control">
                            </div>
                        </div>
                        <div class="col-md-8 mb-3">
                            <label for="address">Address:</label>
                            <textarea type="text" name="address" value="{{ $contact->address ?? 'Address' }}" rows="5"
                                class="form-control">{{ $contact->address ?? 'Address' }}</textarea>
                        </div>
                    </div>
                    <div class="">
                        <button class="btn btn-success btn-sm" type="submit"><span class="fas fa-save"></span> Save
                            Changes</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script>
        setTimeout(function() {
            $(' .alert-dismissible').fadeOut('slow');
        }, 1000);
    </script>
@endsection
