<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
  <!-- Sidebar - Brand -->
  <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ url('/') }}">
    <div class="sidebar-brand-icon rotate-n-15">
      <i class="fas fa-shopping-bag"></i>
    </div>
    <div class="sidebar-brand-text mx-3">NanoShop</div>
  </a>
  <!-- Divider -->
  <hr class="sidebar-divider my-0">
  <!-- Nav Item - Dashboard -->
  <li class="nav-item active">
    <a class="nav-link" href="{{ url('/dashboard') }}">
      <i class="fas fa-fw fa-tachometer-alt"></i>
      <span>Dashboard</span></a>
    </li>
    <!-- Divider -->
    <hr class="sidebar-divider">
    <!-- Heading -->
    <div class="sidebar-heading">
      Gestion des Utilisateurs
    </div>
    <li class="nav-item">
      <a class="nav-link" href="{{route('users.index')}}">
        <i class="fas fa-users"></i>
        <span>Utilisateurs</span></a>
    </li>
    <li class="nav-item">
      <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
        <i class="fas fa-fw fa-cog"></i>
        <span>Rôles / Permissions</span>
      </a>
      <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
          <a class="collapse-item" href="{{route('roles.index')}}">Rôles</a>
          <a class="collapse-item" href="{{route('permissions.index')}}">Permissions</a>
        </div>
      </div>
    </li>
    <!-- Divider -->
    <hr class="sidebar-divider">
    <!-- Heading -->
    <div class="sidebar-heading">
      Gestion des articles
    </div>
    <li class="nav-item">
      <a class="nav-link" href="{{route('products.index')}}">
        <i class="fas fa-store"></i>
        <span>Gestion produits</span></a>
    </li>
    <li class="nav-item">
      <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTree" aria-expanded="true" aria-controls="collapseTree">
        <i class="fas fa-bars"></i>
        <span>Catégories / Types</span>
      </a>
      <div id="collapseTree" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
          <a class="collapse-item" href="{{route('types.index')}}">
            <i class="fas fa-sitemap"></i>
            <span>Type catégorie</span>
          </a>

          <a class="collapse-item" href="{{route('categories.index')}}">
            <i class="fas fa-boxes"></i>
            <span>Gestion Categories</span>
          </a>
        </div>
      </div>
    </li>
    <!-- Divider -->
    <hr class="sidebar-divider">
    <!-- Heading -->
    <div class="sidebar-heading">
      Gestion des factures
    </div>
    <li class="nav-item">
      <a class="nav-link" href="">
        <i class="fas fa-file-invoice-dollar"></i>
        <span>Factures</span>
      </a>
    </li>
    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">
    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
      <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
  </ul>
  <!-- End of Sidebar -->