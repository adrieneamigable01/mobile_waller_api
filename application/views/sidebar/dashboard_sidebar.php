 <!-- Sidebar -->
 <ul class="navbar-nav bg-coffe-brown  sidebar sidebar-dark accordion" id="accordionSidebar">

<!-- Sidebar - Brand -->
<a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
  <div class="sidebar-brand-icon rotate-n-15">
    <img class="img-responsive" src="<?php echo base_url().'assets/img/dons.png' ?>" alt="" style="width:40px;height:40px;">
  </div>
  <div class="sidebar-brand-text mx-3"> Coffee Shop </div>
</a>

<!-- Divider -->
<hr class="sidebar-divider my-0">

<!-- Nav Item - Dashboard -->
<li class="nav-item active">
<a class="nav-link" href="<?php echo base_url().'dashboard' ?>">
    <i class="fas fa-fw fa-tachometer-alt"></i>
    <span>Dashboard</span></a>
</li>
<li class="nav-item active">
<a class="nav-link" href="<?php echo base_url().'dashboard/suppliers' ?>">
    <i class="fas fa-fw fa-users-cog"></i>
    <span>Suppliers</span></a>
</li>

<li class="nav-item active">
<a class="nav-link" href="<?php echo base_url().'dashboard/stores' ?>">
    <i class="fas fa-fw fa-store"></i>
    <span>Store</span></a>
</li>
<!-- Nav Item - Utilities Collapse Menu -->
<li class="nav-item">
  <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#menuUtilities" aria-expanded="true" aria-controls="collapseUtilities">
    <i class="fas fa-fw fa-bars"></i>
    <span>Menu</span>
  </a>
  <div id="menuUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
    <div class="bg-white py-2 collapse-inner rounded">
      <h6 class="collapse-header">Custom Menu:</h6>
      <a class="collapse-item" href="<?php echo base_url().'dashboard/menu' ?>">List</a>
      <a class="collapse-item" href="<?php echo base_url().'dashboard/menutype' ?>">Menu Types</a>
    </div>
  </div>
</li>
<!-- Nav Item - Utilities Collapse Menu -->
<li class="nav-item">
  <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#productUtilities" aria-expanded="true" aria-controls="collapseUtilities">
    <i class="fas fa-fw fa-th-list"></i>
    <span>Product</span>
  </a>
  <div id="productUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
    <div class="bg-white py-2 collapse-inner rounded">
      <h6 class="collapse-header">Product Menu:</h6>
      <a class="collapse-item" href="<?php echo base_url().'dashboard/product' ?>">List</a>
      <a class="collapse-item" href="<?php echo base_url().'dashboard/used_product' ?>">Used Product List</a>
      <a class="collapse-item" href="<?php echo base_url().'dashboard/producttype' ?>">Product type</a>
      <a class="collapse-item" href="<?php echo base_url().'dashboard/stocks' ?>">Stocks</a>
      <a class="collapse-item" href="<?php echo base_url().'dashboard/inventory' ?>">Inventory</a>
    </div>
  </div>
</li>


<!-- Divider -->
<hr class="sidebar-divider">

<!-- Sidebar Toggler (Sidebar) -->
<div class="text-center d-none d-md-inline">
  <button class="rounded-circle border-0" id="sidebarToggle"></button>
</div>

</ul>
<!-- End of Sidebar -->