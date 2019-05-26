@extends('spark::layouts.app')

@section('title')
Study Ukrainian - Ukrainian Lesson <?php echo $dialogue_number; ?>
@endsection

@section('css')
<link href="../../css/sticky-footer-navbar.css" rel="stylesheet"> <!-- from: http://getbootstrap.com/docs/4.0/examples/sticky-footer-navbar/# -->
<link href="../../css/tooltip.css" rel="stylesheet">
<link href="../../css/extra-styles.css" rel="stylesheet">
@endsection


@push('scripts')
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

<script>
  @if(isset($premiumGated) && $premiumGated)
  $(window).on('load', function() {
    $('#exampleModal').modal({
      backdrop: 'static',
      keyboard: false,
      show: true
    });
  });
  @endif

  function transliterate() {
    $(".foreign-script").toggle();
    $(".english-script").toggle();
  }
</script>



<script>
  function playAudio(i) {

    //prevents the function from playing any audio or doing anything if the dialogue audio is currently playing.
    //if (stop_mode ==0)
    //{

    var audioArray = document.getElementsByClassName('songs');

    audioArray[i].load();
    audioArray[i].play();
    //}
  }


  function playAudioAll() {

    //prevents the function from playing any audio or doing anything if the dialogue audio is currently playing.
    //if (stop_mode ==0)
    //{

    var audioAll = document.getElementById('audio-all');

    audioAll.play();
    //}
  }
</script>
@endpush

@section('content')
<home :user="user" inline-template>
  <div class="container">

    @if(isset($premiumGated) && $premiumGated)
    <!-- Modal -->
    <div class="modal show" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Premium Lesson</h5>

          </div>
          <div class="modal-body">
            This lesson is only available for Study Ukrainian Premium members. Get premium for only $3.99 per month!
          </div>
          <div class="modal-footer text center">
            <a href="/lessons"><button type="button" class="btn btn-primary">
                Browse free lessons</button></a>

            <a href="/premium"><button type="button" class="btn btn-primary">Get Premium!</button></a>
          </div>
        </div>
      </div>
    </div>
    @endif

    <!-- Title -->
    <div class="text-center">
      <h1><?php echo "Dialogue $dialogue_number"; ?> </h1>
    </div>

    <!-- Image -->
    <div class="row justify-content-center">
      <div class="col-md-10 col-lg-3  text-center" />
      <img class="mx-auto rounded img-fluid" src="<?php echo $lesson->getImageSource(); ?>">

      <div class="pt-2 text-left text-secondary"></div>
    </div>
    <!-- /div -->

    <!-- Dialogue Table -->
    <!-- div class="row justify-content-center  "-->

    <div class="col-md-10 col-lg-9 px-3 mt-3 mt-lg-0">

      <table class="mx-auto table table-striped table-sm" id="lesson-dialogue-table">
        <?php $lesson->buildTable(); ?>
      </table>

      <?php $lesson->buildFullAudioElement(); ?>

    </div>

  </div>


  <!-- Transliteration and Translation Buttons / Toggles -->
  <div class="text-center">
    <button class="btn btn-info" id="toggleTransliterationButton" onclick='transliterate()'>Toggle Transliteration</button>
    <!--button class="btn btn-info" onclick="toggleDefinitions()" >Show Literal Translations</button-->
  </div>



  <div class="row justify-content-center">
    <div class="grammar-explanation col-md-10 mt-3">
      <h3>Grammar Notes</h3>
      <div id="grammar-explanation">

        <?php echo $lesson->getGrammarText(); ?>

      </div>
    </div>
  </div>

  <div class="text-center">

    <?php if ($lesson->dialogue_number >  1) {
      $lesson->buildPreviousDialogueButton();
    } ?>
    <?php if ($lesson->dialogue_number <  20) {
      $lesson->buildNextDialogueButton();
    } ?>

  </div>
  </div>
</home>

@endsection