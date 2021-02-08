@extends('main') 

@section('title','| Edit Category')

    @section('stylesheets') 
    <link rel="stylesheet" type="text/css" href="styles.css">
    @endsection

@section('content')
    <h4> EDIT CATEGORY {{$category->name}} </h4>
    <form action="{{route('update-category',  $category->id)}}" method="POST">
        @csrf
        <div class="form-group">

        <label for="category_name"> <h3>CATEGORY NAME</h3> </label>
        <input class="form-control" id="category_name" name="category_name">
        </div>

        <div class="form-group">
            <label for="exampleFormControlFile1"> <h3>  UPLOAD AN IMAGE</h3></label>
            <input type="file" class="form-control-file" id="exampleFormControlFile1">
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

@endsection

@section('scripts') 
  <script>
      // confirm('I loaded some js');
  </script>
@endsection






