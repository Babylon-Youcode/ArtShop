{{-- @extends('layouts.app')

@extends('layouts.app')

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


 --}}
 @extends('layouts.app')

 @section('content')
 <div class="container">
   <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header">Dashboard</div>
            <div class="card-body">
              @if(session('status'))
              <div class="alert alert-success" role="alert">
                  {{session('status')}}
              </div>
              @endif
              You are logged in!
            </div>
        </div>
      </div>
   </div>
 </div>
     
 @endsection
