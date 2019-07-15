@extends('spark::layouts.app')

@section('title')
Study Ukrainian - Ukrainian Lessons
@endsection


@section('css')
<link href="css/extra-styles.css" rel="stylesheet">

<style>
  .image-container {
    position: relative;
    max-width: 800px;
    /* Maximum width */
    margin: 0 auto;
    /* Center it */
  }

  .image-container .image-text {
    position: absolute;
    /* Position the background text */
    top: 0;
    /* At the bottom. Use top:0 to append it to the top */
    background: rgb(218, 165, 32);
    /* Fallback color */
    background: rgba(218, 165, 32, 0.9);
    /* Black background with 0.5 opacity */
    color: white;
    /* Grey text */
    width: 100%;
    /* Full width */
    padding: 8px;
    /* Some padding */


  }
</style>
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

    <div class="row">

      <?php

      ///////////////////////////////////////////////////
      //
      //  FIX LATER:  USED TO GET TOPICS OF LESSONS
      //
      //////////////////////////////////////////////////

      $texts_path   = "texts/";
      $topics_path = $texts_path . "topics.txt";
      $topics_string = file_get_contents($topics_path, true);
      $topics_array = explode("\n", $topics_string);


      ///////////////////////////////////////////////////
      //
      //  FIX LATER:  USED TO APPEND "0" to index, for example to make "1.jpg" => "01.jpg"
      //
      //////////////////////////////////////////////////

      for ($i = 1; $i <= 25; $i++) {

        if ($i > 9) {
          $index  = $i;
        } else {
          $index  = "0" . $i;
        }

        $topic_text = $topics_array[$i - 1];

        //check if dialogue number is in the premium list
        if (in_array($i, $premiumDialogueNumbers)) {
          $premiumGated = true;
        } else {
          $premiumGated = false;
        }

        if ($subscribed) {
          $premiumGated = false;
        }


        ?>



        <div class="col-6 mt-3 col-md-3">
          <div class="card">

            @if($premiumGated)
            <div class="image-container">
              <a href="<?php echo "lessons/$i"; ?>"><img class="card-img-top" src="<?php echo "../img/$index.jpg"; ?>" alt="Card image cap"></a>
              <div class="image-text text-center">
                <h5>★ Premium</h5>
              </div>
            </div>
            @else
            <a href="<?php echo "lessons/$i"; ?>"><img class="card-img-top" src="<?php echo "../img/$index.jpg"; ?>" alt="Card image cap"></a>

            @endif


            <div class="card-body">
              <div class="card-title text-center"><?php echo "<b>Lesson $i</b>: $topic_text"; ?></div>
              <p class="card-text text-center"></p>
              <div class="mx-auto text-center"><a href="<?php echo "lessons/$i"; ?>" class="btn btn-success btn-sm text-center ">Go to lesson</a></div>
            </div>
          </div>
        </div>

      <?php
    } ?>

    </div>

  </div>
</home>
@endsection