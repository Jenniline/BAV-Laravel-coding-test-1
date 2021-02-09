
@extends('main')

@section('title','| About')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <h1>About Me</h1>
          <p> This is a coding I Jenniline Ebai Final year student at the UNIVERSITY OF BUEA. performed for the position of a laravel developer at BRIDGE ADVENTURES </p>
          <h4>l enjoyed working on this project. It challenged me as I worked under pressure this project brought out qualities in me that I never knew existed.  And I am ready to do more for BRIDGE ADVENTURES</h4>
        </div>
    </div>



<div class="card" style="width: 45rem;">
    <img src="{{asset('/img/codtestimages/my_pic.png')}}" class="card-img-top" alt="MY PIC">

    <div class="card-body">
      <h1 class="card-title"> NAME: Jenniline Ebai </h1>
      {{-- <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p> --}}
    </div>
    <ul class="list-group list-group-flush">
      <li> <h3 class="card-title"> PHONE NUMBER: +237 680497435 </h3> </li> 
    <li> <h3 class="card-title"> Email: jennilineebai@gmail.com </h3></li>   
    <li> <h3 class="card-title"> Location: Buea Cameroon</h3></li> </ul>
    <li> <h3 class="card-title"> Education: Computer Engineering, UNIVERSITY OF BUEA</h3></li> </ul>

  </div>
@endsection 

@section('sidebar') 
    
@endsection
       
 



