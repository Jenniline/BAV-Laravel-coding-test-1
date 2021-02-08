
@extends('main') 

@section('title','| Contact')

@section('content') 

    <div class="row">
        <div class="col-md-12">
            <h1>Contact Me</h1>
            <form action="">

                <div class="form-group"> 
                    <label name="fname" for="">First Name:</label>
                    <input type="text" name="fname" id="fname" class="form-control">
                </div>  

                <div class="form-group"> 
                    <label name="email" for="">Email:</label>
                    <input type="text" name="email" id="email" class="form-control">
                </div>

                <div class="form-group"> 
                    <label name="lname" for="">last Name:</label>
                    <input type="text" name="lname" id="lname" class="form-control">
                </div> 

                <div class="form-group">
                    <label for="message">Message</label>
                    <textarea class="form-control" id="message" class="form-control" placeholder="Type message here..." rows=5 ></textarea>
                </div>

                <button type="submit" class="btn btn-success">Send Message</button>




            </form>
        </div>
    </div>

@endsection

       
