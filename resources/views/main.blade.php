<!doctype html>
<html lang="en">

<head>
    @include('layouts._head')  
</head>
  

    <body> 

        @include('layouts._nav')

        <div class="container">
            @include('layouts._messages')
{{-- 
        {{Auth::check() ? "Logged In" : "Logged Out"}}                 --}}
           
                <!-- Introducing blade using Laravel --> 
            @yield('content')     

            @include('layouts._footer') 

        </div>   
        {{-- end of container --}}
                {{-- must not be named content can be named anything you want e.g body --}}

        @include('layouts._javascript')

            @yield('scripts')
</body>
</html>