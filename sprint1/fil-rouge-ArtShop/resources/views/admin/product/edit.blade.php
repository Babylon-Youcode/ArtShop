@extends('admin.layouts.main')

@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 ml-4 text-gray-800">Product</h1>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="./"></a></li>
        <li class="breadcrumb-item active" aria-current="page">Product</li>
    </ol>
</div>
<div class="row justify-content-center">
    @if(Session::has('message'))
    <div class="alert alert-success" style="z-index:1">{{Session::get('message')}}</div>
    @endif
    <div class="col-lg-10">
        <form action="{{route('product.update', [$product->id])}}" method="POST" enctype="multipart/form-data">@csrf
        {{method_field('PUT')}}
            <div class="card mb-6">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Update Product</h6>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label for="">Name</label>
                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="" aria-describedby="" placeholder="Entrer name of product" value="{{$product->name}}">
                    @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                     @enderror
                </div>
                <div class="form-group">
                    <label for="">Description</label>
                    <textarea name="description" id="summernote" class="form-control @error('description') is-invalid @enderror">{{ $product->description }}</textarea>
                    @error('description')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                     @enderror
                </div>
                <div class="form-group">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input @error('image') is-invalid @enderror" id="customFile" name="image">
                        <label class="custom-file-label" for="customFile">Choose file</label><br>
                        <center><img src="{{Storage::url($product->image)}}" width="100"></center>
                        @error('image')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                     @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label for="">Price (dh)</label>
                    <input type="text" name="price" class="form-control @error('price') is-invalid @enderror" id="" aria-describedby="" value="{{$product->price}}">
                    @error('price')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                     @enderror
                </div>
                <div class="form-group">
                    <label for="">Additional information</label>
                    <textarea name="additional_info" id="summernote1" class="form-control @error('additional_info') is-invalid @enderror">{{ $product->additional_info }}</textarea>
                    @error('additional_info')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                     @enderror
                     
                </div>
                <div class="form-group">
                    <div class="custom-file">
                        <label>Choose Category</label>
                        <select name="category" class="form-control @error('category') is-invalid @enderror">
                            <option>Select</option>
                            @foreach(App\Models\Category::all() as $category)
                            <option value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach    
                        </select>
                        @error('category')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                     @enderror
                    </div><br><br>
                    {{-- <div class="form-group">
                        <div class="custom-file">
                            <label>Choose Subcategory</label>
                            <select name="subcategory" class="form-control @error('subcategory') is-invalid @enderror">
                                <option value="">Select</option>   
                            </select>
                        </div><br><br> --}}
                        <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
        </form>
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script type="text/javascript">
</script>
@endsection