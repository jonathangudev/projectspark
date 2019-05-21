@extends('layouts.layout')

@section('title')
 - Contact
@endsection


@section('css')
<link href="css/extra-styles.css" rel="stylesheet">
@endsection


@section('content')

        <div class="contact-text text-center mt-3 mt-md-5">
          <h1 class="text-center">Contact</h1>

          @if($success==TRUE)
            <p> Your message has been sent and we will review it soon! </p>
          @endif

          <p>
            Questions?  Comments?  Technical issues? Send us a message with the form below.
          </p>

          <form class="mt-4 px-5 mx-auto" method="POST" action="/contact">

            {{ csrf_field() }}

            <div class="form-group">
              <label for="contactEmail">Email address</label>
              <input type="email" class="form-control" id="email" name="email" placeholder="Enter email">
            </div>

            <div class="form-group">
              <label for="exampleFormControlTextarea1">Message</label>
              <textarea class="form-control" id="message" name="message" rows="6" placeholder="Enter message here" required></textarea>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>

          </form>


        </div>

@endsection