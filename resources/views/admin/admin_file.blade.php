@extends('admin.layouts.app')

@section('content')

            {{-- Put The ADMIN EDICT FILES Crud Here Gwaps 😒😒😒 <3

            <p class="text-center" style="font-size: 30px;"> ADMIN EDICT CRUD HERE 😒😒😒 </p> --}}
            @if (auth()->check() && auth()->user()->admin == true)
            <livewire:admin.files.index>
                @endif

@endsection
