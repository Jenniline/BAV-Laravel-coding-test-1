
@extends('main') 




@section('title','| products')

@section('stylesheets') 
  <link rel="stylesheet" type="text/css" href="styles.css">
@endsection

@section('content') 

<div class="row">
  <a href="{{route('create-product')}}"> <button type="button" class="btn btn-primary btn-lg">ADD A PRODUCT</button> </a> 
</div>

  <br>

 <div class="row">
    @foreach ($products as $product)
    
    <div class="col-md-4">
        <div class="card" style="width: 18rem;">
          <img src="{{ $product->image ?? asset('/img/codtestimages/food1.jpeg')}}" class="card-img-top" alt="Product">

          {{-- <img src=" {{('/img/codtestimages' . $product->images->name)}}" alt="image"> --}}
        
          <div class="card-body">
            {{-- <h5 class="card-title">Card title</h5> --}}

            <h4> {{$product->name }} </h4>
            <p class="card-text"> {{$product->description}} </p>
            {{-- <a href="#" class="btn btn-primary">Go somewhere</a> --}}

        <a  class="btn btn-info" href="{{route('show-product', $product->id)}}"  role="button">View</a>
        <a class="btn btn-success" href="{{route('edit-product', $product->id)}}" role="button">Edit</a>

        <a class="btn btn-danger" href="{{route('delete-product', $product->id)}}" role="button">Delete</a>
          </div>
        </div>
      </div>

@endforeach
 </div>





      


          
@endsection 

@section('scripts') 
  <script>
      // confirm('I loaded some js');
  </script>
@endsection


