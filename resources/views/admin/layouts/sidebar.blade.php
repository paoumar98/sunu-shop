<div class="sidebar" data-background-color="white" data-active-color="danger">

    <div class="sidebar-wrapper">
        <div class="logo">
            <a href="" class="simple-text">
                Sunu Shop Admin
            </a>
        </div>

        <ul class="nav">
            <li>
                <a href="{{ url('/admin') }}">
                    <i class="ti-panel"></i>
                    <p>Dashboard</p>
                </a>
            </li>
            <li>
                <a href="{{ url('/admin/products') }}">
                    <i class="ti-view-list-alt"></i>
                    <p>Produits</p>
                </a>
            </li>
            <li>
                <a href="{{ url('/admin/orders') }}">
                    <i class="ti-calendar"></i>
                    <p>Commandes</p>
                </a>
            </li>
            <li>
                <a href="{{ url('/admin/users') }}">
                    <i class="fa fa-users"></i>
                    <p>Clients</p>
                </a>
            </li>
        </ul>
    </div>
</div>
