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

                <div class="col-12 ">
                    Study Ukrainian Premium comes with the following features:

                    <ul>
                        <li>Full access to 25 lessons of the Ukrainian Language</li>
                        <li>Fully-voiced audio by native speakers</li>
                        <li>Grammar Explanations for each lesson</li>
                    </ul>

                    <button class="button btn-primary">Sign Up Now</button>
                </div>

            </div>
        </div>>
    </div>
</home> @endsection