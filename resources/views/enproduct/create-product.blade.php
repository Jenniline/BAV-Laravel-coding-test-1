@extends('main') 

@section('title','| Create_Product')

    @section('stylesheets') 
    <link rel="stylesheet" type="text/css" href="styles.css">
    @endsection

@section('content')
    <form method="POST" action="{{route('store-category')}}">
       
        {{ csrf_field() }}
        <div class="form-group">

        <div class="form-group">
            <label for="exampleFormControlSelect1"> <h3>SELECT A CATEGORY</h3></label>
            <select class="form-control" name="category_id">
                <option selected>Choose...</option>
                @foreach ($categories as $category)
                    <option value="{{$category->id}}"> {{$category->name}} </option> <br>
                @endforeach  
            </select>
            @if ($errors->has('category_id'))
                <span class="help-block">
                    <strong>{{ $errors->first('category_id') }}</strong>
                </span>
            @endif
        </div>

        <label for="product_name"> <h3>PRODUCT NAME</h3> </label>
          <input  class="form-control" id="product_name" name="product_name">
        </div>

        <div class="form-group">
            <label for="exampleFormControlTextarea1"><h3> DESCRIPTION</h3> </label>
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="product_description"></textarea>
        </div>

        <div class="form-group">
            <label for="price"> <h3> PRICE</h3></label>
            <input type="number" class="form-control" id="price" aria-describedby="emailHelp" name="product_price">
        </div>
      
        <div class="form-group">
            <label for="exampleFormControlFile1"> <h3>  UPLOAD AN IMAGE</h3></label>
            <input type="file" class="form-control-file" name="product_image" id="exampleFormControlFile1">
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

@endsection

@section('scripts') 
  <script>
      // confirm('I loaded some js');
  </script>
@endsection






