@if(Session::has('success'))

<div class="alert alert-success" role="alert"> 
  <strong>  Success   </strong>   
  {{-- to output the value of the session and pull the success message out of the session --}}
   {{ Session::get('success')}} 
    <br>
    Blog Post created 
     </div>
    
@endif

@if(count($errors) > 0)
    
     <div class="alert alert-danger" role="alert">
          <strong>Errors</strong>

          <ul>
            @foreach ($errors->all() as $error)
               <li>{{$error}}</li>
            @endforeach
          </ul>
                
     </div>

@endif