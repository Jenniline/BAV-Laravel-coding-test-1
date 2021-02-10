
@extends('main') 

@section('title','| Homepage')

@section('stylesheets') 
  <link rel="stylesheet" type="text/css" href="styles.css">
@endsection

@section('content') 
               

<div class="jumbotron">
  <h1>WELCOME PAGE</h1>
  <h1 class="display-4">Welcome to Bridge African ventures store</h1>
  <p class="lead">This is a simple hero unit, a simple jumbotron-style component for calling extra attention to featured content or information.</p>
  <hr class="my-4">
  <p>It uses utility classes for typography and spacing to space content out within the larger container.</p>

  <div class="row">
    <div class="col-md-6">
      <a class="btn btn-primary btn-lg" href=" {{route('all-categories')}} " role="button">VIEW CATEGORIES</a>
    </div>
    <div class="col-md-6">
      <a class="btn btn-info btn-lg" href=" {{route('all-products')}} " role="button">VIEW PRODUCTS</a>
    </div>
  </div>
  <br>
  <br>

  {{-- <div class="row">
    <div class="col-md-4"><a href="{{route('user-registration-form')}}"><button type="button" class="btn btn-primary">register</button> </a>
    </div>
    <div class="col-md-4"><a href="{{route('user-login-form')}}"><button type="button" class="btn btn-success">LOGIN</button></a>   
    </div>
    <div class="col-md-4"><a href="{{route('user-logout')}}"> <button type="button" class="btn btn-danger"> Logout</button></a>
    </div>
  </div> --}}

</div>
      


          
@endsection 

@section('scripts') 
  <script>
      // confirm('I loaded some js');
  </script>
@endsection


