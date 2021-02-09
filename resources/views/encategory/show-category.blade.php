@extends('main') 

@section('title', '| View Category')
    
{{-- @endsection --}} 

@section('content') 

{{-- <div class="col-md-2">
    <a href=" {{route('pages.welcome',$post->id)}}" class="btn btn-primary btn-block btn-h1-spacing p-3"> Go to home </a>
</div> --}}

<div class="row">
    <div class="col-md-6">
        <h3>VIEW CATEGORY</h3>
        <div class="card" style="width: 58rem;">
            <div class="card-body">
             <h5 class="card-title">  CATEGORY NAME: <h1>  {{$category->name}} </h1></h5>
             <h6 class="card-subtitle mb-2 text-muted">Category id: {{$category->id}} </h6>
             <p>CREATED AT: {{$category->created_at}} </p> <p>UPDATED AT: {{$category->updated_at}} </p> 

             <h3>Category Image is</h3> 
             <img src="{{ $category->image ?? asset('/img/codtestimages/food1.jpeg')}}" class="card-img-top" alt="Category">


              <a class="btn btn-success" href="{{route('edit-category', $category->id)}}" role="button">Edit</a>

              <a class="btn btn-danger" href="{{route('delete-category', $category->id)}}" role="button">Delete</a>


            </div>
        </div>
    </div>
@endsection