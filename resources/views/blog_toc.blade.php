@extends('layouts.layout')

@section('title')
 - Blog
@endsection

@section('css')
  <link href="../css/sticky-footer-navbar.css" rel="stylesheet"> <!-- from: http://getbootstrap.com/docs/4.0/examples/sticky-footer-navbar/# -->
  <link href="../css/extra-styles.css" rel="stylesheet">

@endsection


@section('content')

<main role="main" class="container">
  <div class="row">
    <div class="col-md-8 blog-main">
      <h3 class="pb-3 mb-4 font-italic border-bottom">
        The Study Ukrainian blog
      </h3>


      <div class="album bg-white">

          @foreach ($result as $row)

          <div class="row">
            <div class="col-12">
              <div class="card mb-4 shadow-sm">
                <img class="card-img-top" src="/blogimg/how-to-learn-ukrainian-online.jpg" alt="">
                <div class="card-body">
                  <p class="card-text"><a href="blog/{{$row->title_code}}">{{$row->title}}</a></p>
                </div>
              </div>
            </div>
          </div>

        @endforeach

      </div>


    </div>
  </div>
</main>


@endsection