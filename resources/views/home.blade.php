@extends('layouts.app')


@section('content')
    {{-- @include('layouts.sidebar') --}}

    <div class="container mt-5 text-center">
        <livewire:user.resources>
            {{-- <img class="hm"  src="/img/SC_BWgoldBlue.png" alt=""> --}}
    </div>

    <style>
        .hm {
            height: 300px;
            width: 300px;
            margin: auto;

        }
    </style>
@endsection
@section('script')
    <script>
        $(document).ready(function() {
            $("#datepicker").datepicker({
                format: "yyyy",
                viewMode: "years",
                minViewMode: "years",
                autoclose: true
            });
        })
    </script>
@endsection
