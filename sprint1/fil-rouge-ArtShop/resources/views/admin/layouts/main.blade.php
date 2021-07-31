@include('admin.layouts.header')

  <div id="wrapper">
    <!-- Sidebar -->
@include('admin.layouts.sidebar')
    <!-- End Sidebar -->
    <div id="content-wrapper" class="d-flex flex-column">
      <div id="content">
        <!-- TopBar -->
@include('admin.layouts.navbar')
        <!-- End Topbar -->

        <!-- Container Fluid-->
@yield('content')
        <!--- End Container Fluid-->
      </div>
      <!-- Footer -->
@include('admin.layouts.footer')
      <!-- End Footer -->
    </div>
  </div>