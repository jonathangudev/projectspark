@extends('layouts.layout')

@section('title')
 - Ukrainian Lessons
@endsection


@section('css')
<link href="css/extra-styles.css" rel="stylesheet">
@endsection


@section('content')

  <div class="row">

  <?php

    ///////////////////////////////////////////////////
    //
    //  FIX LATER:  USED TO GET TOPICS OF LESSONS
    //
    //////////////////////////////////////////////////

    $texts_path	 = "texts/";
    $topics_path = $texts_path."topics.txt";
    $topics_string = file_get_contents($topics_path,true);
    $topics_array = explode("\n", $topics_string);


    ///////////////////////////////////////////////////
    //
    //  FIX LATER:  USED TO APPEND "0" to index, for example to make "1.jpg" => "01.jpg"
    //
    //////////////////////////////////////////////////

    for($i=1; $i<=25; $i++)
    {

      if($i > 9)
      {
      	$index  = $i;
      }

      else
      {
      	$index  = "0".$i;
      }

      $topic_text = $topics_array[$i-1];


      ?>



      <div class="col-6 mt-3 col-md-3">
        <div class="card">
          <a href="<?php echo "lessons/$i/"; ?>"><img class="card-img-top" src="<?php echo "../img/$index.jpg"; ?>" alt="Card image cap"></a>
          <div class="card-body">
            <div class="card-title text-center"><?php echo "<b>Lesson $i</b>: $topic_text";?></div>
            <p class="card-text text-center"></p>
            <div class="mx-auto text-center"><a href="<?php echo "lessons/$i/"; ?>" class="btn btn-success btn-sm text-center ">Go to lesson</a></div>
          </div>
        </div>
      </div>

  <?php
  } ?>

  </div>

@endsection