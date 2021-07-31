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
@include('admin.layouts.container')
        <!--- End Container Fluid-->
      </div>
      <!-- Footer -->
@include('admin.layouts.footer')
      <!-- End Footer -->
    </div>
  </div>

  <!-- Scroll to top -->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

