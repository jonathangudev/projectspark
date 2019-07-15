@extends('spark::layouts.app')

@section('title')
Study Ukrainian - Blog
@endsection

@push('scripts')
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-100622268-2"></script>
<script>
  window.dataLayer = window.dataLayer || [];

  function gtag() {
    dataLayer.push(arguments);
  }
  gtag('js', new Date());

  gtag('config', 'UA-100622268-2');
</script>
@endpush


@section('content')

<home :user="user" inline-template>
  <div class="container">

    <ul>
      <li><a href="{{route('blog-how-i')}}">How I Learned Ukrainian</a></li>
      <li><a href="{{route('blog-where-to')}}">Where to Learn Ukrainian in Lviv</a></li>
      <li><a href="{{route('blog-how-to')}}">How to Learn Ukrainian Online</a></li>

  </div>

</home>

@endsection