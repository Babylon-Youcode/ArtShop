 <div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="./">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
      </ol>
    </div>


<div>

</div>

    <div class="row mb-3">
      <!-- Earnings (Monthly) Card Example -->
      <div class="col-xl-3 col-md-6 mb-4">
        <div class="card h-100">
          <div class="card-body">
            <div class="row align-items-center">
              <div class="col mr-2">
                <div class="text-xs font-weight-bold text-uppercase mb-1">Products</div>
                <div class="h5 mb-0 font-weight-bold text-gray-800">{{\App\Http\Controllers\HomeController::getProducts()}}</div>
              </div>
              <div class="col-auto">
                <i class="fas fa-calendar fa-2x text-primary"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Earnings (Annual) Card Example -->
      <div class="col-xl-3 col-md-6 mb-4">
        <div class="card h-100">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <div class="text-xs font-weight-bold text-uppercase mb-1">Nombre des ordres</div>
                <div class="h5 mb-0 font-weight-bold text-gray-800">{{\App\Http\Controllers\HomeController::getOrders()}}</div>
              </div>
              <div class="col-auto">
                <i class="fas fa-shopping-cart fa-2x text-success"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- New User Card Example -->
      <div class="col-xl-3 col-md-6 mb-4">
        <div class="card h-100">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <div class="text-xs font-weight-bold text-uppercase mb-1">Users</div>
                <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{\App\Http\Controllers\HomeController::getUsers()}}</div>
              </div>
              <div class="col-auto">
                <i class="fas fa-users fa-2x text-info"></i>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Invoice Example -->
      <div class="col-xl-8 col-lg-7 mb-4">
        <div class="card">
          <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Invoice</h6>
            <a class="m-0 float-right btn btn-danger btn-sm" href="{{url('auth/product')}}">View More <i
                class="fas fa-chevron-right"></i></a>
          </div>
          <div class="table-responsive">
            <table class="table align-items-center table-flush">
              <thead class="thead-light">
                <tr>
                  <th>Category name</th>
                  <th>Number of items</th>
                  <th>Tags</th>
                </tr>
              </thead>
              <tbody>
              @foreach(\App\Http\Controllers\HomeController::ProductInCategory() as $data)
                <tr>
                  <td>{{$data->name}}</td>
                  <td>{{$data->products}}</td>
                  <td><span class="badge badge-success">{{   \Illuminate\Support\Str::substr(\Illuminate\Support\Str::slug($data->name),0,3)}}</span></td>
                </tr>

              @endforeach

              </tbody>
            </table>
          </div>
          <div class="card-footer"></div>
        </div>
      </div>
      <!-- Message From Customer-->



  </div>
