@extends('layouts.app')

@section('content')
<main role="main" style=" margin-left: auto;margin-right: auto;width: 80%">
  {{-- <section class="jumbotron text-center">
    <div class="container">
      <h1 class="jumbotron-heading">Album example</h1>
      <p class="lead text-muted">Something short and leading about the collection below—its contents, the creator, etc. Make it short and sweet, but not too short so folks don't simply skip over it entirely.</p>
      <p>
        <a href="#" class="btn btn-primary my-2">Main call to action</a>
        <a href="#" class="btn btn-secondary my-2">Secondary action</a>
      </p>
    </div>
  </section> --}}
  <section class="jumbotron">
  <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img class="d-block w-100" src="{{ asset('admin/images/art4.jpeg')}}" alt="First slide">
      </div>
      <div class="carousel-item">
        <img class="d-block w-100" src="{{ asset('admin/images/art3.jpeg')}}" alt="Second slide">
      </div>
      <div class="carousel-item">
        <img class="d-block w-100" src="{{ asset('admin/images/art5.jpg')}}" alt="Third slide">
      </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</section>
  <section class="container-fluid">
<div class="cat">
  <h2>Category</h2>
  @foreach (App\Models\Category::all() as $cat)
     <button class="btn btn-secondary">{{$cat->name}}</button> 
  @endforeach
</div>
        <div class="album py-5 bg-light">
          <div class="container">
            <h2>Products</h2>
            <div class="row">
            @foreach ($products as $product)
              <div class="col-md-4">
                <div class="card mb-4 box-shadow-sm">
                  <img class="card-img-top" src="{{Storage::url($product->image)}}" width="100%" height="225">
                  <div class="card-body">
                    <p><b>{{$product->name}}</b></p>
                    <p class="card-text">
                      {!! Str::limit($product->description,120) !!}
                    </p>
                    <div class="d-flex justify-content-between align-items-center">
                      <div class="btn-group">
                        <a href="product/{{$product->id}}"><button type="button" class="btn btn-sm btn-outline-success">View</button></a>
                        <button type="button" class="btn btn-sm btn-outline-primary">Add to cart</button>
                      </div>
                      <small class="text-muted">{{$product->price}} dh</small>
                    </div>
                  </div>
                </div>
              </div>
              @endforeach
            </div>
          </div>
        </div>
      </section>
      <div class="jumbotron" style="width: 90%;transform: translate(5%);">
        <div id="carouselExampleFade" class="carousel slide" data-ride="carousel">
          <div class="carousel-inner">
            <div class="carousel-item active">
              <div class="row">
                <div class="col-3" >
                  <img src="{{ asset('public/admin/images/art1.jpeg') }}" class="img-thumbnail">
                </div>
                <div class="col-3">
                  <img src="../img/art3.jpeg" class="img-thumbnail">
                </div>
                <div class="col-3">
                  <img src="../img/art3.jpeg" class="img-thumbnail">
                </div>
                <div class="col-3">
                  <img src="../img/art3.jpeg" class="img-thumbnail">
                </div>
              </div>
            </div>
          <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>
      </div>
  
      </main>
      <footer class="text-muted">
        <div class="container">
          <p class="float-right">
            <a href="#">Back to top</a>
          </p>
          <p>Album example is &copy; Bootstrap, but please download and customize it for yourself!</p>
          <p>New to Bootstrap? <a href="../../">Visit the homepage</a> or read our <a href="../../getting-started/">getting started guide</a>.</p>
        </div>
      </footer>
        </div>
    </div>    
@endsection
