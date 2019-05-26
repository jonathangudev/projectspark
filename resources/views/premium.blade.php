@extends('spark::layouts.app')

@section('title')
Study Ukrainian - Premium
@endsection


@section('css')
<link href="/css/extra-styles.css" rel="stylesheet">
@endsection


@section('content')
<home :user="user" inline-template>
    <div class="container">
        <div class="about-text">
            <h1 class="text-center"> Get Study Ukrainian Premium </h1>
            <div class="row justify-content-around">

                <div class="col-12 mt-4">
                    <div class="lead">Study Ukrainian Premium comes with the following features:</div>

                    <ul>
                        <li>
                            <div class="lead">Full access to 25 Ukrainian language lessons</div>
                        </li>
                        <li>
                            <div class="lead">Fully-voiced audio by native speakers</div>
                        </li>
                        <li>
                            <div class="lead">Grammar Explanations for lessons and dialogues</div>
                        </li>
                    </ul>

                    <div class="lead text-center">Price: $3.99 per month</div>

                </div>

            </div>

            <div class="text-center">
                <a href="/register"><button class="button btn-primary btn-lg mt-4">Sign Up Now</button></a>
            </div>

        </div>
    </div>
</home> @endsection