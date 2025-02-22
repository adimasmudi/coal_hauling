<!-- Sidebar Menu -->
  <nav class="mt-2 d-flex flex-column justify-content-between">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
      <!-- Add icons to the links using the .nav-icon class
           with font-awesome or any other icon font library -->
      <li class="nav-item">
        <a href="/admin" class="{{$currentActive == 'admin' ? 'nav-link active' : 'nav-link'}}">
          <i class="nav-icon fas fa-tachometer-alt"></i>
          <p>
            Dashboard
          </p>
        </a>
      </li>
      <li class="nav-item">
        <a href="/admin/vehicle-category" class="{{$currentActive == 'vehicle-category' ? 'nav-link active' : 'nav-link'}}">
          <i class="nav-icon fas fa-filter"></i>
          <p>
            Vehicle Categories
          </p>
        </a>
      </li>
      <li class="nav-item">
        <a href="/admin/vehicle" class="{{$currentActive == 'vehicle' ? 'nav-link active' : 'nav-link'}}">
          <i class="nav-icon fas fa-filter"></i>
          <p>
            Vehicles
          </p>
        </a>
      </li>
      <li class="nav-item">
        <a href="/admin/maintenance" class="{{$currentActive == 'maintenance' ? 'nav-link active' : 'nav-link'}}">
          <i class="nav-icon fas fa-tree"></i>
          <p>
            Maintenance
          </p>
        </a>
      </li>
      <li class="nav-item">
        <a href="/admin/delivery" class="{{$currentActive == 'delivery' ? 'nav-link active' : 'nav-link'}}">
          <i class="nav-icon fas fa-hotel"></i>
          <p>
            Delivery
          </p>
        </a>
      </li>
      <li class="nav-item">
        <a href="/admin/partner" class="{{$currentActive == 'partner' ? 'nav-link active' : 'nav-link'}}">
          <i class="nav-icon fas fa-cloud-meatball"></i>
          <p>
            Partners
          </p>
        </a>
      </li>
      <li class="nav-item">
        <a href="/admin/warehouse" class="{{$currentActive == 'warehouse' ? 'nav-link active' : 'nav-link'}}">
          <i class="nav-icon fas fa-crown"></i>
          <p>
            Warehouse
          </p>
        </a>
      </li>
      <li class="nav-item">
        <a href="/admin/department" class="{{$currentActive == 'department' ? 'nav-link active' : 'nav-link'}}">
          <i class="nav-icon fas fa-car"></i>
          <p>
            Departments
          </p>
        </a>
      </li>
      
    </ul>
    <div>
      <form class="inline" method="POST" action="/admin/logout">
            @csrf
            <button type="submit" class="nav-link bg-danger shadow-none">
                <i class="fas fa-left"></i>
          
            Logout
          
            </button>
        </form>
    </div>
  </nav>
  <!-- /.sidebar-menu -->
</div>