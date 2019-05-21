@extends('layouts.layout')

@section('title')
 - About
@endsection


@section('css')
<link href="css/extra-styles.css" rel="stylesheet">
@endsection


@section('content')

        <div class="about-text">
            <h1 class="text-center">  About the Project </h1>
            <div class="row justify-content-around">

              <div class="col-12 col-md-4 col-lg-3 text-center">
                <img class="img-fluid rounded mx-auto" src="../img/lviv.jpg" alt"Lviv">
              </div>

              <div class="col-12 col-md-6 mt-3 my-md-auto">
                The Study Ukrainian website was created in 2016 by a group of volunteers working in Lviv.
                We're dedicated to creating a free online resource for teaching the Ukrainian language.
                This website is actively being updated with new material.  Keep checking back for updates!
              </div>

          </div>
        </div>

          <div class="team-text text-center mt-3 mt-md-5">
            <h1 class="text-center">The Study Ukrainian Team </h1>

            <div class="row">

              <div class="col-12 col-md-6 my-auto">
                <h2 class="text-center">Course Content</h2>
                Nataliya Asasteptsva<br>
                John Gu

                <h2 class="text-center">Art</h2>
                Nataliya Asasteptsva

                <h2 class="text-center">Voice Actors</h2>
                Nataliya Astaptseva <br>
                Oleksandr Bratashov <br>
                Hanna Karpenko <br>
                Rostyslav Zhuravchak <br>


                <h2 class="text-center">Website Development</h2>
                John Gu
              </div>

              <div class="col-12 col-md-6">

                <div class="row mx-auto">
                  <!-- John -->
                  <div class="col-6 p-3 px-lg-5">
                    <img class="rounded-circle img-fluid" src="../img/john.jpg" alt="John">
                      <h5 class="card-title mt-2">John</h5>
                  </div>

                  <!-- Natalya -->
                  <div class="col-6 p-3 px-lg-5">
                    <img class="rounded-circle img-fluid" src="../img/natalya.jpg" alt="Natalya">
                      <h5 class="card-title mt-2">Natalya</h5>
                    </div>

                  <!-- Hanna -->
                  <div class="col-6 p-3 px-lg-5">
                    <img class="rounded-circle img-fluid" src="../img/hanna.jpg" alt="Hanna">
                      <h5 class="card-title mt-2">Hanna</h5>
                  </div>

                  <!-- Rostyslav -->
                  <div class="col-6 p-3 px-lg-5">
                    <img class="rounded-circle img-fluid" src="../img/rostyslav.jpg" alt="Rostyslav">
                      <h5 class="card-title mt-2">Rostyslav</h5>
                  </div>
                </div>

              </div>

            </div>
        </div>

        <div class="contact-text text-center mt-3 mt-md-5">
          <h1 class="text-center">Contact</h1>

          Questions?  Comments?  Technical issues? Contact us at studyukrainianwebsite@gmail.com

        </div>

@endsection
