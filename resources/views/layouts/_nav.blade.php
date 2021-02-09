
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">Laravel Blog</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item {{Request::is('/') ? "active" : ""}} " >
              <a class="nav-link" href="/">Home</a>
            </li>

            {{-- <li class="nav-item  {{Request::is('blog') ? "active" : ""}} ">
              <a class="nav-link" href="/blog">Blog</a>
            </li> --}}
          
            <li class="nav-item  {{Request::is('about') ? "active" : ""}} ">
              <a class="nav-link" href="/about">About</a>
            </li>
      
            <li class="nav-item {{Request::is('contact') ? "active" : ""}}">
              <a class="nav-link" href="/contact">Contact</a>
            </li>
      
            <li class="nav-item">
              <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
            </li>      
          </ul>

        
          <form class="form-inline my-2 my-lg-0">

          <a href="{{route('user-registration-form')}}"><button type="button" class="btn btn-primary">register</button> </a>

          <a href="{{route('user-login-form')}}"><button type="button" class="btn btn-primary">LOGIN</button></a>   

          
          <a href="{{route('user-logout')}}"> <button type="button" class="btn btn-primary"> Logout</button></a>


            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
          </form>

         
    </div>
  </nav>