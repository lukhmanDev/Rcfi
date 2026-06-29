<!-- Sidebar Drawer -->
<nav class="sidebar" id="sidebar">
    <div class="sidebar-brand">
        <i class="bx bxs-shield"></i> RCFI Admin
    </div>
    <ul class="sidebar-menu">
        <li>
            <a href="{{ route('admin.home') }}" class="{{ Route::currentRouteName() === 'admin.home' ? 'active' : '' }}">
                <i class="bx bxs-dashboard"></i>
                <span>Dashboard</span>
            </a>
        </li>
        @if(Auth::user()->role === 1)
        <li>
            <a href="{{ route('users') }}" class="{{ Route::currentRouteName() === 'users' ? 'active' : '' }}">
                <i class="bx bxs-user-account"></i>
                <span>User Management</span>
            </a>
        </li>
        @endif
        <li>
            <a href="{{ route('donors.index') }}" class="{{ Route::currentRouteName() === 'donors.index' ? 'active' : '' }}">
                <i class="bx bxs-heart"></i>
                <span>Donors / Partners</span>
            </a>
        </li>
        <li>
            <a href="{{ route('applications.index') }}" class="{{ Route::currentRouteName() === 'applications.index' ? 'active' : '' }}">
                <i class="bx bxs-file-doc"></i>
                <span>Applications</span>
            </a>
        </li>
    </ul>
</nav>
