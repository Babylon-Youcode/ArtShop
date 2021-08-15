@extends('layouts.app')

@section('content')
    <main role="main" style=" margin-left: auto;margin-right: auto;width: 80%">
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
            <div class="cat" style="transform: translate(20px,0px)">
                <h2 style="font-size: 25px"><b>Category :</b></h2><br>
                <input type="button" class="btn btn-secondary flask" value="All" data-filter="all">
                @foreach (App\Models\Category::all() as $cat)
                    <input type="button" class="btn btn-secondary flask" value="{{$cat->name}}"  data-filter="{{$cat->slug}}">
                @endforeach

            </div>
            <div class="album py-5 bg-light">
                <div class="container">
                    <h2 style="font-size: 25px"><b>Products :</b></h2><br>
                    <div class="row">

                        @foreach (App\Http\Controllers\ProductList::getProduct() as $product)

                            <div class="col-md-4 {{$product->slug}}">
                                <div class="card mb-4 box-shadow-sm">
                                    <img class="card-img-top" src="{{Storage::url($product->image)}}" height='200'>
                                    <div class="card-body">
                                        <p><b>{{$product->name}} - {{$product->slug }}</b></p>
                                        <p class="card-text">
                                            {!! Str::limit($product->description,100) !!}
                                        </p>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="btn-group">
                                                <a href="/product/{{$product->id}}"><button type="button" class="btn btn-sm btn-outline-success">View</button></a>
                                                <a href="{{route('add.cart',[$product->id])}}"><button type="button" class="btn btn-sm btn-outline-primary">Add to cart</button></a>
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
            <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <div class="row">
                            @foreach ($randomActiveProducts as $product)
                                <div class="col-4" >
                                    <div class="card mb-4 box-shadow-sm">
                                        <img src="{{Storage::url($product->image)}}" style="width: 100%" height="200">
                                        <div class="card-body">
                                            <p><b>{{$product->name}}</b></p>
                                            <p class="card-text">
                                                {{ (Str::limit($product->description,110)) }}
                                            </p>
                                            <div class="d-flex justify-content-between align-items-center">
                                                <div class="btn-group">
                                                    <a href="product/{{$product->id}}"><button type="button" class="btn btn-sm btn-outline-success">View</button></a>
                                                    <a href="{{route('add.cart',[$product->id])}}"><button type="button" class="btn btn-sm btn-outline-primary">Add to cart</button></a>
                                                </div>
                                                <small class="text-muted">{{$product->price}} Dh</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="row">
                            @foreach ($randomItemProducts as $product)
                                <div class="col-4">
                                    <div class="card mb-4 box-shadow-sm">
                                        <img class="card-img-top" src="{{Storage::url($product->image)}}" width="100%" height="200">
                                        <div class="card-body">
                                            <p><b>{{$product->name}}</b></p>
                                            <p class="card-text">
                                                {{(Str::limit($product->description,110))}}
                                            </p>
                                            <div class="d-flex justify-content-between align-items-center">
                                                <div class="btn-group">
                                                    <a href="product/{{$product->id}}"><button type="button" class="btn btn-sm btn-outline-success">View</button></a>
                                                    <a href="{{route('add.cart',[$product->id])}}"><button type="button" class="btn btn-sm btn-outline-primary">Add to cart</button></a>
                                                </div>
                                                <small class="text-muted">{{$product->price}} Dh</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
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
        </div>
    </footer>
    </div>
@endsection



