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
                    <h3 class="title mb-3">
                        {{$product->name}}
                    </h3><hr>
                    <p class="price-detail-wrap">
                        <span class="price h3 text-danger">
                            <span class="currency">{{$product->price}} dh</span><hr>

                        </span>
                    </p>
                    <h3>{!! $product->description !!}</h3><hr>
                    <h3>{!! $product->additional_info !!}</h3>
                    <hr>
                    <div class="row">
                        <div class="form-inline">
                            <h3>quantity :</h3>
                            <input type="text" name="qty" class="form-contol ml-2">
                            <input type="submit" class="btn btn-primary ml-2">
                        </div>
                    </div>
                    <hr>
                        <a href="#" class="btn btn-lg btn-outline-primary text-uppercase">Add to cart</a>
                </section>
            </aside>
         </div>
     </div>
 </div>     
 @endsection
