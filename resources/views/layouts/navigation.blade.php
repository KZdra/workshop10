<!-- Sidebar -->
<div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
            <img src="https://static.vecteezy.com/system/resources/thumbnails/009/292/244/small/default-avatar-icon-of-social-media-user-vector.jpg" alt="" class="img-circle elevation-2">
        </div>
        <div class="info">
 <a href="{{ route('profile.show') }}" class="d-block text-uppercase">{{ Auth::user()->name }}</a>
        </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
            data-accordion="false">
            <li class="nav-item">
                <a href="{{ route('home') }}" class="nav-link {{ Request::routeIs('home') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-th"></i>
                    <p>
                        {{ __('Dashboard') }}
                    </p>
                </a>
            </li>

            @if (Auth::user()->role == 'admin' || Auth::user()->role == 'kasir')
                <li class="nav-item">
                    <a href="{{ route('customers.index') }}" class="nav-link {{ Request::routeIs('customers.index') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            {{ __('Pelanggan') }}
                        </p>
                    </a>
                </li>
            @endif

            @if (Auth::user()->role == 'gudang' || Auth::user()->role == 'admin' || Auth::user()->role == 'kasir')
                <li class="nav-item">
                    <a href="{{ route('spareparts.index') }}" class="nav-link {{ Request::routeIs('spareparts.index') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-wrench"></i>
                        <p>
                            {{ __('Data Spareparts') }}
                        </p>
                    </a>
                </li>
            @endif

            @if (Auth::user()->role == 'admin')
                <li class="nav-item">
                    <a href="{{ route('jasas.index') }}" class="nav-link {{ Request::routeIs('jasas.index') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-toolbox"></i>
                        <p>
                            {{ __(' Jasa') }}
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('users.index') }}" class="nav-link {{ Request::routeIs('users.index') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-id-card"></i>
                        <p>
                            {{ __('Karyawan') }}
                        </p>
                    </a>
                </li>
            @endif

            <li class="nav-item">
                <a href="{{ route('transactions.index') }}" class="nav-link {{ Request::routeIs('transactions.index') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-file-invoice-dollar"></i>
                    <p>
                        {{ __('Transaksi') }}
                    </p>
                </a>
            </li>

            @if (Auth::user()->role == 'admin' || Auth::user()->role == 'kasir')
                <li class="nav-item">
                    <a href="{{ route('qr.index') }}" class="nav-link {{ Request::routeIs('qr.index') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-qrcode"></i>
                        <p>
                            {{ __('Connect WhatsApp') }}
                        </p>
                    </a>
                </li>
            @endif



        </ul>
    </nav>
    <!-- /.sidebar-menu -->
</div>
<!-- /.sidebar -->
