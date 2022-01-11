<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                <div class="sb-sidenav-menu-heading"></div>
                <a class="nav-link" href="{{ route('admin') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Dashboard
                </a>
                <div class="sb-sidenav-menu-heading">Quản lý người dùng</div>
                <a class="nav-link" href="{{ route('admin.index', 'user') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                    Danh sách người dùng
                </a>
                <a class="nav-link" href="{{ route('admin.index', 'admin') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                    Danh sách Admin
                </a>
                <div class="sb-sidenav-menu-heading">Quản lý việc làm</div>
                <a class="nav-link" href="{{ route('admin.job') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                    Việc làm gần đây
                </a>
                <a class="nav-link" href="{{ route('admin.job', ['status' => 'Hiển thị']) }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                    Việc làm đang hiển thị
                </a>
                <a class="nav-link" href="{{ route('admin.job', ['status' => 'Ẩn']) }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                    Việc làm bị ẩn
                </a>
            </div>
        </div>
        <div class="sb-sidenav-footer">
            <div class="small">Welcome</div>
            {{ Auth()->user()->email ?? '' }}
        </div>
    </nav>
</div>
