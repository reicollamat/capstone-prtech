<!-- Sidebar-->
<div class="border-end" id="sidebar-wrapper">
  <div class="sidebar-heading border-bottom bg-light">
    <a class="navbar-brand" href="#">
      <img src="/img/brand/svg/logo-no-background.svg" alt="Logo" width="150" height="150"
        class="d-inline-block align-text-top">
    </a>
  </div>

  <div class="list-group list-group-flush py-3">
    <a wire:navigate class="list-group-item list-group-item-action p-3 border-0 {{ (request()->routeIs('seller_dashboard')) ? 'active' : '' }}" href="{{ route('seller_dashboard') }}">
        <i class="bi bi-house-fill" aria-hidden="true"></i>
        Dashboard
    </a>
    <a wire:navigate class="list-group-item list-group-item-action p-3 border-0 {{ (request()->routeIs('seller_inventory')) ? 'active' : '' }}" href="{{ route('seller_inventory') }}">
        <i class="bi bi-database-fill" aria-hidden="true"></i>
        Product Inventory
    </a>
    <a class="list-group-item list-group-item-action p-3 border-0" href="#!">
        <i class="bi bi-bar-chart-line-fill" aria-hidden="true"></i>
        Statistics
    </a>
    <a class="list-group-item list-group-item-action p-3 border-0" href="#!">
        <i class="bi bi-cart-fill" aria-hidden="true"></i>
        Purchases
    </a>
    <a class="list-group-item list-group-item-action p-3 border-0" href="#!">
        <i class="bi bi-truck" aria-hidden="true"></i>
        Deliveries
    </a>
    <a class="list-group-item list-group-item-action p-3 border-0" href="#!">
        <i class="bi bi-person-circle" aria-hidden="true"></i>
        Profile
    </a>
  </div>
</div>