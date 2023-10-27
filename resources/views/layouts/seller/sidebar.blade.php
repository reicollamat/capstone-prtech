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
      <div class="row">
        <div class="col-2">
          <i class="fa fa-home" aria-hidden="true"></i>
        </div>
        <div class="col">
          Dashboard
        </div>
      </div>
    </a>
    <a wire:navigate class="list-group-item list-group-item-action p-3 border-0 {{ (request()->routeIs('seller_inventory')) ? 'active' : '' }}" href="{{ route('seller_inventory') }}">
      <div class="row">
        <div class="col-2">
          <i class="fa fa-archive" aria-hidden="true"></i>
        </div>
        <div class="col">
          Product Inventory
        </div>
      </div>
    </a>
    <a class="list-group-item list-group-item-action p-3 border-0" href="#!">
      <div class="row">
        <div class="col-2">
          <i class="fa fa-tasks" aria-hidden="true"></i>
        </div>
        <div class="col">
          Statistics
        </div>
      </div>
    </a>
    <a class="list-group-item list-group-item-action p-3 border-0" href="#!">
      <div class="row">
        <div class="col-2">
          <i class="fa fa-shopping-cart" aria-hidden="true"></i>
        </div>
        <div class="col">
          Purchases
        </div>
      </div>
    </a>
    <a class="list-group-item list-group-item-action p-3 border-0" href="#!">
      <div class="row">
        <div class="col-2">
          <i class="fa fa-truck" aria-hidden="true"></i>
        </div>
        <div class="col">
          Deliveries
        </div>
      </div>
    </a>
    <a class="list-group-item list-group-item-action p-3 border-0" href="#!">
      <div class="row">
        <div class="col-2">
          <i class="fa fa-user" aria-hidden="true"></i>
        </div>
        <div class="col">
          Profile
        </div>
      </div>
    </a>
  </div>
</div>