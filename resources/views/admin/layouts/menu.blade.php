<li class="nav-item mt-2">
    <a href="{{ route('admin.home_dashboard') }}"
        class="nav-link {{ Request::is('admin/dashboard*') ? 'bg-secondary active' : '' }}">
        <p class="text-white">Dashboard</p>
        <i class="fas fa-tachometer-alt fa-pull-left fa-md text-white"></i>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('admin.unapproved_users') }}"
        class="nav-link {{ Request::is('admin/pending_approval_requests*') ? 'bg-secondary active' : '' }}">
        <p class="text-white">Pending Approval Requests</p>
        <i class="fas fa-exclamation-circle fa-pull-left fa-md text-white"></i>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('admin.unapproved_users') }}"
        class="nav-link {{ Request::is('admin/files/index*') ? 'bg-secondary active' : '' }}">
        <p class="text-white">EDICT Files</p>
        <i class="fas fa-file fa-pull-left fa-md text-white"></i>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('admin.approved_users') }}"
        class="nav-link {{ Request::is('admin/users*') ? 'bg-secondary active' : '' }}">
        <p class="text-white">Users</p>
        <i class="fas fa-users fa-pull-left fa-md text-white"></i>
    </a>
</li>

<style scoped>
    .nav-item p {
        position: relative;
        font-size: 14px;
        left: 3px;
        top: 1px;
        font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
        text-decoration: none;
        color: gainsboro;
    }

    p:hover {
        color: white;
    }

    i {
        margin-top: 5px;
        margin-left: -1px;
        color: gainsboro;
        font-size: 14px;
    }
</style>
