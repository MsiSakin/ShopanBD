 <!-- Main Sidebar Container -->
 <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="/themes/admin/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="/themes/admin/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Alexander Pierce</a>
        </div>
      </div>
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

              <li class="nav-item">
                <a href="{{ route('admin.home') }}" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Dashboard</p>
                </a>
              </li>

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-edit"></i>
              <p>
                Forms
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="pages/forms/general.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>General Elements</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/forms/advanced.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Advanced Elements</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/forms/editors.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Editors</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/forms/validation.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Validation</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-table"></i>
              <p>
                Tables
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="pages/tables/simple.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Simple Tables</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/tables/data.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>DataTables</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/tables/jsgrid.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>jsGrid</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview @yield('vendor')">
            <a href="#" class="nav-link @yield('vendor-class')">
                <i class="nav-icon fas fa-table"></i>
                <p> Vendor<i class="fas fa-angle-left right"></i></p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{ route('admin.vendor.list') }}" class="nav-link @yield('vendor_list')">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Vendor List</p>
                    </a>
                </li>

            </ul>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                  <a href="{{ route('admin.vendor.details') }}" class="nav-link @yield('vendor_details')">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Vendor Details</p>
                  </a>
              </li>

          </ul>
        </li>

        <li class="nav-item has-treeview @yield('deliveryMan')">
          <a href="#" class="nav-link @yield('deliveryMan-class')">
              <i class="nav-icon fas fa-table"></i>
              <p> Delivery Man<i class="fas fa-angle-left right"></i></p>
          </a>
          <ul class="nav nav-treeview">
              <li class="nav-item">
                  <a href="{{ route('admin.add.deliveryMan') }}" class="nav-link @yield('addDeliveryMan')">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Add Delivery Man</p>
                  </a>
              </li>
          </ul>
          <ul class="nav nav-treeview">
            <li class="nav-item">
                <a href="{{ route('admin.deliveryMan.list') }}" class="nav-link @yield('deliveryManList')">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Delivery Man List</p>
                </a>
            </li>
        </ul>
      </li>
        <li class="nav-item has-treeview @yield('category')">
            <a href="#" class="nav-link @yield('category-class')">
                <i class="nav-icon fas fa-table"></i>
                <p>Category<i class="fas fa-angle-left right"></i></p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{ route('admin.add.subcategory') }}" class="nav-link @yield('addSubcategory')">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Add SubCategory</p>
                    </a>
                </li>
            </ul>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{ route('admin.subcategory.list') }}" class="nav-link @yield('subcategoryList')">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Sub Category Details</p>
                    </a>
                </li>

            </ul>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{ route('admin.category.list') }}" class="nav-link @yield('categoryList')">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Category Details</p>
                    </a>
                </li>
            </ul>
        </li>
        <li class="nav-item has-treeview @yield('slider')">
            <a href="#" class="nav-link @yield('slider-class')">
                <i class="nav-icon fas fa-table"></i>
                <p>Slider<i class="fas fa-angle-left right"></i></p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{ route('admin.slider.list') }}" class="nav-link @yield('sliderList')">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Slider Details</p>
                    </a>
                </li>
            </ul>
        </li>
        <li class="nav-item has-treeview @yield('coupon')">
            <a href="#" class="nav-link @yield('coupon-class')">
                <i class="nav-icon fas fa-table"></i>
                <p>Coupon<i class="fas fa-angle-left right"></i></p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{ url('/admin/coupon-details') }}" class="nav-link @yield('couponList')">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Coupon Details</p>
                    </a>
                </li>
            </ul>
        </li>
        <li class="nav-item has-treeview @yield('location')">
            <a href="#" class="nav-link @yield('location-class')">
                <i class="nav-icon fas fa-table"></i>
                <p>Set Delivery Location<i class="fas fa-angle-left right"></i></p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{ url('/admin/location-details') }}" class="nav-link @yield('locationList')">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Area Details</p>
                    </a>
                </li>
            </ul>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{ url('/admin/area-create') }}" class="nav-link @yield('areaList')">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Area</p>
                    </a>
                </li>
            </ul>
        </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
