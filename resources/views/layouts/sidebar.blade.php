<aside id="bootstrapSidebar" class="sidebar bg-white" style="width: 250px;">
    <!-- Logo -->
    <div class="sidebar-header p-4 border-bottom">
        <div class="d-flex align-items-center">
            <h5 class="ms-3 mb-0 fw-bold text-dark">Inventory PBD</h5>
        </div>
    </div>

    <!-- Navigation -->
    <nav class="sidebar-nav p-3">
        <!-- Data Master -->
        <div class="mb-3" >
            <small class="text-muted fw-bold text-uppercase">Data Master</small>
        </div>
        
        <ul class="nav flex-column">
            <li class="nav-item">
                <a href="{{ url('/') }}" class="nav-link py-3">
                    <i class="fas fa-user fa-fw me-3"></i>
                    User
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ url('/users') }}" class="nav-link py-3">
                    <i class="fas fa-address-card fa-fw me-3"></i>
                    Role 
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ url('/products') }}" class="nav-link py-3">
                    <i class="fas fa-box fa-fw me-3"></i>
                    Satuan
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ url('/orders') }}" class="nav-link py-3 d-flex justify-content-between align-items-center">
                    <span>
                        <i class="fas fa-shopping-cart fa-fw me-3"></i>
                        Barang
                    </span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ url('/orders') }}" class="nav-link py-3 d-flex justify-content-between align-items-center">
                    <span>
                        <i class="fas fa-store fa-fw me-3"></i>
                        Vendor
                    </span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ url('/orders') }}" class="nav-link py-3 d-flex justify-content-between align-items-center">
                    <span>
                        <i class="fas fa-chart-line fa-fw me-3"></i>
                        Margin Penjualan
                    </span>
                </a>
            </li>

        <!-- Transaksi -->
        <div class="mb-3 mt-3">
            <small class="text-muted fw-bold text-uppercase">Transaksi</small>
        </div>
        
        <ul class="nav flex-column">
            <li class="nav-item">
                <a href="{{ url('/categories') }}" class="nav-link py-3">
                    <i class="fas fa-clipboard-check fa-fw me-3"></i>
                    Penerimaan
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ url('/reports') }}" class="nav-link py-3">
                    <i class="fas fa-list-check fa-fw me-3"></i>
                    Pengadaan
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ url('/settings') }}" class="nav-link py-3">
                    <i class="fas fa-money-check-dollar fa-fw me-3"></i>
                    Penjualan
                </a>
            </li>
        </ul>

    </nav>
</aside>