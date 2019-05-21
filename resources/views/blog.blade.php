@extends('layouts.layout')

@section('title')
 - {{ $title }}
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
        From the blog
      </h3>

      <div class="blog-post">
        <h1 class="blog-post-title">{{$title}}</h1>
        <p class="blog-post-meta">{{ $time_posted }}</p>
         @php echo $body; @endphp
      </div><!-- /.blog-post -->
    </div>
  </div>
</main>


@endsection