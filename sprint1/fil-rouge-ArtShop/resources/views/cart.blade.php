@extends('layouts.app')

@section('content')
<div class="container">
    @if($errors->any())
    @foreach ($errors->all() as $error)
       <div class="alert alert-danger">{{$error}}</div> 
    @endforeach
    @endif
    <table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Image</th>
            <th scope="col">Product</th>
            <th scope="col">Price</th>
            <th scope="col">Quantity</th>
            <th scope="col">Remove</th>
          </tr>
        </thead>
        <tbody>
@if ($cart)
                
            @php $i=1 @endphp
            @foreach ($cart->items as $product)
                
          <tr>
            <th scope="row">{{$i++}}</th>
            <td><img src="{{Storage::url($product['image'])}}" width="80"></td>
            <td>{{$product['name']}}</td>
            <td>{{$product['price']}}</td>
            <td>
            <form action="{{route('cart.update',$product['id'])}}" method="POST">@csrf
                <input type="text" name="qty" value="{{$product['qty']}}">
                <button class="btn btn-secondary btn-sm">
                    <i class="fas fa-sync"></i> Update
                </button>
            </form>
            </td>   
                <td>
                    <form action="{{route('cart.remove',$product['id'])}}" method="POST">@csrf
                    <button class="btn btn-danger">Reomove</button>
            </form>
                </td>         
          </tr>  
          @endforeach       
        </tbody>
      </table>
      <hr>
      <div class="card-footer" style="overflow:hidden">
          <button class="btn btn-primary">Continue shopping</button>
          <span style="margin-left:30%">Total Price : {{$cart->totalPrice}} Dh</span>
        <a href="{{route('cart.checkout',$cart->totalPrice)}}"><button class="btn btn-info float-right">Checkout</button></a>
      </div>
      @else
      <td>No items in cart</td>
      @endif
</div>
@endsection