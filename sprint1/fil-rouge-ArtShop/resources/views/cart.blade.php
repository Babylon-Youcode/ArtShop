@extends('layouts.app')

@section('content')
<div class="container-fluid">
    @if($errors->any())
    @foreach ($errors->all() as $error)
       <div class="alert alert-danger">{{$error}}</div>
    @endforeach
    @endif
    <table class="table align-middle">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Image</th>
            <th scope="col">Product</th>
            <th scope="col">Price</th>
            <th scope="col">Quantity</th>
            <th scope="col">Actions</th>
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
            <td class="change">
            <form action="{{route('cart.update',$product['id'])}}" method="POST">@csrf
                <input type="text" name="qty" value="{{$product['qty']}}">
                <button class="btn btn-primary btn-sm">
                    <i class="fas fa-sync"></i> Update
                </button>
            </form>
            </td>
                <td>
                    <form action="{{route('cart.remove',$product['id'])}}" method="POST">@csrf
                        <button type="button" class="btn btn-danger btn-sm px-3">
                            <i class="fas fa-times"></i>
                        </button>
            </form>
                </td>
          </tr>
          @endforeach
        </tbody>
      </table>
      <hr>

</div>
<div class="container-fluid">
    <div class="card-footer" style="overflow:hidden">
        <button class="btn btn-primary">Continue shopping</button>
        <span>Total Price : {{$cart->totalPrice}} Dh</span>
        <a href="{{route('cart.checkout',$cart->totalPrice)}}"><button class="btn btn-info float-right">Checkout</button></a>
    </div>
    @else
        <td>No items in cart</td>
    @endif
</div>

@endsection
