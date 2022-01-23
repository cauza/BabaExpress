<nav class="sidebar-nav">
    <ul class="nav">
        <li class="nav-item">
            <a class="nav-link" href="{{ route('order.index') }}">
                <i class="nav-icon icon-chart"></i> Order
            </a>
            <a class="nav-link" href="{{ route('order.pickup') }}">
                <i class="nav-icon icon-chart"></i> PickUp
            </a>
            <a class="nav-link" href="{{ route('order.delivery') }}">
                <i class="nav-icon icon-list"></i> Delivery
            </a>
        </li>
        <li class="nav-title">MASTER DATA</li>
        <li class="nav-item">
                    <a class="nav-link" href={{ route('ongkir.index') }}>
                        <i class="nav-icon icon-map"></i> Ongkir Kecamatan
                    </a>
                    <a class="nav-link" href="{{ route('driver.index') }}">
                        <i class="nav-icon icon-user"></i> Driver
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('mitra.index') }}">
                        <i class="nav-icon icon-organization"></i> Mitra
                    </a>
                </li>
    </ul>
</nav>