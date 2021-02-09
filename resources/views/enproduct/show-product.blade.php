@extends('main') 

@section('title', '| View Product')
    
{{-- @endsection --}} 

@section('content') 

{{-- <div class="col-md-2">
    <a href=" {{route('pages.welcome',$post->id)}}" class="btn btn-primary btn-block btn-h1-spacing p-3"> Go to home </a>
</div> --}}

<div class="row">
    <div class="col-md-6">
        <h3>VIEW PRODUCT</h3>
        <div class="card" style="width: 58rem;">
            <div class="card-body">
             <h5 class="card-title">  PRODUCT NAME: <h1>  {{$product->name}} </h1></h5>
             <h5 class="card-title">  CATEGORY NAME: <h1>  {{$product->category->name}} </h1></h5>

             <h6 class="card-subtitle mb-2 text-muted">Product id: {{$product->id}} </h6>
             <p>CREATED AT: {{$product->created_at}} </p> <p>UPDATED AT: {{$product->updated_at}} </p> 

             <h3>Product Image is</h3> 
             <p>  image here</p>

              <a class="btn btn-success" href="{{route('edit-product', $product->id)}}" role="button">Edit</a>

              <a class="btn btn-danger" href="{{route('delete-product', $product->id)}}" role="button">Delete</a>


            </div>
        </div>
    </div>
@endsection