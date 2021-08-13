@extends('layouts.app')

 @section('content')
 <div class="container">
     <div class="card">
         <div class="row">
            <aside class="col-sm-5 border-right">
                <section class="gallery-wrap">
                    <div class="img-big-wrap">
                        <div style="overflow: hidden;"><a href="#">
                            <img src="{{Storage::url($product->image)}}" width="100%" ></a>
                        </div>
                    </div>
                </section>
            </aside>
            <aside class="col-sm-7">
                <section class="card-body p-5">
                    <h3 class="title mb-3" style="font-size: 19px">
                        {{$product->name}}
                    </h3>
                    <p class="price-detail-wrap">
                        <span class="price h3 text-danger">
                            <span class="currency">{{$product->price}} Dh</span>

                        </span>
                    </p><br>
                    <h3 style="font-size: 25px">Description :</h3>
                        <p>{!! $product->description !!}</p>
                    <h3 style="font-size: 25px">Additional information :</h3>
                        <p>{!! $product->additional_info !!}</p><br>
                    <hr><br>
                    <div class="row">
                        <div class="form-inline">
                            <h3 style="font-size: 25px">Quantity :</h3>
                            <input type="text" name="qty" class="form-contol ml-2">
                            <input type="submit" class="btn btn-primary ml-2">
                        </div>
                    </div><br>
                    <hr><br>
                        <a href="{{route('add.cart',[$product->id])}}" class="btn btn-lg btn-outline-primary text-uppercase"><b>Add to cart</b></a>
                </section>
            </aside>
         </div>
     </div>
     @if(count($productFromSameCategories)>0)
     <div class="jumbotron">
         <h3 style="font-size: 25px"><b>You may like</b></h3><br>
        <div class="row">
            @foreach ($productFromSameCategories as $product)
              <div class="col-md-4">
                <div class="card mb-4 box-shadow-sm">
                  <img class="card-img-top" src="{{Storage::url($product->image)}}" width="100%" height="200">
                  <div class="card-body">
                    <p><b>{{$product->name}}</b></p>
                    <p class="card-text">
                      {!! Str::limit($product->description,100) !!}
                    </p>
                    <div class="d-flex justify-content-between align-items-center">
                      <div class="btn-group">
                        <a href="{{Route('product.view',[$product->id])}}"><button type="button" class="btn btn-sm btn-outline-success">View</button></a>
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
     @endif
 </div>     
 @endsection
