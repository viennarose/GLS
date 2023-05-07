<aside class="main-sidebar sidebar-dark-primary">
    <a href="{{ url('/home') }}" class="brand-link">
        <img src="{{ url('/img/SC_BWgoldBlue.png') }}" alt="{{ config('app.name') }} Logo" class="brand-image img-circle">
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
    .brand-link {
        background-color: white;
    }

    .brand-text {
        color: #565656;
        font-weight: 400;
    }
</style>
