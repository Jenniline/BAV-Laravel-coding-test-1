
@extends('main') 

@section('title','| Categories_page')

@section('stylesheets') 
  <link rel="stylesheet" type="text/css" href="styles.css">
@endsection

@section('content') 

<div class="row">
    <a href="{{route('create-category')}}"> <button type="button" class="btn btn-primary btn-lg">ADD A CATEGORY</button> </a> 
</div>

<div class="row">
  <h1>SELECT A CATEGORY</h1>
</div>
<br>

<div class="row">
  @foreach ($categories as $category)
  <div class="col-md-4">
    <div class="card" style="width: 18rem;">
      <img src="{{asset('/img/codtestimages/' . $category->name. '.jpeg' )}}" class="card-img-top" alt="food1">
    
      <div class="card-body">
        {{-- <h5 class="card-title">Card title</h5> --}}
        {{-- <a href="{{ route('bk.fr.services-providers', ['category' => $serviceProvidersCategory->name]) }}" class="sp_category_card_text"> --}}

        <h4> {{$category->name}} </h4>

        <div class="row">
          <div class="col-md-6"> </div>
          <div class="col-md-6"><a href="#"> <p> see products </p></a> </div>
        </div>
        <br>

        <button type="button" class="btn btn-success">Edit</button>

        <button type="button" class="btn btn-danger">Delete</button>

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


