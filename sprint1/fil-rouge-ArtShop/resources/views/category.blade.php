@extends('layouts.app')

@section('content')
<div class="container">
  <h2>Products</h2>  
   <div class="row">
      <div class="col-md-2">
        <form action="#" method="GET">
            @foreach ($categories as $category)
                
            <p><input type="checkbox" name="category" value="{{$category->id}}">{{$category->name}}</p>
            @endforeach
            <input type="submit" value="filter" class="btn btn-success">
        </form>
      </div>
      <div class="clo-md-10">
          <div class="row">
              <div class="col-md-4">
                <img src="" height="200" style="width:100%">  
                    <div class="card-body">
                        <p><b>name</b></p>
                        <p class="card-text">description</p>
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="btn-group">
                            <a href="#"><button type="button" class="btn btn-sm btn-outline-success">view</button></a>
                            <button type="button" class="btn btn-sm btn-outline-primary">ADD to cart</button>
                        </div>
                        <small class="text-muted">$price</small>
                    </div>
                    </div>
            </div>
          </div>
      </div>
    </div>  
</div>  
@endsection