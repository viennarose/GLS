@extends('admin.layouts.app')

@section('content')
    <livewire:admin.files.index>
@endsection

@section('third_party_scripts')

<script>
    setTimeout(function() {
        $(' .alert-dismissible').fadeOut('slow');
    }, 1000);
</script>
@endsection
