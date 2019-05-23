@extends('spark::layouts.app')

@section('title')
Study Ukrainian - Blog
@endsection

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