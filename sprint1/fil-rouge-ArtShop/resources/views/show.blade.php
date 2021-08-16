@extends('layouts.app')

 @section('content')
 <div class="container mt-5 mb-5">

     <div class="d-flex justify-content-center row">
         <div class="col-md-10">
             <div class="row p-2 bg-white border rounded">
                 <div class="col-md-3 mt-1"><img class="img-fluid img-responsive rounded product-image" src="{{Storage::url($product->image)}}" style="height:239px"></div>
                 <div class="col-md-6 mt-1">
                     <h5>  {{$product->name}}</h5>

                     <div class="mt-1 mb-1 spec-1"><span>{!! $product->additional_info !!}</span></div>
                     <div class="mt-1 mb-1 spec-1"><span>Unique design</span><span class="dot"></span></div>

                     <p class="text-justify mb-0">{!! $product->description !!}<br><br></p>

                     <div class="row">
                         <div class="form-inline" style="transform: translateX(10px);">
                             <h5 style="font-size: 19px">Quantity :</h5>
                             <input type="text" name="qty" class="form-contol ml-2 border border-dark" style="width:80px">
                             <button class="btn btn-primary btn-sm" type="submit" style="margin: 12px">Envoyer</button>
                         </div>
                     </div>


                 </div>
                 <div class="align-items-center align-content-center col-md-3 border-left mt-1">
                     <div class="d-flex flex-row align-items-center">
                         <h4 class="mr-1">{{$product->price}} Dh</h4>
                     </div>
                     <h6 class="text-success">En stock</h6>
                     <div class="d-flex flex-column mt-4">
                         <a href="{{route('add.cart',[$product->id])}}" class="btn btn-outline-primary btn-sm mt-2"><b>Add to cart</b></a>
                     </div>
                 </div>
             </div>

         </div>
     </div>

     @if(count($productFromSameCategories)>0)
     <div class="jumbotron" style="margin-top: 40px">
         <h3 style="font-size: 25px"><b>You may like</b></h3><br>
        <div class="row">
            @foreach ($productFromSameCategories as $product)
              <div class="col-sm-12 col-md-6 col-lg-4">
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
