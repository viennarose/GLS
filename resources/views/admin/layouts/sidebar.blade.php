<aside class="main-sidebar sidebar-dark-primary">
    <a href="{{ route('admin.home_dashboard') }}" class="brand-link">
        <img src="{{ url('/img/SC_BWgoldBlue.png') }}" alt="{{ config('app.name') }} Logo" style="background-color:white;"
            class="p-1 brand-image img-circle">
        <span class="brand-text">{{ config('app.name') }}</span>
    </a>
    <div class="sidebar">
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                @include('admin.layouts.menu')
            </ul>
        </nav>
    </div>
</aside>

<style>
    .brand-text {
        color: white;
        font-weight: 400;
    }
</style>
