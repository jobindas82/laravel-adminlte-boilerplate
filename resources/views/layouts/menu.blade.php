<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column nav-compact" data-widget="treeview" role="menu"
        data-accordion="false">
        <li class="nav-item has-treeview {{ Request::path() == '/' ? 'menu-open' : '' }}">
            <a href="#" class="nav-link {{ Request::path() == '/' ? 'active' : '' }}">
                <i class="nav-icon fas fa-chart-bar"></i>
                <p>
                    Analytics
                    <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="/" class="nav-link {{ Request::path() == '/' ? 'active' : '' }}">
                        <i class="fas fa-tachometer-alt nav-icon"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
            </ul>
        </li>
        <li class="nav-header"> Administration</li>
        <li class="nav-item">
            <a href="{{ route('user.list') }}" class="nav-link {{ Route::is('user.*') ? 'active' : '' }}">
                <i class="nav-icon fas fa-user-cog"></i>
                <p> Users </p>
            </a>
        </li>
    </ul>
</nav>