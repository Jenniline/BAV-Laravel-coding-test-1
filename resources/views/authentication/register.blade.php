@extends('main') 

@section('title','| LOGIN')

    @section('stylesheets') 
    <link rel="stylesheet" type="text/css" href="styles.css">
    @endsection

@section('content')
{{-- @endsectionform method="post" action=" {{ url('user-store') }} "> --}}
<form method="POST" action="{{route('user-registratio-store')}}">
    <h1>REGISTER</h1>
    <div class="card shadow mb-4">
        <div class="car-header bg-success pt-2">
            <div class="card-title font-weight-bold text-white text-center"> User Registration </div>
        </div>

        <div class="card-body">

                @if(Session::has('success'))
                    <div class="alert alert-success">
                        {{ Session::get('success') }}
                        @php
                            Session::forget('success');
                        @endphp
                    </div>
                @endif


            <div class="form-group">
                <label for="name"> Name </label>
                <input type="text" name="name" id="name" class="form-control" placeholder="Enter Name" value="{{ old('name') }}"/>
                {!! $errors->first('name', '<small class="text-danger">:message</small>') !!}
            </div>

            <div class="form-group">
                <label for="email"> E-mail </label>
                <input type="text" name="email" id="email" class="form-control" placeholder="Enter E-mail" value="{{ old('email') }}"/>
                {!! $errors->first('email', '<small class="text-danger">:message</small>') !!}
            </div>

            <div class="form-group">
                <label for="password"> Password </label>
                <input type="password" name="password" id="password" class="form-control" placeholder="Enter Password" value="{{ old('password') }}"/>
                {!! $errors->first('password', '<small class="text-danger">:message</small>') !!}
            </div>

        </div>

        <div class="card-footer d-inline-block">
            <button type="submit" class="btn btn-success"> Register </button>
        <p class="float-right mt-2"> Already have an account?  <a href="{{route('user-login-form')}}" class="text-success"> Login </a> </p>
        </div>
        @csrf
    </div>
</form>


@endsection

@section('scripts') 
  <script>
      // confirm('I loaded some js');
  </script>






