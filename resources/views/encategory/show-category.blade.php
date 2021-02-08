@extends('main') 

@section('title', '| View Post')
    
{{-- @endsection --}} 

@section('content') 

{{-- <div class="col-md-2">
    <a href=" {{route('pages.welcome',$post->id)}}" class="btn btn-primary btn-block btn-h1-spacing p-3"> Go to home </a>
</div> --}}

<div class="row">
    <div class="col-md-8">
   <h1>  category id is: {{ $category->id }}</h1>
   
      category name:  <h1>{{ $category->name }}</h1>

      category image: {{ $category->url}} 
    </div> 
            {{-- SideBar --}} 

            <div class="col-md-4 bg bg-light text text-center mt-4 p-3 border border-dark">

                {{-- <div>

                    <label> Url:</label>
                <a href="{{ route('blog.single', $category->slug) }}"> {{ route('blog.single', $category->slug)}} </a> 
                <br>
                    <div> --}}

                       
                            <label>Created at: </label>
                        <span>{{date('M j, Y H:i', strtotime($category->created_at))}}</span>
                    </div>
            <br>
                    <div>
                            <label>Last Updated at: </label>
                        <span>{{ date('M j, Y H:i', strtotime($category->updated_at))}}</span>
                    </div>
              

                <hr>
               
        </div>






@endsection